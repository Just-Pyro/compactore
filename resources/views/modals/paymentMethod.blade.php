<div class="modal fade" id="changePaymentMethodModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Select Payment Method</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content m-3 p-2" v-for="(method, index) in paymentMethods" :key="index">
                    <div class="form-check form-check-inline mb-3">
                        <input type="radio" class="form-check-input" :id="method.value"  :value="method.value" v-model="selectedPaymentMethod" name="payment">
                        <label :for="method.value" class="form-check-label">@{{ method.label}}</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Select</button>
            </div>
        </div>
    </div>
</div>