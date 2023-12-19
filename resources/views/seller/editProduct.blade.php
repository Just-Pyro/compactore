<div class="modal fade" id="editProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/editProduct-ecommerce" id="editProductForm" method="post" class="mt-3 py-3" enctype="multipart/form-data">
                    @csrf
                    @if ($productId != null)
                        <input type="number" name="id" value="{{ $editProduct->id }}" style="display: none;">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 form-floating">
                                    <input type="text" class="form-control" id="productName" placeholder="Product Name" name="productName" value="{{ $editProduct->productName }}" required>
                                    <label for="productName">Product Name</label>
                                </div>
                            </div>
                            <div class="col">
                                <select class="form-select mb-2" name="category" style="height: 58px;" required>
                                    <option selected hidden disabled>Choose Category</option>
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
                            </div>
                        </div>
                        <div class="mb-3 form-floating">
                            <textarea name="description" id="description" placeholder="description" class="form-control" style="height: 200px;" value="{{ $editProduct->description }}" required></textarea>
                            <label for="description">Product Description...</label>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <p class="fw-normal">Stock:</p>
                                    <input name="stock" min="1" type="number" class="form-control" value="{{ $editProduct->stock }}" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <p class="fw-normal">Price:</p>
                                    <input name="price" type="number" step="0.01" class="form-control" value="{{ $editProduct->price }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3"><div class="row"><div class="col-3"><button class="btn btn-danger" type="button" @click="deleteProductImg">delete all product image</button></div><div class="col-3"><p id="deletemessageconfirmation"></p><input type="number" id="deleteproductimg" name="deleteproductimg" value="0" style="display: none;"></div></div></div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-3">
                                    <input type="file" name="productImg[]" class="form-control form-control-sm" multiple accept="image/*" @change="loadImages">
                                    <br>
                                    <p class="fw-normal">leave this blank if you don't want to add more pictures</p>
                                </div>
                                <div class="col overflow-x-auto" style="height: 150px;">
                                    <div class="d-flex flex-row flex-nowrap">
                                        <div v-for="(image, index) in preloadedImages" :key="index" class="me-2">
                                            <img class="img" :src="image.src" alt="Preloaded Image" style="height: 100px; cursor: pointer;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" @click="submitEditProductForm">Save Changes</button>
            </div>
        </div>
    </div>
</div>