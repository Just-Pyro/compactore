<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surplus | Compactore</title>
    <link rel="stylesheet" href="/customcss/ecommerce.css">
    <link rel="stylesheet" href="/customcss/surplus.css">
    @include('includes/header1')
</head>
<body>
    @include('includes/header3')
    <div class="container mt-3">
        <h2>Featured Categories</h2>
        <div class="row align-items-center product">
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeCategory">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(card)" @mouseout="toggleShadow(card)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname">House</p>
                        {{-- <p class="card-text text-danger price"></p> --}}
                    </div>
                </div>
            </div>
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeCategory">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(card)" @mouseout="toggleShadow(card)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname">Cars</p>
                        {{-- <p class="card-text text-danger price"></p> --}}
                    </div>
                </div>
            </div>
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeCategory">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(card)" @mouseout="toggleShadow(card)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname">Gadgets</p>
                        {{-- <p class="card-text text-danger price"></p> --}}
                    </div>
                </div>
            </div>
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeCategory">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(card)" @mouseout="toggleShadow(card)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname">Clothing</p>
                        {{-- <p class="card-text text-danger price"></p> --}}
                    </div>
                </div>
            </div>
        </div>

        <h3>Newly Listed Houses for sale</h3>
        <div class="row align-items-center product">
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(house)" @mouseout="toggleShadow(house)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">P600,000</p>
                        <p class="card-text price">nice house</p>
                    </div>
                </div>
            </div>
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(house)" @mouseout="toggleShadow(house)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">P600,000</p>
                        <p class="card-text price">nice house</p>
                    </div>
                </div>
            </div>
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(house)" @mouseout="toggleShadow(house)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">P600,000</p>
                        <p class="card-text price">nice house</p>
                    </div>
                </div>
            </div>
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(house)" @mouseout="toggleShadow(house)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">P600,000</p>
                        <p class="card-text price">nice house</p>
                    </div>
                </div>
            </div>
        </div>

        <h3>Newly Listed Cars for sale</h3>
        <div class="row align-items-center product">
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(house)" @mouseout="toggleShadow(house)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">P200,000</p>
                        <p class="card-text price">nice car</p>
                    </div>
                </div>
            </div>
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(house)" @mouseout="toggleShadow(house)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">P200,000</p>
                        <p class="card-text price">nice car</p>
                    </div>
                </div>
            </div>
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(house)" @mouseout="toggleShadow(house)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">P200,000</p>
                        <p class="card-text price">nice car</p>
                    </div>
                </div>
            </div>
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(house)" @mouseout="toggleShadow(house)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">P200,000</p>
                        <p class="card-text price">nice car</p>
                    </div>
                </div>
            </div>
        </div>

        <h3>Newly Listed Gadgets for sale</h3>
        <div class="row align-items-center product">
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(house)" @mouseout="toggleShadow(house)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">P20,000</p>
                        <p class="card-text price">nice gadget</p>
                    </div>
                </div>
            </div>
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(house)" @mouseout="toggleShadow(house)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">P20,000</p>
                        <p class="card-text price">nice gadget</p>
                    </div>
                </div>
            </div>
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(house)" @mouseout="toggleShadow(house)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">P20,000</p>
                        <p class="card-text price">nice gadget</p>
                    </div>
                </div>
            </div>
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(house)" @mouseout="toggleShadow(house)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">P20,000</p>
                        <p class="card-text price">nice gadget</p>
                    </div>
                </div>
            </div>
        </div>

        <h3>Newly Listed Clothing for sale</h3>
        <div class="row align-items-center product">
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(house)" @mouseout="toggleShadow(house)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">P1,000</p>
                        <p class="card-text price">nice cloth</p>
                    </div>
                </div>
            </div>
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(house)" @mouseout="toggleShadow(house)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">P1,000</p>
                        <p class="card-text price">nice cloth</p>
                    </div>
                </div>
            </div>
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(house)" @mouseout="toggleShadow(house)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">P1,000</p>
                        <p class="card-text price">nice cloth</p>
                    </div>
                </div>
            </div>
            <div class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" @mouseover="toggleShadow(house)" @mouseout="toggleShadow(house)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">P1,000</p>
                        <p class="card-text price">nice cloth</p>
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

    @include('includes/footer1')
    <script src="js/surplus.js"></script>
</body>
</html>