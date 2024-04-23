@extends('layouts.app')

@section('content')
    <div class=" container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">

                {{-- Breadcrumb --}}

                <nav aria-label="breadcrumb" class="ps-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Brands</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>

                {{-- Main Card --}}

                <div class="card border-0 bg-white shadow">
                    <div class="card-body p-4">
                        <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data"
                            id="brand_update_form">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="brand_name" class="form-label">Brand Name</label>
                                <div class="d-flex align-items-center">
                                    <input type="text" class="form-control" id="brand_name" value="{{ $brand->name }}"
                                        name="brand_name" placeholder="Enter Brand Name">
                                </div>
                            </div>
                        </form>
                        <div class="d-flex align-items-center justify-content-end mt-3">
                            <button form="brand_update_form" type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
