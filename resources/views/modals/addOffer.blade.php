<div class="modal fade" id="OfferItem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Offer Item</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/addOffer" method="post" id="addOfferForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-2">
                                <input name="itemName" type="text" class="form-control" id="forTitle" placeholder="Post Title">
                                <label for="forTitle">Item Name</label>
                            </div>
                        </div>
                        @if (isset($offerPost))
                            <input type="number" name="postId" value="{{ $offerPost['id'] }}" style="display:none;">
                        @endif
                        {{-- <div class="col">
                            <select name="category" class="form-select mb-2" style="height: 58px;" id="category">
                                <option selected hidden>Choose Category</option>
                                <option value="1">SmartPhone</option>
                                <option value="2">Laptop</option>
                                <option value="3">Clothing</option>
                                <option value="4">Cycling, Skaters & Scooters</option>
                                <option value="5">MotoCycles</option>
                                <option value="6">Automobiles</option>
                            </select>
                        </div> --}}
                    </div>
                    <div class="form-floating mb-2">
                        <textarea name="description" class="form-control" placeholder="description of product" id="description" style="height: 160px;"></textarea>
                        <label for="floatingTextarea">Description</label>
                    </div>
                    <input type="file" name="postImg" id="postImg" class="form-control form-control-sm">
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button @click="submitOffer" type="submit" class="btn btn-primary">AddOffer</button>
            </div>
        </div>
    </div>
</div>