<div class="modal fade" id="reviewUserSurplus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add a review to user</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content m-3 p-2">
                    <form action="/userReviewSurplus" method="post" id="userReviewSurplus">
                        @csrf
                        <input type="number" name="otherUserId" value="{{ $otherUser->id }}" style="display: none;">
                        {{-- <input type="number" name="userId" value="{{ $user->id }}" style="display: none;"> --}}
                        <textarea id="userReviewDetail" name="reviewDetails" class="form-control" cols="30" rows="5" placeholder="Give your review here"></textarea>
                        <p>Give stars: </p>
                        <div class="stars">
                            <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                            <label class="star star-1" for="star-1"></label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" @click="submitUserReviewSurplus">Submit Report</button>
            </div>
        </div>
    </div>
</div>