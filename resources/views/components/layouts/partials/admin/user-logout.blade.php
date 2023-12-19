<div class="pt-5 px-5 me-auto flex flex-col justify-center items-start">
    <span class="block text-center text-white pb-5">User:
        <a href="/timoros/admin-user/profile" wire:navigate>{!! \Illuminate\Support\Facades\Auth::guard()->user()->username !!}</a>
    </span>
    <a href="/logout" class="block bg-gray-700/80 rounded py-2 px-5 text-white lg:tracking-widest uppercase font-bold mb-5">{!! __('admin.logout') !!}</a>
    @include('components.layouts.partials.change-lang')
    @if(url()->current() != route('admin.index'))
        <a href="{{ route('admin.index') }}" wire:navigate class="hover:cursor-pointer block py-2 px-5 my-5 bg-gray-300/50 hover:bg-gray-300
         rounded text-gray-300 hover:text-gray-500 transition-all ease-in-out">{!! __('admin.nav-home') !!}</a>
        <a href="{{ url()->previous() }}" wire:navigate class="hover:cursor-pointer block py-2 px-5 bg-gray-300/50 hover:bg-gray-300
         rounded text-gray-300 hover:text-gray-500 transition-all ease-in-out">{!! __('admin.nav-back') !!}</a>
    @endif
</div>
