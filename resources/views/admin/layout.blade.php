<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Admin - @yield('title')</title>

    <!-- Favicons -->
    <link href="{{ asset('storage/admin/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('storage/admin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('storage/admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/admin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/admin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/admin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/admin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('storage/admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('storage/admin/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block">AdminPanel</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{ route('admin.profile') }}"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('storage/admin/assets/img/profile-img.png') }}" alt="Profile"
                            class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ auth()->user()->name }}</h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profile') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{ route('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.users')}}">
                    <i class="bi bi-person"></i><span>Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.posts')}}">
                    <i class="bi bi-file-earmark-post"></i><span>Posts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.comments')}}">
                    <i class="bi bi-chat-dots"></i><span>Comments</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.categories')}}">
                    <i class="bi bi-tags"></i><span>Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.logs')}}">
                    <i class="bi bi-clock"></i><span>Logs</span>
                </a>
            </li>
            <!-- End Components Nav -->
        </ul>

    </aside><!-- End Sidebar-->


    <main id="main" class="main">
        @yield('content')
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container text-center">
            <p><strong><a href="https://www.linkedin.com/in/jaydeep-makwana-804279223/">
                        Created By Jaydeep Makwana
                    </a>
                </strong>
            </p>
        </div>
    </footer><!-- End Footer -->
    <!-- Vendor JS Files -->
    <script src="{{ asset('storage/admin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('storage/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('storage/admin/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('storage/admin/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('storage/admin/assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('storage/admin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('storage/admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('storage/admin/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('storage/admin/assets/js/main.js') }}"></script>

</body>

</html>
