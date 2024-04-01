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

    <div class="hero min-h-screen bg-base-200">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <table class="table bg-cyan-900 justify-center items-center w-full">
                    <thead>
                        <tr>

                            <th>Order ID</th>
                            <th>Status</th>
                            <th>Ship Type</th>
                            <th>Date</th>
                            <th>View Summary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        @foreach ($orders as $order)
                            <tr class="hover">
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->ship_type }}</td>
                                <td>{{ $order->date }}</td>
                                <td>
                                    <form method="POST" action="{{route('myorders.summary')}}">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name = "id" value = "{{  $order->id }}">
                                        <button type="submit" class="btn btn-primary">
                                            View
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

       {{-- @php
           dd($orders);
       @endphp --}}
    </div>
    </div>

    @include('common.footer')
</body>
</html>
