<?php

namespace App\Http\Controllers;

use App\Models\Comics;
use App\Models\ComicsTitles;
use Illuminate\Http\Request;

class ComicsController extends Controller
{
    /**
     * Display the requested comic
     */
    public function index($key)
    {
        $getComic = Comics::query()->where('title_id', '=', $key)->paginate(1);
        $getComicTitle = $getComic->total() > 0 ? ComicsTitles::query()->where('id', '=', $getComic[0]->title_id)->get()->toArray() : null;

        return $getComic->total() > 0
            ? view('comics.show', [
                'pages' => $getComic,
                'title' => $getComicTitle[0]['title'],
                'per_title' => $getComicTitle[0]['per_title'],
            ])
            : redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
