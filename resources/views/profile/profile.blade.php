<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
    <link rel="stylesheet" href="/customcss/ecommerce.css">
    @include('includes/header1')
</head>
<body class="bg-body-secondary">
    @include('includes/header2')
    <div class="container" id="forProfile">
        {{-- User Pic and Bio --}}
        @include('profile/upperProfile')

        {{-- side tabs and content --}}
        <div class="row">
            {{-- side tabs --}}
            <div class="col-3 p-2">
                <div class="rounded bg-white p-3">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a href="{{ url('/profile') }}" class="nav-link fs-5 fw-medium active">
                                My Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/ecommerceProfile') }}" class="nav-link fs-5 fw-medium link-dark">
                                E-commerce
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/swapProfile') }}" class="nav-link fs-5 fw-medium link-dark">
                                Swap Me
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/surplusProfile') }}" class="nav-link fs-5 fw-medium link-dark">
                                Surplus
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{-- content --}}
            <div class="col p-2">
                <div class="rounded bg-white p-3">
                    {{-- head tabs --}}
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="{{ url('/profile') }}" class="nav-link active">Profile</a>
                        </li>
                        <li class="nav-item">
                            <span data-bs-toggle="modal" data-bs-target="#changeAddressModal" class="nav-link link-dark" style="cursor: pointer;">Delivery Addresses</span>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ url('/changePassword') }}" class="nav-link link-dark">Change Password</a>
                        </li> --}}
                    </ul>

                    {{-- content for each tabs --}}
                    @if ($profile)
                    <div class="row">
                        <div class="col-7">
                            <form action="/create-updateProfile" method="post" class="mt-4">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input name="username" type="text" class="form-control" id="username" placeholder="BrandonUser" value="{{ $profile->username }}" disabled>
                                    <label for="username">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="fullname" type="text" class="form-control" id="fullname" placeholder="Brandon" value="{{ $profile->fullname }}">
                                    <label for="fullname">FullName</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="email" type="email" class="form-control" id="email" placeholder="user@email.com" value="{{ auth()->user()->email }}" disabled>
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="phoneNumber" type="number" class="form-control" id="phoneNumber" placeholder="phoneNumber" value="{{ $profile->phoneNumber }}">
                                    <label for="phoneNumber">Phone Number</label>
                                </div>
                                <div>
                                    <h6 class="fw-normal">Gender</h6>
                                    <div class="form-check form-check-inline mb-3">
                                        <input type="radio" class="form-check-input" id="genderMale" placeholder="Male" value="Male" name="radioGender" {{ $profile->gender === 'Male' ? 'checked' : '' }}>
                                        <label for="genderMale" class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-3">
                                        <input type="radio" class="form-check-input" id="genderFemale" placeholder="Female" value="Female" name="radioGender" {{ $profile->gender === 'Female' ? 'checked' : '' }}>
                                        <label for="genderFemale" class="form-check-label">Female</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="fw-normal">Date of Birth</h6>
                                    <input type="date" name="birthdate" id="bday" class="form-control" value="{{ $profile->birthdate }}">
                                </div>
                                <button type="submit" class="btn btn-success">Save Changes</button>
                            </form>
                        </div>
                        <div class="col">
                            @if($profile->profileImg)
                                <div class="d-flex justify-content-center align-items-center mt-4">
                                    <img v-if="imagePreview" :src="imagePreview" alt="Profile Image" class="rounded-circle border border-dark" style="height: 100px; width: 100px; object-fit: cover;">
                                    <img v-else src="{{ asset('uploads/userprofile/' . $user->profile->profileImg) }}" alt="Profile Image" class="rounded-circle border border-dark" style="height: 100px; width: 100px; object-fit: cover;">
                                </div>
                            @else
                                <div v-if="imagePreview" class="d-flex justify-content-center align-items-center mt-4">
                                    <img :src="imagePreview" alt="Profile Image" class="rounded-circle border border-dark" style="height: 100px; width: 100px;">
                                </div>
                                <div v-else class="rounded-circle border border-dark mt-4 mx-auto" style="height: 100px; width: 100px;"></div>
                            @endif
                            <form action="/create-updateProfilePic" method="POST" enctype="multipart/form-data" class="mt-3">
                                @csrf
                                <div class="mb-3">
                                    <label for="changeProfilePic" class="form-label">Change Profile Picture</label>
                                    <input class="form-control form-control-sm" id="changeProfilePic" type="file" name="profilePic" @change="previewImage">
                                </div>
                                <button type="submit" class="btn btn-outline-success">Save Picture</button>
                            </form>
                        </div>
                    </div> 
                    @else
                    <div class="row">
                        <div class="col-7">
                            <form action="/create-updateProfile" method="post" class="mt-4">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input name="username" type="text" class="form-control" id="username" placeholder="BrandonUser" disabled>
                                    <label for="username">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="fullname" type="text" class="form-control" id="fullname" placeholder="Brandon">
                                    <label for="fullname">FullName</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="email" type="email" class="form-control" id="email" placeholder="user@email.com" value="{{ auth()->user()->email }}" disabled>
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="phoneNumber" type="number" class="form-control" id="phoneNumber" placeholder="phoneNumber">
                                    <label for="phoneNumber">Phone Number</label>
                                </div>
                                <div>
                                    <h6 class="fw-normal">Gender</h6>
                                    <div class="form-check form-check-inline mb-3">
                                        <input type="radio" class="form-check-input" id="genderMale" placeholder="Male" value="Male" name="radioGender">
                                        <label for="genderMale" class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-3">
                                        <input type="radio" class="form-check-input" id="genderFemale" placeholder="Female" value="Female" name="radioGender">
                                        <label for="genderFemale" class="form-check-label">Female</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="fw-normal">Date of Birth</h6>
                                    <input type="date" name="birthdate" id="bday" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-success">Save Changes</button>
                            </form>
                        </div>
                        <div class="col">
                            <div v-if="imagePreview" class="d-flex justify-content-center align-items-center mt-4">
                                <img :src="imagePreview" alt="Profile Image" class="rounded-circle border border-dark" style="height: 100px; width: 100px;">
                            </div>
                            <div v-else class="rounded-circle border border-dark mt-4 mx-auto" style="height: 100px; width: 100px;"></div>
                            <form action="/create-updateProfilePic" method="POST" enctype="multipart/form-data" class="mt-3">
                                @csrf
                                <div class="mb-3">
                                    <label for="changeProfilePic" class="form-label">Change Profile Picture</label>
                                    <input class="form-control form-control-sm" id="changeProfilePic" type="file" name="profilePic" @change="previewImage">
                                </div>
                                <button type="submit" class="btn btn-outline-success">Save Picture</button>
                            </form>
                        </div>
                    </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
    @include('modals/changeDeliveryAddress')
    @include('includes/footer1')
    @if ($addressId != null)
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Get the modal element
                var myModal = new bootstrap.Modal(document.getElementById('editAddressModal'));

                // Show the modal
                myModal.show();
            });
        </script>
    @endif
    
    @if ($addressUpdated != null)
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get the modal element
            var myModal = new bootstrap.Modal(document.getElementById('changeAddressModal'));

            // Show the modal
            myModal.show();
        });
    </script>
    @endif
    <script src="/js/ecommerce.js"></script>
    {{-- <script src="/js/profile.js"></script>s --}}
</body>
</html>