<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Register</title>
    <style>

    </style>
</head>
<body>

<div class="bg-fixed bg-cover bg-no-repeat" style="background-image: url('../storage/bg.png');">
    
<div class="flex min-h-full flex-col justify-center px-60 py-12 lg:px-8 items-center">
    <div class="card w-96 bg-base-100 shadow-xl image-full justify-center">
        <figure><img src="../storage/wallpaper.jpg" alt="bg"/></figure>
        <div class="card-body">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto w-20" src="../storage/gundam.png" alt="Collect-It">
                <h1 class="mt-10 text-center font-bold text-3xl text-info font-helvetica">Welcome to <br> Connect-It!</h1>
                <h3 class="mt-10 text-center text-1xl tracking-tight text-white">Create an account</h3>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="#" method="POST">
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-info">Email address</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                   class="block w-full rounded-md border-0 py-1.5 px-2 bg-neutral-100 text-stone-900">
                        </div>
                    </div>

                    <div>
                        <label for="username" class="block text-sm font-medium leading-6 text-info">Username</label>
                        <div class="mt-2">
                            <input id="username" name="username" type="text" autocomplete="username" required
                                   class="block w-full rounded-md border-0 py-1.5 px-2 bg-neutral-100 text-stone-900">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-x-4">
                        <div>
                            <label for="first_name" class="block text-sm font-medium leading-6 text-info">First Name</label>
                            <div class="mt-2">
                                <input id="first_name" name="first_name" type="text" autocomplete="given-name" required
                                       class="block w-full rounded-md border-0 py-1.5 px-2 bg-neutral-100 text-stone-900">
                            </div>
                        </div>

                        <div>
                            <label for="last_name" class="block text-sm font-medium leading-6 text-info">Last Name</label>
                            <div class="mt-2">
                                <input id="last_name" name="last_name" type="text" autocomplete="family-name" required
                                       class="block w-full rounded-md border-0 py-1.5 px-2 bg-neutral-100 text-stone-900">
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium leading-6 text-info">Password</label>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="new-password" required
                                   class="block w-full rounded-md border-0 py-1.5 px-2 bg-neutral-100 text-stone-900">
                        </div>
                    </div>

                    <div>
                        <label for="confirm_password" class="block text-sm font-medium leading-6 text-info">Confirm Password</label>
                        <div class="mt-2">
                            <input id="confirm_password" name="confirm_password" type="password" autocomplete="new-password" required
                                   class="block w-full rounded-md border-0 py-1.5 px-2 bg-neutral-100 text-stone-900">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-white">
                    Already have an account?
                    <a href="{{url('login')}}" class="font-semibold leading-6 text-info hover:text-indigo-500">Login now</a>
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