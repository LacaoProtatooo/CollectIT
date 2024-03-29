<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Welcome</title>
</head>
<body>

    <div class="navbar bg-cyan-950">
      <img class="mx-auto w-20" src="../storage/gundam.png" alt="Collect-It">
      <div class="flex-1">
        <a class="btn btn-ghost text-center font-bold text-3xl text-primary font-helvetica">Connect-It</a>
      </div>
      <div class="flex-none flex gap-2">
        <div class="form-control">
          <input type="text" placeholder="Search" class="input input-bordered input-bordered-black w-24 md:w-auto bg-white text-black border-black" />
        </div>
        <a href="{{ url('login') }}" class="btn btn-primary text-white border-r-4 w-60">Login</a>
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