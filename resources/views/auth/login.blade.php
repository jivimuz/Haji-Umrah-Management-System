<!doctype html>
<html lang="en" dir="ltr">

<!-- Mirrored from templates.iqonic.design/aprycot/html/dashboard/dist/dashboard/auth/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Feb 2024 13:36:38 GMT -->

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
                HRIS System ©
                <script>
                    document.write(new Date().getFullYear())
                </script>
                <span class="text-gray">
                    <svg width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15.85 2.50065C16.481 2.50065 17.111 2.58965 17.71 2.79065C21.401 3.99065 22.731 8.04065 21.62 11.5806C20.99 13.3896 19.96 15.0406 18.611 16.3896C16.68 18.2596 14.561 19.9196 12.28 21.3496L12.03 21.5006L11.77 21.3396C9.48102 19.9196 7.35002 18.2596 5.40102 16.3796C4.06102 15.0306 3.03002 13.3896 2.39002 11.5806C1.26002 8.04065 2.59002 3.99065 6.32102 2.76965C6.61102 2.66965 6.91002 2.59965 7.21002 2.56065H7.33002C7.61102 2.51965 7.89002 2.50065 8.17002 2.50065H8.28002C8.91002 2.51965 9.52002 2.62965 10.111 2.83065H10.17C10.21 2.84965 10.24 2.87065 10.26 2.88965C10.481 2.96065 10.69 3.04065 10.89 3.15065L11.27 3.32065C11.3618 3.36962 11.4649 3.44445 11.554 3.50912C11.6104 3.55009 11.6612 3.58699 11.7 3.61065C11.7163 3.62028 11.7329 3.62996 11.7496 3.63972C11.8354 3.68977 11.9247 3.74191 12 3.79965C13.111 2.95065 14.46 2.49065 15.85 2.50065ZM18.51 9.70065C18.92 9.68965 19.27 9.36065 19.3 8.93965V8.82065C19.33 7.41965 18.481 6.15065 17.19 5.66065C16.78 5.51965 16.33 5.74065 16.18 6.16065C16.04 6.58065 16.26 7.04065 16.68 7.18965C17.321 7.42965 17.75 8.06065 17.75 8.75965V8.79065C17.731 9.01965 17.8 9.24065 17.94 9.41065C18.08 9.58065 18.29 9.67965 18.51 9.70065Z"
                            fill="currentColor"></path>
                    </svg>
                </span> by <a href="https://zitechnosoft.com">Zitechnosoft</a>.
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
