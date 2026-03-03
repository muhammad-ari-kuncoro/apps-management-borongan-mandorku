@extends('layouts.dashboard')

@section('container')
<div class="container-fluid py-4">
@extends('layouts.flash-data')
    {{-- ===== HEADER ===== --}}
    <div class="d-flex justify-content-between align-items-start mb-4 flex-wrap gap-3">
        <div>
            <h4 class="fw-bold mb-1">{{ $titlePage }}</h4>
            <p class="text-muted small mb-0">Isi form berikut untuk menambahkan proyek baru</p>
        </div>
        <a href="{{ route('proyek.index') }}" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <form action="{{ route('proyek.store') }}" method="POST">
        @csrf

        <div class="row g-4">

            {{-- ===== KOLOM KIRI ===== --}}
            <div class="col-12 col-lg-8">

                {{-- Informasi Umum --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-transparent border-bottom">
                        <span class="fw-semibold"><i class="bi bi-info-circle me-2 text-primary"></i>Informasi Umum</span>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">

                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold small">Kode Proyek <span class="text-danger">*</span></label>
                                <input type="text" name="kode_proyek"
                                    class="form-control @error('kode_proyek') is-invalid @enderror"
                                    value="{{ old('kode_proyek') }}"
                                    placeholder="contoh: PRY-2025-001">
                                @error('kode_proyek')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold small">Jenis Proyek <span class="text-danger">*</span></label>
                                <select name="jenis_proyek" class="form-select @error('jenis_proyek') is-invalid @enderror">
                                    <option value="" disabled selected>-- Pilih Jenis --</option>
                                    <option value="konstruksi"  {{ old('jenis_proyek') == 'konstruksi'  ? 'selected' : '' }}>Konstruksi</option>
                                    <option value="manufaktur"  {{ old('jenis_proyek') == 'manufaktur'  ? 'selected' : '' }}>Manufaktur</option>
                                    <option value="fabrikasi"   {{ old('jenis_proyek') == 'fabrikasi'   ? 'selected' : '' }}>Fabrikasi</option>
                                    <option value="renovasi"    {{ old('jenis_proyek') == 'renovasi'    ? 'selected' : '' }}>Renovasi</option>
                                    <option value="lainnya"     {{ old('jenis_proyek') == 'lainnya'     ? 'selected' : '' }}>Lainnya</option>
                                </select>
                                @error('jenis_proyek')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold small">Nama Proyek <span class="text-danger">*</span></label>
                                <input type="text" name="nama_proyek"
                                    class="form-control @error('nama_proyek') is-invalid @enderror"
                                    value="{{ old('nama_proyek') }}"
                                    placeholder="Masukkan nama proyek">
                                @error('nama_proyek')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold small">Nama Klien <span class="text-danger">*</span></label>
                                <input type="text" name="nama_klien"
                                    class="form-control @error('nama_klien') is-invalid @enderror"
                                    value="{{ old('nama_klien') }}"
                                    placeholder="contoh: PT Maju Jaya">
                                @error('nama_klien')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold small">Lokasi <span class="text-danger">*</span></label>
                                <input type="text" name="lokasi"
                                    class="form-control @error('lokasi') is-invalid @enderror"
                                    value="{{ old('lokasi') }}"
                                    placeholder="Alamat / nama lokasi proyek">
                                @error('lokasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Timeline --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-transparent border-bottom">
                        <span class="fw-semibold"><i class="bi bi-calendar-range me-2 text-warning"></i>Timeline</span>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">

                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold small">Tanggal Mulai <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_mulai"
                                    class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                    value="{{ old('tanggal_mulai') }}">
                                @error('tanggal_mulai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold small">Tanggal Selesai (Rencana) <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_selesai_rencana"
                                    class="form-control @error('tanggal_selesai_rencana') is-invalid @enderror"
                                    value="{{ old('tanggal_selesai_rencana') }}">
                                @error('tanggal_selesai_rencana')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Catatan --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-transparent border-bottom">
                        <span class="fw-semibold"><i class="bi bi-sticky me-2 text-secondary"></i>Catatan</span>
                    </div>
                    <div class="card-body">
                        <textarea name="catatan" rows="4"
                            class="form-control @error('catatan') is-invalid @enderror"
                            placeholder="Catatan tambahan tentang proyek (opsional)">{{ old('catatan') }}</textarea>
                        @error('catatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>

            {{-- ===== KOLOM KANAN ===== --}}
            <div class="col-12 col-lg-4">

                {{-- Nilai Kontrak --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-transparent border-bottom">
                        <span class="fw-semibold"><i class="bi bi-cash-coin me-2 text-success"></i>Nilai Kontrak</span>
                    </div>
                    <div class="card-body">
                        <label class="form-label fw-semibold small">Nilai Kontrak (Rp) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" name="nilai_kontrak" min="0"
                                class="form-control @error('nilai_kontrak') is-invalid @enderror"
                                value="{{ old('nilai_kontrak', 0) }}"
                                placeholder="0">
                            @error('nilai_kontrak')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Mandor --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-transparent border-bottom">
                        <span class="fw-semibold"><i class="bi bi-person-badge-fill me-2 text-info"></i>Penanggung Jawab</span>
                    </div>
                    <div class="card-body">
                        <label class="form-label fw-semibold small">Mandor</label>
                        <select name="mandor_id" class="form-select @error('mandor_id') is-invalid @enderror">
                            <option value="">-- Pilih Mandor --</option>
                            @foreach ($mandors as $mandor)
                                <option value="{{ $mandor->id }}" {{ old('mandor_id') == $mandor->id ? 'selected' : '' }}>
                                    {{ $mandor->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('mandor_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Status --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-transparent border-bottom">
                        <span class="fw-semibold"><i class="bi bi-toggles me-2 text-warning"></i>Status Awal</span>
                    </div>
                    <div class="card-body">
                        <label class="form-label fw-semibold small">Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="draft"  {{ old('status', 'draft') == 'draft'  ? 'selected' : '' }}>Draft</option>
                            <option value="aktif"  {{ old('status') == 'aktif'  ? 'selected' : '' }}>Aktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Tombol Simpan --}}
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan Proyek
                    </button>
                    <a href="{{ route('proyek.index') }}" class="btn btn-outline-secondary">
                        Batal
                    </a>
                </div>

            </div>

        </div>

    </form>

</div>
@endsection
