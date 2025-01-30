<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layoutsadmin.head')
  </head>
  <body>
  <div class="wrapper">
    @include('layoutsadmin.sidebar')
    <div class="main-panel">
            @include('layoutsadmin.navbar')

            <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
              <div>
        @yield('content')
        </div>
        </div>

      </div>


    </div>
    <footer class="footer me-3">
          <div class="container-fluid d-flex justify-content-between me-3">
            <nav class="pull-left me-3">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="http://www.themekita.com">
                    ThemeKita
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Help </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Licenses </a>
                </li>
              </ul>
            </nav>
            <div class="copyright">
              2024, Madura <i class="fa fa-heart heart text-danger"></i> by
              <a href="http://www.themekita.com">ThemeKita</a>
            </div>
            <div>
              Distributed by
              <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
            </div>
          </div>
        </footer>
    </div>
    </div>
    @include('layoutsadmin.footer')

</body>
</html>
