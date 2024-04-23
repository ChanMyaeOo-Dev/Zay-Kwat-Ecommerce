@extends('layouts.front_end_layout')

@section('content')
    <div class=" container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">

                {{-- Banner Card --}}
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card border-0 shadow bg-white h-100">
                            <div class="card-body d-flex flex-column">

                                <p class="text-primary fw-bold fs-5 mb-3 pb-3 border-bottom">
                                    <i class="bi bi-fire me-2"></i>
                                    Popular Items
                                </p>

                                <div class="mb-auto">

                                    @foreach ($get_6_products as $product)
                                        <div class="mb-3 pb-3 border-bottom">
                                            <a href="#" class="text-secondary text-decoration-none">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('storage/' . $product->feature_image) }}"
                                                        width="24px" height="24px" class="rounded me-3">
                                                    <p class="mb-0 text-secondary me-auto">
                                                        {{ $product->title }}
                                                    </p>
                                                    <i class="bi bi-chevron-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach

                                    {{-- <div class="mb-3 pb-3 border-bottom">
                                        <a href="#" class="text-secondary text-decoration-none">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('src_images/logo.png') }}" width="24px" height="24px"
                                                    class="rounded me-3">
                                                <p class="mb-0 text-secondary me-auto">Category One</p>
                                                <i class="bi bi-chevron-right"></i>
                                            </div>
                                        </a>
                                    </div> --}}

                                </div>

                                <a href="#" class="btn btn-primary w-100">
                                    See All
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card border-0 bg-white shadow">
                            <div class="glide">
                                <div class="glide__track" data-glide-el="track">
                                    <ul class="glide__slides">
                                        <li class="glide__slide">
                                            <img src="{{ asset('src_images/banner_2.png') }}" height="520px"
                                                class="w-100 object-fit-cover rounded">
                                        </li>
                                        <li class="glide__slide">
                                            <img src="{{ asset('src_images/banner_1.png') }}" height="520px"
                                                class="w-100 object-fit-cover rounded">
                                        </li>
                                        <li class="glide__slide">
                                            <img src="{{ asset('src_images/banner_3.png') }}" height="520px"
                                                class="w-100 object-fit-cover rounded">
                                        </li>
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
                                    <button class="glide__bullet" data-glide-dir="0"></button>
                                    <button class="glide__bullet" data-glide-dir="1"></button>
                                    <button class="glide__bullet" data-glide-dir="2"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Category Card --}}

                <div class="card border-0 shadow bg-white mb-4">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex align-items-baseline mb-3 pb-3 border-bottom">
                            <p class="text-primary fw-bold fs-5 mb-0 me-auto">
                                <i class="bi bi-fire me-2"></i>
                                Categories
                            </p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between gap-3">

                            @foreach ($get_6_categories as $category)
                                <a href="#"
                                    class="text-secondary text-decoration-none p-3 w-100 bg-white border border-1 rounded">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('storage/' . $category->cover_image) }}" width="50px"
                                            height="50px" class="rounded bg-white shadow p-2 me-3">
                                        <p class="mb-0 text-secondary me-auto">{{ $category->title }}</p>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            {{-- Main Card --}}
            <div class="card border-0 shadow bg-white mb-4">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex align-items-baseline mb-3 pb-3 border-bottom">
                        <p class="text-primary fw-bold fs-5 mb-0 me-auto">
                            <i class="bi bi-shop me-2"></i>
                            Just for you
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

            @include('front_end.components.footer')
        </div>
    </div>
    </div>
@endsection
@push('data_table_scripts')
    @vite('resources/js/data_table_scripts.js')
@endpush

@push('glide_scripts')
    @vite('resources/js/glide_scripts.js')
@endpush
