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
        <div class="flex flex-col justify-end items-end font-medium p-4 md:p-0 mt-0 border border-gray-100 rounded-lg bg-transparent md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            {{-- Add Courier --}}
            <button onclick="location.href='{{ route('courier.create') }}';" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">Add Courier</span>
            </button>
        </div>

        <div class="relative overflow-x-auto shadow-2xl sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-indigo-500">
                <thead class="text-xs text-white uppercase dark:bg-gray-700 dark:text-gray-400 bg-indigo-500">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Update
                        </th>
                        <th scope="col" class="px-6 py-3">
                           Delete
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rates
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Images
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($couriers as $courier)
                    @php
                        $imagePaths = explode(',', $courier->image_path);
                    @endphp
                    
                    <tr class="bg-gray-100">
                        <td class="px-6 py-4">
                            <a href="{{route('courier.edit',$courier->id)}}" class="text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out">Update</a>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('courier.delete',$courier->id)}}" class="text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out">Delete</a>
                        </td>
                        <td class="px-6 py-4">
                            {{ $courier->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $courier->rates }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $courier->type }}
                        </td>

                        <td class="px-6 py-4 flex space-x-2">
                            @foreach($imagePaths as $imagePath)
                                <img src="{{ asset($imagePath) }}" alt="courier Image" style="max-width: 100px; max-height: 150px;">
                            @endforeach      
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