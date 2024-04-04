<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Your Purchase</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333333;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 20px;
            color: #666666;
        }
        .thank-you {
            background-color: #f3f3f3;
            padding: 20px;
            border-radius: 5px;
        }
        .thank-you h2 {
            color: #333333;
            margin-bottom: 10px;
        }
        .thank-you p {
            margin-bottom: 10px;
        }
        .signature {
            margin-top: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thank You for Your Purchase!</h1>
        @php
            $user = Auth::user();
            $orders = App\Models\Order::with('user', 'courier', 'collectibles')->first();
        @endphp

            <h2>Order Information</h2>
            <p>Order id: {{ $user->id }}</p>
            <p>Courier: {{ $orders->courier->name }}</p>
            <p>Shipping Cost: {{ $orders->courier->rates }}</p>
            <!-- Add other order details here -->

            <h2>Collectibles</h2>
            <div class="relative overflow-x-auto shadow-2xl sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-indigo-500">
                    <thead class="text-xs text-white uppercase dark:bg-gray-700 dark:text-gray-400 bg-indigo-500">
                        <tr>
                            <th scope="col" class="px-6 py-3">Name</th>
                            <th scope="col" class="px-6 py-3">Description</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                            <th scope="col" class="px-6 py-3">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $subtotal = 0;
                        @endphp
                        @foreach ($orders->collectibles as $collectible)
                        <tr class="bg-gray-100">
                            <td class="px-6 py-4">{{ $collectible->name }}</td>
                            <td class="px-6 py-4">{{ $collectible->description }}</td>
                            <td class="px-6 py-4">{{ $collectible->price }}</td>
                            <td class="px-6 py-4">{{ $collectible->pivot->quantity }}</td>
                            @php
                                $subtotal += $collectible->price * $collectible->pivot->quantity;
                            @endphp
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <h2>
            Subtotal: {{ $subtotal }}
        </h2>
        <h2>
            Total: {{ $subtotal + $orders->courier->rates }}
        </h2>


    <p>If you have any questions or concerns regarding your order, please feel free to contact our customer support team.</p>
    <p class="signature">Best regards,<br>Connect-it!</p>
</div>
</body>
</html>
