<div class="modal fade" id="postItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Post Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="forProductName" placeholder="Product Name">
                                <label for="forProductName">Product Name</label>
                            </div>
                        </div>
                        <div class="col">
                            <select class="form-select mb-2" id="category">
                                <option selected>Choose Category</option>
                                <option value="1">SmartPhone</option>
                                <option value="2">Laptop</option>
                                <option value="3">Clothing</option>
                                <option value="4">Cycling, Skaters & Scooters</option>
                                <option value="5">MotoCycles</option>
                                <option value="6">Automobiles</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="description of product" id="floatingTextarea" style="height: 160px;"></textarea>
                        <label for="floatingTextarea">Description</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Post</button>
            </div>
        </div>
    </div>
</div>