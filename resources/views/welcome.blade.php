<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Welcome</title>
    <style>
body {
  background-image: url('../storage/bg.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
    <body class=" items-center">
    <div class="flex min-h-full flex-col justify-center px-60 py-10 lg:px-8 items-center">

    <br>
    <br>
    <br>
    <br>
    <div class="card bg-stone-200 shadow-xl py-3 px-3 glass items-center">
    <div class="carousel rounded-box">
  <div class="carousel-item border-r-4">
    <img src="../storage/gundambg.png" alt="Burger" />
  </div> 
  <div class="carousel-item border-r-4">
    <img src="../storage/hotwheelsbg.png" alt="Burger" />
  </div> 
  <div class="carousel-item border-r-4">
    <img src="../storage/funkobg.png" alt="Burger" />
  </div> 
  <div class="card-body">
  <h1 class="mt-10 font-bold text-3xl text-primary font-helvetica text-center">Welcome to Connect-It!</h1>
    <br>
  <h3 class="mt-10 text-1xl tracking-tight font-helvetica-neue text-justify">At Collect-It, we're passionate about bringing the world of collectibles right to your fingertips. Whether you're a die-hard enthusiast or just starting your collection journey, we've got something for everyone.</h3>
    <br>
  <div class="card-actions justify-end">
    <a href="{{url('login')}}" class="btn btn-primary text-white border-r-4 w-60">Login</a>
    <br>
    <a href="{{url('register')}}" class="btn btn-primary text-white border-r-4 w-40">Register</a>
    </div>
  </div>
</div>
<br>
<br>
<br>
<br>
    </body>
</html>
