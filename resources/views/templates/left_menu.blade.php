<ul class="nav">
    <li class="nav-item nav-category">Main</li>
    <li class="nav-item ">
        <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Home</span>
        </a>
    </li>

    {{--    This menu only for user level 3 (admin) --}}
    @if (\Illuminate\Support\Facades\Auth::user()->level == 3)
        <li class="nav-item nav-category">Master Data</li>
        <li class="nav-item ">
            <a href="{{ route('profile') }}" class="nav-link">
                <i class="link-icon" data-feather="user"></i>
                <span class="link-title">Profil</span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('jenis_aduan') }}" class="nav-link">
                <i class="link-icon" data-feather="file-text"></i>
                <span class="link-title">Jenis Aduan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#users" role="button" aria-expanded="false"
                aria-controls="users">
                <i class="link-icon" data-feather="users"></i>
                <span class="link-title">Pengguna</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="users">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('petugas.index') }}" class="nav-link">Petugas</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('mahasiswa.index') }}" class="nav-link">Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item ">
            <a href="{{ route('laporan_index') }}" class="nav-link">
                <i class="link-icon" data-feather="printer"></i>
                <span class="link-title">Laporan</span>
            </a>
        </li>
        {{--        This is menu only for user level 2 (petugas) --}}
    @elseif(\Illuminate\Support\Facades\Auth::user()->level == 2)
        <li class="nav-item nav-category">Master Data</li>
        <li class="nav-item ">
            <a href="{{ route('petugas_profile') }}" class="nav-link">
                <i class="link-icon" data-feather="user"></i>
                <span class="link-title">Profil</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" data-bs-toggle="collapse" href="#aduan" role="button" aria-expanded="false">
                <i class="link-icon" data-feather="file-text"></i>
                <span class="link-title">Aduan</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse " id="aduan">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('menunggu_dikonfirmasi') }}" class="nav-link">Menunggu dikonfirmasi</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('sedang_dikerjakan') }}" class="nav-link">Sedang dikerjakan</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('aduan_selesai') }}" class="nav-link">Aduan selesai</a>
                    </li>
                </ul>
            </div>
        </li>
        {{--        This is menu only for user level 1 (mahasiswa) --}}
    @elseif(\Illuminate\Support\Facades\Auth::user()->level == 1)
        <li class="nav-item nav-category">Master Data</li>
        <li class="nav-item ">
            <a href="{{ route('mhs_profile') }}" class="nav-link">
                <i class="link-icon" data-feather="user"></i>
                <span class="link-title">Profil</span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('mhs_aduan') }}" class="nav-link">
                <i class="link-icon" data-feather="file-text"></i>
                <span class="link-title">Aduan</span>
            </a>
        </li>
    @endif
</ul>
