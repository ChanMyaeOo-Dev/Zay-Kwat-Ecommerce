@extends('layouts.front_end_layout')

@section('content')
    <div class="row min-vh-100">
        <div class="card border-0 bg-white mb-4">
            <div class="card-body p-5">

                {{-- Product Detail Row --}}
                <div class="row mb-4 pb-4 border-bottom">
                    <div class="col-6 me-3">
                        <div class="glide">
                            <div class="glide__track" data-glide-el="track">
                                <ul class="glide__slides">
                                    @foreach ($product->photos as $photo)
                                        <li class="glide__slide">
                                            <img src="{{ asset('storage/' . $photo->image_url) }}" height="560px"
                                                class="w-100 object-fit-cover rounded">
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="glide__arrows" data-glide-el="controls">
                                <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                                    <i class="bi bi-chevron-left"></i>
                                </button>
                                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                                    <i class="bi bi-chevron-right"></i>
                                </button>
                            </div>
                            <div class="glide__bullets" data-glide-el="controls[nav]">
                                @foreach ($product->photos as $key => $photo)
                                    <button class="glide__bullet" data-glide-dir="={{ $key }}"></button>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-5">
                        <p class="mb-0 fs-3 text-dark">
                            {{ $product->title }}
                        </p>

                        <p class="small text-black-50">
                            {{ $product->brand->name }}
                        </p>

                        <p class="my-3 fs-4 text-primary">
                            {{ $product->price . ' Kyats' }}
                        </p>

                        <p class="mb-1 text-black-50">
                            {{ $product->description }}
                        </p>

                        @if (count($product->reviews) > 0)
                            <?php
                            $total_rating = 0;
                            $review_count = count($product->reviews);
                            
                            foreach ($product->reviews as $review) {
                                $total_rating = $total_rating + $review->rating;
                            }
                            $rating = ceil($total_rating / $review_count);
                            $last = 5 - $rating;
                            ?>
                            <div class="d-flex align-items-center mb-2">
                                @for ($i = 0; $i < $rating; $i++)
                                    <i class="me-1 text-warning bi bi-star-fill me-1"></i>
                                @endfor

                                @for ($i = 0; $i < $last; $i++)
                                    <i class="me-1 text-warning bi bi-star me-1"></i>
                                @endfor
                            </div>
                        @endif

                        <div class="mb-4 mt-2">
                            @if (count($product->reviews) > 0)
                                <span class="badge text-bg-secondary">Rating : {{ $rating }}</span>
                            @endif
                            <span class="badge text-bg-secondary">Category :
                                {{ $product->category->title }}
                            </span>
                            <span class="badge text-bg-secondary">
                                {{ 'Only ' . $product->stock_qty . ' items left.' }}
                            </span>
                        </div>

                        <div class="card border border-1 p-4 bg-white">
                            <p class="mb-3 text-secondary">Quantity</p>
                            <div class="d-flex align-items-center justify-content-between">
                                {{-- Qty Update --}}
                                <div class="d-inline-flex border rounded me-3" style="height: 40px;">
                                    <button onclick="subQty()" class="btn btn-light bg-white h-100 rounded-end-0">
                                        <i class="bi bi-dash fw-bolder"></i>
                                    </button>
                                    <div class="d-flex align-items-center justify-content-center px-4">
                                        <input type="hidden" id="inStockQty" value="{{ $product->stock_qty }}">
                                        <input form="addToCartForm" id="qty_input" type="text" name="qty"
                                            value="1" class="cart_qty_input text-center border-0 mb-0 fw-bold">
                                    </div>
                                    <button onclick="addQty()" class="btn btn-light bg-white h-100 rounded-start-0">
                                        <i class="bi bi-plus fw-bolder"></i>
                                    </button>
                                </div>

                                <form id="addToCartForm" action="{{ route('carts.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                </form>
                                @auth
                                    <button form="addToCartForm" type="submit" class="w-100 py-2 btn btn-primary">
                                        <i class="bi bi-cart-plus me-2"></i>
                                        Add to cart
                                    </button>
                                @else
                                    <a href="{{ route('login') }}" class="w-100 btn btn-primary">
                                        Add to cart
                                    </a>
                                @endauth
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Review Row --}}
                <div class="row">
                    <div class="col-7 pe-5">
                        <p class="mb-3 text-secondary">Reviews</p>

                        @foreach ($product->reviews as $review)
                            <div class="mb-3 pb-3 border-bottom">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0 text-secondary me-2">
                                        {{ $review->user->name }}
                                    </p>
                                    <p class="mb-0 text-secondary text-black-50 small">
                                        {{ $review->created_at->format('d/m/Y') }}
                                    </p>
                                </div>
                                <?php
                                $rating = $review->rating;
                                $last = 5 - $rating;
                                ?>
                                <div class="d-flex align-items-center mb-2">
                                    @for ($i = 0; $i < $rating; $i++)
                                        <i class="me-1 text-warning bi bi-star-fill me-1"></i>
                                    @endfor

                                    @for ($i = 0; $i < $last; $i++)
                                        <i class="me-1 text-warning bi bi-star me-1"></i>
                                    @endfor
                                </div>
                                <p class=" text-black-50">
                                    {{ $review->message }}
                                </p>
                            </div>
                        @endforeach

                    </div>
                    <div class="{{ count($product->reviews) > 0 ? 'col-5' : 'col-12' }}">
                        <div class="card border border-1 bg-white">
                            <div class="card-body p-4">
                                <form action="{{ route('reviews.store') }}" method="POST">
                                    @csrf
                                    <p class="mb-3 text-secondary fs-5">Add a review</p>
                                    <p class="mb-1 text-secondary">Rating</p>
                                    <div class="d-flex align-items-center mb-3">
                                        <span onclick="gfg(1)" class="star">
                                            <i class="bi bi-star-fill me-1"></i>
                                        </span>
                                        <span onclick="gfg(2)" class="star">
                                            <i class="bi bi-star-fill me-1"></i>
                                        </span>
                                        <span onclick="gfg(3)" class="star">
                                            <i class="bi bi-star-fill me-1"></i>
                                        </span>
                                        <span onclick="gfg(4)" class="star">
                                            <i class="bi bi-star-fill me-1"></i>
                                        </span>
                                        <span onclick="gfg(5)" class="star">
                                            <i class="bi bi-star-fill me-1"></i>
                                        </span>
                                    </div>
                                    <input id="rating_input" type="hidden" name="rating" value="1">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea name="message" placeholder="Say something..."
                                            class="form-control
                                        @error('message')
                                        is-invalid
                                        @enderror"
                                            id="message" rows="8">{{ old('message') }}</textarea>
                                        <div class=" invalid-feedback">
                                            @error('message')
                                                {{ $message }}
                                            @enderror"
                                        </div>
                                    </div>
                                    @auth
                                        <button class="btn btn-primary w-100">Send</button>
                                    @else
                                        <a href="{{ route('login') }}" class="w-100 btn btn-primary">
                                            Send
                                        </a>
                                    @endauth
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        {{-- Related Items Row --}}
        <div class="card border-0 bg-white p-4 mb-4">
            <div class="card-body d-flex flex-column">
                <div class="d-flex align-items-baseline mb-3 pb-3 border-bottom">
                    <p class="text-primary fw-bold fs-5 mb-0 me-auto">
                        <i class="bi bi-shop me-2"></i>
                        You may also like
                    </p>
                    <a href="#" class="btn btn-primary px-4">See All</a>
                </div>
                <div class="shop_item_container">

                    @foreach ($get_12_products as $product)
                        <div class="d-flex flex-column h-100 bg-white border border-1 rounded p-3">
                            <a href="{{ route('shop.show', $product->id) }}"
                                class="text-secondary text-decoration-none w-100 mb-auto">
                                <img src="{{ asset('storage/' . $product->feature_image) }}" height="165px"
                                    class="rounded bg-white w-100 object-fit-cover mb-2">
                                <p class="mb-1 text-black-50 small">{{ $product->category->title }}</p>
                                <p class="mb-0 text-secondary fs-5">{{ $product->title }}</p>
                                <p class="mb-auto text-secondary">{{ $product->price . ' Kyats' }}</p>
                            </a>
                            @auth
                                <form action="{{ route('carts.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button class="btn btn-outline-primary mt-3 w-100">
                                        Add to cart
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="w-100 btn btn-outline-primary mt-3">
                                    Add to cart
                                </a>
                            @endauth
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
@push('glide_scripts')
    @vite('resources/js/glide_scripts.js')
