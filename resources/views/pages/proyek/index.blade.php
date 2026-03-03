@extends('layouts.dashboard')

@section('container')

<div class="container-fluid py-4">

    {{-- ===== HEADER ===== --}}
    <div class="d-flex justify-content-between align-items-start mb-4 flex-wrap gap-3">
        <div>
            <h4 class="fw-bold mb-1">{{ $titlePage }}</h4>
            <p class="text-muted small mb-0">Selamat datang, {{ auth()->user()->name ?? 'Owner' }} — ringkasan Data Proyek hari ini</p>
        </div>
        <div class="d-flex align-items-center gap-2 border rounded px-3 py-2 small text-muted">
            <i class="bi bi-calendar3 text-warning"></i>
            <span>{{ now()->translatedFormat('l, d F Y') }}</span>
        </div>
    </div>

    {{-- ===== CARD TABLE ===== --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-transparent border-bottom d-flex justify-content-between align-items-center flex-wrap gap-2">
            <span class="fw-semibold">Daftar Proyek</span>
            <a href="{{ route('proyek.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle me-1"></i> Tambah Proyek
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode</th>
                            <th>Nama Proyek</th>
                            <th>Klien</th>
                            <th>Jenis</th>
                            <th>Mandor</th>
                            <th>Tgl Mulai</th>
                            <th>Tgl Selesai</th>
                            <th>Progress</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
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
</script>
@endpush
