<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TenantUsersController extends Controller
{
    public function renderLoginView()
    {
        return view("components.login");
    }

    public function renderRegisterView()
    {
        return view("components.users.register");
    }

    public function createUser(Request $request)
    {
        dd($request);
    }
}
