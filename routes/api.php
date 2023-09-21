<?php

use App\Http\Controllers\Api\PageApiController;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SliderApiController;
use App\Http\Controllers\Api\ServiceApiController;



Route::get('sliders', [SliderApiController::class, 'getSliders']);
Route::get('services', [ServiceApiController::class, 'getServices']);
Route::get('pages', [PageApiController::class, 'getPages']);
Route::get('settings', function () {
    return response()->json(Setting::first());
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
