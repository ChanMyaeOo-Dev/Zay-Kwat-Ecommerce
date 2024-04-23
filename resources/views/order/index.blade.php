@extends('layouts.app')

@section('content')
    <div class=" container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">

                {{-- Breadcrumb --}}

                <nav aria-label="breadcrumb" class="ps-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">/ Order List</li>
                    </ol>
                </nav>

                {{-- Main Card --}}

                <div class="card border-0 bg-white shadow">
                    <div class="card-body p-4">

                        <table id="list_table" class="table table-borderless border-bottom py-3" style="width:100%">
                            <thead>
                                <tr class="table_header">
                                    <th class=" fw-normal">ORDER</th>
                                    <th class=" fw-normal">DATE</th>
                                    <th class=" fw-normal">CUSTOMER</th>
                                    <th class=" fw-normal">STAUTS</th>
                                    <th class=" fw-normal">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class=" text-primary">{{ '#' . $order->id }}</td>
                                        <td class="">{{ $order->created_at->format('d/m/y h:m A') }}</td>
                                        <td>{{ $order->customer->name }}</td>
                                        @if ($order->status == 'pending')
                                            <td>
                                                <span class="badge rounded-pill text-bg-warning">
                                                    {{ strtoupper($order->status) }}
                                                </span>
                                            </td>
                                        @else
                                            <td>
                                                <span class="badge rounded-pill text-bg-primary text-white">
                                                    {{ strtoupper($order->status) }}
                                                </span>
                                            </td>
                                        @endif
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('orders.show', $order->id) }}" class="btn border-0">
                                                    <i class="bi bi-info-circle "></i>
                                                </a>
                                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                                    class="mb-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn border-0">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
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
