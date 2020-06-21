<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <link rel="stylesheet" href="{{ asset('customer/register/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('customer/register/css/style.css') }}">
    <script src="{{ asset('customer/register/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('customer/register/js/main.js') }}"></script>
</head>
<body>
<div class="main" style="padding: 60px 0;">
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">{{ __('Register') }}</h2>
                    <form method="POST" action="{{ route('register') }}" class="register-form" id="register-form">
                        @csrf
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input style="background: #ffffff;" id="name" class="@error('name') is-invalid @enderror" type="text" placeholder="First Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input style="background: #ffffff;" id="email" class="@error('email') is-invalid @enderror" type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-lock"></i></label>
                            <input style="background: #ffffff;" id="password" class="@error('password') is-invalid @enderror" type="password" placeholder="Password" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input style="background: #ffffff;" id="password-confirm" class="" type="password" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-phone"></i></label>
                            <input style="background: #ffffff;" id="phone_number" type="text" class="@error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus placeholder="Phone number">
                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-pin"></i></label>
                            <input style="background: #ffffff;" id="address" type="text" class="@error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Address">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" class=" @error('email') is-invalid @enderror"/>
                             @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                        </div> -->
                        <div class="form-group">
                            <input type="checkbox" name="gender" id="agree-term" class="agree-term" value="nam"/>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>nam &nbsp;&nbsp;&nbsp;&nbsp;</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="gender" id="agree-term" class="agree-term" value="nu"/>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>nu</label>
                        </div>
                        <div class="form-group form-button">
                            <button type="submit" class="btn btn-primary register-button mt-0">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{ asset('customer/register/images/signup-image.jpg') }}" alt="sing up image"></figure>
                    <a href="#" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
