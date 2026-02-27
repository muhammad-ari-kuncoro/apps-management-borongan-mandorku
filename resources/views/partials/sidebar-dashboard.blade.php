<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('assets/compiled/svg/logo.svg') }}" alt="Logo">
                    </a>
                </div>
                <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                        height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                        <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path
                                d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                opacity=".3"></path>
                            <g transform="translate(-210 -1)">
                                <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                <circle cx="220.5" cy="11.5" r="4"></circle>
                                <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                            </g>
                        </g>
                    </svg>
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                        <label class="form-check-label"></label>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        aria-hidden="true" role="img" class="iconify iconify--mdi" width="20"
                        height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                        </path>
                    </svg>
                </div>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block">
                        <i class="bi bi-x bi-middle"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="sidebar-menu">
            <ul class="menu">

                {{-- ========== UTAMA ========== --}}
                <li class="sidebar-title">Utama</li>

                <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- ========== PROYEK ========== --}}
                <li class="sidebar-title">Proyek</li>

                <li class="sidebar-item {{ $title == 'Proyek Page' ? 'active' : '' }}">
                    <a href="" class="sidebar-link">
                        <i class="bi bi-building"></i>
                        <span>Daftar Proyek</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('monitoring*') ? 'active' : '' }}">
                    <a href="{{ route('monitoring.index') }}" class="sidebar-link">
                        <i class="bi bi-graph-up-arrow"></i>
                        <span>Monitoring Progress</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub {{ Request::is('laporan-harian*') ? 'active' : '' }}">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span>Laporan Harian</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item {{ Request::is('laporan-harian') ? 'active' : '' }}">
                            <a href="{{ route('laporan-harian.index') }}" class="submenu-link">Semua Laporan</a>
                        </li>
                        <li class="submenu-item {{ Request::is('laporan-harian/create') ? 'active' : '' }}">
                            <a href="{{ route('laporan-harian.create') }}" class="submenu-link">Buat Laporan</a>
                        </li>
                        <li class="submenu-item {{ Request::is('laporan-harian/approval*') ? 'active' : '' }}">
                            <a href="{{ route('laporan-harian.approval') }}" class="submenu-link">Approval</a>
                        </li>
                    </ul>
                </li>

                {{-- ========== SDM / PEKERJA ========== --}}
                <li class="sidebar-title">SDM & Pekerja</li>

                <li class="sidebar-item {{ Request::is('pekerja*') ? 'active' : '' }}">
                    <a href="{{ route('pekerja.index') }}" class="sidebar-link">
                        <i class="bi bi-people-fill"></i>
                        <span>Data Pekerja</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('mandor*') ? 'active' : '' }}">
                    <a href="{{ route('mandor.index') }}" class="sidebar-link">
                        <i class="bi bi-person-badge-fill"></i>
                        <span>Data Mandor</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub {{ Request::is('absensi*') ? 'active' : '' }}">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-calendar-check-fill"></i>
                        <span>Absensi & Kehadiran</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item {{ Request::is('absensi/harian') ? 'active' : '' }}">
                            <a href="{{ route('absensi.harian') }}" class="submenu-link">Input Absensi Harian</a>
                        </li>
                        <li class="submenu-item {{ Request::is('absensi/rekap') ? 'active' : '' }}">
                            <a href="{{ route('absensi.rekap') }}" class="submenu-link">Rekap Kehadiran</a>
                        </li>
                        <li class="submenu-item {{ Request::is('absensi/izin*') ? 'active' : '' }}">
                            <a href="{{ route('absensi.izin') }}" class="submenu-link">Izin & Sakit</a>
                        </li>
                    </ul>
                </li>

                {{-- ========== KEUANGAN ========== --}}
                <li class="sidebar-title">Keuangan</li>

                <li class="sidebar-item has-sub {{ Request::is('upah*') ? 'active' : '' }}">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-cash-coin"></i>
                        <span>Manajemen Upah</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item {{ Request::is('upah/hitung') ? 'active' : '' }}">
                            <a href="{{ route('upah.hitung') }}" class="submenu-link">Hitung Upah</a>
                        </li>
                        <li class="submenu-item {{ Request::is('upah/slip') ? 'active' : '' }}">
                            <a href="{{ route('upah.slip') }}" class="submenu-link">Slip Gaji</a>
                        </li>
                        <li class="submenu-item {{ Request::is('upah/rekap') ? 'active' : '' }}">
                            <a href="{{ route('upah.rekap') }}" class="submenu-link">Rekap Penggajian</a>
                        </li>
                        <li class="submenu-item {{ Request::is('upah/setting') ? 'active' : '' }}">
                            <a href="{{ route('upah.setting') }}" class="submenu-link">Setting Skema Upah</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item has-sub {{ Request::is('material*') ? 'active' : '' }}">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-box-seam-fill"></i>
                        <span>Material & Alat</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item {{ Request::is('material/stok') ? 'active' : '' }}">
                            <a href="{{ route('material.stok') }}" class="submenu-link">Stok Material</a>
                        </li>
                        <li class="submenu-item {{ Request::is('material/permintaan') ? 'active' : '' }}">
                            <a href="{{ route('material.permintaan') }}" class="submenu-link">Permintaan Material</a>
                        </li>
                        <li class="submenu-item {{ Request::is('material/alat') ? 'active' : '' }}">
                            <a href="{{ route('material.alat') }}" class="submenu-link">Alat & Mesin</a>
                        </li>
                    </ul>
                </li>

                {{-- ========== LAPORAN ========== --}}
                <li class="sidebar-title">Laporan</li>

                <li class="sidebar-item has-sub {{ Request::is('laporan*') ? 'active' : '' }}">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-file-earmark-bar-graph-fill"></i>
                        <span>Laporan & Rekap</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item {{ Request::is('laporan/absensi') ? 'active' : '' }}">
                            <a href="{{ route('laporan.absensi') }}" class="submenu-link">Laporan Absensi</a>
                        </li>
                        <li class="submenu-item {{ Request::is('laporan/penggajian') ? 'active' : '' }}">
                            <a href="{{ route('laporan.penggajian') }}" class="submenu-link">Laporan Penggajian</a>
                        </li>
                        <li class="submenu-item {{ Request::is('laporan/proyek') ? 'active' : '' }}">
                            <a href="{{ route('laporan.proyek') }}" class="submenu-link">Laporan Progress Proyek</a>
                        </li>
                        <li class="submenu-item {{ Request::is('laporan/material') ? 'active' : '' }}">
                            <a href="{{ route('laporan.material') }}" class="submenu-link">Laporan Material</a>
                        </li>
                    </ul>
                </li>

                {{-- ========== NOTIFIKASI ========== --}}
                <li class="sidebar-title">Notifikasi</li>

                <li class="sidebar-item {{ Request::is('notifikasi*') ? 'active' : '' }}">
                    <a href="{{ route('notifikasi.index') }}" class="sidebar-link">
                        <i class="bi bi-bell-fill"></i>
                        <span>Semua Notifikasi</span>
                        {{-- Contoh badge notifikasi belum dibaca --}}
                        <span class="badge bg-danger ms-auto">5</span>
                    </a>
                </li>

                {{-- ========== PENGATURAN ========== --}}
                <li class="sidebar-title">Pengaturan</li>

                <li class="sidebar-item has-sub {{ Request::is('pengguna*') ? 'active' : '' }}">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-person-gear"></i>
                        <span>Manajemen Pengguna</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item {{ Request::is('pengguna') ? 'active' : '' }}">
                            <a href="{{ route('pengguna.index') }}" class="submenu-link">Daftar Pengguna</a>
                        </li>
                        <li class="submenu-item {{ Request::is('pengguna/role*') ? 'active' : '' }}">
                            <a href="{{ route('pengguna.role') }}" class="submenu-link">Role & Akses</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item {{ Request::is('pengaturan*') ? 'active' : '' }}">
                    <a href="{{ route('pengaturan.index') }}" class="sidebar-link">
                        <i class="bi bi-gear-fill"></i>
                        <span>Pengaturan Aplikasi</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
