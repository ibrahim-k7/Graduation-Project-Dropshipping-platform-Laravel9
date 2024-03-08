<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href={{ asset('User/HOME/css/styles.css') }}>
    <!-- Scripts -->
    @yield('js')
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>المخازن الإلكترونية</title>
</head>

<body>
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="{{ route('user.home') }}" class="nav__logo">المخازن</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="{{ route('user.home') }}" class="nav__link active-link">الرئيسيه</a>
                    </li>
                    <li class="nav__item">
                        <a href="#about" class="nav__link">معلومات عنا</a>
                    </li>
                    <li class="nav__item">
                        <a href="#services" class="nav__link">الخدمات</a>
                    </li>
                    <li class="nav__item">
                        <a href="#contact" class="nav__link">تواصل معانا</a>
                    </li>

                    {{-- <i class='bx bx-toggle-left change-theme' id="theme-button"></i> --}}
                </ul>
            </div>

            <div class="nav__toggle mx-3" id="nav-toggle">
                <i class='bx bx-grid-alt'></i>
            </div>

            <a href="{{ route('login') }}" class="button button__header">تسجيل الدخول</a>
        </nav>
    </header>

    <main class="py-5">
        @yield('Content')
    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">Delivery</a>
                <p class="footer__description">Order Products Faster <br> Easier</p>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Our Services</h3>
                <ul class="footer__links">
                    <li><a href="#" class="footer__link">Pricing </a></li>
                    <li><a href="#" class="footer__link">Discounts</a></li>
                    <li><a href="#" class="footer__link">Report a bug</a></li>
                    <li><a href="#" class="footer__link">Terms of Service</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Our Company</h3>
                <ul class="footer__links">
                    <li><a href="#" class="footer__link">Blog</a></li>
                    <li><a href="#" class="footer__link">Our mision</a></li>
                    <li><a href="#" class="footer__link">Get in touch</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Community</h3>
                <ul class="footer__links">
                    <li><a href="#" class="footer__link">Support</a></li>
                    <li><a href="#" class="footer__link">Questions</a></li>
                    <li><a href="#" class="footer__link">Customer help</a></li>
                </ul>
            </div>

            <div class="footer__social">
                <a href="#" class="footer__social-link"><i class='bx bxl-facebook-circle '></i></a>
                <a href="#" class="footer__social-link"><i class='bx bxl-twitter'></i></a>
                <a href="#" class="footer__social-link"><i class='bx bxl-instagram-alt'></i></a>
            </div>
        </div>

        {{-- <p class="footer__copy">&#169;</p> --}}
    </footer>

    <!--=============== SCROLL UP ===============-->
    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bx-up-arrow-alt scrollup__icon'></i>
    </a>

    <!--=============== MAIN JS ===============-->
    <script src={{ asset('User/HOME/js/main.js') }}></script>
</body>

</html>
