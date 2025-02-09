<!DOCTYPE html>
<html lang="en">
<head>
    @include('layoutsadmin.head')
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('layoutsadmin.sidebar')

        <!-- Main Content Panel -->
        <div class="main-panel">
            <div class="main-header">
            <!-- Navbar -->
                @include('layoutsadmin.navbar')
            </div>

            <!-- Page Content -->
            <div class="container">
                <div class="page-inner">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div class="page-title">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="container-fluid d-flex justify-content-between align-items-center">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="http://www.themekita.com">ThemeKita</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Help</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Licenses</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright text-muted">
                        2024, Madura <i class="fa fa-heart heart text-danger"></i> by
                        <a href="http://www.themekita.com">ThemeKita</a>
                    </div>
                    <div class="text-muted">
                        Distributed by <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
                    </div>
                </div>
            </footer>
    </div>

    @include('layoutsadmin.footer')
</body>
</html>
