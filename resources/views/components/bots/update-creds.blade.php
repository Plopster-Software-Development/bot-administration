@extends('layouts.main')
@section('content')
<div class="container-fluid" style="margin-top: 4em;">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ __('Update Bot Credentials') }}</h4>
                <div class="card card">
                    <div class="card-body text-dark">
                        <form class="needs-validation" method="post" action="{{route('bot-update-creds')}}" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="twilioPhoneNumber">{{ __('Twilio Phone Number') }}</label>
                                    <input type="text" class="form-control" id="twilioPhoneNumber"
                                        placeholder="Twilio Phone Number" name="twilioPhoneNumber"
                                        value="{{$botCreds->twilioPhoneNumber}}">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="twilioSID">{{ __('Twilio SID') }}</label>
                                    <input type="text" class="form-control" id="twilioSID" placeholder="Twilio SID"
                                        name="twilioSID" value="{{$botCreds->twilioSID}}">
                                    <div class=" invalid-feedback">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="twilioTK">{{ __('Twilio TK') }}</label>
                                    <input type="text" class="form-control" id="twilioTK" placeholder="Twilio TK"
                                        name="twilioTK" value="{{$botCreds->twilioTK}}">
                                    <div class=" invalid-feedback">
                                    </div>
                                </div>
                            </div><!--end form-row-->
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="gCloudCreds">{{ __('GCloud Credentials') }}</label>
                                    <textarea class="form-control" rows="5" id="gCloudCreds"
                                        placeholder="GCloud Credentials" name="gCloudCreds"></textarea>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="bot_id">{{ __('Bot') }}</label>
                                    <select class="select2 form-control mb-3 custom-select"
                                        style="width: 100%; height:36px;" name="bot_id" id="bot_id">
                                        <option>Choose a Bot</option>
                                        <option selected value="{{ $botCreds->bot_id }}">{{ $botCreds->bot->name }}
                                        </option>
                                    </select>
                                </div><!--end col-->
                                <input type="hidden" value="{{$botCreds->id}}" name="id">
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