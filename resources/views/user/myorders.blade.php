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
<table class="table bg-cyan-900 justify-center items-center w-full>
    <!-- head -->
    <thead>
      <tr>
        <th></th>
        <th>Order ID</th>
        <th>Status</th>
        <th>View Summary</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
      <tr class="hover">
        <th>1</th>
        <td>Hot Wheels 2023 Barbie 1956 Corvette Barbie The Movie, Pink</td>
        <td>Delivered</td>
      <td> 
        
      <!-- Open the modal using ID.showModal() method -->
<button class="btn bg-green-500 text-white" onclick="my_modal_1.showModal()">open modal</button>
<dialog id="my_modal_1" class="modal">
  <div class="modal-box h-full bg-cyan-900">
    <h3 class="font-bold text-lg">Summary</h3>
    <label class="form-control w-full max-w-xs">
<div class="grid grid-cols-2 gap-4">
    <div class="label">
        <span class="label-text">Product Name</span>
    </div>
    <input type="text" placeholder="Product Name" class="input input-bordered w-full max-w-xs bg-white text-black" readonly />

    <div class="label">
        <span class="label-text">Manufacturer</span>
    </div>
    <input type="text" placeholder="Manufacturer" class="input input-bordered w-full max-w-xs bg-white text-black" readonly />

    <div class="label">
        <span class="label-text">Dimension</span>
    </div>
    <input type="text" placeholder="Dimension" class="input input-bordered w-full max-w-xs bg-white text-black" readonly />

    <div class="label">
        <span class="label-text">Price</span>
    </div>
    <input type="text" placeholder="Price" class="input input-bordered w-full max-w-xs bg-white text-black" readonly />

    <div class="label">
        <span class="label-text">Courier</span>
    </div>
    <input type="text" placeholder="Courier" class="input input-bordered w-full max-w-xs bg-white text-black" readonly />

    <div class="label">
        <span class="label-text">Courier Rate</span>
    </div>
    <input type="text" placeholder="Courier Rate" class="input input-bordered w-full max-w-xs bg-white text-black" readonly />

    <div class="label">
        <span class="label-text">Total Price</span>
    </div>
    <input type="text" placeholder="Total Price" class="input input-bordered w-full max-w-xs bg-white text-black" readonly />
</div>
</label>
<h3 class="font-bold text-lg">Your Review</h3>
<label class="form-control">
  <div class="label">
  </div>
  <textarea class="textarea textarea-bordered h-24 bg-white text-black" placeholder="Write your review here"></textarea>
  <div class="label">
  <button class="btn btn-wide content-center bg-green-500 text-white">Publish</button>
  </div>
</label>
    <div class="modal-action">
      <form method="dialog">
        <!-- if there is a button in form, it will close the modal -->
        <button class="btn bg-pink-500 text-white">Close</button>
      </form>
    </div>
  </div>
</dialog>
    </td>
    </tbody>
  </table>
</div>
    </div>


    
    @include('common.footer')
</body>
</html>
