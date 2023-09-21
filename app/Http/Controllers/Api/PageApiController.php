<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PageResource;
use App\Models\Page;
use Illuminate\Http\Request;

class PageApiController extends Controller
{
    public function getPages()
    {
        $pages = Page::latest()->get();

        return response()->json([
            'pages' => PageResource::collection($pages)
        ]);
    }
}
