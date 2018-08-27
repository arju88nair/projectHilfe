<div class="form-wrap">
    <div class="tabs">
        <h3 class="signup-tab"><a href="#signup-tab-content">Sign Up</a></h3>
        <h3 class="login-tab"><a href="#login-tab-content" class="active">Login</a></h3>
    </div><!--.tabs-->

    <div class="tabs-content">
        <div id="signup-tab-content">

            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                @csrf
                <div class="col-md-12">
                    <input id="name" type="text" placeholder="Name"
                           class="form {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                           value="{{ old('name') }}" required autofocus>
                    <span class="underline"></span>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="col-md-12">
                    <input id="email" type="email" placeholder="Email"
                           class="form {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                           value="{{ old('email') }}" required>
                    <span class="underline"></span>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="col-md-12">
                    <input id="password" type="password" placeholder="Password"
                           class="{{ $errors->has('password') ? ' is-invalid' : '' }} form"
                           name="password" required>
                    <span class="underline"></span>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-12">
                    <input id="password-confirm" type="password" placeholder="Confirme Password"
                           class="form" name="password_confirmation" required>
                    <span class="underline"></span>

                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-3">
                        <button type="submit" class="btn btn-primary but">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
                <br>
                <hr>
                @include('partials.github')

            </form>
        </div><!--.signup-tab-content-->

        <div id="login-tab-content" class="active">
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="login-form">
                @csrf
                <input id="email" type="email" placeholder="Email"
                       class="{{ $errors->has('email') ? ' is-invalid' : '' }} form" name="email"
                       value="{{ old('email') }}" required autofocus>
                <span class="underline"></span>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif

                <input id="password" type="password" placeholder="Password"
                       class="{{ $errors->has('password') ? ' is-invalid' : '' }} form"
                       name="password" required>
                <span class="underline"></span>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif

                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="form-check">

                            <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-2">
                        <button type="submit" class="btn btn-primary but">
                            {{ __('Login') }}
                        </button>

                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                </div>
                <p></p>
                <hr>
                @include('partials.github')
            </form>
        </div><!--.login-tab-content-->

    </div><!--.tabs-content-->
</div><!--.form-wrap-->
