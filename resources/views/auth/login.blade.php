<!doctype html>
<html lang="en" dir="ltr">

<!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/auth/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Feb 2024 13:36:38 GMT -->
<?php
use App\Models\Setting;
$app_name = Setting::where('parameter', 'app_name')->first()->value ?: 'AppName';
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $app_name }}| Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ $logo ?: url('assets/images/logo.png') }}" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="assets/css/core/libs.min.css">
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/css/aprycot.mine209.css?v=1.0.0">
</head>

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <img src="{{ $logo ?: url('assets/images/logo.png') }}" style="width: 50%" alt="">
        </div>
    </div>
    <!-- loader END -->

    <div class="wrapper">
        <section class="container-fluid bg-circle-login" id="auth-sign">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-7 col-xl-4">
                    <div class="card-body" style="text-align: center; padding:20px">
                        {{-- <a>
                            <img src="{{ $logo ?: url('assets/images/logo.png') }}" class="img-fluid logo-img"
                                style="max-width: 200px">
                        </a>
                        <br>
                        <br> --}}
                        <h2 class="mb-2 text-center">Sign In</h2>
                        <form id="login-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="username" class="form-label">Username / Email</label>
                                        <input type="username" class="form-control form-control-sm" id="username"
                                            aria-describedby="username" placeholder=" ">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control form-control-sm" id="password"
                                            aria-describedby="password" placeholder=" ">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <br>
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5 col-xl-8 d-lg-block d-none vh-100 overflow-hidden">

                    <img src="{{ $logo ?: url('assets/images/auth/1.png') }}" class="img-fluid sign-in-img"
                        alt="images">

                </div>
            </div>

        </section>
    </div>

    <footer class="footer" style="position: absolute;bottom:0; width:100%">
        <div class="footer-body">
            <ul class="left-panel list-inline mb-0 p-0">
                {{-- <li class="list-inline-item"><a href="extra/privacy-policy.html">Privacy Policy</a></li>
                 <li class="list-inline-item"><a href="extra/terms-of-service.html">Terms of Use</a></li> --}}
            </ul>
            <div class="right-panel">
                {{ $app_name }} ©
                <script>
                    document.write(new Date().getFullYear())
                </script>
                <span class="text-gray">
                </span> by <a href="#">JiviMz</a>.
            </div>
        </div>
    </footer>
    <!-- Required Library Bundle Script -->
    <script src="assets/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="assets/js/core/external.min.js"></script>

    <!-- Widgetchart JavaScript -->
    <script src="assets/js/charts/widgetcharts.js"></script>

    <!-- Mapchart JavaScript -->
    <script src="assets/js/charts/vectore-chart.js"></script>
    <script src="assets/js/charts/dashboard.js"></script>

    <!-- Admin Dashboard Chart -->
    <script src="assets/js/charts/admin.js"></script>

    <!-- fslightbox JavaScript -->
    <script src="assets/js/fslightbox.js"></script>

    <!-- GSAP Animation -->
    <script src="assets/vendor/gsap/gsap.min.js"></script>
    <script src="assets/vendor/gsap/ScrollTrigger.min.js"></script>
    <script src="assets/js/animation/gsap-init.js"></script>

    <!-- Stepper Plugin -->
    <script src="assets/js/stepper.js"></script>

    <!-- Form Wizard Script -->
    <script src="assets/js/form-wizard.js"></script>

    <!-- app JavaScript -->
    <script src="assets/js/app.js"></script>

    <!-- moment JavaScript -->
    <script src="assets/vendor/moment.min.js"></script>
    <script src="assets/js/sweetalert2.min.js"></script>

</body>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    $('#login-form').on("submit", function(e) {
        e.preventDefault()
        var username = $('#username').val();
        var password = $('#password').val();
        if (!username || !password) {
            return Toast.fire({
                icon: "warning",
                text: "Fill the Username & Password first"
            });
        }

        $.ajax({
            url: "{{ url('/') }}/login",
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            data: {
                username: username,
                password: password,
            },
            success: function(data) {
                console.log(data)
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Login Success",
                    text: "Redirecting..",
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    location.href = '{{ url('/') }}'
                });
            },
            error: function(xhr, status, error) {
                Toast.fire({
                    icon: "error",
                    text: JSON.parse(xhr.responseText).error
                });

            }
        });

    })
</script>

</html>
