<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surplus | Product Page</title>
    <link rel="stylesheet" href="/customcss/ecommerce.css">
    <link rel="stylesheet" href="/customcss/surplus.css">
    @include('includes/header1')
</head>
<body>
    @include('includes/header3')
    @if ($product)
        
    <div class="container mt-3 shadow-lg rounded">
        <div class="d-flex flex-column">
            <div class="row flex-nowrap py-3 px-2 overflow-x-auto">
                @foreach ($images as $image)
                    @if($image)
                        <div class="col-4 p-1" style=" background: white">
                            <img src="{{ asset($image->file_path.$image->file_name) }}" alt="sampleImage" class="border" style="width: 400px; height: 400px; object-fit: contain;border: solid 1px;">
                        </div>
                    @else
                        <div class="col-4 p-1" style=" background: white">
                            <img src="{{ asset('/compactoreCircleFav.png') }}" alt="sampleImage" class="border" style="width: 400px; height: 400px; object-fit: contain;border: solid 1px;">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="row mb-3" style="background: white;">
            <div class="col-8 p-1" style=" background: white">
                <div class="d-flex flex-column">
                    <div class="p-3">
                        <h5 class="fw-normal mb-0">{{ $product->productName }}</h5>
                    </div>
                    <div class="p-3">
                        <h4 class="fw-semibold mb-0">{{ $product->price }}.00</h4>
                        <hr>
                    </div>
                    <div class="row p-2">
                        <div class="d-flex flex-column mb-3" style="background: white;">
                            <div class="p-2">
                                <h5 class="fw-medium">Product Condition</h5>
                                <p class="fw-medium mb-1">{{ $product->condition }}</p>
                                <p class="fw-normal">{{ $conditionDesc }}</p>

                            </div>
                            <div class="p-2">
                                <h5 class="fw-medium">Description</h5>
                                <div class="row">
                                    <div class="col-4">
                                        <p class="fw-normal d-block mb-1 text-body-secondary">Posted</p>
                                        <p class="fw-normal d-block mb-3 text-body-secondary">Date</p>
                                    </div>
                                    <div class="col-4">
                                        <p class="fw-normal d-block mb-1 text-body-secondary">Brand/Model</p>
                                        <p class="fw-normal d-block mb-3 text-body-secondary">{{ $product->brand }}</p>
                                    </div>
                                </div>
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="p-2">
                                <h5 class="fw-medium">Meet-up</h5>
                                <h5 class="fw-normal"><i class="fa-solid fa-location-dot"></i> {{ $product->location }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 p-1">
                <div class="card rounded mt-3 mx-3 shadow-sm">
                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-3">
                                @if (isset($profile->profileImg))
                                    <img class="rounded-circle" src="{{ asset('/uploads/userprofile/'.$profile->profileImg)}}" alt="userProfile" style="height:70px; width:70px; border: solid 1px; object-fit:contain;">
                                @else
                                    <div class="rounded-circle" style="height:70px; width:70px; border: solid 1px;"></div>
                                @endif
                            </div>
                            <div class="col">
                                <a href="{{ url('/surplusProfile', ["profile" => $profile->user_id]) }}" class="userNameSurplus">
                                    @if (isset($profile->username))
                                    {{ $profile->username }}
                                    @else
                                    no username
                                    @endif
                                </a>
                                @if (isset($profile->phoneNumber))
                                    <p class="fw-normal mt-3">{{ $profile->phoneNumber }} <i class="fa-solid fa-phone"></i><span class="fw-medium"> call number</span></p>
                                @else
                                    <p class="fw-normal mt-3">no number added. <i class="fa-solid fa-phone"></i><span class="fw-medium"> call number</span></p>
                                @endif
                            </div>
                            {{-- <div class="d-grid my-3">
                                <button class="btn btn-outline-dark">Chat with Seller</button>
                            </div> --}}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    {{-- Post Item --}}
    <div class="border shadow-sm rounded p-2" id="postBtn" data-bs-toggle="modal" data-bs-target="#postItem">
        <img src="{{ url('images/otherIcons/writePostIcon.png') }}" alt="postIcon" id="postIcon">
        Post Surplus
    </div>

    {{-- Modal for posting item form in surplus --}}
    @include('modals/postItemSurplus')

    @endif

    @include('includes/footer1')
    <script src="/js/surplus.js"></script>
</body>
</html>