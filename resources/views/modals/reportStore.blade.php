<div class="modal fade" id="reportStore" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">File a Report</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content m-3 p-2">
                    <form action="/reportStore" method="post" id="reportStoreForm">
                        @csrf
                        <input type="number" name="shopId" value="{{ $shop->id }}" style="display: none;">
                        <input type="number" name="userId" value="{{ $user->id }}" style="display: none;">
                        <textarea id="reportdetails" name="reportdetails" class="form-control" cols="30" rows="5" placeholder="Enter reason for report here..."></textarea>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" @click="submitReportStore">Submit Report</button>
            </div>
        </div>
    </div>
</div>