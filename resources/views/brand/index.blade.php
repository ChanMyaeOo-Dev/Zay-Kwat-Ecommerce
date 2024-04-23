@extends('layouts.app')

@section('content')
    <div class=" container-fluid">
        <nav aria-label="breadcrumb" class="ps-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Brands</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-8 p-2">
                <div class="card border-0 bg-white shadow">
                    <div class="card-body p-4">
                        <table id="list_table" class="table table-borderless border-bottom py-3" style="width:100%">
                            <thead>
                                <tr>
                                    <th class=" fw-normal">BRANDS</th>
                                    <th class=" fw-normal">TOTAL PRODUCTS</th>
                                    <th class=" fw-normal">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td class="w-50">
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0 text-dark">{{ $brand->name }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            {{ count($brand->products) }}
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <form action="{{ route('brands.destroy', $brand->id) }}" method="POST"
                                                    class="mb-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn border-0">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('brands.edit', $brand->id) }}" class="btn border-0">
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
            <div class="col-md-4 p-2">
                <div class="card border-0 bg-white h-100 shadow">
                    <div class="card-body p-4">

                        <h4 class="mb-4 fw-bold border-bottom pb-3">Add New Brand</h4>
                        {{-- <span class="badge rounded-pill text-bg-secondary mb-4">
                            {{ count($brands) }} brands in the store.
                        </span> --}}

                        <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data"
                            id="brand_add_form">
                            @csrf

                            <div class="mb-3">
                                <label for="brand_name" class="form-label">Brand Name</label>
                                <input type="text" class="form-control" id="brand_name" name="brand_name"
                                    placeholder="Enter brand name">
                            </div>
                            <button form="brand_add_form" type="submit" class="btn btn-primary w-100 py-2">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('data_table_scripts')
    @vite('resources/js/data_table_scripts.js')
@endpush
