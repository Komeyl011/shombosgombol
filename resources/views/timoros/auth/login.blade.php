<!doctype html>
<html lang="{!! app()->getLocale() !!}" dir="{{ app()->getLocale() === 'per' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/57a53d4203.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    <title>Login | Shombos Gombol's Admin</title>
</head>
<body class="font-viga">
    <main class="body-bg w-full h-screen flex justify-center items-center">
        <section class="w-4/5 lg:w-1/2 mx-auto bg-gray-400 rounded-md py-20 lg:py-56">
            <h1 class="font-bold tracking-widest text-3xl text-white uppercase text-center mb-10">{!! __('login.title') !!}</h1>
            <form action="{{ route('admin.login-perform') }}" method="POST" autocomplete="off"
                    class="w-full flex flex-col justify-center items-center">
                @csrf
                <label for="username" class="group text-left hover:cursor-text flex flex-col justify-center my-5 login-input text-black/50 lg:w-1/3 lg:items-center">
                    <input type="text" name="username" id="username" required
                           class="peer outline-none border-b border-black/50 bg-transparent focus:border-b-2 focus:border-black transform-all ease-in-out duration-150
                                    focus:invalid:border-red-700 text-white lg:w-full">
                    <span class="absolute ml-2 peer-focus:mb-10 peer-focus:ml-0 peer-focus:text-white transform-all ease-in-out duration-150
                            peer-valid:mb-10 peer-valid:ml-0 peer-valid:text-white lg:self-start">{!! __('login.username') !!}</span>
                </label>
                <label for="password" class="group text-left hover:cursor-text flex flex-col justify-center my-5 login-input text-black/50 lg:w-1/3 lg:items-center">
                    <input type="password" name="password" id="password" required
                           class="peer outline-none border-b border-black/50 bg-transparent focus:border-b-2 focus:border-black transform-all ease-in-out duration-150
                           focus:invalid:border-red-700 text-white lg:w-full">
                    <span class="absolute ml-2 peer-focus:mb-10 peer-focus:ml-0 peer-focus:text-white transform-all ease-in-out duration-150
                            peer-valid:mb-10 peer-valid:ml-0 peer-valid:text-white lg:self-start">{!! __('login.password') !!}</span>
                </label>
                <label for="remember" class="group {!! app()->getLocale() === 'per' ? 'text-right' : 'text-left' !!} hover:cursor-pointer my-5 login-input text-black/50 lg:w-1/3 lg:items-center">
                    <input type="checkbox" name="remember" id="remember">
                    <span>{!! __('login.remember') !!}</span>
                </label>
                <ul>
                    @if($errors->count() > 0)
                        @foreach($errors->all() as $error)
                            <li class="text-red-700">{!! $error !!}</li>
                        @endforeach
                    @endif
                </ul>
                <button type="submit" name="submit" class="py-2 px-5 rounded focus:border focus:border-black/50 font-bold text-black/50 focus:text-white">{!! __('login.btn') !!}</button>
            </form>
        </section>

    </main>
</body>
</html>
