<div class="navbar bg-cyan-950 flex justify-between items-center py-4 px-6">
    <div class="flex items-center gap-4">
        {{-- ../storage/gundam.png --}}
        <img class="w-20 ml-4" src="{{ asset('/storage/gundam.png') }}" alt="Collect-It">
        <a href="{{ auth()->check() && Auth::user()->role === 'admin' ? route('admin.home') : route('home') }}" class="btn btn-ghost text-center font-bold text-3xl text-info font-helvetica">Collect-It</a>
    </div>
    <div class="flex items-center gap-4 justify-center">
        <a href="" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-7 py-4 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
            Users
        </a>
        <a href="" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-7 py-4 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
            Orders
        </a>
        <a href="{{ route('courier.show')}}" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-7 py-4 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
            Couriers
        </a>
        <a href="{{ route('event.show')}}" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-7 py-4 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
            Events
        </a>
    </div>
    <div class="flex items-center gap-4">
        {{-- USER :: LOGGED IN USER --}}
        @if(Auth::user())
        <h1 class="text-white">Admin: {{ Auth::user()->username }}</h1>
        <div class="dropdown dropdown-end bg-cyan-950">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full bg-cyan-950">
                    {{-- ../storage/default_avatar.png  --}}
                    <img alt="Tailwind CSS Navbar component" src="{{ asset('/storage/default_avatar.png') }}" />
                </div>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-cyan-950 rounded-box w-52 border border-cyan-800">
                <li>
                    <a disabled class="justify-between text-info">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>
                </li>
                <li>
                    <a href="{{route('admin.profile')}}" class="justify-between text-info"> Profile </a>
                </li>
                <li>
                    <a href="{{route('logout') }}" class="justify-between text-info">Logout</a>
                </li>
            </ul>
        </div>
        @endif
    </div>
</div>
