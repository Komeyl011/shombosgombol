@extends('components.layouts.app')
@section('page_title') {!! $title !!} @endsection
@section('main')
<main>
    <section class="w-full lg:w-1/3 mx-auto my-10">
        @forelse($pages as $page)
            {{-- Comics title and page are shown here --}}
            <div class="text-center my-5">
                <h3 class="text-3xl">{!! app()->getLocale() === 'per' ? $per_title : $title !!}</h3>
                <p class="text-lg">{!! __('showComic.page') !!} 0{!! $page->page !!}</p>
            </div>
            {{-- This is where the comics page is gonna be --}}
            <div class="my-10 max-w-full">
                <img src="{!! asset("/storage/". str_replace(' ', '%20', $title) ."/$page->image") !!}" alt="{!! $title !!} page 0{!! $page->page !!}">
            </div>
            {{-- Here goes the navigating buttons to go to next, previous or first page --}}
            <div class="my-5 mx-16 lg:mx-40">
                {{ $pages->links() }}
            </div>
        @empty
            <p class="text-center">{!! __('showComic.noPages') !!}</p>
        @endforelse
    </section>
</main>
@endsection
