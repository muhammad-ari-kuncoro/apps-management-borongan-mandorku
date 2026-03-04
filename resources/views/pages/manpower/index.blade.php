@extends('layouts.dashboard')

@section('container')
    <div class="container-fluid py-4">

        @include('layouts.flash-data')
        {{-- ===== HEADER ===== --}}
        <div class="d-flex justify-content-between align-items-start mb-4 flex-wrap gap-3">
            <div>
                <h4 class="fw-bold mb-1">{{ $titlePage }}</h4>
                <p class="text-muted small mb-0">Selamat datang, {{ auth()->user()->name ?? 'Owner' }} — ringkasan Data
                    manpower hari ini</p>
            </div>
            <div class="d-flex align-items-center gap-2 border rounded px-3 py-2 small text-muted">

                <i class="bi bi-calendar3 text-warning"></i>
                <span>{{ now()->translatedFormat('l, d F Y') }}</span>
            </div>
        </div>


        {{-- ===== CARD TABLE ===== --}}
        <div class="card border-0 shadow-sm">
            <div
                class="card-header bg-transparent border-bottom d-flex justify-content-between align-items-center flex-wrap gap-2">
                <span class="fw-semibold">Daftar Manpower</span>
                <a href="{{ route('manpower.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Data Manpower
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive datatable-minimal">
                    <table class="table table-hover align-middle" id="myTable">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Nama Panjang</th>
                                <th>No Telp</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Keahlian</th>
                                <th>Tgl Mulai Kerja</th>
                                <th>Tgl Akhir Kerja</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dataManPower as $data )

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->full_name }}</td>
                                <td>{{ $data->no_phone }}</td>
                                <td>{{ $data->address }}</td>
                                <td>{{ $data->gender }}</td>
                                <td>{{ $data->spesialist }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->join_date)->format('Y-m-d') }}</td>
                                <td>
                                    {{ $data->terminate_date ? \Carbon\Carbon::parse($data->terminate_date)->format('Y-m-d') : '-'}}
                                </td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <a href="{{ route('manpower.edit', $data->id) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    {{-- <form action="{{ route('foreman.delete', $data->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menonaktifkan mandor ini? Data tidak akan dihapus permanen.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger w-100 btn-sm">
                                            <i class="bi bi-trash me-1"></i> Nonaktifkan Mandor
                                        </button>
                                    </form> --}}
                                    @empty
                                    @endforelse
                                </td>
                            </tr>
                            {{-- @empty
                                @endforelse --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    @endsection

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const table = document.getElementById('table1');
                if (table) {
                    new simpleDatatables.DataTable(table, {
                        searchable: true,
                        fixedHeight: false,
                        perPage: 10,
                        labels: {
                            placeholder: 'Cari proyek...',
                            perPage: '{select} data per halaman',
                            noRows: 'Tidak ada data ditemukan',
                            info: 'Menampilkan {start} sampai {end} dari {rows} data',
                        }
                    });
                }
            });
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    @endpush
