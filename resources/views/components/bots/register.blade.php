@extends('layouts.main')
@section('content')
<div class="container-fluid" style="margin-top: 4em;">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ __('Create New BOT') }}</h4>
                <!-- <p class="text-muted mb-4 font-13">{{ __('After creating the user you must activate it and give it
                    permissions or else it will not be able to access the system.') }}</p> -->
                <div class="card card">
                    <div class="card-body text-dark">
                        <form class="needs-validation" method="post" action="{{route('bot-register')}}" novalidate>
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="name">{{ __('Bot Name') }}</label>
                                    <input type="text" class="form-control" id="name" placeholder="Company Name" name="name" required autocomplete="name">
                                    <div class="invalid-feedback">
                                        {{ __('Please write the bot name.') }}
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="tenant_id">{{ __('Tenant') }}</label>
                                    <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="tenant_id" id="tenant_id">
                                        <option>Choose a Tenant</option>
                                        @foreach($tenants as $tenant)
                                        <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ __('Please provide a valid tenant.') }}
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