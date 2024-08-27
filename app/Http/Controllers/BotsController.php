<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use App\Models\BotCredential;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $params = array_merge($request->all(), [ 'user_id' => Auth::user()->id ]);
        $this->validator($params)->validate();

        Bot::create($params);

        return redirect('dashboard/');
    }

    public function renderRegistrationCredsForm(?string $botId = '')
    {
        $bots = Bot::all();
        return view("components.bots.register-creds", compact('bots', 'botId'));
    }

    public function registerBotCreds(Request $request)
    {
        $params = array_merge($request->all(), [ 'clientSecret' => $this->generateClientSecret() ]);

        $creds = BotCredential::create($params);

        Storage::disk('google-cloud-credentials')->put("$creds->id.json", $params['gCloudCreds']);

        $url = env('AWS_URL') . "google-cloud-credentials/$creds->id.json";

        $creds->update([ 'gCredsCloud' => $url ]);

        return redirect('/dashboard/bot')->with('success', 'Bot credentials saved succesfully');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'tenant_id' => [ 'required', 'string' ],
            'user_id'   => [ 'required', 'string' ],
            'name'      => [ 'required', 'string', 'unique:tenants' ]
        ]);
    }

    protected function generateClientSecret($length = 32)
    {
        $randomBytes = random_bytes($length);

        $clientSecret = bin2hex($randomBytes);

        return substr($clientSecret, 0, $length);
    }

    public function getAllCreatedBots()
    {
        $bots = Bot::with('tenant', 'credentials')->get();
        return view("components.bots.list-bots", compact('bots'));
    }

    public function renderUpdateCredentialsForm(string $id)
    {
        $botCreds = BotCredential::with('bot')->where('id', '=', $id)->first();

        return view("components.bots.update-creds", compact('botCreds'));
    }

    public function updateBotCredentials(Request $request)
    {
        $creds = BotCredential::find($request->id);

        if ($request->has('gCloudCreds') && !empty($request->gCloudCreds)) {
            if ($creds->gCredsCloud) {
                $path = str_replace(env('AWS_URL') . 'google-cloud-credentials/', '', $creds->gCredsCloud);
                Storage::disk('google-cloud-credentials')->delete($path);
            }

            Storage::disk('google-cloud-credentials')->put("$creds->id.json", $request->gCloudCreds);

            $url = env('AWS_URL') . "google-cloud-credentials/$creds->id.json";

            $creds->update([ 'gCredsCloud' => $url ]);
        }

        $creds->update($request->except('gCloudCreds'));

        return redirect('/dashboard/bot')->with('success', 'Bot credentials saved succesfully');
    }

    public function deleteBotCredentials(string $id)
    {
        $bot = Bot::with('credentials')->findOrFail($id);
        $creds = $bot->credentials;

        $bot->delete();

        if ($creds->gCredsCloud) {
            $path = str_replace(env('AWS_URL') . 'google-cloud-credentials/', '', $creds->gCredsCloud);
            Storage::disk('google-cloud-credentials')->delete($path);
        }

        return redirect('/dashboard/bot')->with('success', 'Bot credentials deleted successfully');
    }
}
