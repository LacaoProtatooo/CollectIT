
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

    <div class="max-w-screen-xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mx-auto p-4 mt-4 mb-4">
        <div class="overflow-x-auto">
        </div>
    </div>
    @php
    $overTotal = 0;
 @endphp

    <h2 class="card-title">Summary</h2>
    @foreach ($collectibles as $collectible)
    <div class="hero min-h-screen bg-base-200">

        <div class="card-body">
            <label class="form-control w-full max-w-xs">
                <div class="grid grid-cols-2 gap-4">
                    <div class="label">
                        <span class="label-text">Product Name</span>
                    </div>
                    <input type="text" value="{{$collectible->name}}" class="input input-bordered w-full max-w-xs bg-white text-black " readonly />

                    <div class="label">
                        <span class="label-text">Manufacturer</span>
                    </div>
                    <input type="text" value="{{$collectible->manufacturer}}" class="input input-bordered w-full max-w-xs bg-white text-black" readonly />

                    <div class="label">
                        <span class="label-text">Dimension</span>
                    </div>
                    <input type="text" value="{{$collectible->dimension}}" class="input input-bordered w-full max-w-xs bg-white text-black" readonly />

                    <div class="label">
                        <span class="label-text">Price</span>
                    </div>
                    <input type="text" value="{{$collectible->price}}" class="input input-bordered w-full max-w-xs bg-white text-black" readonly />

                    <div class="label">
                        <span class="label-text">Quantity</span>
                    </div>
                    <input type="text" value="{{$collectible->pivot->quantity}}" class="input input-bordered w-full max-w-xs bg-white text-black" readonly />

                    <div class="label">
                        <span class="label-text">Sub Total</span>
                    </div>
                    @php
                        $totalPrice = $collectible->price * $collectible->pivot->quantity;
                        $overTotal += $totalPrice;
                    @endphp
                    <input type="text" value="{{$totalPrice}}" class="input input-bordered w-full max-w-xs bg-white text-black" readonly />
                </div>
            </label>

            @if($collectible->pivot->status == 'toRate')
                <h3 class="font-bold text-lg">Your Review</h3>
                <form method="POST" action="{{ route('review.create') }}">
                    @csrf
                    <input type="hidden" name="colID" value="{{ $collectible->id }}">
                    <input type="hidden" name="ordID" value="{{ $order->id }}">
                    <label class="form-control">
                        <!-- Your Review textarea -->
                        <textarea name="review" class="textarea textarea-bordered h-24 bg-white text-black" placeholder="Write your review here"></textarea>
                    </label>
                    <div class="card-actions justify-end">
                        <button type="submit" class="btn w-full content-center bg-green-500 text-white">Publish</button>
                    </div>
                </form>
                </label>
            @else
                <h3 class="font-bold text-lg">Reviewed</h3>
            @endif


            </div>
        </div>



    </div>
    @endforeach
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
</div>
</body>
</html>
