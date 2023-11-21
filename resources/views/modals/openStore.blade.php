<div class="modal fade" id="openStore" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Name Your Store</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/openStore" method="post" id="formOpenStore">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-2">
                                <input name="storeName" type="text" class="form-control" id="forStoreName" placeholder="Store Name">
                                <label for="forStoreName">Store Name</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input name="contact" type="number" class="form-control" id="forContactNumber" placeholder="Contact">
                                <label for="forContactNumber">Contact Number</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" @click="openStore">Open Store</button>
            </div>
        </div>
    </div>
</div>