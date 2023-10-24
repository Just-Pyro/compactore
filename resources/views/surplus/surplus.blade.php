<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surplus | Compactore</title>
    <link rel="stylesheet" href="/customcss/ecommerce.css">
    @include('includes/header1')
</head>
<body>
    @include('includes/header3')
    <div class="container mt-3">
        <h2>Featured Categories</h2>
        <div class="row align-items-center product">
            <div v-for="card in cards" :key="card.id" class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" :class="{ shadow: card.isOn }" @mouseover="toggleShadow(card)" @mouseout="toggleShadow(card)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border" :alt="card.categoryName">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname">@{{card.categoryName}}</p>
                        <p class="card-text text-danger price">@{{card.totalListings}}</p>
                    </div>
                </div>
            </div>
        </div>

        <h3>Newly Listed Houses for sale</h3>
        <div class="row align-items-center product">
            <div v-for="house in houses" :key="house.id" class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" :class="{ shadow: house.isOn }" @mouseover="toggleShadow(house)" @mouseout="toggleShadow(house)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border" :alt="house.detailName">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">@{{house.price}}</p>
                        <p class="card-text price">@{{house.detailName}}</p>
                    </div>
                </div>
            </div>
        </div>

        <h3>Newly Listed Cars for sale</h3>
        <div class="row align-items-center product">
            <div v-for="car in cars" :key="car.id" class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" :class="{ shadow: car.isOn }" @mouseover="toggleShadow(car)" @mouseout="toggleShadow(car)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border" :alt="car.detailName">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">@{{car.price}}</p>
                        <p class="card-text price">@{{car.detailName}}</p>
                    </div>
                </div>
            </div>
        </div>

        <h3>Newly Listed Gadgets for sale</h3>
        <div class="row align-items-center product">
            <div v-for="gadget in gadgets" :key="gadget.id" class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" :class="{ shadow: gadget.isOn }" @mouseover="toggleShadow(gadget)" @mouseout="toggleShadow(gadget)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border" :alt="gadget.detailName">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">@{{gadget.price}}</p>
                        <p class="card-text price">@{{gadget.detailName}}</p>
                    </div>
                </div>
            </div>
        </div>

        <h3>Newly Listed Clothing for sale</h3>
        <div class="row align-items-center product">
            <div v-for="clothing in clothings" :key="clothing.id" class="p-0 col-sm-6 col-lg-4 col-xl-3 my-5 rounded" @click="seeProduct">
                <div class="card mx-2 rounded" :class="{ shadow: clothing.isOn }" @mouseover="toggleShadow(clothing)" @mouseout="toggleShadow(clothing)" style="width: 16rem; height: 18rem; cursor: pointer;">
                    <img style="height:12rem; object-fit:cover;" class="card-img-top rounded-top border" :alt="clothing.detailName">
                    <div class="card-body bg-light rounded-bottom" style="height: 10rem;">
                        <p class="card-title productname fw-bold">@{{clothing.price}}</p>
                        <p class="card-text price">@{{clothing.detailName}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes/footer1')
    <script src="js/surplus.js"></script>
</body>
</html>