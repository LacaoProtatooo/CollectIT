<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <title>Login</title>
        <style>
</style>
</head>
<body class="bg-[../storage/bg.png] bg-fixed bg-cover h-screen">
    <div class="bg-fixed bg-cover h-screen" style="background-image: url('../storage/bg.png');">
        <div class="flex min-h-full flex-col justify-center px-60 py-12 lg:px-8 items-center">
            <div class="card w-96 bg-base-100 shadow-xl image-full justify-center">
            <figure><img src="../storage/wallpaper.jpg" alt="bg" /></figure>
            <div class="card-body">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <img class="mx-auto w-20" src="../storage/gundam.png" alt="Collect-It">
                    <a href="{{ route('home') }}" class="block mt-10 text-center font-bold text-3xl text-info font-helvetica">Welcome to <br> Connect-It!</a>
                    <h3 class="mt-10 text-center text-1xl tracking-tight text-white font-helvetica-neue">Sign in to your account</h3>
                </div>
    
                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="{{ route('login.submit') }}" method="POST">
                    @csrf
                        <div>
                            <label for="username" class="block text-sm font-medium leading-6 text-info ">Username</label>
                            <div class="mt-2">
                                <input id="username" name="username" type="username" autocomplete="username" required class="block w-full rounded-md border-0 py-1.5 px-2 bg-neutral-100 text-stone-900">
                            </div>
                        </div>
    
                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password" class="block text-sm font-medium leading-6 text-info">Password</label>
                            </div>
                            <div class="mt-2">
                                <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5  px-2 shadow-sm bg-neutral-100 text-stone-900">
                            </div>
                        </div>
    
                        <div>
                            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                        </div>
                    </form>
    
                    <p class="mt-10 text-center text-sm text-white">
                        not a member?
                        <a href="{{ route('signup.show') }}" class="font-semibold leading-6 text-info hover:text-indigo-500">Sign up now</a>
                    </p>
                </div>
                <div class="card-actions justify-end">
                </div>
            </div>
            </div>
        </div>



    </div>
</body>
</html>