<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Tenant;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TenantsController extends Controller
{
    public function renderRegistrationForm()
    {
        $countries = Country::all();

        return view("components.tenants.register", compact('countries'));
    }

    public function registerTenant(Request $request)
    {
        $this->validator($request->all())->validate();

        Tenant::create($request->all());

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect('user/register/');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'country_id' => ['required', 'string'],
            'name' => ['required', 'string', 'unique:tenants'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'province' => ['required', 'string'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
            'taxId' => ['string'],
            'contact_name' => ['required', 'string'],
        ]);
    }
}
