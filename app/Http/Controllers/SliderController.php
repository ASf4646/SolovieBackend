<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return View('slider.index', ['slider' => Slider::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return View('slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $slider = Slider::create($validated);

        if ($request->hasFile('image')) {
            $slider->image  = $request->file('image')->store('slider', 'public');
        }

        $slider->save();

        return redirect(route('slider.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider): View
    {

        return view('slider.edit', ['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);


        $slider->update($validated);

        if ($request->hasFile('image')) {
            if (!is_null($slider->image)) Storage::delete($slider->image);
            $slider->image  = $request->file('image')->store('service', 'public');
        }

        $slider->save();
        return redirect(route('slider.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sliders = Slider::findOrFail($id);
        $image = $sliders->image;
        Storage::disk('public')->delete($image);
        $sliders->delete();


        return redirect(route('slider.index'));
    }
}
