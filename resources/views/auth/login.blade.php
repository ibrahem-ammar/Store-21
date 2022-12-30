@extends('auth.layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-7 p-0">
            <div class="card tab2-card card-login">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="top-profile-tab" data-bs-toggle="tab"
                                href="#top-profile" role="tab" aria-controls="top-profile"
                                aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}" 
                                aria-selected="false"> Register</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-profile" role="tabpanel"
                            aria-labelledby="top-profile-tab">
                            <form class="form-horizontal auth-form" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                <input id="email" type="email" placeholder="{{ __('Email Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                        
                                </div>
                                <div class="form-group">
                                        <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                                </div>
                                <div class="form-terms">
                                    <div class="form-check mesm-2">
                                        
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label ps-2" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>


                                            @if (Route::has('password.request'))
                                    <a class="btn btn-default forgot-pass" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                    </div>
                                </div>
                                <div class="form-button">
                                    <button class="btn btn-primary" type="submit">Login</button>
                                </div>
                                
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
