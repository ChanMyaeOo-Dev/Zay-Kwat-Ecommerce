@extends('layouts.app')

@section('content')
    <div class=" container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">

                {{-- Breadcrumb --}}

                <nav aria-label="breadcrumb" class="ps-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Product</li>
                    </ol>
                </nav>

                {{-- Main Card --}}

                <div class="d-flex align-items-center justify-content-between mb-4 mt-5 px-3">
                    <div>
                        <h4 class="mb-1 text-secondary">Add a new Product</h4>
                        <p class="mb-0 text-black-50 small">Orders placed across your store</p>
                    </div>

                    <div>
                        <button id="submitButton" form="product_add_form" type="submit" class="btn btn-primary">Create
                            Product</button>
                    </div>
                </div>

                <div class="row">
                    {{-- Product Information --}}
                    <div class="col-8 pe-3">
                        <div class="card border-0 bg-white shadow">
                            <div class="card-body p-4">
                                <p class="mb-4 fs-5 text-black-50" id="test">
                                    Product information
                                </p>
                                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"
                                    id="product_add_form">
                                    @csrf
                                </form>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Product Title</label>
                                    <input form="product_add_form" type="text"
                                        class="form-control
                                        @error('title')
                                        is-invalid
                                        @enderror"
                                        value="{{ old('title') }}" id="title" name="title" placeholder="Title">
                                    <div class=" invalid-feedback">
                                        @error('title')
                                            {{ $message }}
                                        @enderror"
                                    </div>
                                </div>
                                <div class="">
                                    <label for="description" class="form-label">Product Description</label>
                                    <textarea form="product_add_form"
                                        class="form-control
                                        @error('description')
                                        is-invalid
                                        @enderror"
                                        id="description" name="description" rows="5">{{ old('description') }}</textarea>
                                    <div class=" invalid-feedback">
                                        @error('description')
                                            {{ $message }}
                                        @enderror"
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 bg-white shadow mt-3">
                            <div class="card-body p-4">

                                <p class="mb-4 fs-5 text-black-50">
                                    Product Images
                                </p>

                                <div class="mb-2">
                                    <label for="feature_image" class="form-label">Feature Image</label>
                                    <input form="product_add_form" type="file" class="form-control" id="feature_image"
                                        name="feature_image" placeholder="feature_image" accept="image/*"
                                        onchange="loadFeatureImage(event)">
                                </div>
                                <div class="mb-3 d-flex align-items-center gap-2" id="featureImageContainer">
                                </div>

                                <div class="mb-2">
                                    <label for="images" class="form-label">Product Images</label>
                                    <input form="product_add_form" type="file" class="form-control" id="images"
                                        name="images[]" placeholder="images" accept="image/*" onchange="loadFile(event)"
                                        multiple>
                                </div>
                                <div class="d-flex align-items-center gap-2" id="imgContainer">
                                </div>
                            </div>

                        </div>

                        <div class="card border-0 bg-white shadow mt-3">
                            <div class="card-body p-4">

                                <p class="mb-0 fs-5 text-black-50">
                                    Keywords
                                </p>
                                <p class="fs-6 text-black-50 mb-4">Add at least three keywords about product</p>

                                <div class="mb-3">
                                    <label for="keywords_1" class="form-label">First Keyword</label>
                                    <input form="product_add_form" type="text"
                                        class="form-control
                                        @error('keywords_1')
                                        is-invalid
                                        @enderror"
                                        value="{{ old('keywords_1') }}" id="keywords_1" name="keywords_1"
                                        placeholder="First Keyword">
                                    <div class=" invalid-feedback">
                                        @error('keywords_1')
                                            {{ $message }}
                                        @enderror"
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="keywords_2" class="form-label">Second Keyword</label>
                                    <input form="product_add_form" type="text"
                                        class="form-control
                                        @error('keywords_2')
                                        is-invalid
                                        @enderror"
                                        value="{{ old('keywords_2') }}" id="keywords_2" name="keywords_2"
                                        placeholder="First Keyword">
                                    <div class=" invalid-feedback">
                                        @error('keywords_2')
                                            {{ $message }}
                                        @enderror"
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="keywords_3" class="form-label">Third Keyword</label>
                                    <input form="product_add_form" type="text"
                                        class="form-control
                                        @error('keywords_3')
                                        is-invalid
                                        @enderror"
                                        value="{{ old('keywords_3') }}" id="keywords_3" name="keywords_3"
                                        placeholder="First Keyword">
                                    <div class=" invalid-feedback">
                                        @error('keywords_3')
                                            {{ $message }}
                                        @enderror"
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>

                    {{-- Pricing --}}
                    <div class="col-4 p-0">
                        <div class="card border-0 bg-white shadow">
                            <div class="card-body p-4">
                                <p class="mb-4 fs-5 text-black-50">
                                    Pricing
                                </p>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Basic Price</label>
                                    <input form="product_add_form" type="text"
                                        class="form-control
                                        @error('price')
                                        is-invalid
                                        @enderror"
                                        value="{{ old('price') }}" id="price" name="price" placeholder="Price">
                                    <div class=" invalid-feedback">
                                        @error('price')
                                            {{ $message }}
                                        @enderror"
                                    </div>
                                </div>

                                <div class="">
                                    <label for="d_price" class="form-label">Discounted Price (Optional)</label>
                                    <input form="product_add_form" type="text" class="form-control"
                                        value="{{ old('discounted_price') }}" id="d_price" name="discounted_price"
                                        placeholder="Discounted Price">
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 bg-white shadow mt-3">
                            <div class="card-body p-4">
                                <p class="mb-4 fs-5 text-black-50">
                                    Organize
                                </p>
                                <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <select form="product_add_form" name="category_id"
                                        class="form-select
                                        @error('category_id')
                                        is-invalid
                                        @enderror">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option {{ $category->id == old('category_id') ? 'selected' : '' }}
                                                value="{{ $category->id }}">
                                                {{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('category_id')
                                            {{ $message }}
                                        @enderror"
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="brand" class="form-label">Brand</label>
                                    <select form="product_add_form" name="brand_id"
                                        class="form-select
                                        @error('brand_id')
                                        is-invalid
                                        @enderror">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option {{ $brand->id == old('brand_id') ? 'selected' : '' }}
                                                value="{{ $brand->id }}">
                                                {{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        @error('brand_id')
                                            {{ $message }}
                                        @enderror"
                                    </div>
                                </div>

                                <div class="">
                                    <label for="stock_qty" class="form-label">Stock Quantity</label>
                                    <input form="product_add_form" type="number"
                                        class="form-control
                                        @error('stock_qty')
                                        is-invalid
                                        @enderror"
                                        value="{{ old('stock_qty') }}" id="stock_qty" name="stock_qty"
                                        placeholder="Stock Quantity">
                                    <div class=" invalid-feedback">
                                        @error('stock_qty')
                                            {{ $message }}
                                        @enderror"
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <div class="my-5 w-100 bg-white"></div>

            </div>
        </div>
    @endsection

    <script>
        let loadFeatureImage = function(event) {
            document.getElementById('featureImageContainer').innerHTML =
                `<div class="img_box"><img src="${URL.createObjectURL(event.target.files[0])}" class="w-100 h-100 output object-fit-cover rounded"></div>`;
        };

        let loadFile = function(event) {
            [...event.target.files].map((file, index) => {
                document.getElementById('imgContainer').innerHTML +=
                    `
                    <div class="img_box">
                        <img src="${URL.createObjectURL(file)}" class="w-100 h-100 output object-fit-cover rounded">
                        <button onclick="btnOnClick(event)" id="${index}" class="img_delete_btn">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                    `;

            });
        };

        function btnOnClick(event) {
            event.preventDefault();
            removeFileFromFileList(event.currentTarget.id);
        }

        function removeFileFromFileList(index) {
            let dt = new DataTransfer();
            let files = document.getElementById('images').files;

            for (let i = 0; i < files.length; i++) {
                let file = files[i];
                if (index != i) {
                    dt.items.add(file);
                }
            }
            document.getElementById('images').files = dt.files;
            updateImageList(dt.files);
        }

        function updateImageList(files) {
            document.getElementById('imgContainer').innerHTML = "";
            [...files].map((file, index) => {
                document.getElementById('imgContainer').innerHTML +=
                    `
                    <div class="img_box">
                        <img src="${URL.createObjectURL(file)}" class="border border-danger w-100 h-100 output object-fit-cover rounded">
                        <button onclick="btnOnClick(event)" id="${index}" class="img_delete_btn">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                    `;
            });
        }
    </script>
