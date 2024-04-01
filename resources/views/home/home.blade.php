<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Welcome</title>
</head>
<body class="">
    @include('common.header')
    @include('common.navbar')

    <div class="max-w-screen-xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mx-auto p-4 mt-4 mb-4">
        @include('common.card')
    </div>

    @include('common.footer')
</body>
</html>