<main class="flex flex-col items-center h-screen">
    <section class="w-4/5 lg:w-1/2 mx-auto pt-20 lg:pt-40 flex-1">
        <form method="post" autocomplete="off"
              class="flex flex-col items-center text-white bg-gray-400/50 rounded-md py-20 px-10 lg:w-3/4 lg:mx-auto lg:py-32">
            <label for="username" id="uid_label"
                   class="group text-left hover:cursor-text flex flex-col justify-center my-5
                            text-black/50 lg:w-1/3 lg:items-center">
                <span class="lg:self-start">{!! __('admin.user-edit-uid') !!}</span>
                <input type="text" wire:model="form.username" id="username" required
                       class="peer outline-none border-b border-black/50 bg-transparent focus:border-b-2 focus:border-black transform-all ease-in-out duration-150
                            focus:invalid:border-red-700 text-white lg:w-full">
            </label>
            <label for="email" id="email_label"
                   class="group text-left hover:cursor-text flex flex-col justify-center my-5
                            text-black/50 lg:w-1/3 lg:items-center">
                <span class="lg:self-start">{!! __('admin.user-edit-email') !!}</span>
                <input type="email" wire:model="form.email" id="email" required
                       class="peer outline-none border-b border-black/50 bg-transparent focus:border-b-2 focus:border-black transform-all ease-in-out duration-150
                            focus:invalid:border-red-700 text-white lg:w-full">
            </label>
            <div class="flex flex-col justify-center items-center">
                <span class="capitalize self-start text-black/50">{!! __('admin.user-edit-permissions') !!} </span>
                @foreach($form->permissions as $key => $value)
                    @if($value)
                        <span>{{ $key }}</span>
                    @endif
                @endforeach
            </div>
            <div class="flex flex-col justify-center items-center">
                <span class="capitalize self-start text-black/50">{!! __('admin.user-edit-created') !!} </span>
                <span>{{ $form->created_at[0] }}</span>
            </div>
        </form>
    </section>
</main>
