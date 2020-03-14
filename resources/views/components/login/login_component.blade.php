<div class="login-container-inner">
    <div class="login-title">
        <h3>
            @if (Request::is("staff/*"))
                Staffs
            @endif
            @if (Request::is("project/*"))
                iSpark Project
            @endif
            @if (Request::is("participant/*"))
                iSpark Mentor/Investor
            @endif
            Login</h3>
    </div>
    <div class="login-form">
        <form action="{{ route('staff.login.submit') }}" method="post">
            @csrf   
            <div class="form-group-row">
                <div class="col-md-6">
                    <label for="email" class="">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>            
            <div class="form-group-row">
                <div class="col-md-6">
                    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group-row">
                <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-row mt-1">
                <div class="form-group col-sm-3 ml-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
                <div class="form-group col-md-8">
                    @if (Request::is('staff/*'))
                        <a class=" btn btn-link" href="{{ route('staff.password.email') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>