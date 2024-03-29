<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Test</title>
</head>
<body>

<div class="navbar bg-cyan-950">
<img class="mx-auto w-20" src="../storage/gundam.png" alt="Collect-It">
  <div class="flex-1">
    <a  href="{{url('test')}}" class="btn btn-ghost text-center font-bold text-3xl text-primary font-helvetica">Connect-It</a>
  </div>
  <div class="flex-none flex gap-2">
    <div class="form-control">
      <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto bg-white text-sto" />
    </div>

    <div class="dropdown dropdown-end">
      <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
        <div class="indicator">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
          <span class="badge badge-sm indicator-item">8</span>
        </div>
      </div>
      <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content w-52 bg-base-100 shadow">
        <div class="card-body bg-cyan-950 rounded border border-cyan-800">
          <span class="font-bold text-lg">8 Items</span>
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
          <a href="{{url('profile')}}" class="justify-between">
            Profile
          </a>
        </li>
        <li><a href="{{url('login')}}">Logout</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="card w-96 bg-slate-200 shadow-xl" style="margin: 20px;">
        <figure>
          <img src="../storage/gundambg.png" alt="Shoes" width="200" height="200" />
        </figure>
        <div class="card-body">
          <h2 class="card-title text-stone-900">
            Shoes! <span class="text-primary font-bold">$49.99</span> <!-- Modified: Added text-dark class -->
          </h2>
          <p class="text-stone-500">If a dog chews shoes whose shoes does he choose?</p> <!-- Modified: Added text-dark class -->
          <div class="card-actions justify-end"> <!-- Modified: Changed justify-start to justify-end -->
            <div class="badge badge-outline text-stone-500">Gundam</div>
            <div class="badge badge-outline text-stone-500 ">Mint</div>
          </div>
          <button class="btn btn-primary mt-4 px-6 py-2">Buy Now</button> <!-- Modified: Added px-6 py-2 classes -->
        </div>
      </div>


</body>
</html>