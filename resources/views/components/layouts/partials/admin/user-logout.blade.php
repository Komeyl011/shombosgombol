<div class="pt-5 px-5 me-auto">
    <span class="block text-center text-white pb-5">User: {!! \Illuminate\Support\Facades\Auth::guard()->user()->username !!}</span>
    <a href="/logout" class="bg-gray-700/80 rounded py-2 px-5 text-white lg:tracking-widest uppercase font-bold">{!! __('admin.logout') !!}</a>
</div>
