<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/customcss/seller.css">
    @include('includes/header1')
</head>
<body class="bg-dark-subtle">
    @include('includes/header5seller')
    <div class="container bg-light mt-5 rounded shadow">
        <div class="m-3 flex-column">
            <h3 class="fw-medium pt-3">My Products</h3>
            <div class="table-responsive table-bordered table-sm mt-3 py-3">
                <table class="table table-striped table-hover">
                    <thead class="bg-light">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Description</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($products->isNotEmpty())
                            @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    @if ($mediaFiles->has($product->id) && $mediaFiles[$product->id]->isNotEmpty())
                                        <td>
                                            <img style="height:100px; width:100px; object-fit: cover;" src="{{ asset($mediaFiles[$product->id][0]->file_path . $mediaFiles[$product->id][0]->file_name) }}" alt="First Media">
                                        </td>
                                    @else
                                        <td><p>No images for this product</p></td>
                                    @endif
                                    <td>{{ $product->productName }}</td>
                                    <!-- Add other columns as needed -->
                                    <td>{{ $product->category }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <form action="/deleteProduct-ecommerce" method="post">@csrf <input type="number" name="id" value="{{ $product->id }}" style="display: none;"><button type="submit" class="btn btn-danger m-1">delete</button></form>
                                        <form action="/gotoeditProduct-ecommerce" method="get">@csrf <input type="number" name="id" value="{{ $product->id }}" style="display: none;"><button type="submit" class="btn btn-info m-1">edit</button></form>
                                        {{-- <button class="btn btn-info m-1" data-bs-toggle="modal" data-bs-target="#editProduct">edit</button> --}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <p>No products added yet.</p>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($productId != null)
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Get the modal element
                var myModal = new bootstrap.Modal(document.getElementById('editProduct'));

                // Show the modal
                myModal.show();
            });
        </script>
    @endif

    @include('seller/editProduct')
    @include('includes/footer1')
    <script src="/js/ecommerce.js"></script>
</body>
</html>