
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body class="font-sans antialiased">
        @livewireScripts


            <!-- Page Content -->
            <main>
                {{ $slot }}
                <div class="app" >
                    <livewire:side-bar />
                </div>
            </main>
        </div>
    </body>

</html>


<style>
    .app {
        position: float;
        margin-left: 500px;
        padding-left: 100px;
    }
</style>
