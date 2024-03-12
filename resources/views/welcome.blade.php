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
    <div class="card bg-stone-200 shadow-xl py-3 px-3 shadow-xl glass">
    <div class="carousel w-full border-r-2">
  <div id="slide1" class="carousel-item relative w-full">
    <img src="../storage/hotwheelsbg.jpg" class="w-full content-stretch" />
    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
      <a href="#slide3" class="btn btn-circle btn-primary opacity-50">❮</a> 
      <a href="#slide2" class="btn btn-circle btn-primary opacity-50">❯</a>
    </div>
  </div> 
  <div id="slide2" class="carousel-item relative w-full">
    <img src="../storage/gundambg.jpg" class="w-full" />
    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
      <a href="#slide1" class="btn btn-circle btn-primary opacity-50">❮</a> 
      <a href="#slide3" class="btn btn-circle btn-primary opacity-50">❯</a>
    </div>
  </div> 
  <div id="slide3" class="carousel-item relative w-full">
    <img src="../storage/funkobg.jpg" class="w-full" />
    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
      <a href="#slide2" class="btn btn-circle btn-primary">❮</a> 
      <a href="#slide1" class="btn btn-circle btn-primary">❯</a>
    </div>
  </div> 
</div>
  <div class="card-body">
  <h1 class="mt-10 font-bold text-3xl text-primary font-helvetica text-center">Welcome to Connect-It!</h1>
    <h3 class="mt-10 text-1xl tracking-tight font-helvetica-neue">At Collect-It, we're passionate about bringing the world of collectibles right to your fingertips. Whether you're a die-hard enthusiast or just starting your collection journey, we've got something for everyone.</h3>
    <div class="card-actions justify-end">
    <a href="{{url('login')}}" class="btn btn-primary text-white">Login</a>
    <a href="{{url('register')}}" class="btn btn-primary text-white">Register</a>
    </div>
  </div>
</div>
</div>

<script>
        // Function to change slides
        function changeSlide() {
            const currentSlide = document.querySelector('.carousel-item.active');
            const nextSlide = currentSlide.nextElementSibling || document.querySelector('.carousel-item:first-child');
            currentSlide.classList.remove('active');
            nextSlide.classList.add('active');
        }

        // Set interval to change slides every 5 seconds
        setInterval(changeSlide, 5000);
    </script>

    </body>
</html>
