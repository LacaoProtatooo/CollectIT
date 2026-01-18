<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])

    <title>Manage Collectibles</title>
</head>
<body class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800">
    @include('common.message')
    @include('common.adminheader')

    {{-- TABLE --}}
    <div class="items-center justify-between mb-10 ml-10 mr-10 mt-10 w-full md:w-auto md:order-1 bg-transparent rounded-lg">
        <div class="flex flex-col justify-end items-end font-medium p-4 md:p-0 mt-0 border border-gray-100 rounded-lg bg-transparent md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            {{-- Add Collectible --}}
            <button onclick="location.href='{{ route('admin.collectible.create') }}';" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">Add Collectible</span>
            </button>
        </div>

        <div class="relative overflow-x-auto shadow-2xl sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-indigo-600">
                <thead class="text-xs text-white uppercase dark:bg-gray-700 dark:text-gray-400 bg-indigo-600">
                    <tr>
                        <th scope="col" class="px-6 py-3">Actions</th>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Price</th>
                        <th scope="col" class="px-6 py-3">Category</th>
                        <th scope="col" class="px-6 py-3">Stock</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Seller</th>
                        <th scope="col" class="px-6 py-3">Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collectibles as $collectible)
                    @php
                        $imagePaths = explode(',', $collectible->image_path);
                    @endphp

                    <tr class="bg-gray-100 {{ $collectible->trashed() ? 'opacity-50' : '' }}">
                        <td class="px-6 py-4">
                            <div class="flex space-x-2">
                                @if($collectible->trashed())
                                    <a href="{{ route('admin.collectible.restore', $collectible->id) }}" class="text-green-500 hover:text-green-700 transition duration-300 ease-in-out">Restore</a>
                                @else
                                    <a href="{{ route('admin.collectible.edit', $collectible->id) }}" class="text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out">Edit</a>
                                    <a href="{{ route('admin.collectible.delete', $collectible->id) }}" class="text-red-500 hover:text-red-700 transition duration-300 ease-in-out" onclick="return confirm('Are you sure you want to delete this collectible?')">Delete</a>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">{{ $collectible->id }}</td>
                        <td class="px-6 py-4">{{ $collectible->name }}</td>
                        <td class="px-6 py-4">₱{{ number_format($collectible->price, 2) }}</td>
                        <td class="px-6 py-4">{{ $collectible->category }}</td>
                        <td class="px-6 py-4">{{ $collectible->stock }}</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 rounded text-white text-xs {{ $collectible->status === 'available' ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ ucfirst($collectible->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">{{ $collectible->users->username ?? 'N/A' }}</td>
                        <td class="px-6 py-4">
                            @if($collectible->image_path)
                                <img src="{{ asset(trim($imagePaths[0])) }}" alt="Collectible Image" style="max-width: 80px; max-height: 80px; object-fit: cover;">
                            @else
                                <span class="text-gray-400">No image</span>
                            @endif
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
