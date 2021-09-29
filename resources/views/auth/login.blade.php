<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Sign in | MetroBangla</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/images/img/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('/images/img/favicon.ico') }}">
    <link href="{{ asset('/vendor/semantic-ui/semantic.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/auth.css') }}" rel="stylesheet" type="text/css">

    <style>


.no-arrow {
  -moz-appearance: textfield;
}
.no-arrow::-webkit-inner-spin-button {
  display: none;
}
.no-arrow::-webkit-outer-spin-button,
.no-arrow::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

    </style>

</head>

<body>
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box">
                    <div class="content">
                        <div class="header">

                            <!-- <div class="logo align-center"><h1 class="lead">{{ __('আপনার একাউন্টে লগ ইন করুন') }}</h1></div> -->
                            <p class="lead">{{ __('আপনার একাউন্টে লগ ইন করুন') }}</p>
                        </div>
                        <form class="form-auth-small ui form" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="fields">
                                <div class="sixteen wide field {{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="color-white">{{ __('Phone') }}</label>
                                    <input type="tel" id="phone" name="phone" pattern="[0-9]{11}" value="{{ old('phone') }}" placeholder="{{ __('Enter your phone number') }}" required autofocus>
                                    @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif  
                                </div>
                            </div>
                            <div class="fields">
                                <div class="sixteen wide field {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="color-white">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="" name="password" placeholder="{{ __('Enter your password') }}" required>
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="fields">
                                <div class="sixteen wide field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for ="remember" class="color-white">{{ __('Remember me') }}</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="ui green button large fluid">{{ __('SIGN IN') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/assets/vendor/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/semantic-ui/semantic.min.js') }}"></script>
    <script>
        $('.ui.checkbox').checkbox('uncheck', 'toggle');
    </script>
</body>

</html>
