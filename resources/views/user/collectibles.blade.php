<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <title>Collectibles</title>

    <!-- Custom CSS -->
    <style>
        body {
            background-color: white; /* Set background color to white */
        }
    </style>
</head>
<body>
    @include('common.header')

    <div class="items-center justify-between mb-10 ml-10 mr-10 mt-10 w-full md:w-auto md:order-1 bg-transparent rounded-lg">
        <div class="flex flex-col justify-end items-end font-medium p-4 md:p-0 mt-0 border border-gray-100 rounded-lg bg-transparent md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 mb-4">
            {{-- Add Collectible --}}
            <a href="{{ route('collectible.create')}}" class="btn btn-outline btn-primary">Add Collectible</a>
            {{-- <link href = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel = "stylesheet">
            <link href = "https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css" rel = "stylesheet">
            <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
            <link href = "https://cdn.datatables.net/2.0.3/js/dataTables.min.js" rel = "stylesheet"> --}}
        </div>


        {{-- COLLECTIBLES TABLE --}}
        <table id="artworkTable" class="table table-bordered table-hover">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Dimension</th>
                    <th>Condition</th>
                    <th>Stock</th>
                    <th>Manufacturer</th>
                    <th>Category</th>
                    <th>Images</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($collectibles as $collectible)
                    @php
                        $imagePaths = explode(',', $collectible->image_path);
                    @endphp
                    <tr>
                        <td>{{ $collectible->name }}</td>
                        <td>{{ $collectible->price }}</td>
                        <td>{{ $collectible->dimension}}</td>
                        <td>{{ $collectible->condition }}</td>
                        <td>{{ $collectible->stock }}</td>
                        <td>{{ $collectible->manufacturer }}</td>
                        <td>{{ $collectible->category }}</td>
                        <td>
                            @foreach($imagePaths as $imagePath)
                                <img src="{{ asset($imagePath) }}" alt="Property Image" style="max-width: 100px; max-height: 150px;">
                            @endforeach
                        </td>
                        <td class="text-center">
                            <a href="{{ route('collectible.edit', $collectible->id) }}" class="btn btn-sm btn-primary me-2"><i class="fas fa-edit"></i> Edit</a>
                            @if ($collectible->trashed())
                                {{-- Restore button --}}
                                <form method="POST" action="">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="uppercase bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md">
                                        Restore
                                    </button>
                                </form>
                            @else
                                {{-- Delete button --}}
                                <form method="POST" action="">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="uppercase bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-md">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function() {
            $('#artworkTable').DataTable();
        });
    </script>

    @include('common.footer')
</body>
</html>
