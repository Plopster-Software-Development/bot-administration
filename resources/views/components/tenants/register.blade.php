@extends('layouts.main')
@section('content')
<div class="container-fluid" style="margin-top: 4em;">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ __('Create New Tenant') }}</h4>
                <p class="text-muted mb-4 font-13">{{ __('After creating the user you must activate it and give it
                    permissions or else it will not be able to access the system.') }}</p>
                <div class="card card">
                    <div class="card-body text-dark">
                        <form class="needs-validation" method="post" action="{{route('register')}}" novalidate>
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" id="name" placeholder="Full Name" name="name" required autocomplete="name">
                                    <div class="invalid-feedback">
                                        {{ __('Please write your name.') }}
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustomEmail">{{ __('Email') }}</label>
                                    <input type="email" class="form-control" id="validationCustomEmail" placeholder="Email" name="email" aria-describedby="inputGroupPrepend" required autocomplete="email">
                                    <div class="invalid-feedback">
                                        {{ __('Please write an email.') }}
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-4 mb-3">
                                    <label for="role">{{ __('Role') }}</label>
                                    <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="role">
                                        <option>Select</option>
                                        <option value="ADM">Admin</option>
                                        <option value="VST">Visitor</option>
                                        <option value="HI">Maintenance</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ __('Please provide a valid role.') }}
                                    </div>
                                </div><!--end col-->
                            </div><!--end form-row-->
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" aria-describedby="inputGroupPrepend" required autocomplete="new-password">
                                    <div class="invalid-feedback">
                                        {{ __('Please write an password.') }}
                                    </div>
                                    <button class="btn btn-link p-0" type="button" onClick="generateSecurePasswordAndToast();">
                                        {{ __('Auto Generate Password') }}
                                    </button>
                                </div><!--end col-->
                                <div class="col-md-6 mb-3">
                                    <label for="password-confirm">{{ __('Password') }}</label>
                                    <input type="password" class="form-control" id="password-confirm" placeholder="Password" name="password_confirmation" aria-describedby="inputGroupPrepend" required autocomplete="new-password">
                                    <div class="invalid-feedback">
                                        {{ __('Please write a password.') }}
                                    </div>
                                </div><!--end col-->
                            </div><!--end form-row-->

                            <input type="submit" class="btn-block btn-primary" style="min-height: 3em;" value="Submit">
                        </form> <!--end form-->
                    </div>
                </div><!--end card-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->
</div>

@include('layouts.components.footer')
@endsection