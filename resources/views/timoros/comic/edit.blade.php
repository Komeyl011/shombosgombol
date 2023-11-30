<main class="flex flex-col items-center h-screen">
    @include('components.layouts.partials.admin.user-logout')
    <section class="w-4/5 lg:w-1/2 mx-auto pt-20 lg:pt-40 flex-1">
        <form wire:submit.prevent="updateComic()" method="post" enctype="multipart/form-data" autocomplete="off"
              class="flex flex-col items-center text-white bg-gray-400/50 rounded-md py-20 px-10 lg:w-3/4 lg:mx-auto lg:py-32">
            <label for="title" id="title_label"
                   class="group text-left hover:cursor-text flex flex-col justify-center my-5
                            text-black/50 lg:w-1/3 lg:items-center">
                <input type="text" wire:model="form.title" id="title" required
                       class="peer outline-none border-b border-black/50 bg-transparent focus:border-b-2 focus:border-black transform-all ease-in-out duration-150
                            focus:invalid:border-red-700 text-white lg:w-full">
                <span class="absolute ml-2 peer-focus:mb-10 peer-focus:ml-0 peer-focus:text-white transform-all ease-in-out duration-150
                            peer-valid:mb-10 peer-valid:ml-0 peer-valid:text-white lg:self-start">{!! __('edit.title') !!}</span>
            </label>
            <label for="per_title" id="per_title_label"
                   class="group text-left hover:cursor-text flex flex-col justify-center my-5
                            text-black/50 lg:w-1/3 lg:items-center">
                <input type="text" wire:model="form.per_title" id="per_title" required
                       class="peer outline-none border-b border-black/50 bg-transparent focus:border-b-2 focus:border-black transform-all ease-in-out duration-150
                            focus:invalid:border-red-700 text-white lg:w-full">
                <span class="absolute ml-2 peer-focus:mb-10 peer-focus:ml-0 peer-focus:text-white transform-all ease-in-out duration-150
                            peer-valid:mb-10 peer-valid:ml-0 peer-valid:text-white lg:self-start">{!! __('edit.perTitle') !!}</span>
            </label>
            <label for="image" class="group flex justify-center items-center my-20">
                <span class="group-hover:cursor-pointer">{!! __('edit.cover') !!}: </span>
                <div class="mx-5 w-52 h-72 group-hover:cursor-pointer">
                    @if (!is_string($form->image))
                        <img src="{!! $form->image->temporaryUrl() !!}" alt="{{ $form->title }} Cover" class="w-full h-full">
                    @else
                        <img src="{{ asset('storage/'.$form->image) }}" alt="{{ $form->title }} Cover" class="w-full h-full">
                    @endif
                </div>
                <input type="file" wire:model="form.image" id="image" hidden accept="image/*">
            </label>
            <div class="flex justify-between items-center">
                <span class="mx-10">{!! __('edit.pages') !!}: </span>
                <ul>
                    @forelse($pages as $page)
                        <li class="my-2 flex flex-row-reverse">
                            <span wire:click="deletePage({!! $page->page !!}, {!! $page->id !!}, {!! $page->title_id !!})"
                                class="peer hover:cursor-pointer hover:text-red-600 text-red-500 ml-10 drop-shadow-3xl transition-all ease-in-out">{!! __('edit.del') !!}</span>
                            <span wire:click="showPage({!! $page->page !!}, {!! $page->id !!})"
                                class="peer-hover:text-gray-300 hover:text-gray-300 hover:cursor-pointer transition-all ease-in-out">{!! __('edit.page') !!} {{ $page->page < 10 ? '0'.$page->page : $page->page }}</span>
                        </li>
                    @empty
                        <li>{!! __('edit.noPagesFound') !!}</li>
                    @endforelse
                </ul>
            </div>
            <button type="submit" class="border border-gray-300 rounded py-1 px-3 mt-5">{!! __('edit.updateBtn') !!}</button>
        </form>
    </section>
</main>
