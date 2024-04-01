<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Admin Profile</title>
    
</head>
<body class="">
    @include('common.adminheader')
    @include('common.message')
    
    <!-- USER -->
    <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">
        <div class="mb-4 col-span-full xl:mb-2">
            
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">User Information</h1>
        </div>
        <!-- User Profile Pic -->
        <div class="col-span-full xl:col-auto">
            <div class="p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 dark:bg-gray-800">
                <div class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                    @if(isset($userinfo->image_path) && $userinfo->image_path)
                        <img id="imagePreview" class="mb-6 rounded-lg w-48 h-48 sm:mb-0 xl:mb-6 2xl:mb-0" src="{{ asset($userinfo->image_path) }}" alt="user picture">
                    @else
                        <img id="imagePreview" class="mb-6 rounded-lg w-48 h-48 sm:mb-0 xl:mb-6 2xl:mb-0" src="https://www.svgrepo.com/show/530585/user.svg" alt="user picture">
                    @endif
                    <div>
                        <h3 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white">User: <br>
                            {{$userinfo->username}}
                        </h3>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-span-2">
            <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <h3 class="mb-4 text-xl font-semibold dark:text-white">General information</h3>
                <form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input disabled type="text" value="{{$userinfo->username}}" name="username" id="username" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="name" required>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                            <input type="text" value="{{$userinfo->first_name}}" name="first_name" id="first_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="name" required>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                            <input type="text" value="{{$userinfo->last_name}}" name="last_name" id="last_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="name" required>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                            <input type="text" value="{{$userinfo->address}}" name="address" id="address" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="e.g. 123 Main St, City, State, Zip Code" required>
                        </div>
  
                        <div class="col-span-6 sm:col-span-3">
                            <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                            <input type="text" value="{{$userinfo->phone_number}}" name="phone_number" id="phone_number" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="United States" required>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birthdate</label>
                            <input disabled type="date" value="{{$userinfo->birthdate}}" name="birthdate" id="birthdate" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="e.g. California" required>
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input disabled type="email" value="{{$userinfo->email}}" name="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="example@company.com" required>
                        </div>

                        <!-- New password input fields -->
                        <div id="passwordFields" class="col-span-6 sm:col-span-3 hidden">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                                    <input type="password" value="" name="new_password" id="new_password" class="password-input shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="New Password">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="confirm_new_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm New Password</label>
                                    <input type="password" value="" name="confirm_new_password" id="confirm_new_password" class="password-input shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Confirm New Password">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Save button -->
                        <div class="col-span-6 sm:col-span-3 flex items-center">
                            <button type="submit" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 mr-5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
                                <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">Save</span>
                            </button>

                            <label class="flex items-center">
                                <input type="checkbox" id="changePasswordCheckbox" class="form-checkbox h-5 w-5 text-primary-500">
                                <span class="ml-2 text-sm text-gray-900 dark:text-white">Change Password</span>
                            </label>

                            <label for="imageUpload" class="relative ml-5">
                                <input type="file" name="image" id="imageUpload" class="hidden" accept="image/*" onchange="previewImage(event)">
                                <div class="px-2 py-1 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 cursor-pointer">
                                    Upload Image
                                </div>
                            </label>
                        </div>

                        <script>
                            const newPasswordInput = document.getElementById('new_password');
                            const confirmNewPasswordInput = document.getElementById('confirm_new_password');
                            const passwordMatchMessage = document.createElement('p');
                            passwordMatchMessage.id = 'passwordMatchMessage';
                            passwordMatchMessage.className = 'text-red-500 hidden';
                            passwordMatchMessage.textContent = 'Passwords do not match';
                        
                            confirmNewPasswordInput.after(passwordMatchMessage);
                        
                            function checkPasswords() {
                                if (newPasswordInput.value === confirmNewPasswordInput.value) {
                                    passwordMatchMessage.classList.add('hidden');
                                } else {
                                    passwordMatchMessage.classList.remove('hidden');
                                }
                            }
                        
                            newPasswordInput.addEventListener('input', checkPasswords);
                            confirmNewPasswordInput.addEventListener('input', checkPasswords);
                        </script>

                        <script>
                            function previewImage(event) {
                                const input = event.target;
                                if (input.files && input.files[0]) {
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        document.getElementById('imagePreview').src = e.target.result;
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                        </script>
                        
    
                        <script>
                            const changePasswordCheckbox = document.getElementById('changePasswordCheckbox');
                            const passwordFields = document.getElementById('passwordFields');

                            changePasswordCheckbox.addEventListener('change', function() {
                                if (this.checked) {
                                    passwordFields.classList.remove('hidden');
                                } else {
                                    passwordFields.classList.add('hidden');
                                }
                            });
                        </script>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('common.footer')
</body>
</html>