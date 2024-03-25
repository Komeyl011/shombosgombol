<?php

namespace App\Livewire;

use App\Livewire\Forms\AdminUpdateForm;
use App\Models\Comics;
use App\Models\ComicsTitles;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminUpdatePost extends Component
{
    use WithFileUploads;

    public AdminUpdateForm $form;

    public $key;
    private $error = null;

    public function mount()
    {
        foreach (ComicsTitles::query()->find(['id' => $this->key]) as $comic) {
            $comic;
        }
        $this->form->getComic($comic);
        return $comic;
    }

    /**
     * Get the comic's uploaded pages
     *
     * @return mixed
     */
    public function getPages()
    {
        return Comics::where('title_id', '=', $this->key)->get();
    }

    #[Layout('components.layouts.timoros')]
    #[Title('Edit Comic')]
    public function render()
    {
        return view('timoros.comic.edit', [
            'pages' => $this->getPages(),
        ]);
    }

    /**
     * Show selected page's info
     *
     * @param $page
     * @param $id
     * @return void
     */
    public function showPage($page, $id)
    {
        $selectedPage = Comics::query()->where('id', '=', $id)->where('page', '=', $page)->get()->toArray();
        $this->form->image = $this->mount()->title.'/'.$selectedPage[0]['image'];
    }

    /**
     * Delete selected page
     *
     * @param int $page
     * @param int $id
     * @param int $tId
     * @return void
     */
    public function deletePage($page, $id, $tId = 0)
    {
        $record = Comics::query()->where('id', '=', $id)->where('page', '=', $page);
        $image = $record->get()->toArray();
        $record->delete();
        File::delete('storage/'.$this->form->title.'/'.$image[0]['image']);

        $replace = Comics::query()->where('title_id', '=', $tId)->where('page', '=', --$page)->get()->toArray();
        $this->form->image = $this->mount()->title.'/'.$replace[0]['image'];
    }

    public function updateComic()
    {
        return $this->form->updateRecord($this->key)
            ? session()->flash('success', 'Upload successful!')
            : session()->flash('fail', 'There was an error!');
    }

    /**
     * Clear the livewire-tmp folder
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
