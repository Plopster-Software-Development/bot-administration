<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use App\Models\BotCredential;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BotsController extends Controller
{
    public function renderRegistrationForm()
    {
        $tenants = Tenant::all();
        return view("components.bots.register", compact('tenants'));
    }

    public function registerBot(Request $request)
    {
        $params = array_merge($request->all(), ['user_id' => Auth::user()->id]);
        $this->validator($params)->validate();

        Bot::create($params);

        return redirect('dashboard/');
    }

    public function renderRegistrationCredsForm()
    {
        $bots = Bot::all();
        return view("components.bots.register-creds", compact('bots'));
    }

    public function registerBotCreds(Request $request)
    {
        $params = array_merge($request->all(), ['clientSecret' => $this->generateClientSecret()]);

        $creds = BotCredential::create($params);

        Storage::disk('google-cloud-credentials')->put("$creds->id.json", $params['gCloudCreds']);

        $url = env('AWS_URL') . "google-cloud-credentials/9c9e05a7-8153-4c01-91e5-da3fabb58990.json";

        $creds->update(['gCredsCloud' => $url]);

        return redirect('dashboard/')->with('success', 'Bot credentials saved succesfully');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'tenant_id' => ['required', 'string'],
            'user_id' => ['required', 'string'],
            'name' => ['required', 'string', 'unique:tenants']
        ]);
    }

    protected function generateClientSecret($length = 32)
    {
        $randomBytes = random_bytes($length);

        $clientSecret = bin2hex($randomBytes);

        return substr($clientSecret, 0, $length);
    }
}
