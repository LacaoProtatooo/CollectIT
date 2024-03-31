<div class="navbar bg-cyan-950">
    <img class="mx-auto w-20 ml-4" src="../storage/gundam.png" alt="Collect-It">
    <div class="flex-1">
      <a href="{{ route('home') }}" class="btn btn-ghost text-center font-bold text-3xl text-primary font-helvetica">Collect-It</a>
    </div>
    <div class="flex-none flex gap-2">
      <div class="form-control">
        {{-- SEARCH BAR --}}
        <input type="text" placeholder="Search" class="input input-bordered input-bordered-black w-24 md:w-auto bg-white text-black border-black" />
      </div>

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
          <span class="badge badge-sm indicator-item">8</span>
        </div>
      </div>
      <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content w-52 bg-base-100 shadow">
        <div class="card-body bg-cyan-950 rounded border border-cyan-800">
          <span class="font-bold text-lg text-info">8 Items</span>
          <span class="text-info">Subtotal: $999</span>
          <div class="card-actions">
            <button class="btn btn-primary btn-block">View cart</button>
          </div>
        </div>
      </div>
    </div>
    <div class="dropdown dropdown-end bg-cyan-950">
      <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full bg-cyan-950">
          <img alt="Tailwind CSS Navbar component" src="../storage/default_avatar.png" />
        </div>
      </div>
      <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-cyan-950 rounded-box w-52 border border-cyan-800">
        <li>
          <a href="{{route('profile.show')}}" class="justify-between text-info"> Profile </a>
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
