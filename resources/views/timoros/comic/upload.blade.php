<main class="body-bg w-full h-screen flex flex-col items-center">
    @include('components.layouts.partials.admin.user-logout')
    <section class="w-4/5 lg:w-1/2 mx-auto pt-20 lg:pt-40">
        <form wire:submit.prevent="uploadPhoto()" method="post" enctype="multipart/form-data" autocomplete="off"
                class="flex flex-1 flex-col items-center text-white bg-gray-400/50 rounded-md py-20 px-10 lg:w-3/4 lg:mx-auto lg:py-32">
            <label for="new" class="mb-5 hover:cursor-pointer">
                <input type="checkbox" id="new" wire:model.live="new" {{ $new ? 'checked' : '' }}>
                <span>{!! __('upload.new') !!}</span>
            </label>
            @if($new)
                <label for="title" id="title_label"
                       class="group text-left hover:cursor-text flex flex-col justify-center my-5
                            text-black/50 lg:w-1/3 lg:items-center">
                    <input type="text" wire:model="form.title" id="title" required dir="ltr"
                           class="peer outline-none border-b border-black/50 bg-transparent focus:border-b-2 focus:border-black transform-all ease-in-out duration-150
                            focus:invalid:border-red-700 text-white lg:w-full">
                    <span class="absolute ml-2 peer-focus:mb-10 peer-focus:ml-0 peer-focus:text-white transform-all ease-in-out duration-150
                            peer-valid:mb-10 peer-valid:ml-0 peer-valid:text-white lg:self-start">{!! __('upload.title') !!}</span>
                </label>
                <label for="per_title" id="per_title_label"
                       class="group text-left hover:cursor-text flex flex-col justify-center my-5
                            text-black/50 lg:w-1/3 lg:items-center">
                    <input type="text" wire:model="form.per_title" id="per_title" required dir="rtl"
                           class="peer outline-none border-b border-black/50 bg-transparent focus:border-b-2 focus:border-black transform-all ease-in-out duration-150
                            focus:invalid:border-red-700 text-white lg:w-full">
                    <span class="absolute ml-2 peer-focus:mb-10 peer-focus:ml-0 peer-focus:text-white transform-all ease-in-out duration-150
                            peer-valid:mb-10 peer-valid:ml-0 peer-valid:text-white lg:self-start">{!! __('upload.perTitle') !!}</span>
                </label>
            @else
                <select wire:model="form.title_id" id="title" class="w-full lg:w-auto text-black py-1 px-3 rounded cursor-pointer">
                    <option></option>
                    @forelse($comicTitles as $title)
                        <option value="{{ $title->id }}">{{ $title->title }}</option>
                    @empty
                        <option value="none">{!! __('upload.noTitle') !!}</option>
                    @endforelse
                </select>
                <label for="page_number" class="my-5">
                    <span>{!! __('upload.page') !!} </span>
                    <input type="number" wire:model="form.page" id="page_number" class="w-12 text-black" min="1" max="1000">
                </label>
            @endif
            <div class="mt-5">
                <span>{!! __('upload.picture') !!}: </span>
                <label for="image">
                    <div class="inline">
                        <span class="cursor-pointer border border-gray-300 rounded bg-black/50 py-1 px-3">{!! __('upload.chooseFile') !!}</span>
                        <input type="file" wire:model="form.image" id="image" hidden accept="image/*">
                    </div>
                </label>
            </div>
            <p class="w-1/4 break-all mx-auto text-center mt-5">{!! isset($form->image) && !is_string($form->image) ? $form->image->getClientOriginalName() : '' !!}</p>
            {!! $new ? '<span class="block text-green-500" id="cover">'.__('upload.pleaseChooseCover').'</span>' : '' !!}
            <button type="submit" class="border border-gray-300 rounded py-1 px-3 mt-5">{!! __('upload.btn') !!}</button>
            @if($uploaded)
                <p class="text-green-400 mt-5">{!! __('upload.success') !!}</p>
            @endif
        </form>
    </section>
</main>
