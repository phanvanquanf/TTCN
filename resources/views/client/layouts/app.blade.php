<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - Phòng khám Medilab</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('client/assets/img/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('client/assets/img/apple-touch-icon.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@400;600&family=Raleway:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="{{ asset('client/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('client/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('client/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ asset('client/assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

    <!-- Header -->
    @include('client.layouts.header')

    <!-- Main content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('client.layouts.footer')

    <!-- Scroll to top button -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS -->
    <script src="{{ asset('client/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('client/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('client/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('client/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('client/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('client/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('client/assets/js/main.js') }}"></script>
</body>

</html>
