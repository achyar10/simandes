<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <link rel="stylesheet" href="{{ asset('template/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/toastr/toastr.min.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('template/assets/images/favicon.ico') }}" />
    <script src="{{ asset('template/assets/vendors/jquery/jquery.min.js') }}"></script>
</head>

<body>
    <div class="main-wrapper">

        @include('admin.layouts.sidebar')

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown nav-profile">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="https://via.placeholder.com/30x30" alt="profile">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <div class="dropdown-header d-flex flex-column align-items-center">
                                    <div class="figure mb-3">
                                        <img src="https://via.placeholder.com/80x80" alt="">
                                    </div>
                                    <div class="info text-center">
                                        <p class="name font-weight-bold mb-0">{{ auth()->user()->name }}</p>
                                        <p class="email text-muted mb-3">{{ auth()->user()->email }}</p>
                                    </div>
                                </div>
                                <div class="dropdown-body">
                                    <ul class="profile-nav p-0 pt-3">
                                        <li class="nav-item">
                                            <a href="pages/general/profile.html" class="nav-link">
                                                <i data-feather="user"></i>
                                                <span>Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:;" class="nav-link">
                                                <i data-feather="edit"></i>
                                                <span>Edit Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('logout') }}" class="nav-link">
                                                <i data-feather="log-out"></i>
                                                <span>Log Out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- partial -->

            <div class="page-content">

                @yield('content')

            </div>

            <!-- partial:partials/_footer.html -->
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script> All rights reserved</p>
                <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Matik Creative Technology&trade;
                </p>
            </footer>
            <!-- partial -->

        </div>
    </div>

    @if (session('error'))
        <script>
            $(function() {
                toastr.error('{{ session('error') }}')
            })
        </script>
    @endif
    @if (session('success'))
        <script>
            $(function() {
                toastr.success('{{ session('success') }}')
            })
        </script>
    @endif

    <!-- core:js -->
    <script src="{{ asset('template/assets/vendors/core/core.js') }}"></script>
    <!-- inject:js -->
    <script src="{{ asset('template/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/template.js') }}"></script>
    <!-- endinject -->
    <script src="{{ asset('template/assets/vendors/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/select2/select2.min.js') }}"></script>
    <!-- end custom js for this page -->

    <script>
        $(function() {
            $('.select2').select2();
        });
    </script>
</body>

</html>
