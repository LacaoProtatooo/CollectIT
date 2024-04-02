<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Collectible Info</title>
</head>
<body class="bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200">
    @include('common.message')
    @include('common.header')
    <br>

    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-4 rounded-lg ml-4 mr-4 bg-gray-100">
        {{-- IMAGE SLIDER --}}
        <div id="custom-controls-gallery" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-auto overflow-hidden rounded-lg md:h-96">
                @php
                // dd($collectible);
                if ($collectible->image_path) {
                $imagePaths = explode(',', $collectible->image_path);
            } else {
                $imagePaths[] = "image.png";
            }
                @endphp

                @foreach ($imagePaths as $imagePath)
                    <div class="hidden duration-700 ease-in-out rounded-lg" data-carousel-item>
                        <img src="{{ asset($imagePath) }}" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 rounded-lg" alt="">
                    </div>
                @endforeach
            </div>

            <div class="flex justify-center items-center pt-4">
                <button type="button" class="flex justify-center items-center me-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                        <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="flex justify-center items-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                        <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
        <br>
    <form method = "POST" action = "{{ route('cart.create') }}">
        @csrf
        @method("POST")
        {{-- DETAILS --}}
        <div class="grid md:grid-cols-2 md:gap-2 mb-4 mt-4">
            <div class="mb-1">
                <p class="text-black md:text-2xl tracking-wider dark:text-gray-400">Collectible Name:<b> {{$collectible->name}} </b></p><br>
                <p class="text-black md:text-2xl tracking-wider dark:text-gray-400">Collectible Price:<b> {{$collectible->price}}</b></p><br>
                <p class="text-black md:text-2xl tracking-wider dark:text-gray-400">Collectible Dimension:<b> {{$collectible->dimension}}</b></p><br>
                <p class="text-black md:text-2xl tracking-wider dark:text-gray-400">Collectible Condition:<b> {{$collectible->condition}}</b></p><br>
            </div>
            <div class="mb-1">
                <p class="text-black md:text-2xl tracking-wider dark:text-gray-400">Stock:<b> {{$collectible->stock}}</b></p><br>
                <p class="text-black md:text-2xl tracking-wider dark:text-gray-400">Manufacturer:<b> {{$collectible->manufacturer}}</b></p><br>
                <p class="text-black md:text-2xl tracking-wider dark:text-gray-400">Category:<b> {{$collectible->category}}</b></p><br>
                <p class="text-black md:text-2xl tracking-wider dark:text-gray-400">Status:<b> {{$collectible->status}}</b></p><br>
            </div>
        </div>
        <div class="items-center justify-center relative mb-5">
            <p class="text-black md:text-2xl tracking-wider dark:text-gray-400">Collectible Description:<b> {{$collectible->description}}</b></p><br>
        </div><br>


        <div class="items-center justify-center relative mb-5">
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            @if (auth()->user())
            <div class="flex items-center mb-2">
                <label class="text-black md:text-2xl tracking-wider dark:text-gray-400">
                    Quantity
                </label>
            </div>
            <div class="flex items-center mb-2">
                <input type = "hidden" value = "{{ $collectible->id }}" name = "id">
                <input type="number" name="quantity" id="quantity" min="1" max= "{{$collectible->stock}}" class="text-black bg-white border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-transparent px-4 py-2">
                <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-lg px-5 py-2.5 ml-4">Add to Cart</button>
            </div>
        @endif
        </div>
    </form>
    </div>

    <script>
        function confirmInquiry(inquiryUrl) {
            const confirmed = window.confirm("Add to Cart?");

            if (confirmed) {
                window.location.href = inquiryUrl;
            }
        }
    </script>

    @if($reviews)

        <div class="card bg-cyan-700 text-neutral-content m-4">
            <div class="card-body items-center text-center">
            <h2 class="card-title text-white md:text-2xl tracking-wider dark:text-gray-400">Reviews</h2>
                @foreach ($reviews as $rev)
                        <div class="chat chat-start">
                            <div class="chat-image avatar">
                            <div class="w-10 rounded-full">
                                <img alt="Tailwind CSS chat bubble component" src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                            </div>
                            @php
                                $id = $rev->user_id;
                                $name = App\Models\User::where('id', $id)->first();
                                // dd($name);
                            @endphp
                            </div>
                            <div class="chat-header rounded-lg p-1 text-white">
                                {{ $name->first_name . " " . $name->last_name  }}
                            </div>
                            <div class="chat-bubble w-66  bg-cyan-900 rounded-lg p-3 text-white">{{ $rev->description }}</div>
                        </div>
            @endforeach
            </div>
            </div>
        </div>

    @else
        <div class="card bg-cyan-700 text-neutral-content m-4">
            <div class="card-body items-center text-center">
            <h2 class="card-title text-white md:text-2xl tracking-wider dark:text-gray-400">NO Reviews</h2>
            </div>
        </div>

    @endif
{{-- ============== --}}

    @include('common.footer')
</body>
</html>
