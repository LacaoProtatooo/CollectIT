<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])

    <title>Couriers</title>
</head>
<body class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800">
    @include('common.message')
    @include('common.adminheader')

    {{-- TABLE --}}
    <div class = "items-center justify-between mb-10 ml-10 mr-10 mt-10 w-full md:w-auto md:order-1 bg-transparent rounded-lg">


        <div class="relative overflow-x-auto shadow-2xl sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-indigo-500">
                <thead class="text-xs text-white uppercase dark:bg-gray-700 dark:text-gray-400 bg-indigo-500">
                    <tr>

                        <th scope="col" class="px-6 py-3">
                            Order ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Customer Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date Ordered
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Courier Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Shipping Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)


                    <tr class="bg-gray-100">

                        <td class="px-6 py-4">
                            {{ $order->id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->user->first_name . " " . $order->user->last_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->courier->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->ship_type }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $order->status }}
                        </td>

                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('common.footer')
</body>
</html>
