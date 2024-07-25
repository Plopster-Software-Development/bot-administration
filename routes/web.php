<?php

use App\Http\Controllers\TenantUsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('login', [TenantUsersController::class, 'renderLoginView']);

Route::get('register', [TenantUsersController::class, 'renderRegisterView']);

Route::post('register', [TenantUsersController::class, 'createUser'])->name('register');
// Route::group(['prefix' => 'administration'], function () {
//     Route::resource('',);
// });
