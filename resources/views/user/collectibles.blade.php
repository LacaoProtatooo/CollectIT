<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Collectibles</title>
</head>
<body>
    @include('common.header')

    <div class = "items-center justify-between mb-10 ml-10 mr-10 mt-10 w-full md:w-auto md:order-1 bg-transparent rounded-lg">
        <div class="flex flex-col justify-end items-end font-medium p-4 md:p-0 mt-0 border border-gray-100 rounded-lg bg-transparent md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 mb-4">
            {{-- Add Collectible --}}
            <a href="{{ route('collectible.create')}}" class="btn btn-outline btn-primary">Add Collectible</a>
            {{-- <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel = "stylesheet">
            <link href = "https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css" rel = "stylesheet">
            <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
            <link href = "https://cdn.datatables.net/2.0.3/js/dataTables.min.js" rel = "stylesheet"> --}}
        </div>


        {{-- COLLECTIBLES TABLE --}}
        <div class="relative overflow-x-auto shadow-2xl sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-white dark:text-gray-400 bg-indigo-500 data-table" >
                <thead class="text-xs text-white uppercase dark:bg-gray-700 dark:text-gray-400 bg-cyan-950">
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
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Dimension
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Condition
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stock
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Manufacturer
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Images
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($collectibles as $collectible)
                    @php
                        $imagePaths = explode(',', $collectible->image_path);
                    @endphp

                    <tr class="">
                        <td class="px-6 py-4">
                            <a href="{{route('collectible.edit',$collectible->id)}}" class="text-white hover:text-blue-700 transition duration-300 ease-in-out">Update</a>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('collectible.delete',$collectible->id)}}" class="text-white hover:text-blue-700 transition duration-300 ease-in-out">Delete</a>
                        </td>

                        <td class="px-6 py-4">
                            {{ $collectible->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $collectible->price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $collectible->dimension }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $collectible->condition }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $collectible->stock }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $collectible->manufacturer }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $collectible->category }}
                        </td>


                       <td class="px-6 py-4 flex space-x-2">
                            @foreach($imagePaths as $imagePath)
                                <img src="{{ asset($imagePath) }}" alt="Property Image" style="max-width: 100px; max-height: 150px;">
                            @endforeach
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <script type = "text/javascript">
            $(function(){
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('collectibles.show') }}"
                    columns: [
                        {data: 'name', name: 'name' },
                        {data: 'price', name: 'price'},
                        {data: 'dimension', name: 'dimension'},
                        {data: 'condition', name: 'condition'},
                        {data: 'stock', name: 'stock'},
                        {data: 'manufacturer', name: 'manufacturer'},
                        {data: 'category', name: 'category'},
                        {data: 'image_path', name: 'image_path'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                })
            })
        </script> --}}


    </div>

    <script>
        function confirmDelete(url) {
            if (window.confirm('Are you sure you want to delete this collectible?')) {
                window.location.href = url; // Redirect to the delete URL if user confirms
            }
        }
    </script>



    @include('common.footer')
</body>
</html>
