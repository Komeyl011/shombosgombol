<?php

namespace App\Http\Controllers;

use App\Models\ComicsTitles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $covers = ComicsTitles::query()->paginate(4);
        return view('home', [
            'comics' => $covers,
        ]);
    }

    public function changeLang(Request $request)
    {
        $validated = $request->validate(['lang' => 'required'], ['lang']);
        Session::put('locale', $validated['lang']);
        app()->setLocale($validated['lang']);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
