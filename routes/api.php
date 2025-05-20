<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('', function (Request $request) {
    return new JsonResponse(['status' => 'ok']);
});
