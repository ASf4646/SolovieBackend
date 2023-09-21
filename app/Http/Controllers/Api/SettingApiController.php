<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingApiController extends Controller
{
    public function getSettings()
    {
        $settings = Setting::first();


        return response()->json([
            'settings' => SettingResource::collection($settings)
        ]);
    }
}
