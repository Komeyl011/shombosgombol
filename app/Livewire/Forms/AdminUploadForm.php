<?php

namespace App\Livewire\Forms;

use App\Models\Comics;
use App\Models\ComicsTitles;
use Exception;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AdminUploadForm extends Form
{
    #[Rule('required')]
    public $title;
    #[Rule('required')]
    public $per_title;
    #[Rule('required|image|max:2048')]
    public $image;
    #[Rule('required')]
    public $title_id;
    #[Rule('required')]
    public $page;

    public function uploadNewComic()
    {
        $store = $this->image->storePublicly('public/');
        mkdir(public_path('/storage/'.$this->title));
        $this->image = $this->image->hashName();

        $formData = $this->toArray();
        array_pop($formData);
        array_pop($formData);

        $formData['created_at'] = date('Y-m-d H:i:s');
        $formData['updated_at'] = date('Y-m-d H:i:s');
        $data = $formData;

        return ComicsTitles::query()->insert($data) && $store;
    }

    public function uploadNewPage()
    {
        $title = ComicsTitles::query()->where('id', '=', $this->title_id)->get();
        $store = $this->image->storePubliclyAs("public/".$title[0]->title, $this->image->getClientOriginalName());
        $this->image = $this->image->getClientOriginalName();

        $formData = $this->toArray();
        array_shift($formData);
        array_shift($formData);

        $formData['created_at'] = date('Y-m-d H:i:s');
        $formData['updated_at'] = date('Y-m-d H:i:s');
        $data = $formData;

        return Comics::query()->insert($data) && $store;
    }
}
