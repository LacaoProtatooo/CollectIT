<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    @include('common.header')

    <div class="carousel w-screen h-screen">  
        @foreach ($events as $event)

        <div class="carousel-item">
            @php
                $imagePaths = explode(',', $event->image_path);
            @endphp
            <div class="card bg-cyan-800 shadow-xl m-10 glass items-center justify-center">
                <figure class="px-10 pt-10" style="width: 600px; height: 400px; overflow: hidden;">
                    <div class="carousel carousel-center rounded-box" style="width: 100%; height: 100%;">
                        @foreach ($imagePaths as $index => $imagepath)
                            <div class="carousel-item w-full" style="width: 600px; height: 400px;">
                                <img src="{{ asset($imagepath) }}" alt="Event Picture" style="width: 100%; height: 100%; object-fit: cover;" />
                            </div> 
                        @endforeach
                    </div>
                </figure>           
                <div class="card-body items-center text-center">
                    <h1 class="card-title text-4xl text-white">{{ $event->title }}</h1>
                    <p class=" text-white">
                        {{ $event->details }}
                    </p>
                    <div class="card-actions"> 
                    </div>
                </div>
            </div>
        </div> 

        @endforeach
    </div>

    
    

    
    
    @include('common.footer')
</body>
</html>