<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>livewire</title>
    @livewireStyles
</head>
<body>
    <div id="main" >
        {{ $slot }}

        <livewire:side-bar />
    </div>

</body>
@livewireScripts
</html>

<style>
    #main {
        position: float;
        margin-left: 50px;
        padding-left: 100px;
    }
</style>
    