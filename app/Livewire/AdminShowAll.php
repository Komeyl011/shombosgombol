<?php

namespace App\Livewire;

use App\Models\Comics;
use App\Models\ComicsTitles;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class AdminShowAll extends Component
{
    public $deleted = false;
    /**
     * Get all the comics titles and pages count from database
     *
     * @return array
     */
    public function getAllComics()
    {
        $pagesCount = [];
        $pages = Comics::all()->toArray();
        foreach ($pages as $page) {
            if (!array_key_exists($page['title_id'], $pagesCount)) {
                $pagesCount[$page['title_id']] = 0;
            }
            $pagesCount[$page['title_id']]++;
        }

        return [
            'pages' => $pagesCount,
            'titles' => ComicsTitles::query()->orderBy('id')->simplePaginate(10),
        ];
    }

    #[Layout('components.layouts.timoros')]
    #[Title('Uploaded Comics')]
    public function render()
    {
        return view('timoros/comic/show', [
            'pages' => $this->getAllComics()['pages'],
            'titles' => $this->getAllComics()['titles'],
        ]);
    }

    /**
     * Delete the chosen comic from both tables
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $comic = ComicsTitles::query()->where('id', '=', $id);
        $pages = Comics::query()->where('title_id', '=', $id);

        File::deleteDirectory('storage/'.$comic->get()[0]->title);
        File::delete('storage/'.$comic->get()[0]->image);

        $this->deleted = $comic->delete() && $pages->delete() ? true : false;

        return $id;
    }
}
