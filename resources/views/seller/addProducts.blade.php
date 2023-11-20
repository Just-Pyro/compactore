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
    <div class="container bg-light rounded mt-5 shadow">
        <div class="m-3 flex-column">
            <h3 class="fw-medium pt-3">Add Product</h3>
            <form action="" class="mt-3 py-3" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="mb-3 form-floating">
                            <input type="text" class="form-control" id="productName" placeholder="Product Name" name="productName" required>
                            <label for="productName">Product Name</label>
                        </div>
                    </div>
                    <div class="col">
                        <select class="form-select mb-2" style="height: 58px;" required>
                            <option selected>Choose Category</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 form-floating">
                    <textarea name="description" id="description" placeholder="description" class="form-control" style="height: 200px;" required></textarea>
                    <label for="description">Product Description...</label>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <input name="stock" min="1" type="number" class="form-control" value="1" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <input name="price" type="number" step="0.01" class="form-control" value="0.00" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-3">
                            <input type="file" name="productImg[]" class="form-control form-control-sm" multiple accept="image/*" @change="loadImages">
                        </div>
                        <div class="col overflow-x-auto" style="height: 150px;">
                            <div class="d-flex flex-row flex-nowrap">
                                <div v-for="(image, index) in preloadedImages" :key="index" class="me-2">
                                    <img :src="image.src" alt="Preloaded Image" style="height: 100px;">
                                    {{-- <p class="mt-1">{{ fileName(index) }}</p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success">Add Product</button>
            </form>
        </div>
    </div>
    @include('includes/footer1')
    <script src="/js/ecommerce.js"></script>
</body>
</html>