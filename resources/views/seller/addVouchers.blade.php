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
                                <option selected></option>
                                <option value="Percentage">Percentage</option>
                                <option value="Fixed Amount"></option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="fw-normal fs-7">Discount Amount</label>
                            <input name="discount_amount" type="number" class="form-control mb-3" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Max Usage Limit:</label>
                            <input name="usage_limit" type="number" class="form-control mb-3" required>
                        </div>
                        <div class="col">
                            <label>Expiration Date:</label>
                            <input name="expiration" type="date" class="form-control mb-3">
                        </div>
                        <div class="col">
                            <label>Applicable to:</label>
                            <input name="applicable to" type="text" class="form-control mb-3">
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