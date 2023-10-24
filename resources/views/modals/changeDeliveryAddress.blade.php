<!-- Modal for Changing Address -->
<div class="modal fade" id="changeAddressModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Shipping Address</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#addAddressModal"><i class="fa-solid fa-plus"></i> Add</button>
                <div class="content m-3 p-2 row border border-info-subtle shadow-sm">
                    {{-- each address --}}
                    <div class="col-4 form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            User Full Name
                        </label>
                    </div>
                    <div class="col">
                        <p class="mb-0">contact number</p>
                        <p class="mb-0">address + zipcode</p>
                        <p class="mb-0">additional address info</p>
                    </div>
                    <div class="col-1">
                        <span id="editAddress" data-bs-toggle="modal" data-bs-target="#editAddressModal" class="align-self-center">Edit</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Ok</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal for Editing Address --}}
<div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Address</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="forFullName" placeholder="Pres Nacua">
                                <label for="forFullName">Full Name</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control" id="forContactNumber" placeholder="09159154578">
                                <label for="forContactNumber">Contact Number</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="province">Province</label>
                            <select class="form-select mb-2" id="province">
                                <option selected>Choose</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="municipality">City/Municipality</label>
                            <select class="form-select mb-2" id="municipality">
                                <option selected>Choose</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="barangay">Barangay</label>
                            <select class="form-select mb-2" id="barangay">
                                <option selected>Choose</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="number" class="form-control" id="postalCode" placeholder="6014">
                        <label for="postalCode">Postal Code</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="detailedAddress" placeholder="front of CPC">
                        <label for="detailedAddress">Detailed Address Info</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-target="#changeAddressModal" data-bs-toggle="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal for Adding Address --}}
<div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Delivery Address</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-2">
                                <input type="text" class="form-control" id="forFullName" placeholder="Pres Nacua">
                                <label for="forFullName">Full Name</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-2">
                                <input type="number" class="form-control" id="forContactNumber" placeholder="09159154578">
                                <label for="forContactNumber">Contact Number</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="province">Province</label>
                            <select class="form-select mb-2" id="province">
                                <option selected>Choose</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="municipality">City/Municipality</label>
                            <select class="form-select mb-2" id="municipality">
                                <option selected>Choose</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="barangay">Barangay</label>
                            <select class="form-select mb-2" id="barangay">
                                <option selected>Choose</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="number" class="form-control" id="postalCode" placeholder="6014">
                        <label for="postalCode">Postal Code</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="detailedAddress" placeholder="front of CPC">
                        <label for="detailedAddress">Detailed Address Info</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-target="#changeAddressModal" data-bs-toggle="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>