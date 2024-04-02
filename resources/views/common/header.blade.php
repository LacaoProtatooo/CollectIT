<div class="navbar bg-cyan-950">
    {{-- ../storage/gundam.png --}}
    <img class="mx-auto w-20 ml-4" src="{{  asset('/storage/gundam.png') }}" alt="Collect-It">
    <div class="flex-1">
      <a href="{{ auth()->check() && Auth::user()->role === 'admin' ? route('admin.home') : route('home') }}" class="btn btn-ghost text-center font-bold text-3xl text-info font-helvetica">Collect-It</a>
    </div>

    <div class="flex-none flex gap-2">


    {{-- LOGIN :: NO USER--}}
    @if (!Auth::user())
        <a href="{{ url('login') }}" class="btn btn-primary text-white border-r-4 w-60 mr-4">Login</a>
    @endif

    {{-- USER :: LOGGED IN USER // Modify later if login user is built--}}
    @if(Auth::user())
    <div class="dropdown dropdown-end">
      <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
        <div class="indicator">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
        </div>
      </div>
      <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content w-52 bg-base-100 shadow">
        <div class="card-body bg-cyan-950 rounded border border-cyan-800">
          <div class="card-actions">
            <a href="{{ route('cart.index') }}" class="btn btn-primary btn-block">View cart</a>
          </div>
        </div>
      </div>
    </div>
    <p class="text-white">Welcome: {{ Auth::user()->username }}</p>
    <div class="dropdown dropdown-end bg-cyan-950">
      <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full bg-cyan-950">
          {{-- ../storage/default_avatar.png --}}
          <img alt="Tailwind CSS Navbar component" src="{{ asset('/storage/default_avatar.png') }}" />
        </div>
      </div>
      <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-cyan-950 rounded-box w-52 border border-cyan-800">
        <li>
          <a href="{{route('profile.show')}}" class="justify-between text-info"> Profile </a>
        </li>
        <li>
          <a href="{{route('myorders.index') }}" class="justify-between text-info">My Orders</a>
        </li>
        <li>
          <a href="{{route('logout') }}" class="justify-between text-info">Logout</a>
        </li>
        <li>
          <a href="{{route('collectibles.show') }}" class="justify-between text-info">Collectibles</a>
        </li>
      </ul>
    </div>
    @endif



    </div>


  </div>
