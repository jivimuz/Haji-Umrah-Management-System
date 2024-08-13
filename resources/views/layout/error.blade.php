<!doctype html>
<html lang="en" dir="ltr">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HRIS System || 404 Error</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />


    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="../../assets/css/core/libs.min.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="../../assets/css/aprycot.mine209.css?v=1.0.0">
    <link rel="stylesheet" href="../assets/css/sweetalert2.min.css">
</head>

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->

    <div class="wrapper">
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="container text-center mt-5">
                <div class="row">
                    <div class="col-lg-12">

                        @if (session('expiredAlert'))
                            <img src="../../assets/images/error/01.png" class="img-fluid w-25" alt="">
                            <img src="../../assets/images/error/02.png" class="img-fluid w-25 px-5" alt="">
                            <img src="../../assets/images/error/02.png" class="img-fluid w-25 px-5" alt="">
                            <h2 class="mb-0 mt-4">Application Locked.</h2>
                            <p class="mt-2">Please insert the serial code or contact admin. </p>
                            <div class="p-4">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="serialcode" maxlength="255"
                                        placeholder="Serial Code: xxxx-xxxx-xxxx-xxxx">
                                    <a class="btn btn-primary" onclick="checkSerial()"
                                        style="border-top-right-radius: 1.5rem;border-bottom-right-radius: 1.5rem"> <svg
                                            width="23" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21.4274 2.5783C20.9274 2.0673 20.1874 1.8783 19.4974 2.0783L3.40742 6.7273C2.67942 6.9293 2.16342 7.5063 2.02442 8.2383C1.88242 8.9843 2.37842 9.9323 3.02642 10.3283L8.05742 13.4003C8.57342 13.7163 9.23942 13.6373 9.66642 13.2093L15.4274 7.4483C15.7174 7.1473 16.1974 7.1473 16.4874 7.4483C16.7774 7.7373 16.7774 8.2083 16.4874 8.5083L10.7164 14.2693C10.2884 14.6973 10.2084 15.3613 10.5234 15.8783L13.5974 20.9283C13.9574 21.5273 14.5774 21.8683 15.2574 21.8683C15.3374 21.8683 15.4274 21.8683 15.5074 21.8573C16.2874 21.7583 16.9074 21.2273 17.1374 20.4773L21.9074 4.5083C22.1174 3.8283 21.9274 3.0883 21.4274 2.5783Z"
                                                fill="currentColor"></path>
                                            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.01049 16.8079C2.81849 16.8079 2.62649 16.7349 2.48049 16.5879C2.18749 16.2949 2.18749 15.8209 2.48049 15.5279L3.84549 14.1619C4.13849 13.8699 4.61349 13.8699 4.90649 14.1619C5.19849 14.4549 5.19849 14.9299 4.90649 15.2229L3.54049 16.5879C3.39449 16.7349 3.20249 16.8079 3.01049 16.8079ZM6.77169 18.0003C6.57969 18.0003 6.38769 17.9273 6.24169 17.7803C5.94869 17.4873 5.94869 17.0133 6.24169 16.7203L7.60669 15.3543C7.89969 15.0623 8.37469 15.0623 8.66769 15.3543C8.95969 15.6473 8.95969 16.1223 8.66769 16.4153L7.30169 17.7803C7.15569 17.9273 6.96369 18.0003 6.77169 18.0003ZM7.02539 21.5683C7.17139 21.7153 7.36339 21.7883 7.55539 21.7883C7.74739 21.7883 7.93939 21.7153 8.08539 21.5683L9.45139 20.2033C9.74339 19.9103 9.74339 19.4353 9.45139 19.1423C9.15839 18.8503 8.68339 18.8503 8.39039 19.1423L7.02539 20.5083C6.73239 20.8013 6.73239 21.2753 7.02539 21.5683Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <small class="">+6282120741970: Jivi </small>
                            <br>
                            <br>
                            <div class="d-flex justify-content-center">
                                <a href="/logout" class="btn btn-primary">Logout</a>
                            </div>
                        @else
                            <img src="../../assets/images/error/01.png" class="img-fluid w-25" alt="">
                            <img src="../../assets/images/error/02.png" class="img-fluid w-25 px-5" alt="">
                            <img src="../../assets/images/error/01.png" class="img-fluid w-25" alt="">
                            <h2 class="mb-0 mt-4">Page Not Found.</h2>
                            <p class="mt-2">This page is not in your area or under maintenance. </p>
                            <div class="d-flex justify-content-center">
                                <a href="/" class="btn btn-primary">Back to Home</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Library Bundle Script -->

    <!-- External Library Bundle Script -->

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/sweetalert2.min.js"></script>
    <script src="../assets/js/customFunction.js"></script>

    <script>
        function checkSerial() {
            var Serial = $('#serialcode').val();
            if (!Serial) {
                $('#serialcode').addClass('is-invalid');
                return Toast.fire({
                    icon: "error",
                    title: 'Please Insert Serial Code First!'
                });

            }
            $.ajax({
                url: "{{ url('serialActivation') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    serial: Serial
                },
                success: function(data) {
                    Toast.fire({
                        icon: "success",
                        title: 'Serial Code Activated'
                    });
                    location.href = "<?= url('/') ?>"
                },
                error: function(xhr, status, error) {
                    Toast.fire({
                        icon: "error",
                        title: JSON.parse(xhr.responseText).error
                    });

                }
            });
        }
    </script>
</body>


</html>
