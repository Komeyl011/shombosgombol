@extends('components.layouts.app')
@section('page_title') Home @endsection
@section('main')
<main class="my-10">
    <!-- Comics showcase starts -->
    <section class="w-4/5 mx-auto flex flex-col lg:flex-row lg:flex-wrap lg:w-1/2 justify-center items-center">
        @foreach($comics as $comic)
            <div class="group bg-gray-400 my-5 lg:mx-5 min-w-full max-w-full lg:max-w-lg lg:min-w-0 flex justify-center items-center text-center
                drop-shadow-title bg-center bg-cover bg-no-repeat"
                style="background-image: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url('{{ asset("/storage/$comic->image") }}')">
                <a href="{{ route('comic.show', [
                        'key' => $comic->id,
                    ]) }}" class="block py-20 px-20 lg:group-hover:py-36 lg:px-10 lg:py-32">
                    <strong class="text-xl leading-10 tracking-widest">
                        {!! app()->getLocale() === 'per' ? $comic->per_title : $comic->title !!}
                    </strong>
                </a>
            </div>
        @endforeach
    </section>
    <!-- Comics showcase ends -->
</main>
@endsection
