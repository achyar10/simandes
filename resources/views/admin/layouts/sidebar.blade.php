<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand">
            <img src="{{asset('template/assets/images/logo.png')}}" height="40" alt="logo" class="mr-3">
            ADMIN
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Web</li>
            <li class="nav-item {{ Request::segment(2) == 'banner' ? 'active' : '' }}">
                <a href="{{ route('banner') }}" class="nav-link">
                    <i class="link-icon" data-feather="image"></i>
                    <span class="link-title">Banner</span>
                </a>
            </li>
            <li class="nav-item {{ Request::segment(2) == 'category' ? 'active' : '' }}">
                <a href="{{ route('category') }}" class="nav-link">
                    <i class="link-icon" data-feather="tag"></i>
                    <span class="link-title">Kategori Berita</span>
                </a>
            </li>
            <li class="nav-item nav-category">Kependudukan</li>
            <li class="nav-item {{ Request::segment(2) == 'familycard' ? 'active' : '' }}">
                <a href="{{ route('familycard') }}" class="nav-link">
                    <i class="link-icon" data-feather="file-text"></i>
                    <span class="link-title">Kartu Keluarga</span>
                </a>
            </li>
            <li class="nav-item {{ Request::segment(2) == 'citizen' ? 'active' : '' }}">
                <a href="{{ route('citizen') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Warga</span>
                </a>
            </li>
            <li class="nav-item nav-category">Master Data</li>
            <li class="nav-item {{ Request::segment(2) == 'rw' ? 'active' : '' }}">
                <a href="{{ route('rw') }}" class="nav-link">
                    <i class="link-icon" data-feather="briefcase"></i>
                    <span class="link-title">Rukun Warga (RW)</span>
                </a>
            </li>
            <li class="nav-item {{ Request::segment(2) == 'rt' ? 'active' : '' }}">
                <a href="{{ route('rt') }}" class="nav-link">
                    <i class="link-icon" data-feather="briefcase"></i>
                    <span class="link-title">Rukun Tetangga (RT)</span>
                </a>
            </li>
            <li class="nav-item {{ Request::segment(2) == 'user' ? 'active' : '' }}">
                <a href="{{ route('user') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Kelola Pengguna</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
