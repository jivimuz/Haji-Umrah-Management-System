<!doctype html>
<html lang="en" dir="ltr">
<?php
use App\Models\Setting;

$logo = Setting::where('parameter', 'company_logo')->first()->value ?: 'Logo';
?>
<!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/admin-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Feb 2024 13:35:24 GMT -->

@include('layout/header')
@yield('style')
<link rel="shortcut icon" href="{{ url($logo) }}" />

<body class="  "
    style="background:url(../assets/images/dashboard.png);    background-attachment: fixed;
    background-size: cover;">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <img src="{{ url($logo) }}" style="width: 50%" alt="">
        </div>
    </div>
    <!-- loader END -->
    <div class="position-relative">
        <div class="user-img1">
            <svg width="1857" viewBox="0 0 1857 327" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M4.05078 189.348C86.8841 109.514 348.951 -25.2523 734.551 74.3477C1120.15 173.948 1641.22 91.181 1853.55 37.3477"
                    stroke="#EA6A12" stroke-opacity="0.3" />
                <path
                    d="M0.99839 152.331C90.9502 80.6133 364.495 -28.9952 739.062 106.31C1113.63 241.616 1640.16 208.056 1856.6 174.363"
                    stroke="#EA6A12" stroke-opacity="0.3" />
            </svg>
        </div>
    </div>
    @include('layout/navbar')
    @include('layout/topcontent')


    <main class="main-content" style="min-height: 87vh">
        @yield('content')
    </main>

</body>

@include('layout/footer')
@yield('script')

</html>
