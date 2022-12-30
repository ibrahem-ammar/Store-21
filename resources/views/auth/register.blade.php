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
                                aria-selected="true">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}" aria-selected="false">Login</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-contact" role="tabpanel"
                            aria-labelledby="contact-top-tab">
                            <form class="form-horizontal auth-form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="name" type="text" placeholder="{{ __('Name') }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="email" type="email" placeholder="{{ __('Email Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">

                                    <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">

                                    <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                </div>
                                
                                <div class="form-button">
                                    <button class="btn btn-primary" type="submit">{{ __('Register') }}</button>
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
