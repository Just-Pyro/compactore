<div class="modal fade" id="reportPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">File a Report</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content m-3 p-2">
                    <form action="/reportPost" id="reportPostForm">
                        <input type="number" name="postId" value="{{ $post->id }}" style="display: none;">
                        <textarea name="reportdetails" cols="30" rows="10"></textarea>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" @click="submitPostStore" data-bs-dismiss="modal">Submit Report</button>
            </div>
        </div>
    </div>
</div>