<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V15</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('customer/login/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('customer/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('customer/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('customer/login/vendor/animate/animate.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('customer/login/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('customer/login/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('customer/login/vendor/select2/select2.min.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('customer/login/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('customer/login/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('customer/login/css/main.css') }}">

    <script src="{{ asset('customer/login/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('customer/login/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('customer/login/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('customer/login/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('customer/login/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('customer/login/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('customer/login/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('customer/login/vendor/countdowntime/countdowntime.js') }}"></script>
    <script src="{{ asset('customer/login/js/main.js') }}"></script>
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url({{ asset('customer/login/images/bg-01.jpg') }}) ">
                    <span class="login100-form-title-1">
                        Sign In
                    </span>
                </div>

                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">{{ __('E-Mail Address') }}*</span>
                        <span class="focus-input100"></span>
                        <input id="email" class="mb-0  @error('email') is-invalid @enderror input100" type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">{{ __('Password') }}</span>
                        <span class="focus-input100"></span>
                        <input id="password" class="input100 mb-0  @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password"  autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                            <input class="input-checkbox100" id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="label-checkbox100" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="btn btn-primary register-button mt-0 login100-form-btn">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
