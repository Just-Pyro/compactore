<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Name of product</title>
    <link rel="stylesheet" href="/customcss/ecommerce.css">
    @include('includes/header1')
</head>
<body  style="background: lightgray">
    @include('includes/header2')
    <div class="container py-3">
        <div class="d-flex flex-column">
            <div class="row py-3">
                <div class="col-4 p-1" style=" background: white">
                    <div class="m-3" style="width: 400px; height: 400px; border: solid 1px;">sampleImage</div>
                    {{-- <img src="" alt="sampleImage" style="width: 450px; height: 450px"> --}}
                </div>
                <div class="col-8 p-1" style=" background: white">
                    <div class="d-flex flex-column">
                        <div class="p-2">
                            <h5>This is the Product Name</h5>
                        </div>
                        <div>
                            <div class="d-flex">
                                <div class="m-2">star</div>
                                <div class="m-2">rating</div>
                                <div class="m-2">sold</div>
                            </div>
                        </div>
                        <div class="p-2">Price P1000.00</div>
                        <div class="p-2" style="height: 200px;">
                            shipping Info
                        </div>
                        <div class="p-2">
                            <div style="width:70px">
                                <input min="1" max="100" type="number" class="form-control" value="1">
                            </div>
                        </div>
                        <div class="p-2">
                            <button class="btn btn-outline-dark me-2">Add to Cart</button><button class="btn btn-dark">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3" style="background: white;">
            <div class="col-1 p-2">
                <div style="height:70px; border: solid 1px;">store Profile</div>
            </div>
            <div class="col-2 p-2 px-0">
                <div style="height:70px;border: solid 1px;">visit/chat store</div>
                
            </div>
            <div class="col-9 p-2">
                <div style="height:70px;border: solid 1px;">store info ratings blablabla</div>
            </div>
        </div>
        <div class="row p-0">
            <div class="d-flex flex-column mb-3" style="background: white;">
                <div class="p-2">
                    <h5>Product Specifications</h5>
                    <p>specification 1</p>
                </div>
                <div class="p-2">
                    <h5>Product Description</h5>
                    <p>Description Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium, magni. Beatae atque, accusantium ea unde, laboriosam minima distinctio sed hic necessitatibus id consectetur mollitia nisi itaque ipsum pariatur. Ipsa, dolorum!
                    In, necessitatibus iste, eveniet consectetur rerum cupiditate deleniti sit reprehenderit atque ducimus et! Assumenda quas quaerat molestias quos reiciendis, error, repellendus distinctio odio minus similique quisquam facilis pariatur provident tempore.
                    Voluptatem laboriosam, quis beatae et sint reprehenderit non possimus magni tenetur ipsum eos nemo, iste itaque nam error impedit dolorem ipsam illo dolore laudantium? Ut dicta explicabo iure cupiditate eaque.
                    Ullam ea nihil odit beatae libero eius nulla eligendi, repellendus, molestiae illum autem. Earum doloremque doloribus itaque tenetur sunt, minus, ipsa nulla architecto adipisci quas non assumenda! Error, deleniti reprehenderit.
                    Sit, voluptatum odit, molestiae inventore nihil non fuga totam laboriosam, nesciunt placeat sapiente ex. Illo placeat quia dicta. Ipsa esse aperiam iusto totam, laborum pariatur ratione quam ducimus tenetur voluptate.
                    Eius possimus eum, accusantium beatae totam iusto dolorum ullam enim quasi dignissimos rerum quisquam et molestias error illo itaque. Vitae dolor incidunt temporibus accusantium consequuntur animi obcaecati voluptatem provident laboriosam!
                    Doloremque, atque. Reiciendis ea et at eveniet, dignissimos, doloribus ipsam adipisci exercitationem maiores doloremque accusantium temporibus ipsa dolorum explicabo veniam sunt fugiat delectus ab repellendus aut assumenda. Tempora, veritatis nobis.
                    Exercitationem, quis error. Laborum quia quae praesentium animi commodi, aliquam possimus maiores assumenda eveniet fugiat quod at minima delectus magni labore libero repellendus esse blanditiis quibusdam velit tenetur quidem vitae?
                    Nisi deleniti, necessitatibus autem saepe ad dolorum aperiam iste magni ex corrupti voluptas mollitia. Esse sequi repudiandae cumque accusantium quisquam facere reprehenderit nobis quod aliquid! Enim laudantium voluptas nisi molestiae.
                    Et fugiat sed quibusdam corrupti, non repellendus ipsum impedit soluta mollitia, voluptatibus similique cupiditate maxime aspernatur repellat harum consequatur molestias suscipit, odit nihil velit rerum eveniet iure possimus consectetur. Repellendus?
                    Vitae, repudiandae? Vitae ducimus inventore quos eos dolores libero velit perferendis est quidem minus voluptas, impedit suscipit, aliquam, amet accusamus laborum hic. Repellendus nihil rerum, dolor aspernatur architecto ipsa corrupti!
                    Error libero, saepe at unde blanditiis eum ea quibusdam voluptatem, rerum, nobis enim qui tempora corporis deleniti maxime! Tenetur, in. Fuga sapiente eius ex? Amet accusantium consequatur laudantium nihil ducimus.
                    Quod atque, reprehenderit culpa nesciunt hic omnis tenetur natus iure ut explicabo perspiciatis laudantium pariatur eligendi maxime sint aut id repellat qui molestiae rerum alias quis adipisci! Ab, sint necessitatibus!
                    Nulla accusantium voluptatum nihil cum officiis doloribus iure modi eum aperiam voluptatibus excepturi provident dolore, fugiat, odit repellat doloremque repudiandae eligendi omnis. Molestias ducimus quis tempora explicabo, earum minima tenetur!
                    Dolore, ex vitae labore odio eum molestiae voluptatum quos numquam, libero excepturi sit soluta laborum eligendi sint eos accusantium ullam debitis non sunt modi aliquam enim! Voluptatibus accusamus enim eum?
                    Placeat corrupti quod eligendi et est alias, beatae labore odio ad in minima tenetur optio nisi quibusdam dolore non facere tempora assumenda nam reiciendis vero officia. Officiis voluptas aliquam iure.
                    Tempore vitae delectus vel nulla eligendi laudantium. Facilis et iure rem quod eligendi voluptates. Voluptas praesentium, soluta numquam maxime vero id iusto aut adipisci, pariatur quasi dolor illo ipsum dignissimos!
                    Dolorum harum, quam odit voluptate suscipit quod voluptas similique. Voluptatum sapiente earum veniam! Dolore, voluptas sunt illum saepe, fuga assumenda dolorem atque, suscipit reprehenderit ipsum delectus mollitia accusamus laudantium facilis?
                    Quis vitae autem quo atque modi doloribus quidem expedita quia nobis? Itaque quisquam, aliquid harum architecto dolorum totam alias optio rem sequi, consectetur recusandae deserunt veritatis modi, commodi suscipit iste.
                    Quibusdam sequi aperiam at voluptatum necessitatibus corporis molestias debitis perspiciatis maiores eligendi tempore minima possimus voluptatem nobis, ut odit quaerat eius, autem ducimus voluptatibus! Eligendi dolorum iure aperiam pariatur repudiandae.
                    Non a voluptas omnis tenetur quam quae, necessitatibus earum voluptatum quos deserunt repellendus dolorum reprehenderit eum temporibus, consequuntur enim explicabo, aliquid aut minus itaque! Error perferendis dolorum molestias eius fugit.
                    Odio nisi, rerum quasi dignissimos ut pariatur nihil perspiciatis velit consequuntur porro non labore magnam fugiat placeat corporis? Eum, doloremque veritatis. Repellendus, expedita modi corrupti ad facere aliquid perferendis doloremque?
                    Quibusdam dolor deleniti rem soluta blanditiis officiis nam at temporibus repellat delectus exercitationem molestiae, modi corporis sit earum inventore debitis explicabo qui! Obcaecati amet voluptatem unde blanditiis velit tempora explicabo?
                    Porro recusandae, inventore ut at corporis hic tempore odit? Corrupti laboriosam iusto deserunt illo expedita officiis cumque veniam aliquam quisquam iste atque, amet eum quibusdam ipsum temporibus esse! Consequatur, recusandae.
                    Rem modi repudiandae maiores, odio temporibus voluptas ipsam, commodi dignissimos, ab reiciendis eos facere nisi totam officia excepturi atque? Molestiae quo, amet laborum repudiandae aut expedita sapiente tempore veritatis ab.
                    Tempora debitis optio eos ullam? In, voluptatem. Autem officiis veniam assumenda possimus dignissimos provident, eaque obcaecati dolorem nobis accusamus, atque necessitatibus voluptatum, asperiores incidunt? Magnam, recusandae! Natus est ea consequuntur.
                    Adipisci, sequi eveniet? Minus voluptatibus maiores hic doloribus sed ex amet, placeat deserunt rem eius, numquam consectetur fugit ullam accusantium. Amet optio sit similique doloremque ipsa minus quaerat debitis fugit?
                    Id ab eos voluptate officiis sequi, perferendis nisi, odio ad dolor quae eum consectetur alias nobis doloremque quam expedita optio sunt soluta! Facere, sapiente porro non mollitia eius nostrum minima!
                    Ea sequi illo asperiores, eos reprehenderit veniam? Ab at eos est iure quia voluptatem quis a consequuntur numquam vitae id officia earum eum, mollitia sed nobis debitis enim dolore rerum?
                    Autem nostrum ea obcaecati suscipit ullam. Repellat a quis corporis. Quos, quibusdam, voluptatem fugiat consequatur quam quis expedita delectus ratione enim aspernatur labore porro veritatis vel accusamus tempora totam magni!</p>
                </div>
            </div>
        </div>
        <div class="row mb-3" style="background: white;">
            <div class="d-flex flex-column">
                <div class="p-2">
                    <h3>Rating 5 out of 5 stars</h3>
                </div>
                <div class="d-flex">
                    <button class="btn btn-light m-2">All</button>
                    <button class="btn btn-light m-2">5 star</button>
                    <button class="btn btn-light m-2">4 star</button>
                    <button class="btn btn-light m-2">3 star</button>
                    <button class="btn btn-light m-2">2 star</button>
                    <button class="btn btn-light m-2">1 star</button>
                    <button class="btn btn-light m-2">with comment</button>
                    <button class="btn btn-light m-2">with media</button>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-1">
                        <div class="float-end" style="height: 50px; width:50px; border:solid 1px">sample Image</div>
                    </div>
                    <div class="col-11">
                        <div class="d-flex flex-column">
                            <div class="pt-2">Name</div>
                            <div class="pt-2">Rating</div>
                            <div class="pt-2">Date</div>
                            <div class="pt-2">Comment: This is a buyer rating</div>
                            <div class="pt-2">Media</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes/footer1')
    <script src="/js/ecommerce.js"></script>
</body>
</html>