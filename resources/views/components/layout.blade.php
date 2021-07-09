<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <header class="xl:container xl:mx-auto mx-4 my-4">
            <h1 class="text-4xl font-bold">
                <a class="no-underline" href="{{ route('index') }}">BBS</a>
            </h1>
        </header>
        @yield('content')
    </body>
</html>
