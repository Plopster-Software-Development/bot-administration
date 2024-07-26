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
                        <form class="needs-validation" method="post" action="{{route('bot-register-creds')}}" novalidate>
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="twilioPhoneNumber">{{ __('Twilio Phone Number') }}</label>
                                    <input type="text" class="form-control" id="twilioPhoneNumber" placeholder="Twilio Phone Number" name="twilioPhoneNumber" required>
                                    <div class="invalid-feedback">
                                        {{ __('Please write the bot name.') }}
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="twilioSID">{{ __('Twilio SID') }}</label>
                                    <input type="text" class="form-control" id="twilioSID" placeholder="Twilio SID" name="twilioSID" required>
                                    <div class="invalid-feedback">
                                        {{ __('Please write the bot name.') }}
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="twilioTK">{{ __('Twilio TK') }}</label>
                                    <input type="text" class="form-control" id="twilioTK" placeholder="Twilio TK" name="twilioTK" required>
                                    <div class="invalid-feedback">
                                        {{ __('Please write the bot name.') }}
                                    </div>
                                </div>
                            </div><!--end form-row-->
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="gCloudCreds">{{ __('GCloud Credentials') }}</label>
                                    <textarea class="form-control" rows="5" id="gCloudCreds" placeholder="GCloud Credentials" name="gCloudCreds" required></textarea>
                                    <div class="invalid-feedback">
                                        {{ __('Please write the bot name.') }}
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="bot_id">{{ __('Bot') }}</label>
                                    <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="bot_id" id="bot_id">
                                        <option>Choose a Bot</option>
                                        @foreach($bots as $bot)
                                        <option value="{{ $bot->id }}">{{ $bot->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        {{ __('Please provide a valid tenant.') }}
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