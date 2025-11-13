<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
    @stack('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    /* --- Nút Back to Top --- */
    .back-to-top {
        position: fixed;
        /* Vị trí ở góc dưới bên phải */
        bottom: 25px;
        right: 25px;
        /* Ẩn ban đầu */
        display: none;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background-color: #0d6efd;
        /* Màu xanh dương chính của Bootstrap */
        color: #fff;
        /* Màu icon trắng */
        text-align: center;
        font-size: 20px;
        line-height: 44px;
        /* Căn icon vào giữa theo chiều dọc */
        z-index: 1000;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .back-to-top:hover {
        background-color: #0b5ed7;
        /* Màu xanh đậm hơn khi di chuột qua */
        color: #fff;
        transform: translateY(-3px);
        /* Hiệu ứng nhấc lên một chút */
    }
    </style>
    <title>@yield('title', 'Online Store')</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
        <div class="container">

            <a class="navbar-brand" href="{{ route('home.index') }}">Online Store</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
                    <a class="nav-link active" href="{{ route('product.index') }}">Product</a>
                    <a class="nav-link active" href="{{ route('home.about') }}">About</a>
                    <a class="nav-link active" href="{{ route('cart.index') }}">Cart</a>
                    <div class="custom-vr"></div>
                    @guest
                    <a class="nav-link active" href="{{ route('login')}}">Login</a>
                    <a class="nav-link active" href="{{ route('register')}}">Register</a>
                    @else

                    <a class="nav-link active" href="{{ route('admin.home.index') }}">Admin Page</a>
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                        <a role="button" class="nav-link active"
                            onclick="document.getElementById('logout').submit();">Logout</a>
                        @csrf
                    </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <header class="masthead bg-primary text-white text-center py-4">
        <div class="container d-flex align-items-center flex-column">
            <h2>@yield('subtitle', 'Online Store - Laravel Framework')</h2>
        </div>
    </header>
    <!-- header -->

    <main class="flex-fill">
        <div class="container my-4">
            @yield('content')
        </div>
    </main>

    <!-- footer -->
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
    <a href="#" class="back-to-top"><i class="fas fa-arrow-up"></i></a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    @stack('scripts')
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const backToTopButton = document.querySelector('.back-to-top');

        if (backToTopButton) {
            // Hiển thị hoặc ẩn nút dựa vào vị trí cuộn
            window.addEventListener('scroll', () => {
                // Hiện nút khi người dùng cuộn xuống hơn 300px
                if (window.scrollY > 300) {
                    backToTopButton.style.display = 'block';
                } else {
                    backToTopButton.style.display = 'none';
                }
            });

            // Cuộn mượt lên đầu trang khi nhấp vào nút
            backToTopButton.addEventListener('click', (e) => {
                e.preventDefault(); // Ngăn hành vi mặc định của thẻ <a>
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth' // Tạo hiệu ứng cuộn mượt
                });
            });
        }
    });
    </script>
</body>

</html>