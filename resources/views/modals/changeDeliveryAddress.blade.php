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
                @foreach ($address as $item => $deliveryAddress)
                    <div class="content m-3 p-2 row border border-info-subtle shadow-sm">
                        {{-- each address --}}
                        <div class="col-4 form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                {{ $deliveryAddress['fullname'] }}
                            </label>
                        </div>
                        <div class="col">
                            <p class="mb-0">{{ $deliveryAddress['contact'] }}</p>
                            <p class="mb-0">{{ $deliveryAddress['province'] }}, {{ $deliveryAddress['city'] }}, {{ $deliveryAddress['barangay'] }}, {{ $deliveryAddress['postal'] }}</p>
                            <p class="mb-0">{{ $deliveryAddress['detailed_address'] }}</p>
                        </div>
                        <div class="col-1">
                            <span id="editAddress"  class="align-self-center edit-address" @click="editAddress({{ $deliveryAddress['id'] }})">Edit</span>
                            {{-- {{ "<script>var id = '$id[]';</script>" }} --}}
                            {{-- data-bs-toggle="modal" data-bs-target="#editAddressModal" --}}
                        </div>
                    </div>
                @endforeach
                
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
                {{-- @php
                    dump($addressId['id']);
                @endphp --}}
            @if ($addressId != null)

                @foreach ($address as $item => $deliveryAddress)
                    @if($addressId['id'] == $deliveryAddress['id'])
                        <form action="/editDeliveryAddress" method="post" id="editAddressForm">
                            @csrf
                            <input name="id" type="number" value="{{ $deliveryAddress['id'] }}" style="display:none;">
                            <div class="row">
                                <div class="col">
                                    <div class="form-floating mb-2">
                                        <input name="fullname" type="text" class="form-control" id="forFullName" placeholder="Pres Nacua" value="{{ $deliveryAddress['fullname'] }}" required>
                                        <label for="forFullName">Full Name</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-floating mb-2">
                                        <input name="contact" type="number" class="form-control" id="forContactNumber" placeholder="09159154578" value="{{ $deliveryAddress['contact'] }}" required>
                                        <label for="forContactNumber">Contact Number</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="province">Province</label>
                                    <select name="province" class="form-select mb-2" id="province" required>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="municipality">City/Municipality</label>
                                    <select name="city" class="form-select mb-2" id="city" required>
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="form-floating">
                                        <input type="text" name="barangay" class="form-control" id="barangayEdit" placeholder="barangay" value="{{ $deliveryAddress['barangay'] }}" required>
                                        <label for="barangayEdit">Type your Barangay here</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-2">
                                <input name="postal" type="text" class="form-control" id="postalCode" placeholder="6014" value="{{ $deliveryAddress['postal'] }}" required>
                                <label for="postalCode">Postal Code</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input name="details" type="text" class="form-control" id="detailedAddress" placeholder="front of CPC" value="{{ $deliveryAddress['detailed_address'] }}" required>
                                <label for="detailedAddress">Detailed Address Info</label>
                            </div>
                        </form>
                    @endif
                @endforeach

            @endif
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-target="#changeAddressModal" data-bs-toggle="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" @click="editDeliveryAddress">Save</button>
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
                <form action="/addDeliveryAddress" method="post" id="addAddress">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-2">
                                <input name="fullname" type="text" class="form-control" id="forFullName" placeholder="Pres Nacua" required>
                                <label for="forFullName">Full Name</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-2">
                                <input name="contact" type="text" class="form-control" id="forContactNumber" placeholder="09159154578" required>
                                <label for="forContactNumber">Contact Number</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="province">Province</label>
                            <select name="province" class="form-select mb-2" id="provinceAdd" required>
                            </select>
                        </div>
                        <div class="col">
                            <label for="municipality">City/Municipality</label>
                            <select name="city" class="form-select mb-2" id="cityAdd" required>
                            </select>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" name="barangay" class="form-control" id="barangayAdd" placeholder="barangay" required>
                                <label for="barangayAdd">Type your Barangay here</label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-floating mb-2">
                        <input name="postal" type="text" class="form-control" id="postalCode" placeholder="6014" required>
                        <label for="postalCode">Postal Code</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input name="details" type="text" class="form-control" id="detailedAddress" placeholder="front of CPC" required>
                        <label for="detailedAddress">Detailed Address Info</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-target="#changeAddressModal" data-bs-toggle="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" @click="submitDeliveryAddress">Save</button>
            </div>
        </div>
    </div>
</div>