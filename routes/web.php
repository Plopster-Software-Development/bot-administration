<?php

use App\Http\Controllers\BotsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TenantsController;
use App\Http\Controllers\UsersController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Auth::routes([ 'register' => false, 'verify' => true ]);

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $r) {
    $r->fulfill();

    return redirect('dashboard/');
})->middleware([ 'auth', 'signed' ])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $r) {
    $r->user()->sendEmailVerificationNotification();

    return back()->with('resent', 'Verification link sent ');
})->middleware([ 'auth', 'throttle:6,1' ])->name('verification.send');

Route::group([ 'prefix' => 'dashboard', 'middleware' => [ 'auth', 'verified' ] ], function () {
    Route::get('/', [ HomeController::class, 'index' ])->name('home');

    Route::group([ 'prefix' => 'user' ], function () {
        Route::get('/register', [ UsersController::class, 'renderRegistrationForm' ])->name('user-register');
        Route::post('/register', [ UsersController::class, 'registerUser' ])->name('user-register');
    });

    Route::group([ 'prefix' => 'tenant' ], function () {
        Route::get('/register', [ TenantsController::class, 'renderRegistrationForm' ])->name('tenant-register');
        Route::post('/register', [ TenantsController::class, 'registerTenant' ])->name('tenant-register');
    });

    Route::group([ 'prefix' => 'bot' ], function () {
        Route::get('/', [ BotsController::class, 'getAllCreatedBots' ])->name('list-bots');
        Route::get('/credentials', [ BotsController::class, 'getAllCreatedBots' ])->name('list-bots-creds');

        Route::get('/register', [ BotsController::class, 'renderRegistrationForm' ])->name('bot-register');
        Route::post('/register', [ BotsController::class, 'registerBot' ])->name('bot-register');

        Route::get('/credentials/register/{botId?}', [ BotsController::class, 'renderRegistrationCredsForm' ])->name('bot-register-creds');
        Route::post('/credentials/register', [ BotsController::class, 'registerBotCreds' ])->name('bot-register-creds');

        Route::get('/credentials/update/{id}', [ BotsController::class, 'renderUpdateCredentialsForm' ])->name('bot-update-creds');
        Route::put('/credentials/update/', [ BotsController::class, 'updateBotCredentials' ])->name('bot-update-creds');

        Route::delete('/credentials/delete/{id}', [ BotsController::class, 'deleteBotCredentials' ])->name('bot-delete-creds');
    });
});
