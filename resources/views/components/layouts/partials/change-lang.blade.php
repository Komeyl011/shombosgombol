<div class="w-1/2 mx-auto text-center -mt-5">
    <form action="{{ route('language.change') }}" method="post"
          class="w-full flex {!! app()->getLocale() === 'per' ? 'flex-row-reverse' : 'flex-row' !!} justify-center items-center toggle text-black">
        @csrf
        <input onchange="this.form.submit()" type="radio" name="lang" id="en" value="en" {!! app()->getLocale() === 'en' ? 'checked' : '' !!}>
        <label for="en">{!! __('header.english') !!}</label>
        <input onchange="this.form.submit()" type="radio" name="lang" id="per" value="per" {!! app()->getLocale() === 'per' ? 'checked' : '' !!}>
        <label for="per">{!! __('header.persian') !!}</label>
    </form>
</div>
