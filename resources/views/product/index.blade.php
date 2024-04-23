@extends('layouts.app')

@section('content')
    <div class=" container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">

                {{-- Breadcrumb --}}

                <nav aria-label="breadcrumb" class="ps-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">/ Product List</li>
                    </ol>
                </nav>

                {{-- Main Card --}}

                <div class="card border-0 bg-white shadow">
                    <div class="card-body p-4">

                        {{-- Filter --}}
                        <p class="mb-3 text-dark fs-5">Filter</p>
                        <div class="d-flex align-items-center justify-content-between gap-3 mb-4 pb-4 border-bottom">

                            <form id="search_form" action="{{ route('product.index') }}" method="GET">
                                {{-- <input type="hidden" name="search" id="search_input"> --}}
                            </form>
                            <select form="search_form" name="filter_category" class="form-select"
                                onchange="submitFilterForm()">
                                <option value="">All Category</option>
                                @foreach ($categories as $category)
                                    <option
                                        {{ request()->filter_category != null ? (request()->filter_category == $category->id ? 'selected' : '') : '' }}
                                        value="{{ $category->id }}">
                                        {{ $category->title }}</option>
                                @endforeach
                            </select>

                            <select form="search_form" onchange="submitFilterForm()" name="filter_brand"
                                class="form-select">
                                <option value="">All Brand</option>
                                @foreach ($brands as $brand)
                                    <option
                                        {{ request()->filter_brand != null ? (request()->filter_brand == $brand->id ? 'selected' : '') : '' }}
                                        value="{{ $brand->id }}">
                                        {{ $brand->name }}</option>
                                @endforeach
                            </select>

                            <select form="search_form" onchange="submitFilterForm()" name="filter_stock"
                                class="form-select">
                                <option value="">Stock</option>
                                <option
                                    {{ request()->filter_stock != null ? (request()->filter_stock == 1 ? 'selected' : '') : '' }}
                                    value="1">Instock</option>
                                <option
                                    {{ request()->filter_stock != null ? (request()->filter_stock == 0 ? 'selected' : '') : '' }}
                                    value="0">Out of stock</option>
                            </select>
                        </div>
                        {{-- Filter End --}}

                        <table id="list_table" class="table table-borderless border-bottom py-3" style="width:100%">
                            <thead>
                                <tr class="table_header">
                                    <th class=" fw-normal">PRODUCTS</th>
                                    <th class=" fw-normal">CATEGORY</th>
                                    <th class=" fw-normal">BRAND</th>
                                    <th class=" fw-normal">STOCK</th>
                                    <th class=" fw-normal">PRICE</th>
                                    <th class=" fw-normal">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="">
                                            <div class="d-flex align-items-center">
                                                <img src="
                                                {{ asset('storage/' . $product->feature_image) }}"
                                                    width="45px" height="45px"
                                                    class="shadow rounded me-3 object-fit-cover">
                                                <div>
                                                    <p class="mb-0 text-dark">{{ $product->title }}</p>
                                                    <p class="mb-0 text-black-50 sm">{!! Str::words($product->description, 6, ' ...') !!}</p>
                                                </div>
                                            </div>
                                        </td>
                                        @isset($product->category)
                                            <td>{{ $product->category->title }}
                                            </td>
                                        @else
                                            <td class="small text-black-50">UNCATEGORIZE</td>
                                        @endisset

                                        @isset($product->brand)
                                            <td>{{ $product->brand->name }}</td>
                                        @else
                                            <td class="small text-black-50">NO BRAND</td>
                                        @endisset
                                        <td>{{ $product->stock_qty }}</td>
                                        <td>{{ "$ " . $product->price }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                                    class="mb-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn border-0">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                                <a href="{{ route('product.edit', $product->id) }}" class="btn border-0">
                                                    <i class="bi bi-pencil-square "></i>
                                                </a>

                                                <a href="{{ route('product.show', $product->id) }}" class="btn border-0">
                                                    <i class="bi bi-info-circle "></i>
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
<script>
    function submitFilterForm() {
        document.querySelector("#search_form").submit();
    }
</script>
@push('data_table_scripts')
    @vite('resources/js/data_table_scripts.js')
@endpush
