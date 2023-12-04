<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("auth")
    ->group(function () {
        Route::middleware('auth:sanctum')->get("user", [\App\Containers\User\Http\Controllers\AuthController::class, "currentUser"]);
        Route::post("login", [\App\Containers\User\Http\Controllers\AuthController::class, "login"]);
        Route::post("logout", [\App\Containers\User\Http\Controllers\AuthController::class, "logout"]);
        Route::post("register", [\App\Containers\User\Http\Controllers\AuthController::class, "registration"]);
    });


Route::prefix("conversations")
    ->middleware("auth:sanctum")
    ->group(function () {
        Route::get("", [\App\Containers\Conversation\Http\Controllers\ConversationsController::class, "index"]);
        Route::get("{conversation}", [\App\Containers\Conversation\Http\Controllers\ConversationsController::class, "show"]);
    });


Route::prefix("messages")
    ->middleware("auth:sanctum")
    ->group(function () {
        Route::get("", [\App\Containers\Message\Http\Controllers\MessagesController::class, "index"]);
    });
