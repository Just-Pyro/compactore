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
            <h3 class="fw-medium pt-3">Add a Voucher</h3>
            <form action="/addVoucher" method="post" class="mt-3 py-3" enctype="multipart/form-data">
                @csrf
                <div class="flex-column">
                    <div class="row">
                        <div class="col">
                            <label for="voucher_code">Enter Code</label>
                            <input name="code" type="text" class="form-control mb-3" placeholder="(e.g. SUMMER20)" required>
                        </div>
                        <div class="col">
                            <label>Type of Voucher:</label>
                            <select name="voucher_type"class="form-select mb-3" required>
                                <option selected hidden>-- --</option>
                                <option value="Percentage">Percentage</option>
                                <option value="Fixed Amount">Fixed Amount</option>
                            </select>
                        </div>
                        <div class="col">
                            <label>Discount Amount</label>
                            <input name="discount_amount" type="number" class="form-control mb-3" placeholder="0.00" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Max Usage Limit:</label>
                            <input name="usage_limit" type="number" class="form-control mb-3" value="1" required>
                        </div>
                        <div class="col">
                            <label>Expiration Date:</label>
                            <input name="expiration" type="date" class="form-control mb-3">
                        </div>
                        <input type="hidden" name="applicable_to" value="shop">
                        {{-- <div class="col">
                            <label>Applicable to:</label>
                            <select name="applicable_to"class="form-select mb-3" required>
                                <option hidden selected>Choose Category or Product</option>
                                <option value="all_products">All Products</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Clothing and Accessories">Clothing and Accessories</option>
                                <option value="Home and Furniture">Home and Furniture</option>
                                <option value="Beauty and Personal Care">Beauty and Personal Care</option>
                                <option value="Sports and Outdoors">Sports and Outdoors</option>
                                <option value="Books, Movies, and Music">Books, Movies, and Music</option>
                                <option value="Toys and Games">Toys and Games</option>
                                <option value="Health and Wellness">Health and Wellness</option>
                                <option value="Jewelry and Watches">Jewelry and Watches</option>
                                <option value="Automotive">Automotive</option>
                                <option value="Art and Collectibles">Art and Collectibles</option>
                                <option value="Pet Supplies">Pet Supplies</option>
                                <option value="Office">Office</option>
                                <option value="School Supplies">School Supplies</option>
                                <option value="Food and Beverages">Food and Beverages</option>
                            </select>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Monthly Distribution Limit:</label>
                            <input placeholder="0" name="monthly_distribution_limit" type="number" class="form-control mb-3" required>
                        </div>
                        <div class="col">
                            <label>Monthly Usage Limit:</label>
                            <input placeholder="0" name="monthly_usage_limit" type="number" class="form-control mb-3" required>
                        </div>
                        <div class="col">
                            <label>Monthly Reset:</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="monthly_reset" id="monthlyResetTrue" value="True">
                                <label class="form-check-label" for="monthlyResetTrue">True</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="monthly_reset" id="monthlyResetFalse" value="False">
                                <label class="form-check-label" for="monthlyResetFalse">False</label>
                            </div>
                        </div>
                        <div class="col">
                            <label>Is Claimable:</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="isClaimable" id="claimableTrue" value="True" required>
                                <label class="form-check-label" for="claimableTrue">True</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="isClaimable" id="claimableFalse" value="False" required>
                                <label class="form-check-label" for="claimableFalse">False</label>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success">Add Voucher</button>
            </form>
        </div>
    </div>
    @include('includes/footer1')
    <script src="/js/ecommerce.js"></script>
</body>
</html>