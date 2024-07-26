@extends('layouts.login', ['subtitle' => 'Login - ' . env('APP_NAME'), 'subdescription' => 'Sign in to continue to ' . env('APP_NAME'), 'description' => '', 'route' => '', 'action' => ''])
@section('content')
<form class="form-horizontal my-4" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <label for="email">{{ __('Email') }}</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
            </div>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email" required autocomplete="email" autofocus>
        </div>
    </div>

    <div class="form-group">
        <label for="password">{{ __('Password') }}</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-key font-16"></i></span>
            </div>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required autocomplete="current-password">
        </div>
    </div>

    <div class="form-group row mt-4">
        <div class="col-sm-6">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customControlInline" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="customControlInline">{{ __('Remember Me') }}</label>
            </div>
        </div>
        <div class="col-sm-6 text-right">
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-muted font-13"><i class="mdi mdi-lock"></i>{{ __('Forgot Your Password?') }}</a>
            @endif
        </div>
    </div>

    <div class="form-group mb-0 row">
        <div class="col-12 mt-2">
            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">{{ __('Log In') }}<i class="fas fa-sign-in-alt ml-1"></i></button>
        </div>
    </div>
</form>
@endsection