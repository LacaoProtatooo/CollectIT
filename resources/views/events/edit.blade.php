<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @vite('resources/css/app.css')
    <title>Edit</title>
    
</head>
<body class="bg-gray-200">
    @include('common.adminheader')

    <div class="mt-4 mb-4">
        <form action="{{route('event.update',$event->id)}}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto ">
        @csrf
            <!-- Title -->
            <div class="relative z-0 w-full mb-5 group">
                <input value="{{$event->title}}" type="text" name="title" id="title" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="title" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
            </div>

            <!-- Details -->
            <div class="relative z-0 w-full mb-5 group">
                <input value="{{$event->details}}"  type="text" name="details" id="details" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="details" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
            </div>

            <!-- Discount Rate -->
            <div class="relative z-0 w-full mb-5 group">
                <input value="{{$event->discount_rate}}"  type="text" name="discount_rate" id="discount_rate" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="discount_rate" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Price</label>
            </div>
  
            {{-- Images images.*--}}
            <div class="image-container">
                @php
                    $imagePaths = explode(',', $event->image_path);
                @endphp
                @foreach($imagePaths as $imagePath)
                    <img class="h-auto max-w-lg" id="uploadedImage" src="{{ asset($imagePath) }}" alt="Property Image">
                @endforeach
            </div>
            <br>

            {{-- Image Upload jpeg,png,jpg,gif--}}
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
            <input name="images[]" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" multiple accept="image/jpeg">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPG. JPEG. PNG. GIF. (MAX. 450px 800px)</p>

            <script>
                const numberInputs = document.querySelectorAll('input[type="number"]');
                numberInputs.forEach(input => {
                    input.addEventListener('input', function() {
                        this.value = this.value.replace(/\D/g, '');
                    });
                });
            </script>

            <script>
                const fileInput = document.getElementById('file_input');
                const uploadedImage = document.getElementById('uploadedImage');
                let currentIndex = 0;

                fileInput.addEventListener('change', handleFileSelect);

                function handleFileSelect() {
                    const files = fileInput.files;

                    if (files.length > 0) {
                        currentIndex = 0; // Reset index on file change
                        showImage(files[currentIndex]);
                    }
                }

                function showImage(file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        uploadedImage.src = e.target.result;
                    };

                    reader.readAsDataURL(file);
                }

                // Handle sliding feature for multiple images
                setInterval(() => {
                    currentIndex = (currentIndex + 1) % fileInput.files.length;
                    showImage(fileInput.files[currentIndex]);
                }, 3000); // Change image every 3 seconds
            </script>

            <script>
                const datepicker = flatpickr("#date-picker", {});
            
                // styling the date picker
                const calendarContainer = datepicker.calendarContainer;
                const calendarMonthNav = datepicker.monthNav;
                const calendarNextMonthNav = datepicker.nextMonthNav;
                const calendarPrevMonthNav = datepicker.prevMonthNav;
                const calendarDaysContainer = datepicker.daysContainer;
            
                calendarContainer.className = `${calendarContainer.className} bg-white p-4 border border-blue-gray-50 rounded-lg shadow-lg shadow-blue-gray-500/10 font-sans text-sm font-normal text-blue-gray-500 focus:outline-none break-words whitespace-normal`;
            
                calendarMonthNav.className = `${calendarMonthNav.className} flex items-center justify-between mb-4 [&>div.flatpickr-month]:-translate-y-3`;
            
                calendarNextMonthNav.className = `${calendarNextMonthNav.className} absolute !top-2.5 !right-1.5 h-6 w-6 bg-transparent hover:bg-blue-gray-50 !p-1 rounded-md transition-colors duration-300`;
            
                calendarPrevMonthNav.className = `${calendarPrevMonthNav.className} absolute !top-2.5 !left-1.5 h-6 w-6 bg-transparent hover:bg-blue-gray-50 !p-1 rounded-md transition-colors duration-300`;
            
                calendarDaysContainer.className = `${calendarDaysContainer.className} [&_span.flatpickr-day]:!rounded-md [&_span.flatpickr-day.selected]:!bg-gray-900 [&_span.flatpickr-day.selected]:!border-gray-900`;
            </script>

            <style>
                .image-container {
                    position: relative;
                    overflow: hidden;
                    max-height: 800px;
                    max-width: 800px;
                }
            </style>
            <br>
            
            <button type="submit" class="text-white bg-indigo-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Submit</button>
        </form>
    </div>

    @include('common.footer')
</body>
</html>