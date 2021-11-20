<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />

    <title>Forgot Password | {{ $website_name }}</title>
</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">

        <!--start content-->
        <main class="authentication-content">
            <div class="container-fluid">
                <div class="authentication-card">

                    <div class="card rounded-0 overflow-hidden shadow-none border mb-5 mb-lg-0">
                        <div class="row g-0">
                            <div class="col-12 order-1 col-xl-6 d-flex align-items-center justify-content-center border-end">
                                <img src="assets/images/error/forgot-password-frent-img.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="col-12 col-xl-6 order-xl-2">

                                <div class="card-body">
                                    <div class="border p-3 rounded">
                                        <p class="text-uppercase">Forgot your password? </p> 
                                        <p> No Problem.Just let us know your email address and we will email you a password reset link that will allow you to choose a new one. </p>

                                        <hr>

                                        <form class="row g-3" method="POST" action="{{ url('/forgot-password') }}">
                                        @csrf
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email Address</label>
                                                <div class="ms-auto position-relative">
                                                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-envelope-fill"></i></div>
                                                    <input id="email" class="form-control ps-5" type="email" name="email" value="{{ old('email') }}" required autofocus />

                                                    @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                    @endif
                                                    
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Email Password Reset Link</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!--end page main-->

        <footer class="bg-white border-top p-3 text-center fixed-bottom">
            <p class="mb-0">Copyright © 2021. All right reserved.</p>
        </footer>

    </div>
    <!--end wrapper-->

    <!-- Bootstrap bundle JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>

</body>

</html>