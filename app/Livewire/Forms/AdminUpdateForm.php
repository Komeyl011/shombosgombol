<?php

namespace App\Livewire\Forms;

use App\Models\ComicsTitles;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AdminUpdateForm extends Form
{
    protected $comic;

    #[Rule('required')]
    public $title;
    #[Rule('required')]
    public $per_title;
    #[Rule('required')]
    public $image;

    public function getComic($comic)
    {
        $this->comic = $comic;

        $this->title = $comic->title;
        $this->per_title = $comic->per_title;
        $this->image = $comic->image;
    }

    public function uploadCover($id)
    {
        $image = ComicsTitles::query()->where('id', '=', $id)->get()->toArray();
        if (!is_string($this->image)):
            File::delete('storage/'.$image[0]['image']);
            $this->image->storePublicly('public/');
            $this->image = $this->image->hashName();
        endif;
    }

    private function updateFolderName($id)
    {
        $title = ComicsTitles::query()->where('id', '=', $id)->get()->toArray();
        if ($this->title != $title[0]['title']) {
            Storage::move('/public/'.$title[0]['title'], '/public/'.$this->title);
        }
    }

    public function updateRecord($id)
    {
        $this->uploadCover($id);
        $this->updateFolderName($id);
        return ComicsTitles::query()->where('id', '=', $id)->update($this->toArray()) == 1;
    }
}
