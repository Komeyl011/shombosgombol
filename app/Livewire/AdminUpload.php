<?php

namespace App\Livewire;

use App\Livewire\Forms\AdminUploadForm;
use App\Models\ComicsTitles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminUpload extends Component
{
    use WithFileUploads;

    public $new = false;
    public $uploaded = false;
    public AdminUploadForm $form;

    public function getExistingTitles()
    {
        return ComicsTitles::query()->get();
    }

    #[Layout('components.layouts.timoros')]
    #[Title('Admin | Upload')]
    public function render()
    {
        return view('timoros.comic.upload')
            ->with(['comicTitles' => $this->getExistingTitles()]);
    }

    /**
     * Upload and store the form data in database
     *
     * @return bool
     */
    public function uploadPhoto() : bool
    {
        return $this->new
            ? $this->uploaded = $this->form->uploadNewComic()
            : $this->uploaded = $this->form->uploadNewPage();
    }

    /**
     * Clean the livewire-tmp folder
     * @return void
     */
    public function cleanupTempUploads()
    {
        $oldFiles = Storage::files('livewire-tmp');

        foreach ($oldFiles as $file) {
            Storage::delete($file);
        }
    }
}
