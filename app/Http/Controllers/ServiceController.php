<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('services.index', ['services' =>  Service::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'meta_title' => 'required|max:255',
            'meta_keywords' => 'required|max:255',
            'content' => 'required',
            'title' => 'required|max:255',
            'short_description' => 'required',
            'long_description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',

        ]);

        $service = Service::create($validated);
        $service->slug = Str::slug($service->title);

        if ($request->hasFile('image')) {
            $service->image  = $request->file('image')->store('service', 'public');
        }



        $service->save();

        return redirect(route('services.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('services.edit', ['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'meta_title' => 'required|max:255',
            'meta_keywords' => 'required|max:255',
            'content' => 'required',
            'title' => 'required|max:255',
            'short_description' => 'required',
            'long_description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,avif|max:2048',

        ]);

        $service->update($validated);
        $service->slug = Str::slug($request->title);

        if ($request->hasFile('image')) {
            if (!is_null($service->image)) Storage::delete($service->image);
            $service->image  = $request->file('image')->store('service', 'public');
        }

        $service->save();

        return redirect(route('services.index'));
    }


    public function destroy($id)
    {

        $services = Service::findOrFail($id);
        $image = $services->image;
        Storage::disk('public')->delete($image);
        $services->delete();
        return redirect()->route('services.index');
    }
}
