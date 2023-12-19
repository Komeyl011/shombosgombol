<section class="w-full my-10">
    <form wire:submit.prevent="updateUser()" method="post">
        <div class="w-3/4 bg-gray-400 mx-auto flex flex-col lg:grid lg:grid-cols-2 lg:grid-rows-auto lg:gap-y-5 justify-items-center items-center py-10">
            <label for="username" class="mt-5 lg:m-0">Username</label>
            <input type="text" wire:model="form.username" id="username" class="h-1 py-4 px-1 rounded">
            <label for="email" class="mt-5 lg:m-0">Email</label>
            <input type="email" wire:model="form.email" id="email" class="h-1 py-4 px-1 rounded">
            <p class="mt-5 lg:m-0">Permissions</p>
            <ul>
                @foreach($permissions as $key => $value)
                    <li class="text-center">{!! $key !!}</li>
                @endforeach
            </ul>
            <div class="group col-span-2 mt-5 lg:m-0">
                <input type="checkbox" wire:model.live="change_pwd" class="group-hover:cursor-pointer" id="change_pwd" {{ $change_pwd ? 'checked' : '' }}>
                <label for="change_pwd" class="group-hover:cursor-pointer">I want to change my password.</label>
            </div>
            @if($change_pwd)
                <label for="old_password" class="mt-5 lg:m-0">Old password</label>
                <input type="password" wire:model="old_password" id="old_password" class="h-1 py-4 px-1 rounded">
                <label for="new_password" class="mt-5 lg:m-0">New password</label>
                <input type="password" wire:model="new_password" id="new_password" class="h-1 py-4 px-1 rounded">
                <label for="repeat_password" class="mt-5 lg:m-0">Repeat new password</label>
                <input type="password" wire:model="repeat_password" id="repeat_password" class="h-1 py-4 px-1 rounded">
            @endif
            <button type="submit" class="col-span-2 border border-gray-300 rounded py-2 px-4 mt-5 lg:m-0">Update</button>
            @if(!is_null($error) && $change_pwd)
                <span class="mt-5 text-center text-red-500 lg:col-span-2">{{$error}}</span>
            @endif
            @if(!is_null($message))
                <span class="mt-5 text-center text-green-700 lg:col-span-2">{{$message}}</span>
            @endif
        </div>
    </form>
</section>