@endpush

<script>
    let qtyInput = document.querySelector("#qty_input");
    let inStockInput = document.querySelector("#inStockQty");
    let currentQty = 1;
    let inStockQty = 1;
    // To access the stars
    let stars =
        document.getElementsByClassName("star");
    let rating_input =
        document.getElementById("rating_input");

    (function(window, document, undefined) {
        window.onload = init;

        function init() {
            qtyInput = document.querySelector("#qty_input");
            inStockInput = document.querySelector("#inStockQty");
            currentQty = Number(qtyInput.value);
            inStockQty = Number(inStockInput.value);
            // To access the stars
            stars = document.getElementsByClassName("star");
            rating_input = document.getElementById("rating_input");
        }
    })(window, document, undefined);

    function addQty() {
        if (currentQty < inStockQty) {
            currentQty = currentQty + 1;
            qtyInput.value = currentQty;
        }
    }

    function subQty() {
        if (currentQty > 0) {
            currentQty = currentQty - 1;
            qtyInput.value = currentQty;
        }
    }

    // Rating Start

    // Funtion to update rating
    function gfg(n) {
        remove();
        for (let i = 0; i < n; i++) {
            if (n == 1) cls = "one";
            else if (n == 2) cls = "two";
            else if (n == 3) cls = "three";
            else if (n == 4) cls = "four";
            else if (n == 5) cls = "five";
            stars[i].className = "star " + cls;
        }
        rating_input.value = n;
    }

    // To remove the pre-applied styling
    function remove() {
        let i = 0;
        while (i < 5) {
            stars[i].className = "star";
            i++;
        }
    }

    // Rating End
</script>
