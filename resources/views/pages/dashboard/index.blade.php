@extends('layouts.dashboard')

@section('container')

<div class="container-fluid py-4">

    {{-- ===== HEADER ===== --}}
    <div class="d-flex justify-content-between align-items-start mb-4 flex-wrap gap-3">
        <div>
            <h4 class="fw-bold mb-1">{{$titlePage}}</h4>
            <p class="text-muted small mb-0">Selamat datang, {{ auth()->user()->name ?? 'Owner' }} — ringkasan hari ini</p>
        </div>
        <div class="d-flex align-items-center gap-2 border rounded px-3 py-2 small text-muted">
            <i class="bi bi-calendar3 text-warning"></i>
            <span>{{ now()->translatedFormat('l, d F Y') }}</span>
        </div>
    </div>

    {{-- ===== KPI CARDS ===== --}}
    <div class="row g-3 mb-4">

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="bg-warning bg-opacity-10 text-warning rounded-3 p-2 fs-5">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <span class="badge bg-success bg-opacity-10 text-success small">↑ 5 dari kemarin</span>
                    </div>
                    <div class="fs-2 fw-bold">142</div>
                    <div class="text-muted small mt-1">Pekerja Hadir</div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="bg-success bg-opacity-10 text-success rounded-3 p-2 fs-5">
                            <i class="bi bi-check2-circle"></i>
                        </div>
                        <span class="badge bg-danger bg-opacity-10 text-danger small">2 terlambat</span>
                    </div>
                    <div class="fs-2 fw-bold">8</div>
                    <div class="text-muted small mt-1">Proyek Aktif</div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="bg-primary bg-opacity-10 text-primary rounded-3 p-2 fs-5">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                        <span class="badge bg-secondary bg-opacity-10 text-secondary small">Budget 60 Jt</span>
                    </div>
                    <div class="fs-2 fw-bold">48,5 Jt</div>
                    <div class="text-muted small mt-1">Pengeluaran Upah Bulan Ini</div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="bg-danger bg-opacity-10 text-danger rounded-3 p-2 fs-5">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                        </div>
                        <span class="badge bg-danger bg-opacity-10 text-danger small">2 kritis</span>
                    </div>
                    <div class="fs-2 fw-bold">5</div>
                    <div class="text-muted small mt-1">Alert Aktif</div>
                </div>
            </div>
        </div>

    </div>

    {{-- ===== ROW 2: PROGRESS + ABSENSI ===== --}}
    <div class="row g-3 mb-4">

        {{-- Progress Proyek --}}
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-bottom d-flex justify-content-between align-items-center">
                    <span class="fw-semibold">Progress Proyek</span>
                    <a href="#" class="btn btn-sm btn-outline-secondary">Lihat Semua</a>
                </div>
                <div class="card-body">
                    @php
                        $projects = [
                            ['name' => 'Gedung A – Lantai 3',       'client' => 'PT Maju Jaya',       'pct' => 78, 'color' => 'warning', 'status' => 'On Track'],
                            ['name' => 'Workshop Fabrikasi B',       'client' => 'CV Baja Nusantara',  'pct' => 55, 'color' => 'primary', 'status' => 'On Track'],
                            ['name' => 'Renovasi Office Block',      'client' => 'PT Sejahtera Abadi', 'pct' => 92, 'color' => 'success', 'status' => 'Hampir Selesai'],
                            ['name' => 'Pabrik Unit 4 – Struktur',  'client' => 'PT Indometal',       'pct' => 33, 'color' => 'danger',  'status' => 'Terlambat'],
                            ['name' => 'Jembatan Akses Selatan',     'client' => 'Pemkab Bekasi',      'pct' => 61, 'color' => 'info',    'status' => 'On Track'],
                        ];
                    @endphp

                    <div class="d-flex flex-column gap-3">
                        @foreach($projects as $p)
                        <div>
                            <div class="d-flex justify-content-between align-items-end mb-1">
                                <div>
                                    <div class="fw-semibold small">{{ $p['name'] }}</div>
                                    <div class="text-muted" style="font-size:.75rem">{{ $p['client'] }} · {{ $p['status'] }}</div>
                                </div>
                                <span class="fw-bold small text-{{ $p['color'] }}">{{ $p['pct'] }}%</span>
                            </div>
                            <div class="progress" style="height:7px" role="progressbar"
                                 aria-valuenow="{{ $p['pct'] }}" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-{{ $p['color'] }}" style="width:{{ $p['pct'] }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>

        {{-- Kehadiran Hari Ini --}}
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-bottom d-flex justify-content-between align-items-center">
                    <span class="fw-semibold">Kehadiran Hari Ini</span>
                    <a href="#" class="btn btn-sm btn-outline-secondary">Detail</a>
                </div>
                <div class="card-body d-flex flex-column justify-content-between gap-3">

                    {{-- Donut SVG --}}
                    <div class="d-flex justify-content-center">
                        <svg viewBox="0 0 100 100" width="150" height="150">
                            <circle cx="50" cy="50" r="38" fill="none" stroke="#e9ecef" stroke-width="12"/>
                            <circle cx="50" cy="50" r="38" fill="none" stroke="#ffc107" stroke-width="12"
                                stroke-dasharray="238.76" stroke-dashoffset="26.8"
                                stroke-linecap="round" transform="rotate(-90 50 50)"/>
                            <text x="50" y="46" text-anchor="middle" dominant-baseline="middle"
                                  font-size="14" font-weight="bold" fill="#212529">142</text>
                            <text x="50" y="59" text-anchor="middle" dominant-baseline="middle"
                                  font-size="7" fill="#6c757d">dari 160</text>
                        </svg>
                    </div>

                    {{-- Legend --}}
                    <div class="d-flex flex-column gap-2">
                        <div class="d-flex justify-content-between align-items-center bg-light rounded px-3 py-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="rounded-circle bg-success d-inline-block" style="width:10px;height:10px"></span>
                                <span class="small text-muted">Hadir Tepat Waktu</span>
                            </div>
                            <span class="fw-bold small">128</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center bg-light rounded px-3 py-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="rounded-circle bg-warning d-inline-block" style="width:10px;height:10px"></span>
                                <span class="small text-muted">Terlambat</span>
                            </div>
                            <span class="fw-bold small">14</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center bg-light rounded px-3 py-2">
                            <div class="d-flex align-items-center gap-2">
                                <span class="rounded-circle bg-danger d-inline-block" style="width:10px;height:10px"></span>
                                <span class="small text-muted">Absen / Alpha</span>
                            </div>
                            <span class="fw-bold small">18</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    {{-- ===== ROW 3: ALERT + UPAH ===== --}}
    <div class="row g-3">

        {{-- Alert & Notifikasi --}}
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-bottom d-flex justify-content-between align-items-center">
                    <span class="fw-semibold">Alert & Notifikasi</span>
                    <a href="#" class="btn btn-sm btn-outline-secondary">Semua</a>
                </div>
                <div class="card-body d-flex flex-column gap-2">
                    @php
                        $alerts = [
                            ['type' => 'danger',  'icon' => 'bi-exclamation-octagon-fill', 'title' => 'Proyek Pabrik Unit 4 Terlambat', 'desc' => 'Progress 33% — target minggu ini 50%.', 'time' => '5 mnt lalu'],
                            ['type' => 'danger',  'icon' => 'bi-people-fill',               'title' => 'Absensi Rendah – Tim B',          'desc' => 'Tim B hanya 68% hadir, di bawah 80%.',  'time' => '1 jam lalu'],
                            ['type' => 'warning', 'icon' => 'bi-cash',                      'title' => 'Budget Upah 80% Terpakai',        'desc' => 'Sisa Rp 11,5 juta dari Rp 60 juta.',   'time' => '3 jam lalu'],
                            ['type' => 'warning', 'icon' => 'bi-clock-history',             'title' => 'Laporan Harian Belum Masuk',      'desc' => '3 mandor belum submit: Budi, Eko, Rini.', 'time' => '5 jam lalu'],
                            ['type' => 'info',    'icon' => 'bi-tools',                     'title' => 'Alat Berat Jadwal Servis',        'desc' => 'Excavator CAT 320 servis besok 08.00.', 'time' => 'Kemarin'],
                        ];
                    @endphp

                    @foreach($alerts as $a)
                    <div class="d-flex align-items-start gap-3 rounded p-2 bg-light border-start border-3 border-{{ $a['type'] }}">
                        <div class="bg-{{ $a['type'] }} bg-opacity-10 text-{{ $a['type'] }} rounded-2 p-2 fs-6 flex-shrink-0">
                            <i class="bi {{ $a['icon'] }}"></i>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <div class="fw-semibold small text-truncate">{{ $a['title'] }}</div>
                            <div class="text-muted text-truncate" style="font-size:.75rem">{{ $a['desc'] }}</div>
                        </div>
                        <div class="text-muted text-nowrap" style="font-size:.7rem">{{ $a['time'] }}</div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

        {{-- Pengeluaran Upah --}}
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-transparent border-bottom d-flex justify-content-between align-items-center">
                    <span class="fw-semibold">Pengeluaran Upah Bulan Ini</span>
                    <a href="#" class="btn btn-sm btn-outline-secondary">Rekap</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-3 small text-muted fw-semibold">Proyek / Tim</th>
                                    <th class="small text-muted fw-semibold">Jumlah</th>
                                    <th class="small text-muted fw-semibold">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $upahs = [
                                        ['name' => 'Gedung A',         'amount' => 'Rp 14.200.000', 'status' => 'success', 'label' => 'Lunas'],
                                        ['name' => 'Workshop Fab B',   'amount' => 'Rp 9.750.000',  'status' => 'success', 'label' => 'Lunas'],
                                        ['name' => 'Renovasi Office',  'amount' => 'Rp 7.300.000',  'status' => 'warning', 'label' => 'Pending'],
                                        ['name' => 'Pabrik Unit 4',    'amount' => 'Rp 11.000.000', 'status' => 'primary', 'label' => 'Sebagian'],
                                        ['name' => 'Jembatan Selatan', 'amount' => 'Rp 6.250.000',  'status' => 'warning', 'label' => 'Pending'],
                                    ];
                                @endphp
                                @foreach($upahs as $u)
                                <tr>
                                    <td class="ps-3 small fw-semibold">{{ $u['name'] }}</td>
                                    <td class="small font-monospace">{{ $u['amount'] }}</td>
                                    <td>
                                        <span class="badge bg-{{ $u['status'] }} bg-opacity-10 text-{{ $u['status'] }}">
                                            {{ $u['label'] }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>{{-- /row 3 --}}

</div>{{-- /container-fluid --}}

@endsection
