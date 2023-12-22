<div class="modal fade" id="selectVoucherModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Apply Voucher</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content m-3 p-2">
                    {{-- each voucher --}}
                    @if ($vouchers->count() > 0)
                        @foreach ($vouchers as $item)
                            <div class="card p-3 mb-3" id="voucherCard">
                                <div class="p-3 text-white position-relative">
                                    <h5 class="fw-medium text-center" style="display: inline-block;">Free<br>Shipping</h5> 
                                    <p class="fw-normal ms-4 text-wrap position-absolute top-0 mb-1" style="display: inline-block; width: 220px;">Discount P{{$item->discount_amount}}</p>
                                    <p class="fw-normal ms-4 text-wrap mb-1" style="display: inline-block; width: 220px;">{{$item->code}}</p>
                                    <p class="fw-normal text-wrap" style="display: inline-block; width: 220px; margin-left: 105px">Min. spend P0</p>
                                </div>
                                <div class="vertical"></div>
                            </div>
                        @endforeach
                    @else
                        <p class="fw-normal text-center">No vouchers created by Compactore.</p>
                    @endif
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Ok</button>
            </div>
        </div>
    </div>
</div>