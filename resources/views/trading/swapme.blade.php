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

        {{-- display post per row --}}
        <div class="row">
            {{-- per single post --}}
            @if ($swapPosts)
                @foreach ($swapPosts as $post)
                    <div class="col-6">
                        <div class="card border rounded mt-3 shadow-sm">
                            <div class="card-body px-2">
                                <div class="flex-column py-1">
                                    <button class="btn btn-outline-info float-end">Offer</button>
                                    <h5 class="fw-medium m-0">
                                        {{ $post['author']}}
                                    </h5>
                                    <p class="fw-normal">{{ $post['updated_at']->timezone('Asia/Manila')->format('M j, Y h:i a')}}</p>
                                    <p class="fw-medium m-0">{{ $post['title'] }}</p>
                                    <p class="fw-normal">{{ $post['description'] }}</p>
                                    @foreach ($swapMedia as $media)
                                        @if ($media['swapPost_id'] == $post['id'])
                                            <img src="{{ asset($media['file_path'].$media['file_name']) }}" alt="Image post" style="height: 400px; width: 618px; object-fit:contain; border: 1px solid lightgray; overflow-x: auto;">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            
        </div>


        {{-- Post Item --}}
        <div class="border shadow-sm rounded p-2" id="postBtn" data-bs-toggle="modal" data-bs-target="#postItem">
            <img src="{{ url('images/otherIcons/writePostIcon.png') }}" alt="postIcon" id="postIcon">
            Post Item
        </div>

        {{-- Modal for posting item form --}}
        @include('modals/postItemSwapme')
    </div>
    @include('includes/footer1')
    <script src="js/swapme.js"></script>
</body>
</html>