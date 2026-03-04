@extends('layouts.dashboard')

@section('container')
    <div class="container-fluid py-4">

        {{-- ===== HEADER ===== --}}
        <div class="d-flex justify-content-between align-items-start mb-4 flex-wrap gap-3">
            <div>
                <h4 class="fw-bold mb-1">{{ $titlePage }}</h4>
                <p class="text-muted small mb-0">Isi form berikut untuk menambahkan mandor baru</p>
            </div>
            <a href="{{ route('foreman.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

        @include('layouts.flash-data')
        <form action="{{ route('manpower.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                {{-- ===== KOLOM KIRI ===== --}}
                <div class="col-12 col-lg-8">
                    {{-- Informasi Pribadi --}}
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-transparent border-bottom">
                            <span class="fw-semibold"><i class="bi bi-person-lines-fill me-2 text-primary"></i>Informasi
                                Pribadi</span>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">

                                <div class="col-12 col-md-6">
                                    <label class="form-label fw-semibold small">NIK <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nik"
                                        class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}"
                                        placeholder="contoh: 3275010101900001">
                                    @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label fw-semibold small">No. Telepon <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="no_phone" min="0"
                                        class="form-control @error('no_phone') is-invalid @enderror"
                                        value="{{ old('no_phone') }}" placeholder="contoh: 08123456789">
                                    @error('no_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label fw-semibold small">Username / Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                        placeholder="contoh: budi123">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label fw-semibold small">Nama Lengkap <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="full_name"
                                        class="form-control @error('full_name') is-invalid @enderror"
                                        value="{{ old('full_name') }}" placeholder="contoh: Budi Santoso">
                                    @error('full_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-4">
                                    <label class="form-label fw-semibold small">Jenis Kelamin <span
                                            class="text-danger">*</span></label>
                                    <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                                        <option value="" disabled selected>-- Pilih --</option>
                                        <option value="laki-laki" {{ old('gender') == 'laki-laki' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="perempuan" {{ old('gender') == 'perempuan' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-4">
                                    <label class="form-label fw-semibold small">Usia <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="age" min="17" max="99"
                                        class="form-control @error('age') is-invalid @enderror" value="{{ old('age') }}"
                                        placeholder="contoh: 35">
                                    @error('age')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-4">
                                    <label class="form-label fw-semibold small">Spesialisasi <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="spesialist"
                                        class="form-control @error('spesialist') is-invalid @enderror"
                                        value="{{ old('spesialist') }}" placeholder="contoh: Sipil, Mekanikal">
                                    @error('spesialist')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-semibold small">Alamat <span
                                            class="text-danger">*</span></label>
                                    <textarea name="address" rows="3" class="form-control @error('address') is-invalid @enderror"
                                        placeholder="Masukkan alamat lengkap">{{ old('address') }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Timeline Kerja --}}
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-transparent border-bottom">
                            <span class="fw-semibold"><i class="bi bi-calendar-range me-2 text-warning"></i>Timeline
                                Kerja</span>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">

                                <div class="col-12 col-md-6">
                                    <label class="form-label fw-semibold small">Tanggal Bergabung <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="join_date"
                                        class="form-control @error('join_date') is-invalid @enderror"
                                        value="{{ old('join_date') }}">
                                    @error('join_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6">
                                    <label class="form-label fw-semibold small">Tanggal Berakhir</label>
                                    <input type="date" name="terminate_date"
                                        class="form-control @error('terminate_date') is-invalid @enderror"
                                        value="{{ old('terminate_date') }}">
                                    <div class="form-text text-muted">Opsional — isi jika ada kontrak berakhir</div>
                                    @error('terminate_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                {{-- ===== KOLOM KANAN ===== --}}
                <div class="col-12 col-lg-4">

                    {{-- Tarif Harian --}}
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-transparent border-bottom">
                            <span class="fw-semibold"><i class="bi bi-cash-coin me-2 text-success"></i>Tarif Harian</span>
                        </div>
                        <div class="card-body">
                            <label class="form-label fw-semibold small">Daily Rate (Rp) <span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" id="daily_rate" name="daily_rate" min="0" step="0.01"
                                    class="form-control @error('daily_rate') is-invalid @enderror"
                                    value="{{ old('daily_rate', 0) }}" placeholder="0">
                                @error('daily_rate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-text text-muted">Upah per hari kerja mandor</div>
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-transparent border-bottom">
                            <span class="fw-semibold"><i class="bi bi-toggles me-2 text-warning"></i>Status</span>
                        </div>
                        <div class="card-body">
                            <label class="form-label fw-semibold small">Status Mandor <span
                                    class="text-danger">*</span></label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="active" {{ old('status', 'active') == 'active' ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                    Inactive
                                </option>
                                <option value="terminate" {{ old('status') == 'terminate' ? 'selected' : '' }}>
                                    Terminate
                                </option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            {{-- Status badge preview --}}
                            <div class="mt-3">
                                <span id="statusBadge" class="badge bg-success">Active</span>
                            </div>
                        </div>
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan Mandor
                        </button>
                        <a href="{{ route('foreman.index') }}" class="btn btn-outline-secondary">
                            Batal
                        </a>
                    </div>

                </div>

            </div>

        </form>

    </div>

    {{-- Status badge live preview --}}
    <script>
        const statusSelect = document.querySelector('select[name="status"]');
        const badge = document.getElementById('statusBadge');

        const colorMap = {
            active: {
                class: 'bg-success',
                label: 'Active'
            },
            inactive: {
                class: 'bg-secondary',
                label: 'Inactive'
            },
            terminate: {
                class: 'bg-danger',
                label: 'Terminate'
            },
        };

        function updateBadge(val) {
            const cfg = colorMap[val] || colorMap['active'];
            badge.className = `badge ${cfg.class}`;
            badge.textContent = cfg.label;
        }

        statusSelect.addEventListener('change', e => updateBadge(e.target.value));
        updateBadge(statusSelect.value);

        document.addEventListener('DOMContentLoaded', function() {

            const dailyRateInput = document.getElementById('daily_rate');

            dailyRateInput.addEventListener('input', function() {

                let value = this.value;

                // Hanya boleh angka dan 1 titik desimal
                value = value.replace(/[^0-9.]/g, '');

                // Cegah lebih dari 1 titik
                const parts = value.split('.');
                if (parts.length > 2) {
                    value = parts[0] + '.' + parts[1];
                }

                // Maksimal 2 angka di belakang koma
                if (parts[1]) {
                    parts[1] = parts[1].substring(0, 2);
                    value = parts[0] + '.' + parts[1];
                }

                // Tidak boleh negatif
                if (parseFloat(value) < 0) {
                    value = 0;
                }

                this.value = value;
            });

        });
    </script>
@endsection
