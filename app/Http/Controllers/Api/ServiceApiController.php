<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\Service;

class ServiceApiController extends Controller
{
    public function getServices()
    {
        $services = Service::latest()->get();

        return response()->json([
            'services' => ServiceResource::collection($services)
        ]);
    }
}
