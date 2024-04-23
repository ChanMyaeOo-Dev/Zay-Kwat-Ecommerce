@extends('layouts.app')

@section('content')
    <div class=" container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">

                {{-- Breadcrumb --}}

                <nav aria-label="breadcrumb" class="ps-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Categories</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>

                {{-- Main Card --}}

                <div class="card border-0 bg-white shadow">
                    <div class="card-body p-4">
                        <form action="{{ route('category.update', $category->id) }}" method="POST"
                            enctype="multipart/form-data" id="category_add_form">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="category_name" class="form-label">Title</label>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/' . $category->cover_image) }}" width="45px"
                                        height="45px" class="shadow rounded me-2 object-fit-cover">

                                    <input type="text" class="form-control" id="category_name"
                                        value="{{ $category->title }}" name="title" placeholder="Enter Category Title">
                                </div>
                            </div>

                            <div>
                                <label for="cover_image" class="form-label">Cover Image</label>
                                <input type="file" class="form-control" id="cover_image" name="cover_image">
                                <input type="hidden" value="{{ $category->cover_image }}" name="cover_old_image">
                            </div>

                        </form>
                        <div class="d-flex align-items-center justify-content-end mt-3">
                            <button form="category_add_form" type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
