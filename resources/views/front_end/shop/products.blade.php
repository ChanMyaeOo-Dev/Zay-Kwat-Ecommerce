@extends('layouts.front_end_layout')

@section('content')
    <div class=" container-fluid">
        <div class="row">
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

                        @foreach ($products as $product)
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
    </div>
    </div>
@endsection
@push('data_table_scripts')
    @vite('resources/js/data_table_scripts.js')
@endpush

@push('glide_scripts')
    @vite('resources/js/glide_scripts.js')
@endpush
