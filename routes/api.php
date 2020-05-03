<?php

use Illuminate\Http\Request;

Route::group(["prefix" => "v1", "namespace" => "API"], function ($router) {

    // below mention routes are public, user can access those without any restriction
    Route::group(["prefix" => "auth"], function () {

        // create new user
        Route::post("register", "AuthController@register");

        // login user
        Route::post("login", "AuthController@login");

        // refresh JWt token
        Route::get("refresh", "AuthController@refresh");
    });

    // below mention routes are available only for the authenticated users.
    Route::group(["middleware" => "auth:api", "prefix" => "auth"], function () {
        // logout user from application
        Route::post('logout', "AuthController@logout");
        // get user info
        Route::get("user", "AuthController@user");
    });

    Route::apiResource("channels", "ChannelController");
    Route::apiResource("discussions", "DiscussionController");
    Route::apiResource("replies", "ReplyController");
});
