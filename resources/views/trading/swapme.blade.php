<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swap Me | Compactore</title>
    <link rel="stylesheet" href="/customcss/ecommerce.css">
    <link rel="stylesheet" href="/customcss/swapme.css">
    @include('includes/header1')
</head>
<body>
    @include('includes/header4')
    <div class="container" style="margin-top: 100px; position: relative;">
        @if ($query != null && $results != null)
            {{-- display post per row --}}
            <div class="row">
                {{-- per single post --}}
                <form action="/swapmeBookmark" method="post" id="saveBookMarkForm">@csrf<input type="number" name="postIdBookmark" v-model="bookMarkPost" style="display: none;"></form>
                <form action="/swapmeUnBookmark" method="post" id="unBookMarkForm">@csrf<input type="number" name="postIdBookmark" v-model="bookMarkPost" style="display: none;"></form>
                @if ($results->isEmpty())
                    <div class="col-2"></div>
                        <div class="col-8">
                            <p class="fw-normal fs-6 text-center">There are no posts about that yet.</p>
                        </div>
                    <div class="col-2"></div>
                @else
                    @foreach ($results as $post)
                    {{-- @php
                        dump($results);
                    @endphp --}}
                    {{-- {{ $post['id'] }} --}}
                        <div class="col-6">
                            <div class="card border rounded mt-3 shadow-sm">
                                <div class="card-body px-2">
                                    <div class="flex-column py-1">
                                        <button class="btn btn-outline-info float-end" @click="addOffer({{ $post['id'] }})">Offer</button>
                                        @if (count($swapPost) > 0)
                                            @foreach ($swapPost as $item)
                                                @if ($item['swapPost_id'] == $post['id'])
                                                    <span class="mx-3 float-end fs-5" style="cursor:pointer;" @click="unbookMark({{ $post['id']}})"><i class="fa-solid fa-bookmark"></i></span>
                                                    @php
                                                        $breakLoop = true;
                                                    @endphp
                                                    @break
                                                @endif
                                                @php
                                                    $breakLoop = false;
                                                @endphp
                                            @endforeach
                                            @if(isset($breakLoop))
                                                @if (!$breakLoop)
                                                    <span class="mx-3 float-end fs-5" style="cursor:pointer;" @click="bookMark({{ $post['id']}})"><i class="fa-regular fa-bookmark"></i></span>
                                                @endif
                                            @endif
                                        @else
                                            <span class="mx-3 float-end fs-5" style="cursor:pointer;" @click="bookMark({{ $post['id']}})"><i class="fa-regular fa-bookmark"></i></span>
                                        @endif
                                        <h5 class="fw-medium m-0">
                                            {{ $post['author']}}
                                        </h5>
                                        <p class="fw-normal">{{ $post['updated_at']->timezone('Asia/Manila')->format('M j, Y h:i a')}}</p>
                                        <p class="fw-medium m-0">{{ $post['title'] }}</p>
                                        <p class="fw-normal">{{ $post['description'] }}</p>
                                        <div class="img-container overflow-x-auto overflow-y-hidden" style="max-height: 415px; white-space:nowrap;">
                                            @if ($post->swapMedia->isNotEmpty())
                                                <img src="{{ asset($post->swapMedia->first()->file_path . $post->swapMedia->first()->file_name) }}" alt="Image post" style="height: 400px; width: 618px; object-fit:cover; border: lightgray 1px;">
                                            @else
                                                <img src="{{ asset('/compactoreCircleFav.png') }}" style="height:12rem; object-fit:cover;" class="card-img-top" alt="">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                @endif
                
            </div>
        @else
            {{-- display post per row --}}
            <div class="row">
                {{-- per single post --}}
                <form action="/swapmeBookmark" method="post" id="saveBookMarkForm">@csrf<input type="number" name="postIdBookmark" v-model="bookMarkPost" style="display: none;"></form>
                <form action="/swapmeUnBookmark" method="post" id="unBookMarkForm">@csrf<input type="number" name="postIdBookmark" v-model="bookMarkPost" style="display: none;"></form>
                @if ($swapPosts->isEmpty())
                    <div class="col-2"></div>
                        <div class="col-8">
                            <p class="fw-normal fs-6 text-center">There are no posts yet.</p>
                        </div>
                    <div class="col-2"></div>
                @else
                    @foreach ($swapPosts as $post)
                    {{-- {{ $post['id'] }} --}}
                        <div class="col-6">
                            <div class="card border rounded mt-3 shadow-sm">
                                <div class="card-body px-2">
                                    <div class="flex-column py-1">
                                        <button class="btn btn-outline-info float-end" @click="addOffer({{ $post['id'] }})">Offer</button>
                                        @if (count($swapPost) > 0)
                                        {{-- @php
                                            dump($swapPost);
                                        @endphp --}}
                                            @foreach ($swapPost as $item)
                                                @if ($item['swapPost_id'] == $post['id'])
                                                    <span class="mx-3 float-end fs-5" style="cursor:pointer;" @click="unbookMark({{ $post['id']}})"><i class="fa-solid fa-bookmark"></i></span>
                                                    @php
                                                        $breakLoop = true;
                                                    @endphp
                                                    @break
                                                @endif
                                                @php
                                                    $breakLoop = false;
                                                @endphp
                                            @endforeach
                                            @if(isset($breakLoop))
                                                @if (!$breakLoop)
                                                    <span class="mx-3 float-end fs-5" style="cursor:pointer;" @click="bookMark({{ $post['id']}})"><i class="fa-regular fa-bookmark"></i></span>
                                                @endif
                                            @endif
                                        @else
                                            <span class="mx-3 float-end fs-5" style="cursor:pointer;" @click="bookMark({{ $post['id']}})"><i class="fa-regular fa-bookmark"></i></span>
                                        @endif
                                        <h5 class="fw-medium m-0">
                                            {{ $post['author']}}
                                        </h5>
                                        <p class="fw-normal">{{ $post['updated_at']->timezone('Asia/Manila')->format('M j, Y h:i a')}}</p>
                                        <p class="fw-medium m-0">{{ $post['title'] }}</p>
                                        <p class="fw-normal">{{ $post['description'] }}</p>
                                        <div class="img-container overflow-x-auto overflow-y-hidden" style="max-height: 415px; white-space:nowrap;">
                                            @foreach ($swapMedia as $media)
                                            @if ($media['swapPost_id'] == $post['id'])
                                                <img src="{{ asset($media['file_path'].$media['file_name']) }}" alt="Image post" style="height: 400px; width: 618px; object-fit:cover; border: lightgray 1px;">
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                @endif
                
            </div>
        @endif

        {{-- Post Item --}}
        <div class="border shadow-sm rounded p-2" id="postBtn" data-bs-toggle="modal" data-bs-target="#postItem">
            <img src="{{ url('images/otherIcons/writePostIcon.png') }}" alt="postIcon" id="postIcon">
            Post Swap
        </div>

        {{-- Modal for posting item form --}}
        @include('modals/addOffer')
        @include('modals/postItemSwapme')

        @if ($offerPost != null)
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    // Get the modal element
                    var myModal = new bootstrap.Modal(document.getElementById('OfferItem'));

                    // Show the modal
                    myModal.show();
                });
            </script>
        @endif
    </div>
    @include('includes/footer1')
    <script src="/js/swapme.js"></script>
</body>
</html>