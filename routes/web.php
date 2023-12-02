<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any?}', \App\Ship\Http\Controllers\SpaController::class)->where('any', '^((?!api|sanctum).)*$');
