<header class="w-full">
    <section class="w-full bg-cover bg-center bg-no-repeat"
             style="background-image: url('{{ asset('/storage/misa-header.png') }}')">
        <div class="w-full py-20 bg-gradient-to-b from-black/50 to-black/50">
            <h1 class="{!! app()->getLocale() === 'per' ? 'font-helal' : 'font-agbalumo' !!} text-center text-4xl font-bold drop-shadow-title lg:tracking-[1rem]">{!! __('header.title') !!}</h1>
        </div>
    </section>
{{--    {{ \Illuminate\Support\Facades\Session::get('locale') }}--}}
    @include('components.layouts.partials.navigation.navbar')
</header>
