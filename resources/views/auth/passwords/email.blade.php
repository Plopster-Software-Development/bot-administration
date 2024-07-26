@extends('layouts.login', ['subtitle' => 'Reset Password', 'subdescription' => 'Enter your Email and instructions will be sent to you!', 'description' => 'Remember It?', 'route' => '/login', 'action' => 'Sign In Here'])
@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<form method="POST" class="form-horizontal my-4" action="{{ route('password.email') }}">
    @csrf
    <div class=" form-group">
        <label for="username">Email Address</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-email-outline font-16"></i></span>
            </div>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}" autofocus>
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group mb-0 row">
        <div class="col-12 mt-2">
            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Send Reset Link <i class="fas fa-sign-in-alt ml-1"></i></button>
        </div>
    </div>
</form>
@endsection