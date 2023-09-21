<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResource;
use App\Models\Slider;

class SliderApiController extends Controller
{

    public function getSliders()
    {
        $sliders = Slider::latest()->get();

        return response()->json([
            'sliders' => SliderResource::collection($sliders)
        ]);
    }
}
