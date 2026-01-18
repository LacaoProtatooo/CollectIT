<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Edit Collectible - Admin</title>
</head>
<body class="bg-gradient-to-r from-cyan-500 to-blue-500">
    @include('common.message')
    @include('common.adminheader')

    <div class="max-w-2xl mx-auto mt-10 mb-10 p-6 bg-white rounded-lg shadow-xl">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Collectible</h2>
        
        <form action="{{ route('admin.collectible.update', $collectible->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Name -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="name" id="name" value="{{ $collectible->name }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
            </div>

            <!-- Description -->
            <div class="relative z-0 w-full mb-5 group">
                <textarea name="description" id="description" rows="3" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>{{ $collectible->description }}</textarea>
                <label for="description" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <!-- Price -->
                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" step="0.01" name="price" id="price" value="{{ $collectible->price }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="price" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price (₱)</label>
                </div>

                <!-- Stock -->
                <div class="relative z-0 w-full mb-5 group">
                    <input type="number" name="stock" id="stock" value="{{ $collectible->stock }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="stock" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Stock</label>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <!-- Dimension -->
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="dimension" id="dimension" value="{{ $collectible->dimension }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="dimension" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Dimension</label>
                </div>

                <!-- Condition -->
                <div class="relative z-0 w-full mb-5 group">
                    <select name="condition" id="condition" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required>
                        <option value="">Select Condition</option>
                        <option value="New" {{ $collectible->condition == 'New' ? 'selected' : '' }}>New</option>
                        <option value="Like New" {{ $collectible->condition == 'Like New' ? 'selected' : '' }}>Like New</option>
                        <option value="Good" {{ $collectible->condition == 'Good' ? 'selected' : '' }}>Good</option>
                        <option value="Fair" {{ $collectible->condition == 'Fair' ? 'selected' : '' }}>Fair</option>
                        <option value="Poor" {{ $collectible->condition == 'Poor' ? 'selected' : '' }}>Poor</option>
                    </select>
                    <label for="condition" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Condition</label>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <!-- Manufacturer -->
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="manufacturer" id="manufacturer" value="{{ $collectible->manufacturer }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="manufacturer" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Manufacturer</label>
                </div>

                <!-- Category -->
                <div class="relative z-0 w-full mb-5 group">
                    <select name="category" id="category" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required>
                        <option value="">Select Category</option>
                        <option value="Action Figures" {{ $collectible->category == 'Action Figures' ? 'selected' : '' }}>Action Figures</option>
                        <option value="Funko Pop" {{ $collectible->category == 'Funko Pop' ? 'selected' : '' }}>Funko Pop</option>
                        <option value="Gundam" {{ $collectible->category == 'Gundam' ? 'selected' : '' }}>Gundam</option>
                        <option value="Hot Wheels" {{ $collectible->category == 'Hot Wheels' ? 'selected' : '' }}>Hot Wheels</option>
                        <option value="LEGO" {{ $collectible->category == 'LEGO' ? 'selected' : '' }}>LEGO</option>
                        <option value="Trading Cards" {{ $collectible->category == 'Trading Cards' ? 'selected' : '' }}>Trading Cards</option>
                        <option value="Vintage Toys" {{ $collectible->category == 'Vintage Toys' ? 'selected' : '' }}>Vintage Toys</option>
                        <option value="Other" {{ $collectible->category == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                    <label for="category" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Category</label>
                </div>
            </div>

            <!-- Release Date -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="date" name="release_date" id="release_date" value="{{ $collectible->release_date }}" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="release_date" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Release Date</label>
            </div>

            <!-- Status -->
            <div class="relative z-0 w-full mb-5 group">
                <select name="status" id="status" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required>
                    <option value="available" {{ $collectible->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="sold" {{ $collectible->status == 'sold' ? 'selected' : '' }}>Sold</option>
                </select>
                <label for="status" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Status</label>
            </div>

            <!-- Current Images -->
            @if($collectible->image_path)
            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900">Current Images</label>
                <div class="flex flex-wrap gap-2">
                    @php
                        $imagePaths = explode(',', $collectible->image_path);
                    @endphp
                    @foreach($imagePaths as $imagePath)
                        <img src="{{ asset(trim($imagePath)) }}" alt="Current Image" class="w-24 h-24 object-cover rounded border">
                    @endforeach
                </div>
                <p class="mt-1 text-sm text-gray-500">Upload new images to replace existing ones</p>
            </div>
            @endif

            <!-- Image Upload -->
            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="images">Upload New Images</label>
                <input name="images[]" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" id="images" type="file" multiple accept="image/jpeg,image/png,image/jpg,image/gif">
                <p class="mt-1 text-sm text-gray-500">JPG, JPEG, PNG, GIF (Leave empty to keep existing images)</p>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.collectibles.show') }}" class="px-5 py-2.5 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-200">Cancel</a>
                <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">Update Collectible</button>
            </div>
        </form>
    </div>

    @include('common.footer')
</body>
</html>
