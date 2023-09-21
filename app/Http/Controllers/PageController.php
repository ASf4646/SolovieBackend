<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $pages = Page::all();
        return view('pages.index', [
            'pages' => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            // 'sort_order' => 'required|integer',
        ]);

        $page = Page::create($validated);

        $page->slug = Str::slug($page->title);

        $page->save();


        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {

        return view('pages.edit', [
            'page' => $page
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $page->update($validated);
        $page->slug = Str::slug($request->title);

        $page->save();

        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('pages.index');
    }
}
