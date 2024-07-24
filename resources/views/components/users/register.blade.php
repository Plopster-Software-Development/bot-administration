@extends('layouts.main-layout')
@section('page-content')
<div class="container-fluid">
    <div class="col-lg-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Create New User</h4>
                <p class="text-muted mb-4 font-13">After creating the user you must activate it and give it
                    permissions or else it will not be able to access the system.</p>
                <div class="card card">
                    <div class="card-body text-dark">
                        <form class="needs-validation" method="post" action="{{route('register')}}" novalidate>
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">First name</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="First Name" name="firstName" value="Mark" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Last name</label>
                                    <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" name="lastName" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustomEmail">Email</label>
                                    <input type="email" class="form-control" id="validationCustomEmail" placeholder="Email" name="email" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        Please write an email.
                                    </div>
                                </div><!--end col-->
                            </div><!--end form-row-->
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid password.
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6 mb-3">
                                    <label for="role">Role</label>
                                    <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" name="role">
                                        <option>Select</option>
                                        <option value="ADM">Admin</option>
                                        <option value="VST">Visitor</option>
                                        <option value="HI">Maintenance</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please provide a valid role.
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