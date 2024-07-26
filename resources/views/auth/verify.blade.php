@extends('layouts.login', ['subtitle' => 'Locked', 'subdescription' => 'You must confirm your email to unlock the screen.', 'description' => '', 'route' => '', 'action' => ''])
@section('content')

<form class="form-horizontal my-4" action="index.html">
    <div class="user-thumb text-center m-b-30">
        <img src="{{asset("assets/images/users/user-2.jpg")}}" class="rounded-circle img-thumbnail thumb-xl" alt="thumbnail">
        <h5>{{ Auth::user()->name ?? "" }}</h5>
    </div>
</form>

<div class="m-3 text-center bg-light p-3 text-primary">
    <h5 class="">{{ __('Before proceeding, please check your email for a verification link.') }}</h5>
    <h5 class="font-13">{{ __('If you did not receive the email') }}</h5>
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="btn btn-primary btn-round waves-effect waves-light">{{ __('click here to request another') }}</button>
    </form>
</div>
@endsection