<div class="modal fade" id="postItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Post Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/postSurplus" method="post" id="postSurplusForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-2">
                                <input name="productName" type="text" class="form-control" id="forTitle" placeholder="Product Title" required>
                                <label for="forTitle">Product Title</label>
                            </div>
                        </div>
                        <div class="col">
                            <select name="condition" class="form-select mb-2" style="height: 58px;" id="condition" required>
                                <option selected hidden>Product Condition</option>
                                <option value="Like new">Like new</option>
                                <option value="Lightly used">Lightly used</option>
                                <option value="Well used">Well used</option>
                                <option value="Heavily Used">Heavily Used</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <p class="fw-normal">Price:</p>
                                <input name="price" type="number" step="0.01" class="form-control" placeholder="0.00" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <p class="fw-normal">Brand:</p>
                                <input name="brand" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-2">
                        <textarea name="description" class="form-control" placeholder="description of product" id="floatingTextarea" style="height: 160px;" required></textarea>
                        <label for="floatingTextarea">Description</label>
                    </div>
                    <input type="file" name="postImg[]" id="postImg" class="form-control form-control-sm" multiple>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button @click="submitPost" type="submit" class="btn btn-primary">Post</button>
            </div>
        </div>
    </div>
</div>