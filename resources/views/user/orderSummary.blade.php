<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Welcome</title>
</head>
<body class="">
    @include('common.header')
    @php
    $overTotal = 0;
    @endphp
    <div class="flex justify-center">
        <h2 class="card-title">Summary</h2>
    </div>

    <div class="flex justify-center min-h-screen bg-base-200">
        <div class="max-w-screen-xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 gap-2 p-4 mt-4  mx-auto">
            @foreach ($collectibles as $collectible)
            <div class="card-body">
                <label class="form-control w-full max-w-xs">
                    {{-- ==================CARDDD==================== --}}
                    <div class="bg bg-cyan-800 rounded-lg w-400 grid grid-cols-2 gap-4">
                        <div class="col-span-2 bg bg-cyan-950 rounded-lg ">
                            <div class="flex justify-center  ml-4 mt-2 mb-2 child-with-space">Product: {{$collectible->name}}</div>
                        </div>
                        <div class="bg bg-cyan-950 rounded-lg grid grid-cols-1 gap-4 m-1">
                            <div class="ml-4 mt-2 mb-2">Manufacturer: {{$collectible->manufacturer}}</div>
                        </div>
                        <div class="bg bg-cyan-950 rounded-lg grid grid-cols-1 gap-4 m-1">
                            <div class="ml-4 mt-2 mb-2">Price: {{$collectible->price}}</div>
                        </div>
                        <div class="bg bg-cyan-950 rounded-lg grid grid-cols-1 gap-4 m-1">
                            <div class="ml-4 mt-2 mb-2">Dimension: {{$collectible->dimension}}</div>
                        </div>
                        <div class="bg bg-cyan-950 rounded-lg grid grid-cols-1 gap-4 m-1">
                            <div class="ml-4 mt-2 mb-2">Quantity: {{$collectible->pivot->quantity}}</div>
                        </div>
                        @php
                            $totalPrice = $collectible->price * $collectible->pivot->quantity;
                            $overTotal += $totalPrice;
                        @endphp
                        <div class="col-span-2 bg bg-cyan-950 rounded-lg grid grid-cols-1 gap-4 m-1">
                            <div class="flex justify-center ml-4 mt-2 mb-2">Sub Total: {{$totalPrice}}</div>
                        </div>

                        @if($collectible->pivot->reviewStat == 'toRate')
                            <h3 class="col-span-2 font-bold text-lg">Your Review</h3>
                            <form method="POST"class = "col-span-2" action="{{ route('review.create') }}">
                                @csrf
                                <input type="hidden" name="colID" value="{{ $collectible->id }}">
                                <input type="hidden" name="ordID" value="{{ $order->id }}">
                                <div class="col-span-2  form-control">
                                    <!-- Your Review textarea -->
                                    <textarea name="review" class="textarea textarea-bordered h-24 bg-white text-black" placeholder="Write your review here"></textarea>
                                </div>
                                <div class="col-span-2 card-actions justify-end">
                                    <button type="submit" class="btn w-full content-center bg-green-500 text-white">Publish</button>
                                </div>
                        </form>

                        @elseif($collectible->pivot->reviewStat == 'rated')
                        <h3 class="font-bold text-lg">Reviewed</h3>
                        @endif

                    </div>
                          {{-- ==================CARDDD==================== --}}


            </div>
            @endforeach
        </div>
    </div>

    <div class="flex justify-center">
        <div class="max-w-xs">
            <div class="label">
                <span class="label-text">Courier</span>
            </div>
            <input type="text" value="{{$courier->name}}" class="input input-bordered w-full bg-white text-black" readonly />

            <div class="label">
                <span class="label-text">Courier Rate</span>
            </div>
            <input type="text" value="{{$courier->rates}}" class="input input-bordered w-full bg-white text-black" readonly />

            <div class="label">
                <span class="label-text">Total Price</span>
            </div>
            <input type="text" value="{{$overTotal + $courier->rates }}" class="input input-bordered w-full bg-white text-black" readonly />
        </div>
    </div>
    @include('common.footer')
</body>
</html>
