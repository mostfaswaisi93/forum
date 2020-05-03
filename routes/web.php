<?php

use Illuminate\Support\Facades\Route;

Route::get('login/{provider}', 'Auth\SocialAccountController@redirectToProvider');

Route::get('login/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');

Route::get('/{any?}', function () {
    return view('welcome');
});
