<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Cart</title>
</head>
<body class="">

    @include('common.header')

    <div class="hero min-h-screen bg-transparent">
  <div class="hero-content flex-col lg:flex-row-reverse">

  <div class="bg-cyan-900">
<table class="table bg-cyan-800 text-center">
    <!-- head -->
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- row 1 -->
        <tr class="hover:bg-cyan-900">
            <th>1</th>
            <td>Cy Ganderton</td>
            <td>2000</td>
            <td>
                1
                <div class="carousel">
                    <button class="btn bg-red-700 hover text-white border-r-4 mr-1 btn-xs" onclick="changeQuantity(this, '+')">+</button>
                    <button class="btn bg-red-700 hover text-white border-r-4 mr-1 btn-xs" onclick="changeQuantity(this, '-')">-</button>
                </div>
            </td>
            <td><button class="btn bg-red-700 hover w-16 text-white border-r-4 mr-4">Delete</button></td>
        </tr>
        <!-- row 2 -->
        <tr class="hover:bg-cyan-900">
            <th>2</th>
            <td>Hart Hagerty</td>
            <td>3000</td>
            <td>
                1
                <div class="carousel">
                    <button class="btn bg-red-700 hover text-white border-r-4 mr-1 btn-xs" onclick="changeQuantity(this, '+')">+</button>
                    <button class="btn bg-red-700 hover text-white border-r-4 mr-1 btn-xs" onclick="changeQuantity(this, '-')">-</button>
                </div>
            </td>
            <td><button class="btn bg-red-700 hover w-16 text-white border-r-4 mr-4">Delete</button></td>
        </tr>
    </tbody>
    <!-- subtotal -->
    <tfoot>
        <tr class=" text-white text-2xl text-opacity-50">
            <td colspan="2"></td>
            <td>Subtotal:</td>
            <td>$100</td> <!-- Replace with your actual subtotal calculation -->
        </tr>
    </tfoot>
</table>
</div>

    <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-cyan-900">
    <form class="card-body bg-cyan-900 rounded-md">
        <div class="form-control">
            <label class="label">
                <span class="label-text">Email</span>
            </label>
            <input type="email" placeholder="Email" class="input input-bordered" required />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Address</span>
            </label>
            <input type="Address" placeholder="Address" class="input input-bordered" required />
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Courier</span>
            </label>
            <select class="select select-bordered">
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
            </select>
        </div>
        <div class="form-control mt-6">
            <button class="btn btn-primary">Login</button>
        </div>
    </form>
    <div class="text-center m-4 bg-cyan-900">
        <h2 class=" text-2xl">Total Price: $PLACEHOLDER$</h2>
    </div>
    </div>
  </div>
</div>

    @include('common.footer')
</body>
</html>
