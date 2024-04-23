@extends('layouts.app')

@section('content')
    <div class=" container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">

                {{-- Breadcrumb --}}

                <nav aria-label="breadcrumb" class="ps-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                    </ol>
                </nav>

                {{-- Main Card --}}
                <div class="row">
                    {{-- Product Information --}}
                    <div class="col-8 pe-3">
                        <div class="card border-0 bg-white shadow">
                            <div class="card-body p-4">
                                <div class="glide">
                                    <div class="glide__track" data-glide-el="track">
                                        <ul class="glide__slides">
                                            @foreach ($product->photos as $photo)
                                                <li class="glide__slide">
                                                    <img src="{{ asset('storage/' . $photo->image_url) }}" height="540px"
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

                                <div class="d-flex mt-3 gap-2">

                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary">
                                        <i class="bi bi-pencil-square me-1"></i>
                                        Edit Product
                                    </a>

                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                        class="mb-0">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger">
                                            <i class="bi bi-trash3 me-1"></i>
                                            Delete
                                        </button>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- Pricing --}}
                    <div class="col-4 p-0">
                        <div class="card border-0 bg-white shadow">
                            <div class="card-body p-4">
                                {{-- <p class="mb-4 fs-5 text-black-50">
                                    Product Informations
                                </p> --}}
                                <div class="mb-3">
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

                                    <div class="d-flex align-items-center mt-3 mb-2">
                                        <i class="me-1 text-warning bi bi-star-fill"></i>
                                        <i class="me-1 text-warning bi bi-star-fill"></i>
                                        <i class="me-1 text-warning bi bi-star-fill"></i>
                                        <i class="me-1 text-warning bi bi-star-fill"></i>
                                        <i class="me-1 text-warning bi bi-star-half"></i>
                                    </div>

                                    <div class="mb-4 pb-4 border-bottom">
                                        <span class="badge text-bg-secondary">Rating : 4.5</span>
                                        <span class="badge text-bg-secondary">Category :
                                            {{ $product->category->title }}</span>
                                    </div>

                                    <button class="w-100 py-2 btn btn-primary mb-0">
                                        <i class="bi bi-cart-plus me-2"></i>
                                        Add to cart
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="my-5 w-100 bg-white"></div>

            </div>
        </div>
    @endsection
    @push('glide_scripts')
        @vite('resources/js/glide_scripts.js')
    @endpush
