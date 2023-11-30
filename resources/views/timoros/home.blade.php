<main class="body-bg w-full h-screen flex flex-col items-center">
    @include('components.layouts.partials.admin.user-logout')
    <div class="w-4/5 lg:w-1/4 mx-auto pt-20 text-black">
        <div class="bg-gray-400 my-10 text-center rounded-md">
            <a href="/timoros/comic/upload" class="block py-10 lg:py-20 px-5" wire:navigate>
                <i class="fa-regular fa-file-image text-4xl mb-2"></i>
                <p class="font-bold">{!! __('admin.newUpload') !!}</p>
            </a>
        </div>
        <div class="bg-gray-400 my-10 text-center rounded-md">
            <a href="/timoros/comics/showcase" class="block py-10 lg:py-20 px-5" wire:navigate>
                <i class="fa-solid fa-table text-4xl mb-2"></i>
                <p class="font-bold">{!! __('admin.showAll') !!}</p>
            </a>
        </div>
    </div>
</main>
