@if ($user)
<div class="row">
    <div class="col-3 p-2">
        <div class="rounded bg-white p-3 text-center">
            @if($profile && $profile->profileImg)
                <div class="d-flex justify-content-center align-items-center mt-4">
                    <img src="{{ asset('uploads/userprofile/' . $profile->profileImg) }}" alt="Profile Image" class="rounded-circle border border-dark" style="height: 100px; width: 100px;">
                </div>
            @else
                <div class="rounded-circle border border-dark mt-4 mx-auto" style="height: 100px; width: 100px;"></div>
            @endif
            <p class="fw-medium m-0">{{ $user->username }}</p>
            <p class="fw-normal">{{ auth()->user()->email }}</p>
        </div>
    </div>
@else
<div class="row">
    <div class="col-3 p-2">
        <div class="rounded bg-white p-3">
            <div class="rounded-circle border border-dark mt-4 mx-auto" style="height: 100px; width: 100px;"></div>
            <p class="fw-medium m-0 text-center">User Name</p>
            <p class="fw-normal text-center">email@email.com</p>
        </div>
    </div>
@endif
@if ($profile)
    <div class="col p-2">
        <div class="rounded bg-white p-3 position-relative">
            <button class="btn btn-sm btn-outline-warning" style="position:absolute; bottom: 10px; right: 10px;" data-bs-toggle="modal" data-bs-target="#openStore">Open Store</button>
            <div class="row">
                <div class="col-6">
                    <form id="formBio" action="saveBio" method="post">
                        @csrf
                        <span class="float-end" id="bioEdit" @click="enableEdit"><i class="fa-regular fa-pen-to-square"></i> Edit</span>
                        <span class="float-end mx-2" id="saveBio" @click="submitBio"><i class="fa-regular fa-circle-check"></i></span>
                        <span class="float-end" id="cancelBio"><i class="fa-regular fa-circle-xmark"></i></span>
                        <p class="fw-normal">Bio</p>
                        <hr>
                        <textarea ref="bioTextarea" name="bio" placeholder="write something ..." cols="30" rows="5" class="form-control bg-dark-subtle mt-2" :disabled="isDisabled">{{ $profile->bio }}</textarea>
                    </form>
                </div>
                <div class="col">
                    <p class="border border-3 border-secondary rounded fw-medium fs-5 text-center mt-4 mb-0">Swap Me</p>
                    <h1 class="my-3 text-center">4.5</h1>
                </div>
                <div class="col">
                    <p class="border border-3 border-secondary rounded fw-medium fs-5 text-center mt-4 mb-0">Surplus</p>
                    <h1 class="my-3 text-center fw-normalf fs-4">no ratings yet</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    <div class="col p-2">
        <div class="rounded bg-white p-3 position-relative">
            <button class="btn btn-sm btn-outline-warning" style="position:absolute; bottom: 10px; right: 10px;" data-bs-toggle="modal" data-bs-target="#openStore">Open Store</button>
            <div class="row">
                <div class="col-6">
                    <form id="formBio" action="saveBio" method="post">
                        @csrf
                        <span class="float-end" id="bioEdit" @click="enableEdit"><i class="fa-regular fa-pen-to-square"></i> Edit</span>
                        <span class="float-end mx-2" id="saveBio" @click="submitBio"><i class="fa-regular fa-circle-check"></i></span>
                        <span class="float-end" id="cancelBio"><i class="fa-regular fa-circle-xmark"></i></span>
                        <p class="fw-normal">Bio</p>
                        <hr>
                        <textarea ref="bioTextarea" name="bio" placeholder="write something ..." cols="30" rows="5" class="form-control bg-dark-subtle mt-2" :disabled="isDisabled"></textarea>
                    </form>
                </div>
                <div class="col">
                    <p class="border border-3 border-secondary rounded fw-medium fs-5 text-center mt-4 mb-0">Swap Me</p>
                    <h1 class="my-3 text-center">4.5</h1>
                </div>
                <div class="col">
                    <p class="border border-3 border-secondary rounded fw-medium fs-5 text-center mt-4 mb-0">Surplus</p>
                    <h1 class="my-3 text-center fw-normalf fs-4">no ratings yet</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@include('modals/openStore')