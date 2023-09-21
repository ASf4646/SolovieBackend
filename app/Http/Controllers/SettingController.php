<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('settings.index', ['settings' => Setting::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'logo' => 'required',
            'site_name' => 'required|string|max:255',
            // 'salogan' => 'required',
            'footer_address' => 'required',
            'footer_phone' => 'required',

        ]);

        $setting = Setting::create($validated);

        if ($request->hasFile('logo')) {
            $setting->logo  = $request->file('logo')->store('setting_logo', 'public');
        }

        $setting->save();

        return redirect()->route('settings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $id)
    {
        $settings = Setting::findOrFail($id);
        $logo = $settings->logo;
        Storage::disk('public')->delete($logo);
        $settings->delete();
        return redirect()->route('settings.index');
    }
}
