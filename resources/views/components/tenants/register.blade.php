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
                        <form class="needs-validation" method="post" action="{{route('tenant-register')}}" novalidate>
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="name">{{ __('Company Name') }}</label>
                                    <input type="text" class="form-control" id="name" placeholder="Company Name" name="name" required autocomplete="name">
                                    <div class="invalid-feedback">
                                        {{ __('Please write your company name.') }}
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-4 mb-3">
                                    <label for="email">{{ __('Company Email') }}</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" aria-describedby="inputGroupPrepend" required autocomplete="email">
                                    <div class="invalid-feedback">
                                        {{ __('Please write an email.') }}
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-4 mb-3">
                                    <label for="phone">{{ __('Phone Number') }}</label>
                                    <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="phone" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        {{ __('Please write your phone number.') }}
                                    </div>
                                </div><!--end col-->
                            </div><!--end form-row-->
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="country_id">{{ __('Country') }}</label>
                                    <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="country_id" id="country_id">
                                        <option>Chooose a Country</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ __('Please provide a valid role.') }}
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-4 mb-3">
                                    <label for="province">{{ __('Province / State') }}</label>
                                    <input type="text" class="form-control" id="province" placeholder="Province / State" name="province" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        {{ __('Please write an province or state.') }}
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-4 mb-3">
                                    <label for="city">{{ __('City') }}</label>
                                    <input type="text" class="form-control" id="city" placeholder="City" name="city" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        {{ __('Please write a city.') }}
                                    </div>
                                </div><!--end col-->
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="address">{{ __('Billing Address') }}</label>
                                    <input type="text" class="form-control" id="address" placeholder="Billing Address" name="address" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        {{ __('Please write your billing address.') }}
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-4 mb-3">
                                    <label for="taxId">{{ __('Company Tax Id') }}</label>
                                    <input type="text" class="form-control" id="taxId" placeholder="Tax ID - Optional" name="taxId" aria-describedby="inputGroupPrepend" autocomplete="email">
                                </div><!--end col-->
                                <div class="col-md-4 mb-3">
                                    <label for="contact_name">{{ __('Contact Name') }}</label>
                                    <input type="text" class="form-control" id="contact_name" placeholder="Contact/Manager Name" name="contact_name" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        {{ __('Please write your billing address.') }}
                                    </div>
                                </div><!--end col-->
                            </div>
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