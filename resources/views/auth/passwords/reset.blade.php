@extends('layouts.login', ['subtitle' => 'Reset Password', 'subdescription' => 'Change your password to be able to access to the dashboard.', 'description' => '', 'route' => '', 'action' => ''])
@section('content')
<form class="form-horizontal my-4" method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group">
        <label for="email">{{ __('Email') }}</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
            </div>
            <input type="text" class="form-control" id="email" name="email" value="{{ $email ?? old('email') }}" placeholder="Enter email" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="password">{{ __('Password') }}</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-key font-16"></i></span>
            </div>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="password-confirm">{{ __('Confirm Password') }}</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-key font-16"></i></span>
            </div>
            <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
        </div>
    </div>

    <div class="form-group mb-0 row">
        <div class="col-12 mt-2">
            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">{{ __('Reset Password') }}<i class="fas fa-sign-in-alt ml-1"></i></button>
        </div>
    </div>
</form>
@endsection