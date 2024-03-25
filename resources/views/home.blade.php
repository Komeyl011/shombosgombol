@extends('components.layouts.app')
@section('page_title') Home @endsection
@section('main')
<main class="my-10 min-h-fit">
    @php
        $perCal = new IntlDateFormatter(
            'fa_IR@calender=persian',
            IntlDateFormatter::FULL,
            IntlDateFormatter::FULL,
            'Asia/Tehran',
            IntlDateFormatter::TRADITIONAL,
            'YYYY-MM-dd',
        );

        $date = new DateTime();

        echo $perCal->format($date);
    @endphp 
    <!-- Website's user introduction -->
    <section class="w-4/5 mx-auto flex flex-col lg:flex-row lg:flex-wrap lg:w-1/2 justify-center items-center my-5">
        <div class="w-full bg-black/50 text-center pb-10 pt-14 px-10 lg:px-38">
            <h2 class="text-3xl text-center font-bold pb-10">{!! __('header.welcome') !!}</h2>
            <p class="text-xl text-center pb-5">
                <span class="block text-3xl font-bold">{!! __('header.hello') !!}</span>
                <span class="block leading-10">{!! __('header.create') !!}</span>
            </p>
            <span class="text-lg text-center">{!! __('header.subtext') !!}</span>
        </div>
    </section>
    <!-- Comics showcase starts -->
    <section class="w-4/5 mx-auto flex flex-col lg:flex-row lg:flex-wrap lg:w-1/2 justify-center items-center min-h-full">
        @foreach($comics as $comic)
            <div class="group bg-gray-400 my-5 lg:mx-5 min-w-full max-w-full lg:max-w-lg lg:min-w-0 flex justify-center items-center text-center
                drop-shadow-title bg-center bg-cover lg:bg-contain bg-no-repeat hover:bg-cover"
                style="background-image: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url('{{ asset("/storage/$comic->image") }}')">
                <a href="{{ route('comic.show', [
                        'key' => $comic->id,
                    ]) }}" class="block py-20 px-20 lg:px-10 lg:py-32">
                    <strong class="{!! app()->getLocale() === 'per' ? 'text-3xl' : 'text-xl' !!} leading-10 tracking-widest">
                        {!! app()->getLocale() === 'per' ? $comic->per_title : $comic->title !!}
                    </strong>
                </a>
            </div>
        @endforeach
    </section>
    <!-- Comics showcase ends -->
</main>
@endsection
