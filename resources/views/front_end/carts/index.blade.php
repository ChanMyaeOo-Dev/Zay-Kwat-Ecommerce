@extends('layouts.front_end_layout')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            @if (count($carts) > 0)
                {{-- My Cart Infomations --}}
                @include('front_end.carts.cart_info_card')
            @else
                {{-- View For Empty Cart --}}
                @include('front_end.carts.cart_empty')
            @endif
        </div>
    </div>
@endsection
