@extends('layouts.main')
@section('content')
<div class="container-fluid" style="margin-top: 4em;">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="mt-0 header-title">List Created Bots</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Owner</th>
                                <th>Bot Phone Number</th>
                                <td>Has Credentials</td>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($bots as $bot)
                                <tr>
                                    <td>{{$bot->name}}</td>
                                    <td>{{$bot->tenant->name}}</td>
                                    <td>{{$bot->credentials->twilioPhoneNumber ?? 'N/A'}}</td>
                                    <td>
                                        @if ($bot->credentials)
                                            <span class="badge badge-primary a-animate-blink mt-0">Already Assigned</span>
                                        @else
                                            <a class="btn btn-primary waves-effect waves-light"
                                                href="{{route('bot-register-creds')}}/{{$bot->id}}">Assign Credentials</a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group mb-2 mb-md-0">
                                            @if($bot->credentials)
                                                <a type="button" href="{{route('bot-update-creds')}}/{{$bot->credentials->id}}"
                                                    class="btn btn-primary btn-square mr-3">Update</a>
                                            @endif
                                            <form method="post" action="{{ route('bot-delete-creds', $bot->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-warning btn-square" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>
@include('layouts.components.footer')
@endsection