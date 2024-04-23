@extends('layouts.app')

@section('content')
    <div class=" container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">

                {{-- Breadcrumb --}}

                <nav aria-label="breadcrumb" class="ps-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Categories</li>
                    </ol>
                </nav>

                {{-- Main Card --}}

                <div class="card border-0 bg-white shadow">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-end w-100 mb-3">
                            <button class="btn btn-primary px-4" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#category_add_canvas" aria-controls="category_add_canvas">Add
                                Category</button>
                        </div>
                        <table id="list_table" class="table table-borderless border-bottom py-3" style="width:100%">
                            <thead>
                                <tr>
                                    <th class=" fw-normal">CATEGORIES</th>
                                    <th class=" fw-normal">TOTAL PRODUCTS</th>
                                    <th class=" fw-normal">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="w-50">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('storage/' . $category->cover_image) }}" width="45px"
                                                    height="45px" class="shadow p-2 rounded me-3 object-fit-cover">
                                                <p class="mb-0 text-dark">{{ $category->title }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            {{ count($category->products) }}
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                                    class="mb-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn border-0">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('category.edit', $category->id) }}" class="btn border-0">
                                                    <i class="bi bi-pencil-square "></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<div class="offcanvas offcanvas-end" tabindex="-1" id="category_add_canvas"
    aria-labelledby="category_add_canvas_label">
    <div class="offcanvas-header bg-light shadow border-bottom">
        <h5 class="offcanvas-title" id="category_add_canvas_label">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-4">
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data"
            id="category_add_form">
            @csrf
            <div class="mb-3">
                <label for="category_name" class="form-label">Title</label>
                <input type="text" class="form-control" id="category_name" name="title"
                    placeholder="Enter Category Title">
            </div>

            <div>
                <label for="cover_image" class="form-label">Cover Image</label>
                <input type="file" class="form-control" id="cover_image" name="cover_image">
            </div>

        </form>
        <div class="d-flex align-items-center justify-content-end mt-3">
            <button form="category_add_form" type="submit" class="btn btn-primary">Add</button>
            <button type="button" data-bs-dismiss="offcanvas" aria-label="Close"
                class="btn btn-outline-danger ms-2">Discard</button>
        </div>
    </div>
</div>

@push('data_table_scripts')
    @vite('resources/js/data_table_scripts.js')
@endpush
