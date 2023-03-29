<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from demo.themefisher.com/focus/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Dec 2022 13:27:02 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ABC Company </title>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Admin Login</h4>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        @error('email')
                                        <div class="alert alert-danger solid alert-right-icon alert-dismissible fade show">
                                            <span><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span>
                                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            Login Failed !
                                        </div>
                                        @enderror
                                   

                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        </div>
                                        @error('password')
                                              <div class="alert alert-danger solid alert-right-icon alert-dismissible fade show">
                                    <span><i class="mdi mdi-help"></i></span>
                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                    <strong>Error!</strong> Message Sending failed.
                                </div>
                                        @enderror
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('js/quixnav-init.js') }}"></script>
    <script src="{{ asset('js/custom.min.js') }}"></script>

</body>


<!-- Mirrored from demo.themefisher.com/focus/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Dec 2022 13:27:02 GMT -->

</html>