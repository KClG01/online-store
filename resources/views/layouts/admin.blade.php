<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
    @stack('styles')
    <title>@yield('title', 'Admin - Online Store')</title>
</head>

<body>
    <div class="row g-0">
        <!-- sidebar -->
        <div class="p-3 col fixed text-white bg-dark">

            <a href="{{ route('admin.home.index') }}" class="text-white text-
decoration-none"> <span class="fs-4">Dashboard</span>
            </a>
            <hr />
            <ul class="nav flex-column">
                <li><a href="{{ route('admin.home.index') }}" class="nav-link
text-white">- Admin - Home</a></li>
                <li><a href="{{ route('admin.product.index') }}" class="nav-link text-white">- Admin -
                        Products</a></li>
                <li>

                    <a href="{{ route('home.index') }}" class="mt-2 btn bg-
primary text-white">- Về Trang chủ.</a>

                </li>
            </ul>
        </div>
        <!-- sidebar -->
        <div class="col content-grey">
            <nav class="p-3 shadow text-end">
                <span class="profile-font">Admin</span>
                <img class="img-profile rounded-circle" src="{{
asset('/img/undraw_profile.svg') }}">
            </nav>
            <div class="g-0 m-5"> @yield('content')
            </div>
        </div>
    </div>
    <footer class="copyright py-4 text-center text-white bg-dark mt-auto">
        <div class="container">
            <small>
                Copyright -
                <a class="text-reset fw-bold text-decoration-none" target="_blank" href="https://twitter.com/">
                    KhClnG
                </a>
                - <b>CKC</b>
            </small>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>

</html>