@extends('layouts.app')

@section('content')
    <div class=" container-fluid">
        <div class="row">
            <div class="col-md-12 p-0">
                {{-- Breadcrumb --}}
                <nav aria-label="breadcrumb" class="ps-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('orders.index') }}">Orders</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                    </ol>
                </nav>
                {{-- Main Card --}}
                <div class="row">
                    {{-- Product Information --}}
                    <div class="col-8 pe-3">
                        <div class="card border border-1 bg-white mb-4">
                            <div class="card-body p-4">
                                <p class="">
                                    <i class="bi bi-person-circle me-2"></i>
                                    Customer
                                </p>
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>PHONE</td>
                                            <td>ADDRESS</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $order->customer->name }}</td>
                                            <td>{{ $order->customer->phone }}</td>
                                            <td>{{ $order->customer->address }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card border border-1 bg-white">
                            <div class="card-body p-4">
                                <p class="">
                                    <i class="bi bi-shop me-2"></i>
                                    Order Items
                                </p>
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <td>PRODUCT</td>
                                            <td>QTY</td>
                                            <td>PRICE</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('product.show', $product->product->id) }}"
                                                        class=" text-secondary text-decoration-none">
                                                        {{ $product->product->title }}
                                                    </a>
                                                </td>
                                                <td>{{ $product->qty }}</td>
                                                <td>{{ $product->price . ' Kyats' }}</td>
                                                @php
                                                    $total = $total + $product->price;
                                                @endphp
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2" class=" text-primary fw-bold">TOTAL</td>
                                            <td class=" text-primary fw-bold">{{ $total . ' Kyats' }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">

                        <div class="card px-4 pt-4 pb-3 border border-1 bg-white">
                            <div class="card-body">

                                <p class="mb-3">Order Status ({{ $order->status }})</p>

                                <div class="p-3 mb-4">
                                    <svg class="animated" id="freepik_stories-deadline" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 500 500" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xmlns:svgjs="http://svgjs.com/svgjs">
                                        <style>
                                            svg#freepik_stories-deadline:not(.animated) .animable {
                                                opacity: 0;
                                            }

                                            svg#freepik_stories-deadline.animated #freepik--Clock--inject-15 {
                                                animation: 1.5s Infinite linear wind;
                                                animation-delay: 0s;
                                            }

                                            svg#freepik_stories-deadline.animated #freepik--Character--inject-15 {
                                                animation: 1.5s Infinite linear floating;
                                                animation-delay: 0s;
                                            }

                                            @keyframes wind {
                                                0% {
                                                    transform: rotate(0deg);
                                                }

                                                25% {
                                                    transform: rotate(1deg);
                                                }

                                                75% {
                                                    transform: rotate(-1deg);
                                                }
                                            }

                                            @keyframes floating {
                                                0% {
                                                    opacity: 1;
                                                    transform: translateY(0px);
                                                }

                                                50% {
                                                    transform: translateY(-10px);
                                                }

                                                100% {
                                                    opacity: 1;
                                                    transform: translateY(0px);
                                                }
                                            }
                                        </style>
                                        <g id="freepik--background-complete--inject-15"
                                            style="transform-origin: 250.895px 257px 0px;" class="animable">
                                            <path
                                                d="M389.24,349.86V373.8h-4v2.6h4v16H464V377.84h-5.53v-3.18H464V369.9h2.46v-2.17H463.5V349.86Z"
                                                style="fill: rgb(245, 245, 245); transform-origin: 425.85px 371.13px 0px;"
                                                id="elv8dgg7ykt8n" class="animable"></path>
                                            <polygon
                                                points="444.12 349.93 444.12 392.15 463.96 392.15 463.96 377.57 458.43 377.57 458.43 374.66 463.96 374.76 463.96 370 466.47 370 466.42 367.54 463.5 367.47 463.5 349.86 444.12 349.93"
                                                style="fill: rgb(224, 224, 224); transform-origin: 455.295px 371.005px 0px;"
                                                id="eld0cvmo333qu" class="animable"></polygon>
                                            <path
                                                d="M445.53,376.05c0,.15-13.52.27-30.19.27s-30.2-.12-30.2-.27,13.52-.26,30.2-.26S445.53,375.91,445.53,376.05Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 415.335px 376.055px 0px;"
                                                id="elln5vhwqe3p" class="animable"></path>
                                            <path
                                                d="M445.53,373.62c0,.15-13.52.27-30.19.27s-30.2-.12-30.2-.27,13.52-.27,30.2-.27S445.53,373.47,445.53,373.62Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 415.335px 373.62px 0px;"
                                                id="eleartmw6qvpn" class="animable"></path>
                                            <path
                                                d="M449.41,367.08c0,.14-13.52.26-30.19.26s-30.2-.12-30.2-.26,13.52-.27,30.2-.27S449.41,366.93,449.41,367.08Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 419.215px 367.075px 0px;"
                                                id="elmgsh7ukzs8b" class="animable"></path>
                                            <path
                                                d="M449.79,384.91c0,.15-13.53.27-30.2.27s-30.2-.12-30.2-.27,13.52-.26,30.2-.26S449.79,384.76,449.79,384.91Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 419.59px 384.915px 0px;"
                                                id="el2z76s3fy0cc" class="animable"></path>
                                            <path
                                                d="M394.88,391.24v23.94h-4v2.6h4v16H469.6V419.22h-5.54V416h5.54v-4.76h2.46v-2.17h-2.92V391.24Z"
                                                style="fill: rgb(245, 245, 245); transform-origin: 431.47px 412.51px 0px;"
                                                id="eldo0iqwoauri" class="animable"></path>
                                            <polygon
                                                points="449.76 391.31 449.76 433.53 469.6 433.53 469.6 418.95 464.06 418.95 464.06 416.04 469.6 416.14 469.6 411.38 472.11 411.38 472.06 408.92 469.14 408.85 469.14 391.24 449.76 391.31"
                                                style="fill: rgb(224, 224, 224); transform-origin: 460.935px 412.385px 0px;"
                                                id="elmzq9ohu7ddi" class="animable"></polygon>
                                            <path
                                                d="M451.17,417.43c0,.15-13.52.27-30.19.27s-30.2-.12-30.2-.27,13.51-.26,30.2-.26S451.17,417.29,451.17,417.43Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 420.975px 417.435px 0px;"
                                                id="elzf1bkjujfc" class="animable"></path>
                                            <path
                                                d="M451.17,415c0,.15-13.52.27-30.19.27s-30.2-.12-30.2-.27,13.51-.27,30.2-.27S451.17,414.85,451.17,415Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 420.975px 415px 0px;"
                                                id="elo8i85twos3g" class="animable"></path>
                                            <path
                                                d="M455.05,408.45c0,.15-13.52.27-30.2.27s-30.19-.12-30.19-.27,13.51-.26,30.19-.26S455.05,408.31,455.05,408.45Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 424.855px 408.455px 0px;"
                                                id="elmauim46ppr" class="animable"></path>
                                            <path
                                                d="M455.42,426.29c0,.15-13.52.27-30.19.27s-30.2-.12-30.2-.27,13.52-.26,30.2-.26S455.42,426.14,455.42,426.29Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 425.225px 426.295px 0px;"
                                                id="elzbtx1qsti8" class="animable"></path>
                                            <path
                                                d="M388.33,432.06V456h-4v2.6h4v16h74.72V460h-5.54v-3.17h5.54V452.1h2.46v-2.16h-2.92V432.06Z"
                                                style="fill: rgb(245, 245, 245); transform-origin: 424.92px 453.33px 0px;"
                                                id="el0p10lq3fex4p" class="animable"></path>
                                            <polygon
                                                points="443.21 432.13 443.21 474.35 463.05 474.35 463.05 459.77 457.51 459.77 457.51 456.87 463.05 456.96 463.05 452.2 465.56 452.2 465.51 449.74 462.59 449.67 462.59 432.06 443.21 432.13"
                                                style="fill: rgb(224, 224, 224); transform-origin: 454.385px 453.205px 0px;"
                                                id="el5qftl7zpqce" class="animable"></polygon>
                                            <path
                                                d="M444.62,458.25c0,.15-13.52.27-30.19.27s-30.2-.12-30.2-.27,13.52-.26,30.2-.26S444.62,458.11,444.62,458.25Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 414.425px 458.255px 0px;"
                                                id="elus33vpn9gl" class="animable"></path>
                                            <path
                                                d="M444.62,455.82c0,.15-13.52.27-30.19.27s-30.2-.12-30.2-.27,13.52-.26,30.2-.26S444.62,455.68,444.62,455.82Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 414.425px 455.825px 0px;"
                                                id="el3srixorluhy" class="animable"></path>
                                            <path
                                                d="M448.5,449.28c0,.14-13.52.26-30.2.26s-30.19-.12-30.19-.26,13.51-.27,30.19-.27S448.5,449.13,448.5,449.28Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 418.305px 449.275px 0px;"
                                                id="eljrgkm3k31ka" class="animable"></path>
                                            <path
                                                d="M448.87,467.11c0,.15-13.52.27-30.19.27s-30.2-.12-30.2-.27,13.52-.26,30.2-.26S448.87,467,448.87,467.11Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 418.675px 467.115px 0px;"
                                                id="elb9hujx7rpw" class="animable"></path>
                                            <path
                                                d="M41.87,349.86V373.8h-4v2.6h4v16h74.72V377.84h-5.54v-3.18h5.54V369.9h2.46v-2.17h-2.92V349.86Z"
                                                style="fill: rgb(245, 245, 245); transform-origin: 78.46px 371.13px 0px;"
                                                id="elm4qqpk32xha" class="animable"></path>
                                            <polygon
                                                points="96.75 349.93 96.75 392.15 116.59 392.15 116.59 377.57 111.05 377.57 111.05 374.66 116.59 374.76 116.59 370 119.09 370 119.05 367.54 116.13 367.47 116.13 349.86 96.75 349.93"
                                                style="fill: rgb(224, 224, 224); transform-origin: 107.92px 371.005px 0px;"
                                                id="elet736h5khel" class="animable"></polygon>
                                            <path
                                                d="M98.16,376.05c0,.15-13.52.27-30.2.27s-30.19-.12-30.19-.27,13.51-.26,30.19-.26S98.16,375.91,98.16,376.05Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 67.965px 376.055px 0px;"
                                                id="el3t4pdpmql16" class="animable"></path>
                                            <path
                                                d="M98.16,373.62c0,.15-13.52.27-30.2.27s-30.19-.12-30.19-.27,13.51-.27,30.19-.27S98.16,373.47,98.16,373.62Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 67.965px 373.62px 0px;"
                                                id="elnacqnfnjyha" class="animable"></path>
                                            <path
                                                d="M102,367.08c0,.14-13.52.26-30.2.26s-30.2-.12-30.2-.26,13.52-.27,30.2-.27S102,366.93,102,367.08Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 71.8px 367.075px 0px;"
                                                id="el5128uihuewe" class="animable"></path>
                                            <path
                                                d="M102.41,384.91c0,.15-13.52.27-30.19.27s-30.2-.12-30.2-.27,13.51-.26,30.2-.26S102.41,384.76,102.41,384.91Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 72.215px 384.915px 0px;"
                                                id="elgsimhs9b17h" class="animable"></path>
                                            <path
                                                d="M401.94,313.13v23.95h-4v2.59h4v16h74.72V341.12h-5.54v-3.18h5.54v-4.76h2.45V331h-2.92V313.13Z"
                                                style="fill: rgb(245, 245, 245); transform-origin: 438.525px 334.4px 0px;"
                                                id="elj2ejjhm0u0f" class="animable"></path>
                                            <polygon
                                                points="456.81 313.2 456.81 355.43 476.65 355.43 476.65 340.85 471.12 340.85 471.12 337.94 476.65 338.04 476.65 333.28 479.16 333.28 479.12 330.82 476.19 330.75 476.19 313.13 456.81 313.2"
                                                style="fill: rgb(224, 224, 224); transform-origin: 467.985px 334.28px 0px;"
                                                id="eluaznlrumvzs" class="animable"></polygon>
                                            <path
                                                d="M458.23,339.33c0,.15-13.52.27-30.2.27s-30.2-.12-30.2-.27,13.52-.26,30.2-.26S458.23,339.18,458.23,339.33Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 428.03px 339.335px 0px;"
                                                id="elcbzljhz0tyi" class="animable"></path>
                                            <path
                                                d="M458.23,336.9c0,.15-13.52.26-30.2.26s-30.2-.11-30.2-.26,13.52-.27,30.2-.27S458.23,336.75,458.23,336.9Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 428.03px 336.895px 0px;"
                                                id="elmy7r21vq9p" class="animable"></path>
                                            <path
                                                d="M462.11,330.35c0,.15-13.53.27-30.2.27s-30.2-.12-30.2-.27,13.52-.26,30.2-.26S462.11,330.21,462.11,330.35Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 431.91px 330.355px 0px;"
                                                id="el1mci2xh8meb" class="animable"></path>
                                            <path
                                                d="M462.48,348.19c0,.15-13.52.26-30.2.26s-30.2-.11-30.2-.26,13.52-.27,30.2-.27S462.48,348,462.48,348.19Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 432.28px 348.185px 0px;"
                                                id="el6s7xr6v2gl7" class="animable"></path>
                                            <path
                                                d="M45.84,391.24v23.94h-4v2.6h4v16h74.71V419.22H115V416h5.53v-4.76H123v-2.17h-2.92V391.24Z"
                                                style="fill: rgb(245, 245, 245); transform-origin: 82.42px 412.51px 0px;"
                                                id="el24ew530a0rd" class="animable"></path>
                                            <polygon
                                                points="100.71 391.31 100.71 433.53 120.56 433.53 120.56 418.95 115.02 418.95 115.02 416.04 120.56 416.14 120.56 411.38 123.06 411.38 123.01 408.92 120.09 408.85 120.09 391.24 100.71 391.31"
                                                style="fill: rgb(224, 224, 224); transform-origin: 111.885px 412.385px 0px;"
                                                id="elnd50pkt8g2r" class="animable"></polygon>
                                            <path
                                                d="M102.13,417.43c0,.15-13.52.27-30.2.27s-30.2-.12-30.2-.27,13.52-.26,30.2-.26S102.13,417.29,102.13,417.43Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 71.93px 417.435px 0px;"
                                                id="eltk6qzrehv7s" class="animable"></path>
                                            <path
                                                d="M102.13,415c0,.15-13.52.27-30.2.27s-30.2-.12-30.2-.27,13.52-.27,30.2-.27S102.13,414.85,102.13,415Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 71.93px 415px 0px;"
                                                id="el3c6ilt8zag3" class="animable"></path>
                                            <path
                                                d="M106,408.45c0,.15-13.52.27-30.19.27s-30.2-.12-30.2-.27,13.52-.26,30.2-.26S106,408.31,106,408.45Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 75.805px 408.455px 0px;"
                                                id="elf4mtz8czepq" class="animable"></path>
                                            <path
                                                d="M106.38,426.29c0,.15-13.52.27-30.2.27s-30.2-.12-30.2-.27S59.5,426,76.18,426,106.38,426.14,106.38,426.29Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 76.18px 426.28px 0px;"
                                                id="eljj93cw1w2wr" class="animable"></path>
                                            <path
                                                d="M54.75,432.06V456h-4v2.6h4v16h74.72V460h-5.54v-3.17h5.54V452.1h2.46v-2.16H129V432.06Z"
                                                style="fill: rgb(245, 245, 245); transform-origin: 91.34px 453.33px 0px;"
                                                id="elj070jltfvpr" class="animable"></path>
                                            <polygon
                                                points="109.63 432.13 109.63 474.35 129.47 474.35 129.47 459.77 123.93 459.77 123.93 456.87 129.47 456.96 129.47 452.2 131.98 452.2 131.93 449.74 129.01 449.67 129.01 432.06 109.63 432.13"
                                                style="fill: rgb(224, 224, 224); transform-origin: 120.805px 453.205px 0px;"
                                                id="el0uwzshelf9og" class="animable"></polygon>
                                            <path
                                                d="M111,458.25c0,.15-13.52.27-30.2.27s-30.19-.12-30.19-.27S64.16,458,80.84,458,111,458.11,111,458.25Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 80.805px 458.26px 0px;"
                                                id="elb4mcqa5lu1u" class="animable"></path>
                                            <path
                                                d="M111,455.82c0,.15-13.52.27-30.2.27s-30.19-.12-30.19-.27,13.51-.26,30.19-.26S111,455.68,111,455.82Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 80.805px 455.825px 0px;"
                                                id="elaiafcueu1fq" class="animable"></path>
                                            <path
                                                d="M114.92,449.28c0,.14-13.52.26-30.2.26s-30.2-.12-30.2-.26S68,449,84.72,449,114.92,449.13,114.92,449.28Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 84.72px 449.27px 0px;"
                                                id="elktvpuywdih" class="animable"></path>
                                            <path
                                                d="M115.29,467.11c0,.15-13.52.27-30.19.27s-30.2-.12-30.2-.27,13.52-.26,30.2-.26S115.29,467,115.29,467.11Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 85.095px 467.115px 0px;"
                                                id="elac7yqbth52" class="animable"></path>
                                            <path
                                                d="M301.6,432.58v23.2h-3.88v2.52h3.88v15.53H374V459.7h-5.36v-3.08H374V452h2.39v-2.1h-2.83V432.58Z"
                                                style="fill: rgb(245, 245, 245); transform-origin: 337.055px 453.205px 0px;"
                                                id="ele01fcib9zvk" class="animable"></path>
                                            <polygon
                                                points="354.78 432.65 354.78 473.57 374.01 473.57 374.01 459.44 368.65 459.44 368.65 456.62 374.01 456.72 374.01 452.1 376.44 452.11 376.4 449.72 373.57 449.65 373.57 432.58 354.78 432.65"
                                                style="fill: rgb(224, 224, 224); transform-origin: 365.61px 453.075px 0px;"
                                                id="elvp6jlteqql" class="animable"></polygon>
                                            <path
                                                d="M356.15,458c0,.14-13.1.26-29.26.26s-29.27-.12-29.27-.26,13.1-.26,29.27-.26S356.15,457.83,356.15,458Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 326.885px 458px 0px;"
                                                id="eldrsbm5jc70o" class="animable"></path>
                                            <path
                                                d="M356.15,455.61c0,.14-13.1.26-29.26.26s-29.27-.12-29.27-.26,13.1-.26,29.27-.26S356.15,455.47,356.15,455.61Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 326.885px 455.61px 0px;"
                                                id="elzcj03s1nikr" class="animable"></path>
                                            <path
                                                d="M359.91,449.27c0,.14-13.1.26-29.26.26s-29.27-.12-29.27-.26,13.1-.26,29.27-.26S359.91,449.13,359.91,449.27Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 330.645px 449.27px 0px;"
                                                id="el4w522k8637n" class="animable"></path>
                                            <path
                                                d="M360.27,466.55c0,.15-13.1.26-29.26.26s-29.27-.11-29.27-.26,13.1-.25,29.27-.25S360.27,466.41,360.27,466.55Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 331.005px 466.555px 0px;"
                                                id="el30o8hboe2bd" class="animable"></path>
                                            <path
                                                d="M167.64,391.24v23.94h-4v2.6h4v16h74.72V419.22h-5.53V416h5.53v-4.76h2.46v-2.17H241.9V391.24Z"
                                                style="fill: rgb(245, 245, 245); transform-origin: 204.23px 412.51px 0px;"
                                                id="elxyijg2ux8e" class="animable"></path>
                                            <polygon
                                                points="222.52 391.31 222.52 433.53 242.36 433.53 242.36 418.95 236.83 418.95 236.83 416.04 242.36 416.14 242.36 411.38 244.87 411.38 244.82 408.92 241.9 408.85 241.9 391.24 222.52 391.31"
                                                style="fill: rgb(224, 224, 224); transform-origin: 233.695px 412.385px 0px;"
                                                id="eln1w7zjdx6p" class="animable"></polygon>
                                            <path
                                                d="M223.93,417.43c0,.15-13.52.27-30.19.27s-30.2-.12-30.2-.27,13.52-.26,30.2-.26S223.93,417.29,223.93,417.43Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 193.735px 417.435px 0px;"
                                                id="el00uv53pnar84" class="animable"></path>
                                            <path
                                                d="M223.93,415c0,.15-13.52.27-30.19.27s-30.2-.12-30.2-.27,13.52-.27,30.2-.27S223.93,414.85,223.93,415Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 193.735px 415px 0px;"
                                                id="elth4zapx14j" class="animable"></path>
                                            <path
                                                d="M227.81,408.45c0,.15-13.52.27-30.19.27s-30.2-.12-30.2-.27,13.52-.26,30.2-.26S227.81,408.31,227.81,408.45Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 197.615px 408.455px 0px;"
                                                id="el80qxfj36ebt" class="animable"></path>
                                            <path
                                                d="M228.19,426.29c0,.15-13.53.27-30.2.27s-30.2-.12-30.2-.27S181.31,426,198,426,228.19,426.14,228.19,426.29Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 197.99px 426.28px 0px;"
                                                id="elfw7adnobs7k" class="animable"></path>
                                            <path
                                                d="M161.09,432.06V456h-4v2.6h4v16h74.72V460h-5.53v-3.17h5.53V452.1h2.46v-2.16h-2.92V432.06Z"
                                                style="fill: rgb(245, 245, 245); transform-origin: 197.68px 453.33px 0px;"
                                                id="eljqgnz9cxlxq" class="animable"></path>
                                            <polygon
                                                points="215.97 432.13 215.97 474.35 235.81 474.35 235.81 459.77 230.28 459.77 230.28 456.87 235.81 456.96 235.81 452.2 238.32 452.2 238.27 449.74 235.35 449.67 235.35 432.06 215.97 432.13"
                                                style="fill: rgb(224, 224, 224); transform-origin: 227.145px 453.205px 0px;"
                                                id="el8cl2t3crfu6" class="animable"></polygon>
                                            <path
                                                d="M217.38,458.25c0,.15-13.52.27-30.19.27s-30.2-.12-30.2-.27,13.52-.26,30.2-.26S217.38,458.11,217.38,458.25Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 187.185px 458.255px 0px;"
                                                id="eltm356v0z5gg" class="animable"></path>
                                            <path
                                                d="M217.38,455.82c0,.15-13.52.27-30.19.27S157,456,157,455.82s13.52-.26,30.2-.26S217.38,455.68,217.38,455.82Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 187.19px 455.825px 0px;"
                                                id="elbsw23t3wtb" class="animable"></path>
                                            <path
                                                d="M221.26,449.28c0,.14-13.52.26-30.19.26s-30.2-.12-30.2-.26,13.52-.27,30.2-.27S221.26,449.13,221.26,449.28Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 191.065px 449.275px 0px;"
                                                id="elut2garkqy2d" class="animable"></path>
                                            <path
                                                d="M221.64,467.11c0,.15-13.52.27-30.2.27s-30.2-.12-30.2-.27,13.52-.26,30.2-.26S221.64,467,221.64,467.11Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 191.44px 467.115px 0px;"
                                                id="el6tb17p51ar2" class="animable"></path>
                                            <path
                                                d="M22.63,388.11c.81,6.49,5.8,11.85,11.59,14.9s12.35,4.18,18.79,5.36,13,2.5,18.61,5.86l11.15-31s-13.75-6.37-28-5.8c-11.51.45-20.65-14.8-20.65-14.8Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 52.7px 388.43px 0px;"
                                                id="el41z0ayc74hb" class="animable"></path>
                                            <path
                                                d="M72.08,466.9c10.39-10.71,22-16.57,36.91-17.86-3.52-5.47-9.76-16.14-13.27-21.61-18.68.1-33.2,10.64-43,26.34C59.61,458.75,65.17,461.92,72.08,466.9Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 80.855px 447.165px 0px;"
                                                id="elp8g08p8acyq" class="animable"></path>
                                            <path
                                                d="M425.48,129.86a25.57,25.57,0,0,1,6.27-2.72l1.29-6.21,10.48-.18L445,126.9a25.46,25.46,0,0,1,6.36,2.51l5.3-3.48,7.54,7.28L461,138.63a26,26,0,0,1,2.72,6.27l6.2,1.29.19,10.48-6.16,1.51a25.43,25.43,0,0,1-2.5,6.36l3.47,5.3-7.28,7.54-5.41-3.29a25.94,25.94,0,0,1-6.27,2.73l-1.29,6.2-10.48.19-1.51-6.16a25.43,25.43,0,0,1-6.36-2.5L421,178l-7.54-7.28,3.28-5.42a25.67,25.67,0,0,1-2.72-6.26l-6.21-1.29-.18-10.49,6.16-1.5a25.43,25.43,0,0,1,2.5-6.36l-3.47-5.3,7.28-7.54,5.41,3.28Zm5.59,14a11.25,11.25,0,1,0,15.9-.28A11.26,11.26,0,0,0,431.07,143.82Z"
                                                style="fill: rgb(235, 235, 235); transform-origin: 438.87px 151.98px 0px;"
                                                id="elr4ptym3i4v" class="animable"></path>
                                            <path
                                                d="M63.16,232.54a31,31,0,0,1,7.56-3.28l1.56-7.48,12.63-.22L86.73,229a30.82,30.82,0,0,1,7.67,3l6.39-4.18,9.09,8.78-4,6.52a31,31,0,0,1,3.29,7.56l7.48,1.56.22,12.64-7.42,1.82a30.93,30.93,0,0,1-3,7.66l4.19,6.39-8.78,9.1-6.53-4a31.21,31.21,0,0,1-7.56,3.28l-1.56,7.48-12.63.22-1.82-7.42a30.85,30.85,0,0,1-7.67-3l-6.39,4.19-9.09-8.78,4-6.53a30.86,30.86,0,0,1-3.29-7.56l-7.48-1.55-.22-12.64L49,251.73a31.24,31.24,0,0,1,3-7.67l-4.19-6.38,8.78-9.1,6.53,4Zm6.74,16.84A13.56,13.56,0,1,0,89.07,249,13.56,13.56,0,0,0,69.9,249.38Z"
                                                style="fill: rgb(235, 235, 235); transform-origin: 79.245px 259.195px 0px;"
                                                id="elubk3ujnxlpj" class="animable"></path>
                                            <g id="el0kj6zvyuvp4">
                                                <rect x="37.66" y="56.59" width="118.26" height="93.89"
                                                    style="fill: rgb(255, 255, 255); transform-origin: 96.79px 103.535px 0px; transform: rotate(-10.25deg);"
                                                    class="animable" id="el7ji5dxefw9u"></rect>
                                            </g>
                                            <g id="elm5ge8itqwmb">
                                                <rect x="31.49" y="57.15" width="118.26" height="24.57"
                                                    style="fill: rgb(235, 235, 235); transform-origin: 90.62px 69.435px 0px; transform: rotate(-10.25deg);"
                                                    class="animable" id="eltjcffr6f89"></rect>
                                            </g>
                                            <path
                                                d="M60,108.83a9.46,9.46,0,0,1-.3-1.25c-.19-.88-.42-2-.7-3.4-.59-2.91-1.41-7-2.33-11.93l.37.26-16.63,3c-.06.1.57-.81.3-.42h0v.13l0,.14.05.28.1.57.21,1.13c.13.75.27,1.49.4,2.23l.77,4.3c.49,2.79,1,5.43,1.38,7.86l-.37-.26c4.93-.86,9.06-1.54,12-2l3.43-.53a10.15,10.15,0,0,1,1.28-.16,6.15,6.15,0,0,1-1.12.28l-3.33.69c-2.89.58-7.08,1.41-12.14,2.36l-.31.06-.06-.32c-.45-2.43-.94-5.06-1.46-7.84-.25-1.4-.51-2.84-.78-4.3-.14-.74-.27-1.48-.41-2.23l-.2-1.13-.11-.56,0-.29,0-.14,0-.07v-.06h0c-.26.38.36-.53.3-.43l16.65-3,.32-.06,0,.32c.89,5.06,1.57,9.28,2,12.19.21,1.37.39,2.48.52,3.36A7.5,7.5,0,0,1,60,108.83Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 49.988px 101.955px 0px;"
                                                id="eln8rhfkn2lqq" class="animable"></path>
                                            <path
                                                d="M81.81,104.89a9.53,9.53,0,0,1-.3-1.24c-.18-.89-.42-2-.7-3.41-.59-2.91-1.4-7-2.32-11.93l.37.26L62.23,91.63c-.07.09.56-.82.29-.43h0v.13l0,.14.06.28.1.57.2,1.13c.14.75.27,1.49.4,2.23l.77,4.3c.49,2.79,1,5.43,1.38,7.86l-.37-.26c4.93-.86,9.06-1.53,12-2l3.44-.54a10.13,10.13,0,0,1,1.27-.16,5.83,5.83,0,0,1-1.12.28l-3.33.69c-2.89.58-7.08,1.41-12.13,2.36l-.32.06-.06-.32c-.45-2.43-.94-5.06-1.45-7.84-.26-1.4-.52-2.84-.79-4.3-.13-.74-.27-1.48-.4-2.23L62,92.46l-.1-.56,0-.29,0-.14v-.13h0c-.27.38.36-.53.3-.43l16.64-3,.32-.06.06.32c.88,5.06,1.57,9.28,2,12.19.22,1.37.39,2.48.53,3.36A6.44,6.44,0,0,1,81.81,104.89Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 71.8238px 98.06px 0px;"
                                                id="eleqnytrtoexg" class="animable"></path>
                                            <path
                                                d="M103.59,101a12.13,12.13,0,0,1-.3-1.24c-.18-.89-.41-2-.7-3.41-.58-2.91-1.4-7-2.32-11.93l.37.26L84,87.69c-.07.09.56-.82.3-.43h0v.13l0,.14,0,.29.1.56.21,1.13c.13.75.26,1.49.4,2.23.26,1.46.51,2.9.76,4.3.5,2.79,1,5.43,1.39,7.86l-.37-.26c4.92-.86,9-1.53,12-2l3.43-.54a10.37,10.37,0,0,1,1.27-.16,5.83,5.83,0,0,1-1.11.28l-3.33.69c-2.9.58-7.08,1.41-12.14,2.36l-.31.06-.06-.32c-.45-2.43-.94-5.06-1.46-7.84-.25-1.4-.52-2.84-.79-4.3-.13-.74-.26-1.48-.4-2.23l-.21-1.13-.1-.56-.05-.29,0-.14V87.4h0c-.27.38.36-.53.3-.43l16.65-3,.31-.06.06.32c.88,5.06,1.57,9.28,2,12.19.21,1.37.39,2.48.52,3.36A6.44,6.44,0,0,1,103.59,101Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 93.5262px 94.12px 0px;"
                                                id="el7aybfoy1t0o" class="animable"></path>
                                            <path
                                                d="M125.38,97a9,9,0,0,1-.3-1.24c-.18-.89-.42-2-.7-3.41-.59-2.91-1.41-7-2.33-11.93l.38.26-16.64,3.06.3-.43h0v.06l0,.07,0,.14,0,.29.11.56.2,1.13c.13.75.27,1.49.4,2.23.26,1.47.52,2.9.77,4.3.49,2.79,1,5.43,1.38,7.86l-.37-.26c4.93-.86,9.06-1.53,12-2l3.43-.54c.81-.12,1.25-.17,1.28-.16a5.83,5.83,0,0,1-1.12.28l-3.33.69c-2.89.58-7.08,1.41-12.14,2.36l-.31.06-.06-.32c-.45-2.42-.94-5.06-1.45-7.84-.26-1.4-.52-2.84-.79-4.3-.14-.74-.27-1.48-.41-2.23l-.2-1.12-.1-.57-.06-.29,0-.14v-.11h0c-.26.38.37-.52.3-.43l16.65-3,.32-.06.05.32c.89,5.06,1.58,9.28,2,12.19.22,1.37.39,2.48.53,3.36A6.44,6.44,0,0,1,125.38,97Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 115.318px 90.175px 0px;"
                                                id="elqp7k7ya7hi" class="animable"></path>
                                            <path
                                                d="M147.16,93.08a10,10,0,0,1-.3-1.25c-.18-.89-.41-2-.7-3.4-.59-2.92-1.4-7-2.32-11.94l.37.26-16.63,3.06c-.07.09.56-.81.3-.43h0v.13l0,.14,0,.29.1.56.2,1.13c.14.75.27,1.49.4,2.23.27,1.47.52,2.9.77,4.3.49,2.79,1,5.43,1.39,7.86l-.38-.26c4.93-.86,9.06-1.53,12-2l3.43-.54a8.86,8.86,0,0,1,1.27-.15,6.59,6.59,0,0,1-1.12.27l-3.33.69c-2.89.58-7.08,1.41-12.13,2.36l-.32.06,0-.32c-.45-2.42-.94-5.06-1.46-7.84-.26-1.4-.52-2.83-.79-4.3-.13-.74-.27-1.48-.4-2.23l-.21-1.12-.1-.57,0-.29,0-.14v-.11h0l.3-.43,16.65-3,.31-.06.06.32c.88,5.06,1.57,9.28,2,12.19.21,1.37.38,2.49.52,3.36A6.49,6.49,0,0,1,147.16,93.08Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 137.18px 86.245px 0px;"
                                                id="elqwlx7hkygdi" class="animable"></path>
                                            <path
                                                d="M63.9,130.23a9.53,9.53,0,0,1-.3-1.24c-.19-.89-.42-2-.7-3.41-.59-2.91-1.41-7-2.33-11.93l.37.26L44.31,117l.3-.43h0v.06l0,.07,0,.14.05.28.1.57L45,118.8c.13.75.27,1.49.4,2.23l.77,4.3c.49,2.79,1,5.43,1.38,7.86l-.37-.26c4.93-.86,9.06-1.54,12-2l3.43-.54a10.38,10.38,0,0,1,1.28-.16,6.15,6.15,0,0,1-1.12.28l-3.33.69c-2.89.58-7.08,1.41-12.14,2.36l-.31.06-.06-.32c-.45-2.43-.94-5.06-1.46-7.84-.25-1.4-.51-2.84-.78-4.3-.14-.74-.27-1.48-.41-2.23l-.2-1.13-.11-.56,0-.29,0-.14,0-.07v-.06h0c-.26.38.36-.53.3-.43l16.65-3,.32-.06.05.32c.89,5.06,1.57,9.28,2,12.19.21,1.37.39,2.48.52,3.36A7.5,7.5,0,0,1,63.9,130.23Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 53.903px 123.405px 0px;"
                                                id="eljg1tmp5v1zs" class="animable"></path>
                                            <path
                                                d="M85.68,126.29a9.53,9.53,0,0,1-.3-1.24c-.18-.89-.42-2-.7-3.41-.59-2.91-1.4-7-2.32-11.93l.37.26L66.1,113c-.07.09.56-.82.29-.43h0v.13l0,.14.06.28.1.57.2,1.13c.14.75.27,1.49.4,2.23l.77,4.3c.49,2.79,1,5.43,1.38,7.86L69,129c4.93-.86,9.06-1.53,12-2l3.44-.54a10.13,10.13,0,0,1,1.27-.16,5.83,5.83,0,0,1-1.12.28l-3.33.69c-2.89.58-7.08,1.41-12.13,2.36l-.32.06-.06-.32c-.45-2.43-.93-5.06-1.45-7.84-.26-1.4-.52-2.84-.79-4.3-.13-.74-.27-1.48-.4-2.23l-.21-1.13-.1-.56,0-.29,0-.14v-.13h0c-.27.38.36-.53.3-.43l16.64-3,.32-.06.06.32c.88,5.06,1.57,9.28,2,12.19.22,1.37.39,2.48.53,3.36A6.44,6.44,0,0,1,85.68,126.29Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 75.7212px 119.475px 0px;"
                                                id="elmkb6e86yg9" class="animable"></path>
                                            <path
                                                d="M107.46,122.35a11.29,11.29,0,0,1-.3-1.24c-.18-.89-.41-2-.7-3.41-.58-2.91-1.4-7-2.32-11.93l.37.26-16.63,3.06c-.07.09.56-.82.3-.43h0v.13l0,.14,0,.29.1.56.21,1.13c.13.75.26,1.49.4,2.23.26,1.47.51,2.9.76,4.3.5,2.79,1,5.43,1.39,7.86l-.37-.26c4.92-.86,9-1.53,12-2l3.43-.54c.8-.12,1.25-.17,1.27-.16a5.83,5.83,0,0,1-1.11.28l-3.33.69c-2.9.58-7.08,1.41-12.14,2.36l-.31.06-.06-.32c-.45-2.43-.94-5.06-1.46-7.84-.25-1.4-.52-2.84-.79-4.3-.13-.74-.26-1.48-.4-2.23l-.2-1.12-.11-.57,0-.29,0-.14v-.13h0c-.27.38.36-.53.3-.43l16.65-3,.31-.06.06.32c.88,5.06,1.57,9.28,2,12.19.21,1.37.39,2.48.52,3.36A6.44,6.44,0,0,1,107.46,122.35Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 97.4262px 115.515px 0px;"
                                                id="elub7t3kzisk8" class="animable"></path>
                                            <path
                                                d="M129.25,118.42a10,10,0,0,1-.3-1.25c-.18-.89-.42-2-.7-3.4-.59-2.92-1.41-7-2.33-11.94l.38.26-16.64,3.06.3-.43h0v.06l0,.07,0,.14,0,.29.11.56.2,1.13c.13.75.27,1.49.4,2.23.26,1.47.52,2.9.77,4.3.49,2.79.95,5.43,1.38,7.86l-.37-.26c4.93-.86,9.06-1.53,12-2l3.43-.54a9.05,9.05,0,0,1,1.28-.15,8.19,8.19,0,0,1-1.12.27l-3.33.69c-2.89.58-7.08,1.41-12.14,2.36l-.31.06-.06-.32c-.45-2.42-.94-5.06-1.45-7.84-.26-1.4-.52-2.84-.79-4.3-.14-.74-.27-1.48-.41-2.23l-.2-1.12-.1-.57-.06-.29,0-.14v-.11h0c-.26.38.37-.52.3-.43l16.65-3,.32-.06,0,.32c.89,5.06,1.58,9.28,2,12.19.22,1.37.39,2.48.53,3.36A6.41,6.41,0,0,1,129.25,118.42Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 119.188px 111.585px 0px;"
                                                id="el2adkabxev7p" class="animable"></path>
                                            <path
                                                d="M151,114.48a10,10,0,0,1-.3-1.25c-.18-.89-.41-2-.7-3.4-.59-2.92-1.4-7-2.32-11.94l.37.26-16.63,3.06c-.07.09.56-.81.3-.43h0v.13l0,.14,0,.29.1.56.2,1.13c.14.75.27,1.49.4,2.23.27,1.47.52,2.9.77,4.3.49,2.79,1,5.43,1.39,7.86l-.38-.26c4.93-.86,9.06-1.53,12-2l3.43-.54a8.86,8.86,0,0,1,1.27-.15,6.59,6.59,0,0,1-1.12.27l-3.33.69c-2.89.58-7.08,1.41-12.13,2.36l-.32.06,0-.32c-.45-2.42-.94-5.06-1.46-7.84-.26-1.4-.52-2.83-.79-4.3-.13-.74-.27-1.48-.4-2.23l-.21-1.12-.1-.57-.05-.29,0-.14v-.11h0l.3-.43,16.65-3,.31-.06.06.32c.88,5.06,1.57,9.28,2,12.19.21,1.37.38,2.49.52,3.36A6.49,6.49,0,0,1,151,114.48Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 140.995px 107.645px 0px;"
                                                id="el5rrl87xk1o2" class="animable"></path>
                                            <g id="elgnlc7zu9pst">
                                                <rect x="49.23" y="134.93" width="16.91" height="16.91"
                                                    style="fill: rgb(224, 224, 224); transform-origin: 57.685px 143.385px 0px; transform: rotate(-10.25deg);"
                                                    class="animable" id="el4jam873grgh"></rect>
                                            </g>
                                            <path
                                                d="M89.29,146.27A10,10,0,0,1,89,145c-.18-.89-.41-2-.7-3.4-.59-2.92-1.4-7-2.32-11.94l.37.26L69.71,133c-.07.09.56-.81.3-.43h0v.13l0,.14,0,.29.1.56.2,1.13c.14.75.27,1.49.4,2.23.27,1.47.52,2.9.77,4.3.49,2.79,1,5.43,1.39,7.86l-.38-.26c4.93-.86,9.06-1.53,12-2l3.43-.54a8.86,8.86,0,0,1,1.27-.15,6.59,6.59,0,0,1-1.12.27l-3.33.69c-2.89.58-7.08,1.41-12.13,2.36l-.32.06,0-.32c-.45-2.42-.94-5.06-1.46-7.84-.26-1.4-.52-2.83-.79-4.3-.13-.74-.27-1.48-.4-2.23l-.21-1.12-.1-.57,0-.29,0-.14v-.11h0l.3-.43,16.65-3,.31-.06.06.32c.88,5.06,1.57,9.28,2,12.19.21,1.37.38,2.49.52,3.36A6.49,6.49,0,0,1,89.29,146.27Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 79.31px 139.435px 0px;"
                                                id="elkxwafa8wnjf" class="animable"></path>
                                            <path
                                                d="M111.08,142.33a10,10,0,0,1-.3-1.25c-.19-.89-.42-2-.7-3.4-.59-2.92-1.41-7-2.33-11.94l.37.26-16.63,3.06.3-.43h0v.13l0,.14,0,.29.1.57.21,1.12c.13.75.27,1.49.4,2.23.26,1.47.52,2.9.77,4.3.49,2.79.95,5.43,1.38,7.86l-.37-.26c4.93-.86,9.06-1.53,12-2l3.43-.54a8.9,8.9,0,0,1,1.28-.15,7.41,7.41,0,0,1-1.12.27l-3.33.69c-2.89.58-7.08,1.41-12.14,2.36l-.31.06-.06-.32c-.45-2.42-.94-5.06-1.46-7.84-.25-1.4-.52-2.83-.78-4.3-.14-.73-.27-1.48-.41-2.22l-.2-1.13-.11-.57,0-.29,0-.14,0-.07v0h0c-.26.39.36-.52.3-.43l16.65-3,.32-.06,0,.32c.89,5.06,1.57,9.28,2,12.19.21,1.37.39,2.49.52,3.36A7.53,7.53,0,0,1,111.08,142.33Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 101.043px 135.515px 0px;"
                                                id="el552oghpuvee" class="animable"></path>
                                            <path
                                                d="M132.86,138.39a10,10,0,0,1-.3-1.25c-.18-.89-.42-2-.7-3.4-.59-2.92-1.4-7-2.32-11.94l.37.26-16.63,3.06c-.07.09.56-.81.29-.43h0v.11l0,.14.06.29.1.57L114,127c.14.75.27,1.5.4,2.23.26,1.47.52,2.9.77,4.3.49,2.79,1,5.43,1.38,7.86l-.37-.26c4.93-.86,9.06-1.53,12-2l3.44-.54a8.86,8.86,0,0,1,1.27-.15,6.59,6.59,0,0,1-1.12.27l-3.33.69c-2.89.58-7.08,1.42-12.13,2.36l-.32.06-.06-.32c-.45-2.42-.94-5-1.45-7.84-.26-1.4-.52-2.83-.79-4.3-.13-.73-.27-1.48-.4-2.22l-.21-1.13-.1-.57,0-.29,0-.14v-.12h0c-.27.39.36-.52.29-.43l16.65-3,.32-.06,0,.32c.89,5.06,1.58,9.28,2,12.19.22,1.37.39,2.49.53,3.36A6.49,6.49,0,0,1,132.86,138.39Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 122.901px 131.61px 0px;"
                                                id="el7djk2mai7zo" class="animable"></path>
                                            <path
                                                d="M154.64,134.45s-.13-.46-.3-1.25-.41-2-.7-3.4c-.58-2.92-1.4-7-2.32-11.94l.37.26-16.63,3.06c-.07.09.56-.81.3-.43h0v.11l0,.14.05.29.1.57.21,1.12c.13.75.26,1.5.4,2.23.26,1.47.51,2.9.76,4.3.49,2.79,1,5.43,1.39,7.86l-.37-.26c4.92-.86,9.05-1.53,12-2l3.43-.54a9,9,0,0,1,1.27-.15,6.59,6.59,0,0,1-1.11.27l-3.34.69c-2.89.58-7.08,1.42-12.13,2.36l-.31.06-.06-.32-1.46-7.84c-.25-1.4-.52-2.83-.79-4.3-.13-.73-.26-1.48-.4-2.22l-.21-1.13-.1-.57,0-.28,0-.15v-.12h0l.3-.43,16.65-3,.31-.06.06.32c.88,5.07,1.57,9.28,2,12.19.21,1.37.38,2.49.52,3.36A6.49,6.49,0,0,1,154.64,134.45Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 144.665px 127.59px 0px;"
                                                id="elwtuz3j8u0e9" class="animable"></path>
                                            <g id="el8dp1sfa29cq">
                                                <rect x="51.87" y="55.75" width="5.23" height="15.51" rx="1.47"
                                                    style="fill: rgb(224, 224, 224); transform-origin: 54.485px 63.505px 0px; transform: rotate(-10.25deg);"
                                                    class="animable" id="elqktn5yhljl"></rect>
                                            </g>
                                            <g id="elmmrkqxhd78c">
                                                <rect x="85.31" y="49.7" width="5.23" height="15.51" rx="1.47"
                                                    style="fill: rgb(224, 224, 224); transform-origin: 87.925px 57.455px 0px; transform: rotate(-10.25deg);"
                                                    class="animable" id="elyuyskqt3bf"></rect>
                                            </g>
                                            <g id="el6qkapy2sls7">
                                                <rect x="118.75" y="43.65" width="5.23" height="15.51" rx="1.47"
                                                    style="fill: rgb(224, 224, 224); transform-origin: 121.365px 51.405px 0px; transform: rotate(-10.26deg);"
                                                    class="animable" id="elfj0p5vjncc5"></rect>
                                            </g>
                                            <path
                                                d="M163.63,140.86s-.13-.6-.35-1.74-.53-2.84-.95-5c-.81-4.41-2-10.85-3.52-19-3-16.41-7.31-39.87-12.49-68.16l.36.24L30.33,68.23h0l.29-.43c6.14,34,11.93,66.09,17,94l-.38-.26,84.06-15,23.84-4.22,6.32-1.1,1.64-.28.57-.08-.53.11-1.59.31-6.25,1.17-23.73,4.38-84.22,15.4-.32.06-.06-.33c-5.07-28-10.88-60.05-17-94l-.07-.36.36-.07h0l116.38-21,.3-.06.06.31c5.06,28.39,9.27,51.93,12.21,68.41,1.44,8.18,2.58,14.61,3.35,19l.87,5C163.55,140.29,163.63,140.86,163.63,140.86Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 96.785px 104.38px 0px;"
                                                id="el5ecrogyf1hk" class="animable"></path>
                                            <path
                                                d="M358.75,53.87a41,41,0,0,1,9.95-4.33l2.05-9.85,16.64-.29,2.4,9.77a40.77,40.77,0,0,1,10.1,4l8.41-5.52,12,11.57-5.21,8.59a41.21,41.21,0,0,1,4.33,10l9.85,2,.29,16.64-9.77,2.4a40.85,40.85,0,0,1-4,10.09l5.52,8.42-11.57,12-8.59-5.21a40.79,40.79,0,0,1-10,4.32l-2.05,9.85-16.64.3-2.4-9.78a40.89,40.89,0,0,1-10.1-4l-8.41,5.51-12-11.56,5.21-8.6a40.56,40.56,0,0,1-4.32-10l-9.85-2-.3-16.64,9.78-2.4a40.35,40.35,0,0,1,4-10.1l-5.51-8.41,11.56-12,8.6,5.21ZM367.62,76a17.86,17.86,0,1,0,25.25-.44A17.86,17.86,0,0,0,367.62,76Z"
                                                style="fill: rgb(235, 235, 235); transform-origin: 379.925px 89.01px 0px;"
                                                id="elji031mlxkq" class="animable"></path>
                                        </g>
                                        <g id="freepik--Floor--inject-15" style="transform-origin: 248px 474px 0px;"
                                            class="animable">
                                            <path
                                                d="M444.36,474c0,.14-87.92.26-196.35.26S51.64,474.18,51.64,474s87.9-.26,196.37-.26S444.36,473.89,444.36,474Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 248px 474px 0px;"
                                                id="elbpv93h0opos" class="animable"></path>
                                        </g>
                                        <g id="freepik--Clock--inject-15"
                                            style="transform-origin: 258.38px 202.294px 0px;" class="animable">
                                            <rect x="252.47" y="48.02" width="19.32" height="30.14"
                                                style="fill: rgb(38, 50, 56); transform-origin: 262.13px 63.09px 0px;"
                                                id="el9rtwzuwnu3" class="animable"></rect>
                                            <path d="M282.14,57H242.36V24.54c13.92-3.43,27.23-3.64,39.78,0Z"
                                                style="fill: #92E3A9; transform-origin: 262.25px 39.4441px 0px;"
                                                id="els1uiuv8kmvk" class="animable"></path>
                                            <path
                                                d="M282.61,24.68a6.92,6.92,0,0,1-1.47.73A36.8,36.8,0,0,1,277,27a48.93,48.93,0,0,1-6.45,1.53,55.86,55.86,0,0,1-8.1.69,55,55,0,0,1-8.1-.61,48.74,48.74,0,0,1-6.47-1.47,38.38,38.38,0,0,1-4.2-1.5,7.71,7.71,0,0,1-1.47-.71c0-.12,2.19.78,5.81,1.75a55.83,55.83,0,0,0,6.42,1.31,60.24,60.24,0,0,0,8,.55,57.83,57.83,0,0,0,8-.63,54.89,54.89,0,0,0,6.42-1.37C280.42,25.49,282.56,24.56,282.61,24.68Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 262.41px 26.9448px 0px;"
                                                id="elyogha2rysi" class="animable"></path>
                                            <path
                                                d="M255.5,57c-.19,0-.34-6.24-.34-13.93s.15-13.94.34-13.94.34,6.24.34,13.94S255.69,57,255.5,57Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 255.5px 43.065px 0px;"
                                                id="elk1gn3tvw18" class="animable"></path>
                                            <path
                                                d="M263.07,57.13c-.19,0-.34-6.26-.34-14s.15-14,.34-14,.34,6.26.34,14S263.26,57.13,263.07,57.13Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 263.07px 43.13px 0px;"
                                                id="elhahza7w07y" class="animable"></path>
                                            <path
                                                d="M270.64,57c-.19,0-.34-6.27-.34-14s.15-14,.34-14,.34,6.26.34,14S270.83,57,270.64,57Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 270.64px 43px 0px;"
                                                id="elb0y9nswbp89" class="animable"></path>
                                            <path
                                                d="M276.94,57c-.19,0-.34-6.77-.34-15.13s.15-15.12.34-15.12.34,6.77.34,15.12S277.13,57,276.94,57Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 276.94px 41.875px 0px;"
                                                id="elkeshydtwwxo" class="animable"></path>
                                            <path
                                                d="M248.34,56.82c-.19,0-.34-6.78-.34-15.13s.15-15.13.34-15.13.34,6.78.34,15.13S248.53,56.82,248.34,56.82Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 248.34px 41.69px 0px;"
                                                id="el4ircmhp3b2q" class="animable"></path>
                                            <g id="el3zko40nkzi5">
                                                <rect x="362.08" y="88.48" width="13.97" height="21.8"
                                                    style="fill: rgb(38, 50, 56); transform-origin: 369.065px 99.38px 0px; transform: rotate(46.3deg);"
                                                    class="animable" id="elk6rb10czne8"></rect>
                                            </g>
                                            <path d="M382.23,106.82,362.36,86l17-16.23c8.76,5.56,15.51,12.41,19.88,20.8Z"
                                                style="fill: #92E3A9; transform-origin: 380.8px 88.295px 0px;"
                                                id="elo3vl04mfm1q" class="animable"></path>
                                            <path
                                                d="M365.68,89.5c-.11-.12,3.74-4,8.6-8.72s8.9-8.41,9-8.3-3.74,4-8.6,8.72S365.79,89.62,365.68,89.5Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 374.48px 80.9902px 0px;"
                                                id="eltze42je1pe" class="animable"></path>
                                            <path
                                                d="M369.47,93.47a23.13,23.13,0,0,1,2.59-2.62c1.64-1.56,3.94-3.69,6.49-6l6.57-5.94,2-1.79c.48-.42.72-.64.74-.64.22.2-3.81,4.14-8.92,8.8-2.55,2.34-4.89,4.42-6.61,5.9A22.85,22.85,0,0,1,369.47,93.47Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 378.669px 84.975px 0px;"
                                                id="el5mqx8cinfiw" class="animable"></path>
                                            <path
                                                d="M374.51,98.74a24.51,24.51,0,0,1,2.63-2.63c1.66-1.57,4-3.71,6.59-6.06l6.68-6,2-1.78a8.27,8.27,0,0,1,.77-.62,15.32,15.32,0,0,1-2.54,2.71c-1.65,1.59-4,3.74-6.57,6.09s-5,4.43-6.71,5.93A22.57,22.57,0,0,1,374.51,98.74Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 383.845px 90.195px 0px;"
                                                id="elwzhr3ly5beh" class="animable"></path>
                                            <path
                                                d="M379.23,103.55c-.11-.12,3.79-4,8.72-8.66s9-8.36,9.11-8.24-3.79,4-8.72,8.66S379.34,103.66,379.23,103.55Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 388.145px 95.0998px 0px;"
                                                id="el57hg18d7uh7" class="animable"></path>
                                            <g id="elnl036spg5ho">
                                                <rect x="133.38" y="97.32" width="13.97" height="21.8"
                                                    style="fill: rgb(38, 50, 56); transform-origin: 140.365px 108.22px 0px; transform: rotate(-41.43deg);"
                                                    class="animable" id="elu5qp3mubtsj"></rect>
                                            </g>
                                            <path d="M148.31,95.36l-21.57,19L111.19,96.78c5.92-8.52,13-15,21.58-19Z"
                                                style="fill: #92E3A9; transform-origin: 129.75px 96.07px 0px;"
                                                id="elo6grxwg1se" class="animable"></path>
                                            <path
                                                d="M130.35,111.21c-.12.11-3.86-3.89-8.37-8.94s-8-9.22-7.93-9.32,3.86,3.89,8.37,8.94S130.47,111.11,130.35,111.21Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 122.201px 102.08px 0px;"
                                                id="el4wrxkepqi8p" class="animable"></path>
                                            <path
                                                d="M134.46,107.58A24.38,24.38,0,0,1,132,104.9c-1.49-1.71-3.53-4.09-5.76-6.73l-5.68-6.8L118.8,89.3c-.4-.5-.61-.74-.61-.77.21-.21,4,4,8.45,9.26,2.23,2.65,4.21,5.07,5.63,6.84A22.53,22.53,0,0,1,134.46,107.58Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 126.325px 98.0512px 0px;"
                                                id="elmfnr81rff2" class="animable"></path>
                                            <path
                                                d="M139.94,102.75a24.05,24.05,0,0,1-2.53-2.72c-1.5-1.73-3.55-4.14-5.79-6.83l-5.69-6.91-1.7-2.12a5.33,5.33,0,0,1-.59-.8,16.08,16.08,0,0,1,2.6,2.65c1.53,1.72,3.59,4.12,5.83,6.81s4.24,5.14,5.66,6.94A23.78,23.78,0,0,1,139.94,102.75Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 131.79px 93.06px 0px;"
                                                id="elw6jwpo8cxzh" class="animable"></path>
                                            <path
                                                d="M144.93,98.23c-.12.1-3.85-4-8.31-9s-8-9.33-7.87-9.43,3.84,3.94,8.3,9S145.05,98.12,144.93,98.23Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 136.84px 89.015px 0px;"
                                                id="eljtxt9b5zqh" class="animable"></path>
                                            <g id="eljl6uhrvhvt">
                                                <circle cx="258.38" cy="223.47" r="159.23"
                                                    style="fill: #92E3A9; transform-origin: 258.38px 223.47px 0px; transform: rotate(-45deg);"
                                                    class="animable" id="elt9wxbi8q4y"></circle>
                                            </g>
                                            <g id="elm9g7yc15pym">
                                                <circle cx="258.38" cy="223.47" r="146.29"
                                                    style="fill: rgb(255, 255, 255); transform-origin: 258.38px 223.47px 0px; transform: rotate(-45deg);"
                                                    class="animable" id="el9pqakvbz1gj"></circle>
                                            </g>
                                            <path
                                                d="M258.38,370.26c-80.94,0-146.79-65.85-146.79-146.79S177.44,76.68,258.38,76.68s146.79,65.85,146.79,146.79S339.32,370.26,258.38,370.26Zm0-292.58c-80.39,0-145.79,65.4-145.79,145.79S178,369.26,258.38,369.26s145.79-65.4,145.79-145.79S338.77,77.68,258.38,77.68Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 258.38px 223.47px 0px;"
                                                id="elmk1kssk0l9" class="animable"></path>
                                            <path
                                                d="M166.58,165.05c6.09-18.92,18.58-31.72,35.13-42.73s39.11-15.15,58.92-13.47v117.9Z"
                                                style="fill: #92E3A9; transform-origin: 213.605px 167.62px 0px;"
                                                id="elrto9ksfopx" class="animable"></path>
                                            <g id="el33cxg52hwz6">
                                                <g style="opacity: 0.8; transform-origin: 213.605px 167.62px 0px;"
                                                    class="animable" id="eljwkj7lfb02">
                                                    <path
                                                        d="M166.58,165.05c6.09-18.92,18.58-31.72,35.13-42.73s39.11-15.15,58.92-13.47v117.9Z"
                                                        style="fill: rgb(255, 255, 255); transform-origin: 213.605px 167.62px 0px;"
                                                        id="elc0cheklm1fq" class="animable"></path>
                                                </g>
                                            </g>
                                            <polygon
                                                points="247.97 226.11 182.16 174.99 259.23 210.52 261.49 224.02 247.97 226.11"
                                                style="fill: #92E3A9; transform-origin: 221.825px 200.55px 0px;"
                                                id="eljuldc8ji9o" class="animable"></polygon>
                                            <g id="eld95953m6jdh">
                                                <g style="opacity: 0.4; transform-origin: 220.695px 195.19px 0px;"
                                                    class="animable" id="eldmywc9fcuzs">
                                                    <polygon
                                                        points="182.16 174.99 250.88 215.39 259.23 210.52 182.16 174.99"
                                                        id="elu5oc1f34iq"
                                                        style="transform-origin: 220.695px 195.19px 0px;"
                                                        class="animable"></polygon>
                                                </g>
                                            </g>
                                            <g id="elvinvg087zeh">
                                                <circle cx="261.53" cy="224.25" r="13.69"
                                                    style="fill: rgb(250, 250, 250); transform-origin: 261.53px 224.25px 0px; transform: rotate(-22.3deg);"
                                                    class="animable" id="elxopeqwncagl"></circle>
                                            </g>
                                            <path
                                                d="M261.53,210.55a30.55,30.55,0,0,0-3.31.56,13.58,13.58,0,0,0-9.87,10.66,13.48,13.48,0,0,0,.61,7,12.36,12.36,0,0,0,1.83,3.38,12.5,12.5,0,0,0,2.84,2.83,13.33,13.33,0,0,0,15.79,0,12.35,12.35,0,0,0,2.85-2.83,12.63,12.63,0,0,0,1.83-3.38,13.47,13.47,0,0,0,.6-7,13.29,13.29,0,0,0-2.48-5.67,13.61,13.61,0,0,0-7.38-5,31,31,0,0,0-3.31-.56,10.61,10.61,0,0,1,3.37.3,13.82,13.82,0,0,1,10.35,10.82,14,14,0,0,1-.57,7.35,14.11,14.11,0,0,1-4.86,6.52,14,14,0,0,1-16.58,0,13.28,13.28,0,0,1-3-3,13.09,13.09,0,0,1-1.89-3.55,14,14,0,0,1-.58-7.35,13.82,13.82,0,0,1,10.35-10.82A10.67,10.67,0,0,1,261.53,210.55Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 261.512px 224.38px 0px;"
                                                id="elevmctrhcvyo" class="animable"></path>
                                            <path
                                                d="M261.53,214.05a10.2,10.2,0,1,1-10.19,10.2A10.2,10.2,0,0,1,261.53,214.05Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 261.54px 224.25px 0px;"
                                                id="el5p3vao0ab26" class="animable"></path>
                                            <path
                                                d="M260.85,220.23s-2.8-88.17,1.28-106.77C262.13,113.46,269,166.91,260.85,220.23Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 262.375px 166.845px 0px;"
                                                id="el7jjg6b6c48s" class="animable"></path>
                                            <path
                                                d="M252.88,358.71h-.17l.39-11h.31Zm54.89-8.92-4.1-10.2.3-.12,3.95,10.27ZM198.9,344.55l-.17-.09,4.9-9.85.27.14Zm155.5-25.3-7.84-7.71.21-.21,7.77,7.78Zm-199-9.57-.17-.21,8.53-7,.14.18Zm229.27-37.31-10.31-3.83.11-.29,10.27,3.95ZM129.79,260.12l-.08-.28L140.34,257l0,.18Zm252.42-42.28v-.17l11-.66,0,.31Zm0-.19v-.25l11-.66V217ZM137.43,206.08l-10.87-1.65,0-.25,10.88,1.66Zm231.31-37.86-.1-.2,9.77-5.06.12.23Zm-213.22-10-9.25-6,.12-.19,9.27,5.92ZM336.33,128.6l-.19-.15,6.87-8.59.19.15Zm-144.82-6.85-6-9.21.17-.1,6.1,9.15Zm99.08-16.24-.21-.05,2.76-10.65.27.07Zm-51.37-2.39-1.79-10.86.24,0,1.78,10.86Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 259.885px 225.485px 0px;"
                                                id="el4xngkex6bke" class="animable"></path>
                                        </g>
                                        <g id="freepik--Lines--inject-15" style="transform-origin: 245.43px 327.85px 0px;"
                                            class="animable">
                                            <path
                                                d="M436.8,353.7c0,.14-13.56.26-30.28.26s-30.29-.12-30.29-.26,13.56-.26,30.29-.26S436.8,353.55,436.8,353.7Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 406.515px 353.7px 0px;"
                                                id="el5aw8cqeavn9" class="animable"></path>
                                            <path
                                                d="M455.86,346.91c0,.15-13.56.26-30.28.26s-30.29-.11-30.29-.26,13.55-.26,30.29-.26S455.86,346.77,455.86,346.91Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 425.575px 346.91px 0px;"
                                                id="elkclb7mp7og" class="animable"></path>
                                            <path
                                                d="M91.16,308.82c0,.15-12.58.26-28.09.26S35,309,35,308.82s12.58-.26,28.1-.26S91.16,308.68,91.16,308.82Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 63.08px 308.82px 0px;"
                                                id="elu1ssbss86v" class="animable"></path>
                                            <path
                                                d="M108.84,302c0,.14-12.58.26-28.09.26s-28.1-.12-28.1-.26,12.58-.26,28.1-.26S108.84,301.9,108.84,302Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 80.745px 302px 0px;"
                                                id="el3ow2y4lwr62" class="animable"></path>
                                        </g>
                                        <g id="freepik--Character--inject-15"
                                            style="transform-origin: 269.553px 323.626px 0px;"
                                            class="animable animator-active">
                                            <path
                                                d="M323.86,173.85a4.58,4.58,0,0,1,5.28-.42,6.24,6.24,0,0,1,7.11,2.95,5.57,5.57,0,0,1,6.15,7.31,4.65,4.65,0,0,1,.91,8.77,4.47,4.47,0,0,1-4.93,7.4L322.73,179A4.57,4.57,0,0,1,323.86,173.85Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 334.203px 186.579px 0px;"
                                                id="el5on3s5eqqry" class="animable"></path>
                                            <path
                                                d="M338.75,200.68a19,19,0,0,0-11.2-23.14l-.92-.36c-10.08-3.3-18.51,3.42-21.52,13.59l-11.48,33.36-.27,4.66,10.23,15.42,8.71-4,5-9.34s10,2.25,13.89-7.17C333,219.16,336.09,209.48,338.75,200.68Z"
                                                style="fill: rgb(255, 191, 157); transform-origin: 316.46px 210.271px 0px;"
                                                id="elkg94gwo8wg" class="animable"></path>
                                            <path d="M317.37,230.9a24.74,24.74,0,0,1-11-8.51s-.4,8.45,9.39,11.32Z"
                                                style="fill: rgb(255, 154, 108); transform-origin: 311.869px 228.05px 0px;"
                                                id="el9qrvy4jdl28" class="animable"></path>
                                            <path
                                                d="M332.56,208.37a1.44,1.44,0,0,1-1.84.85,1.38,1.38,0,0,1-.91-1.76,1.45,1.45,0,0,1,1.84-.86A1.39,1.39,0,0,1,332.56,208.37Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 331.185px 207.912px 0px;"
                                                id="elcxhy2vv43k" class="animable"></path>
                                            <path
                                                d="M334.81,205c-.23.11-1-1-2.42-1.62s-2.81-.26-2.89-.5.25-.36.84-.52a4,4,0,0,1,4.25,1.69C334.9,204.61,334.93,205,334.81,205Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 332.182px 203.631px 0px;"
                                                id="eleabvui9vd1w" class="animable"></path>
                                            <path
                                                d="M319.85,204.09a1.44,1.44,0,0,1-1.84.85,1.39,1.39,0,0,1-.92-1.76,1.46,1.46,0,0,1,1.84-.86A1.4,1.4,0,0,1,319.85,204.09Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 318.47px 203.633px 0px;"
                                                id="elaamiudmbcim" class="animable"></path>
                                            <path
                                                d="M321,199.36c-.23.11-1-1.05-2.42-1.62s-2.81-.26-2.89-.5.24-.36.84-.51a4,4,0,0,1,2.41.18,3.84,3.84,0,0,1,1.84,1.51C321.06,198.93,321.09,199.31,321,199.36Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 318.362px 197.995px 0px;"
                                                id="el2tizdvuon0o" class="animable"></path>
                                            <path
                                                d="M321.52,212a9.92,9.92,0,0,1,2.54.5c.38.11.76.17.93-.05a2.08,2.08,0,0,0,.18-1.2c0-1,0-2.13,0-3.27.06-4.62.26-8.37.45-8.37s.29,3.76.23,8.39c0,1.14-.05,2.22-.07,3.26a2.29,2.29,0,0,1-.38,1.54,1,1,0,0,1-.82.3,2.75,2.75,0,0,1-.67-.16A10.79,10.79,0,0,1,321.52,212Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 323.694px 206.358px 0px;"
                                                id="ellti9hvfkqw" class="animable"></path>
                                            <path
                                                d="M322.14,195c-.28.35-1.49-.34-3.08-.73s-3-.4-3.06-.83c0-.21.34-.49,1-.68a4.8,4.8,0,0,1,2.51,0,4.66,4.66,0,0,1,2.17,1.2C322.11,194.46,322.27,194.88,322.14,195Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 319.092px 193.845px 0px;"
                                                id="elv02lqo19y2k" class="animable"></path>
                                            <path
                                                d="M331.46,197.93c.37-.25,1.28.44,2.5.86s2.35.52,2.47,1c.05.21-.23.49-.79.66a3.84,3.84,0,0,1-4-1.46C331.31,198.45,331.29,198.05,331.46,197.93Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 333.895px 199.218px 0px;"
                                                id="elr7dmfhuy9t" class="animable"></path>
                                            <path
                                                d="M339.55,196s-.16-6.91-2.48-9.42c-2.8-3-5.79.18-8.72-2s-5.61-5.13-10-3.9c-4.78,1.34-3.83,4-5.71,8.09C305,205.38,300,209,302.3,200.6c.25-.92-1.92-2.58-.82-6.43,1.43-5,3.54-10.92,6-13.92,2-2.52,4.46-3.87,8.27-4.9,6-1.64,12.43.8,16.59,2.94S342.87,188.71,339.55,196Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 320.821px 189.887px 0px;"
                                                id="elm5ne5wpluf" class="animable"></path>
                                            <path
                                                d="M303,200.58a2.76,2.76,0,0,0-1.8-3.57c-1.83-.52-4.19-.29-5.51,3.4-2.34,6.56,4.73,7.55,4.8,7.37S302.05,203.33,303,200.58Z"
                                                style="fill: rgb(255, 191, 157); transform-origin: 299.188px 202.301px 0px;"
                                                id="el4klqbvwlwgt" class="animable"></path>
                                            <path
                                                d="M300,204.8s-.14,0-.37.06a1.22,1.22,0,0,1-.86-.29,3,3,0,0,1-.4-3,4,4,0,0,1,.9-1.52,1.4,1.4,0,0,1,1.17-.57.63.63,0,0,1,.57.56c0,.21-.07.33,0,.35s.18-.06.22-.35a.75.75,0,0,0-.11-.5.89.89,0,0,0-.57-.39,1.66,1.66,0,0,0-1.55.59,4,4,0,0,0-1.05,1.68,3.16,3.16,0,0,0,.65,3.43,1.34,1.34,0,0,0,1.11.2C299.88,205,300,204.82,300,204.8Z"
                                                style="fill: rgb(255, 154, 108); transform-origin: 299.47px 202.111px 0px;"
                                                id="ell134eqybbj" class="animable"></path>
                                            <path
                                                d="M308.06,188.09a6.64,6.64,0,0,0,2.25,2.34,2.26,2.26,0,0,0,2.92-.56c.26-.42.35-1,.78-1.22s1.12.11,1.64.38a4.44,4.44,0,0,0,5.46-1.28,1.86,1.86,0,0,0,2.24,1.14,10.05,10.05,0,0,0,2.5-1.19,2.85,2.85,0,0,1,2.66-.24c.45.25.79.71,1.29.86.88.26,1.68-.57,2.14-1.37s.95-1.73,1.85-1.91a3.64,3.64,0,0,1,2.34.85c.74.42,1.82.63,2.32,0a1.65,1.65,0,0,0,.17-1.29A4.5,4.5,0,0,0,334.3,181a6.11,6.11,0,0,0-10-5.21,6.2,6.2,0,0,0-10.05-1.52,4.49,4.49,0,0,0-7.1,4.22,4.27,4.27,0,0,0-3.43,2.31c-.55,1.33.23,3.17,1.66,3.33a2.49,2.49,0,0,0,3.1,3.88"
                                                style="fill: rgb(38, 50, 56); transform-origin: 321.112px 181.54px 0px;"
                                                id="el2mnqb0gaztz" class="animable"></path>
                                            <path
                                                d="M304.91,184a1.62,1.62,0,0,0-.09,1.4,2.22,2.22,0,0,0,1,1.29,2.47,2.47,0,0,0,2.06.19l-.26-.15a6.9,6.9,0,0,0,.66,2.12,4.08,4.08,0,0,0,.89,1.2,2.78,2.78,0,0,0,1.26.63,2.73,2.73,0,0,0,2.28-.34,3.94,3.94,0,0,0,1.06-1.14,1.41,1.41,0,0,0,.25-.5s-.15.14-.38.41a4.67,4.67,0,0,1-1.08,1,2.84,2.84,0,0,1-3.92-1.44,6.94,6.94,0,0,1-.64-2l0-.24-.22.09a2.1,2.1,0,0,1-1.76-.12,2.05,2.05,0,0,1-.93-1.07A3.37,3.37,0,0,1,304.91,184Z"
                                                style="fill: rgb(69, 90, 100); transform-origin: 309.361px 187.396px 0px;"
                                                id="el72s9hln5txi" class="animable"></path>
                                            <path
                                                d="M323,174s.15.12.39.35a2.33,2.33,0,0,1,.67,1.25l0,.16.14-.09a8.63,8.63,0,0,1,4.13-1.3,6.6,6.6,0,0,1,2.76.44,5.63,5.63,0,0,1,2.44,1.86,5.83,5.83,0,0,1,1,2.19,4.78,4.78,0,0,1,0,2.23l-.06.22.21,0a3.83,3.83,0,0,1,3.42,3.54,5.38,5.38,0,0,1-.35,2.08,1.93,1.93,0,0,0,.28-.5,3.75,3.75,0,0,0,.29-1.59,4,4,0,0,0-.83-2.34,4.25,4.25,0,0,0-2.77-1.56l.16.24a5.05,5.05,0,0,0,.08-2.42,6,6,0,0,0-3.7-4.33,6.88,6.88,0,0,0-2.92-.43,8.49,8.49,0,0,0-4.23,1.47l.17.07a2.33,2.33,0,0,0-.81-1.29A1.18,1.18,0,0,0,323,174Z"
                                                style="fill: rgb(69, 90, 100); transform-origin: 330.661px 180.457px 0px;"
                                                id="eltonpx87obg" class="animable"></path>
                                            <path
                                                d="M321.3,217.55a24.94,24.94,0,0,0-1.94-2.18c-1.21-1.05-2.51-1.41-2.47-1.57A4,4,0,0,1,319.7,215,4,4,0,0,1,321.3,217.55Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 319.095px 215.675px 0px;"
                                                id="elxt0ocga8ge" class="animable"></path>
                                            <path
                                                d="M390.67,266.57c1.11-.31,11.94,1.46,11.94,1.46a1.87,1.87,0,0,1-2.08,2.29c-2.5-.08-10.71-.73-10.71-.73l-5.28,2.32-1.74-.76Z"
                                                style="fill: rgb(255, 154, 108); transform-origin: 392.731px 269.222px 0px;"
                                                id="eltg38cn1a0y" class="animable"></path>
                                            <path
                                                d="M368.46,268.62l15.38,1.46,2.4.29s5.67-2.06,6.71-2.24,10.58,5,10.58,5,.36,2.21-2.3,1.64a29.88,29.88,0,0,1-5.89-2.2s-8.63,4-10.35,4.81-12,.72-12,.72l-3.64,2.38Z"
                                                style="fill: rgb(255, 191, 157); transform-origin: 386.003px 274.303px 0px;"
                                                id="elwn8xzxjhg5" class="animable"></path>
                                            <path
                                                d="M374.51,292.22l6.27-4,21.57-7.68s1.89-1.73.92-2.42-23.94,2.75-23.94,2.75l-4.82,2.72Z"
                                                style="fill: rgb(255, 191, 157); transform-origin: 389.028px 285.124px 0px;"
                                                id="elwnak96lz5g" class="animable"></path>
                                            <path
                                                d="M313.62,276.91c0,1.2-18.75,32.13-24.09,39.86-7.9,11.46-15.82,12.89-15.82,12.89l-10.51-8.78L306.48,274l12.85-9.37Z"
                                                style="fill: rgb(69, 90, 100); transform-origin: 291.265px 297.145px 0px;"
                                                id="elj1lrvmi4kkd" class="animable"></path>
                                            <path
                                                d="M303.92,290.93s16.84,7.6,23.15,8.69c7.42,1.27,48.13-1.6,48.13-1.6l-.77-16.2-59.49-1.36-7.11-1.88Z"
                                                style="fill: rgb(69, 90, 100); transform-origin: 339.56px 289.262px 0px;"
                                                id="el6v2uli3p9pp" class="animable"></path>
                                            <g id="elpyrocnn9z5">
                                                <g style="opacity: 0.3; transform-origin: 287.395px 302.282px 0px;"
                                                    class="animable" id="elxrmgzit1n1j">
                                                    <path
                                                        d="M309.48,278.13c-1.23.56-1.93,3.81-2.86,4.78-9.86,10.35-17.08,22-27.26,31.4-4.39,4-9.36,7.48-15.32,7.19l6.08,5.16c5.07-.1,8.42-2.48,12.24-5.81s5.45-8.11,8.39-12.23c6.72-9.38,13.29-19.88,20-29.27C310.42,278.05,310.71,277.58,309.48,278.13Z"
                                                        id="elu6aw0k734h"
                                                        style="transform-origin: 287.395px 302.282px 0px;"
                                                        class="animable"></path>
                                                </g>
                                            </g>
                                            <path
                                                d="M265.79,321.39s8.79.67,12.11-1.38c4-2.46,39.09-48.52,39.09-48.52l.31-36-19.82-18.91-2.05,3.11-42.15,48.11-27,25.66,32.42,17.42Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 271.79px 269.037px 0px;"
                                                id="elhrc3arcp6g" class="animable"></path>
                                            <path
                                                d="M309.05,270.43c-1.05,1.26.63,19.4-23,21.93-19.94,2.13-61.51-.09-74-.83a5.82,5.82,0,0,1-5.57-6,5,5,0,0,1,2-3.66c4.42-3.61,9.06-2.49,11.81-9.91s1.49-10.16,6.32-13.1c6.83-4.15,23.56,3.46,23.56,3.46,4.2-6.36,6.41-12,12.32-19.56,4.77-6.13,11.24-14.53,16.49-17.5a67.23,67.23,0,0,1,9.67-3.82l3.24-.57L294,218c3.18,3.24,15.07,14.2,17.17,18l2.41,14Z"
                                                style="fill: rgb(69, 90, 100); transform-origin: 260.029px 255.63px 0px;"
                                                id="elyj45vudjsl" class="animable"></path>
                                            <g id="elsrucz8ikfs">
                                                <g style="opacity: 0.3; transform-origin: 338.382px 283.701px 0px;"
                                                    class="animable" id="elhprk0awwbzn">
                                                    <path
                                                        d="M364.57,284.64c-15.65-1.09-31.92-2.18-51.26-6.23l-1.19,2.6c11.15,7,18.87,7.21,27.32,7.82s16.31-.69,24.48-.69A5.15,5.15,0,0,0,364.57,284.64Z"
                                                        id="elwwaf70l186"
                                                        style="transform-origin: 338.382px 283.701px 0px;"
                                                        class="animable"></path>
                                                </g>
                                            </g>
                                            <g id="eleblp8slwrz6">
                                                <g style="opacity: 0.3; transform-origin: 290.755px 263.678px 0px;"
                                                    class="animable" id="el6nkdlrn9ybx">
                                                    <path
                                                        d="M278.12,248l-6.35.4c2.64,8.61,6.9,11.52,14.15,16.86s8.42,6.9,16.63,10.58c.79.35,7,4.23,7.19,3.4C295.64,270.58,287.51,261.61,278.12,248Z"
                                                        id="elwtbj2ydrgi"
                                                        style="transform-origin: 290.755px 263.678px 0px;"
                                                        class="animable"></path>
                                                </g>
                                            </g>
                                            <path
                                                d="M271.9,242.37c-2.3,6.41,1.87,9.36,1.87,9.36s34,30.88,47.73,32.44,49.72-.35,49.72-.35V267.06l-43.84-4.71s-17.64-20.79-27.4-31.21"
                                                style="fill: rgb(69, 90, 100); transform-origin: 321.214px 257.961px 0px;"
                                                id="el82pjur5iaeh" class="animable"></path>
                                            <path
                                                d="M300,231.14s.19.17.53.52l1.49,1.58c1.3,1.39,3.21,3.46,5.61,6.14,4.82,5.36,11.66,13.17,19.93,22.84l-.14-.07,43.85,4.66.23,0v17.24h-.24l-7.87.36c-11.13.44-21.88.73-32,.53l-3.77-.12c-1.25-.08-2.48-.13-3.71-.22a32.16,32.16,0,0,1-3.65-.44c-.59-.14-1.18-.3-1.75-.47s-1.14-.38-1.69-.61a71.06,71.06,0,0,1-11.93-6.57,231.64,231.64,0,0,1-18.55-13.88c-5.18-4.26-9.42-8-12.6-10.85h0a6.93,6.93,0,0,1-2.32-3.71,8.13,8.13,0,0,1-.15-3.2,9.59,9.59,0,0,1,.44-1.91c.14-.42.22-.62.22-.62s0,.22-.16.64a9.59,9.59,0,0,0-.39,1.9,8.13,8.13,0,0,0,.2,3.14,6.78,6.78,0,0,0,2.29,3.59h0c3.2,2.85,7.46,6.52,12.67,10.74s11.36,9,18.57,13.79A70.65,70.65,0,0,0,317,282.67c.54.22,1.11.39,1.66.59s1.14.33,1.71.46a31.75,31.75,0,0,0,3.59.42c1.22.1,2.45.14,3.69.22l3.76.11c10.12.19,20.87-.11,32-.55l7.86-.36-.25.26c0-5.76,0-11.39,0-16.76l.23.25-43.84-4.76h-.08l0-.06c-8.23-9.69-15-17.54-19.79-23l-5.53-6.21-1.45-1.62C300.14,231.34,300,231.14,300,231.14Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 321.338px 258.072px 0px;"
                                                id="elvfiil0yb4c" class="animable"></path>
                                            <path
                                                d="M312.25,280.73a12.27,12.27,0,0,1-.94,1.5l-2.64,4c-2.21,3.42-5.2,8.2-8.48,13.49s-6.26,10.07-8.47,13.5c-1.11,1.72-2,3.1-2.66,4a12,12,0,0,1-1,1.44,11.45,11.45,0,0,1,.87-1.55l2.51-4.12,8.35-13.59c3.28-5.29,6.32-10,8.61-13.42,1.15-1.69,2.1-3,2.78-3.95A11.43,11.43,0,0,1,312.25,280.73Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 300.155px 299.695px 0px;"
                                                id="elbs6s7rh74u" class="animable"></path>
                                            <path
                                                d="M414.07,276.67,373,283a1.42,1.42,0,0,1-1.64-1.2l-.07-.42a1.45,1.45,0,0,1,1.21-1.65l43.6-6.46-.54,2.1A1.77,1.77,0,0,1,414.07,276.67Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 393.687px 278.145px 0px;"
                                                id="eld3rspvqys8" class="animable"></path>
                                            <path
                                                d="M414.07,276.67a1.89,1.89,0,0,0,1.45-1.68c.12-.52.26-1.12.42-1.78l.12.13c-7.26,1.17-23.65,3.66-42.69,6.48a9.35,9.35,0,0,0-1.15.2,1.21,1.21,0,0,0-.67.7,1.35,1.35,0,0,0-.06.49c0,.16.05.4.08.56a1.22,1.22,0,0,0,.55.79,1.33,1.33,0,0,0,1,.12l1.16-.18,2.31-.35,8.81-1.33,14.91-2.23,10.07-1.45,2.74-.37.71-.09h.25l-.24.06-.71.14-2.72.47-10,1.62-14.9,2.33-8.8,1.36-2.31.36-1.17.18a1.83,1.83,0,0,1-1.32-.19,1.69,1.69,0,0,1-.79-1.12c0-.23-.07-.39-.1-.63a1.65,1.65,0,0,1,.09-.7,1.72,1.72,0,0,1,1-1,8.26,8.26,0,0,1,1.26-.23c19-2.83,35.45-5.2,42.74-6.18l.16,0,0,.16-.48,1.77a2.17,2.17,0,0,1-.61,1.2,1.6,1.6,0,0,1-.72.4C414.16,276.68,414.07,276.68,414.07,276.67Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 393.642px 278.199px 0px;"
                                                id="elm8cvf85ffyo" class="animable"></path>
                                            <path
                                                d="M412.88,273.63l12.32-41.45a1.46,1.46,0,0,1,1.83-1l.36.11a1.47,1.47,0,0,1,1,1.83l-13,42.49Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 420.665px 253.363px 0px;"
                                                id="elxfz25uyrorr" class="animable"></path>
                                            <path
                                                d="M412.88,273.63l.18.12.49.37,1.9,1.44-.15,0c1.85-6.42,7-23.25,12.87-42.77a1.25,1.25,0,0,0-.32-.94,1.84,1.84,0,0,0-1-.46,1.24,1.24,0,0,0-1.5,1c-.46,1.54-.91,3.06-1.36,4.55l-2.57,8.59c-1.65,5.47-3.14,10.41-4.4,14.56s-2.29,7.48-3,9.85c-.36,1.13-.64,2-.84,2.68-.1.29-.17.52-.24.71a.91.91,0,0,1-.09.24s0-.07,0-.23.11-.41.19-.69l.74-2.66c.69-2.37,1.65-5.73,2.84-9.85s2.68-9.15,4.29-14.66c.81-2.76,1.67-5.65,2.55-8.66.45-1.5.9-3,1.36-4.57a1.84,1.84,0,0,1,.75-1.14,1.7,1.7,0,0,1,1.37-.24c.24.07.38.1.63.19a1.87,1.87,0,0,1,.59.42,1.76,1.76,0,0,1,.46,1.33,8.06,8.06,0,0,1-.26,1l-.28.91c-.19.61-.37,1.22-.56,1.82-.36,1.2-.73,2.39-1.09,3.56L424.4,247c-1.36,4.42-2.64,8.55-3.78,12.27-2.31,7.36-4.11,13.1-5.14,16.4l0,.13-.11-.09-1.86-1.54A4.47,4.47,0,0,1,412.88,273.63Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 420.738px 253.309px 0px;"
                                                id="elqgnyq0cjqhe" class="animable"></path>
                                            <path
                                                d="M308.67,238.65c-.07,0-.84-1.09-2.18-2.86a80,80,0,0,0-5.59-6.58c-2.32-2.46-4.56-4.55-6.18-6.06a26.87,26.87,0,0,1-2.59-2.49,4.21,4.21,0,0,1,.8.55c.49.38,1.19.95,2,1.67a79.4,79.4,0,0,1,6.3,6,56.67,56.67,0,0,1,5.52,6.72c.64.91,1.12,1.67,1.43,2.21A3.52,3.52,0,0,1,308.67,238.65Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 300.4px 229.655px 0px;"
                                                id="el73d4uf39w9t" class="animable"></path>
                                            <g id="elepf5xqkgli9">
                                                <g style="opacity: 0.3; transform-origin: 250.157px 278.9px 0px;"
                                                    class="animable" id="elha9odvtt9l">
                                                    <path
                                                        d="M293.93,290.69c-2.91.77-25.92-.79-37.46-4.48-8.28-2.65-16.32-6.12-21.83-10.24a43.85,43.85,0,0,1-10.82-11.38c-1.33-.76-2.2,3.24-2.73,4.89s-1.63,6-4.68,8c-3.74,2.43-9.48,3.23-10,8.2-.33,3.11,2.5,5.69,5.63,5.84,9.85.48,37,1.79,44.28,1.78C265.22,293.25,284.28,293.76,293.93,290.69Z"
                                                        id="elczwnh2yvytg"
                                                        style="transform-origin: 250.157px 278.9px 0px;" class="animable">
                                                    </path>
                                                </g>
                                            </g>
                                            <path
                                                d="M297.6,289a6.22,6.22,0,0,1-.64.55,8.6,8.6,0,0,1-2.23,1,30.11,30.11,0,0,1-8.89.56c-3.77-.18-8.22-.74-13.14-1.44a133.5,133.5,0,0,1-15.88-3.09,72,72,0,0,1-15.11-5.8,50.91,50.91,0,0,1-10.81-7.61,40,40,0,0,1-5.86-6.72c-.59-.87-1-1.56-1.29-2.05a5.67,5.67,0,0,1-.4-.74,4.19,4.19,0,0,1,.49.69c.29.47.75,1.14,1.37,2a42.88,42.88,0,0,0,5.94,6.56,52.29,52.29,0,0,0,10.78,7.46A73,73,0,0,0,257,286a138.33,138.33,0,0,0,15.82,3.11c4.92.73,9.35,1.33,13.09,1.56a31.71,31.71,0,0,0,8.82-.4,9.17,9.17,0,0,0,2.22-.87A6.93,6.93,0,0,1,297.6,289Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 260.475px 277.44px 0px;"
                                                id="elstluw1p7dpd" class="animable"></path>
                                            <path
                                                d="M302.27,283.31c-.1.1-.79-.47-1.53-1.27s-1.26-1.53-1.15-1.62.79.47,1.53,1.27S302.38,283.22,302.27,283.31Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 300.93px 281.866px 0px;"
                                                id="elso64wo7n0qn" class="animable"></path>
                                            <path
                                                d="M295.63,230.07c0,.09-1.42-.55-3.8-.94a18.19,18.19,0,0,0-16.89,6.14c-1.57,1.84-2.22,3.22-2.31,3.17a3.68,3.68,0,0,1,.42-1,15.31,15.31,0,0,1,1.61-2.42,17.57,17.57,0,0,1,17.23-6.27,16,16,0,0,1,2.79.82A3.14,3.14,0,0,1,295.63,230.07Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 284.13px 233.42px 0px;"
                                                id="elp8043cq10os" class="animable"></path>
                                            <path
                                                d="M286.31,276.5a1.36,1.36,0,0,1-.38.16,9.39,9.39,0,0,1-1.12.36,15.81,15.81,0,0,1-4.31.47,22.86,22.86,0,0,1-6.34-1.13,36.22,36.22,0,0,1-7.15-3.29c-2.4-1.43-4.58-2.95-6.56-4.32s-3.76-2.59-5.31-3.54-2.84-1.66-3.74-2.12a10.16,10.16,0,0,1-1.4-.74,1.73,1.73,0,0,1,.39.12c.25.1.63.23,1.09.44a36.56,36.56,0,0,1,3.85,2c3.19,1.79,7.21,4.86,11.94,7.72a38,38,0,0,0,7,3.28,23.08,23.08,0,0,0,6.2,1.22A21.71,21.71,0,0,0,286.31,276.5Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 268.155px 269.923px 0px;"
                                                id="elm1u8kbglvm" class="animable"></path>
                                            <path
                                                d="M295.63,289a6.23,6.23,0,0,1-.76,0l-2.18-.12c-.94-.05-2.1-.13-3.44-.27s-2.87-.25-4.55-.49-3.53-.44-5.49-.79-4.06-.73-6.26-1.18a123.42,123.42,0,0,1-14.06-3.89,108.46,108.46,0,0,1-13.41-5.77c-2-1.08-3.86-2.07-5.54-3.15-.84-.54-1.68-1-2.44-1.54l-2.19-1.52c-1.42-.93-2.59-1.93-3.66-2.74-.53-.42-1-.8-1.47-1.17l-1.19-1-1.63-1.46a4.25,4.25,0,0,1-.54-.54,5.57,5.57,0,0,1,.61.46l1.69,1.38,1.21,1c.45.36,1,.72,1.49,1.13,1.09.79,2.27,1.76,3.7,2.67l2.2,1.48c.76.52,1.6,1,2.45,1.51,1.68,1.06,3.57,2,5.53,3.1a113.17,113.17,0,0,0,13.36,5.7,131.1,131.1,0,0,0,14,3.92c2.19.46,4.27.9,6.23,1.21s3.79.62,5.47.86,3.2.39,4.53.56,2.49.27,3.43.36l2.17.21A3.51,3.51,0,0,1,295.63,289Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 261.225px 276.191px 0px;"
                                                id="el7qfrlg6g9fl" class="animable"></path>
                                            <path
                                                d="M283.5,447.33l-1.63,27.09,41,.31c-.21-3.92-21.38-12-21.38-12l.63-14.69Z"
                                                style="fill: #92E3A9; transform-origin: 302.37px 461.03px 0px;"
                                                id="elnofuswxudwa" class="animable"></path>
                                            <path
                                                d="M288.85,460.91a1.67,1.67,0,0,0-1.17,1.9,1.6,1.6,0,0,0,1.87,1.18,1.78,1.78,0,0,0,1.24-2,1.67,1.67,0,0,0-2.09-1"
                                                style="fill: rgb(224, 224, 224); transform-origin: 289.234px 462.463px 0px;"
                                                id="eleszhpp6pabu" class="animable"></path>
                                            <path d="M281.87,474.42V471l39.45,1.8s1.82.82,1.59,2.11Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 302.4px 472.955px 0px;"
                                                id="elm9mui6gmkw" class="animable"></path>
                                            <path
                                                d="M302.19,462.58c0,.2-1,.28-2,.92s-1.52,1.47-1.7,1.39.12-1.23,1.33-2S302.24,462.39,302.19,462.58Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 300.317px 463.635px 0px;"
                                                id="el03doxl3s3oiq" class="animable"></path>
                                            <path
                                                d="M306.48,464.39c0,.19-.82.53-1.51,1.37s-.89,1.74-1.09,1.73-.32-1.15.56-2.18S306.48,464.2,306.48,464.39Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 305.109px 465.899px 0px;"
                                                id="elq08957s9rh" class="animable"></path>
                                            <path
                                                d="M308.89,469.56c-.18,0-.45-1,.07-2.06s1.46-1.52,1.55-1.35-.5.75-.92,1.65S309.09,469.54,308.89,469.56Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 309.588px 467.838px 0px;"
                                                id="elovpvik1iuu" class="animable"></path>
                                            <path
                                                d="M301.87,457.74c-.09.18-1-.1-2.14,0s-2,.42-2.12.25.75-.88,2.09-.94S302,457.58,301.87,457.74Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 299.74px 457.542px 0px;"
                                                id="el69wbbkqhnom" class="animable"></path>
                                            <path
                                                d="M300.93,452.86a3.94,3.94,0,0,1-2.06,0,9.5,9.5,0,0,1-2.14-.68,9.77,9.77,0,0,1-1.18-.64,2.48,2.48,0,0,1-.62-.48.88.88,0,0,1-.08-1.07,1.07,1.07,0,0,1,.88-.45,2.51,2.51,0,0,1,.77.11,7.19,7.19,0,0,1,3.16,1.71c.95.88,1.27,1.64,1.2,1.67s-.55-.56-1.52-1.3a8.31,8.31,0,0,0-1.82-1,8.15,8.15,0,0,0-1.18-.38c-.43-.11-.8-.12-.91.07s-.05.11,0,.23a2,2,0,0,0,.45.36,11.14,11.14,0,0,0,1.08.63,12,12,0,0,0,2,.78A13.55,13.55,0,0,1,300.93,452.86Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 297.818px 451.285px 0px;"
                                                id="eln30clqykpg" class="animable"></path>
                                            <path
                                                d="M300.66,453.15a3.28,3.28,0,0,1-.52-2,6.43,6.43,0,0,1,.83-3.49,1.67,1.67,0,0,1,1.32-1,1,1,0,0,1,.85.58,3.05,3.05,0,0,1,.21.75,5,5,0,0,1,0,1.39,4.71,4.71,0,0,1-.9,2.11c-.81,1.06-1.65,1.29-1.66,1.23s.63-.49,1.25-1.5a4.84,4.84,0,0,0,.67-1.93,4.34,4.34,0,0,0,0-1.19c-.06-.44-.22-.79-.39-.75s-.55.33-.72.67a7.91,7.91,0,0,0-.52,1.11,7.36,7.36,0,0,0-.41,2.05C300.56,452.36,300.77,453.12,300.66,453.15Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 301.765px 449.905px 0px;"
                                                id="el28l2et52gpr" class="animable"></path>
                                            <path d="M144,382.6l-26.47-6-7,40.44c3.9.43,15.26-19.16,15.26-19.16l14.39,3Z"
                                                style="fill: #92E3A9; transform-origin: 127.265px 396.824px 0px;"
                                                id="elu8lrumgbofh" class="animable"></path>
                                            <path
                                                d="M129.77,385.68a1.68,1.68,0,0,0-1.68-1.47,1.61,1.61,0,0,0-1.47,1.66,1.77,1.77,0,0,0,1.79,1.55,1.67,1.67,0,0,0,1.34-1.9"
                                                style="fill: rgb(224, 224, 224); transform-origin: 128.195px 385.815px 0px;"
                                                id="eloxmgfubnht" class="animable"></path>
                                            <path d="M117.57,376.6l3.42.55-8.18,38.64s-1.1,1.65-2.33,1.22Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 115.735px 396.841px 0px;"
                                                id="elrctcn15pc1d" class="animable"></path>
                                            <path
                                                d="M126,398.57c-.19,0-.11-1-.58-2.12s-1.21-1.74-1.1-1.91,1.2.32,1.74,1.64S126.14,398.65,126,398.57Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 125.313px 396.541px 0px;"
                                                id="eluyyi9j855a" class="animable"></path>
                                            <path
                                                d="M123.48,402.51c-.2,0-.39-.9-1.11-1.71s-1.57-1.16-1.53-1.36,1.18-.13,2.06.9S123.67,402.54,123.48,402.51Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 122.225px 400.931px 0px;"
                                                id="eliiv5wt1p8l" class="animable"></path>
                                            <path
                                                d="M118,404.05c0-.19,1-.29,2,.4s1.27,1.69,1.09,1.75-.66-.62-1.48-1.18S118,404.25,118,404.05Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 119.571px 405.057px 0px;"
                                                id="el5o5w2n9s2km" class="animable"></path>
                                            <path
                                                d="M130.79,399c-.17-.12.26-1,.38-2.1s-.09-2.07.1-2.14.75.89.59,2.21S130.93,399.16,130.79,399Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 131.32px 396.888px 0px;"
                                                id="elahqg8nexadm" class="animable"></path>
                                            <path
                                                d="M135.75,398.9a4,4,0,0,1,.36-2,9.52,9.52,0,0,1,1-2,9.74,9.74,0,0,1,.82-1.06,2.79,2.79,0,0,1,.58-.53.87.87,0,0,1,1.06.09,1.11,1.11,0,0,1,.31.95,2.68,2.68,0,0,1-.24.74,6.65,6.65,0,0,1-.65,1.18,7.14,7.14,0,0,1-1.54,1.66,3.49,3.49,0,0,1-1.85.91c-.05-.1.64-.45,1.52-1.29a7.87,7.87,0,0,0,1.33-1.63,6.67,6.67,0,0,0,.56-1.1c.19-.41.25-.77.08-.91s-.09-.07-.23,0a2.1,2.1,0,0,0-.43.39,9.88,9.88,0,0,0-.79,1,11.23,11.23,0,0,0-1.09,1.83A12.85,12.85,0,0,1,135.75,398.9Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 137.745px 396.036px 0px;"
                                                id="elx85rgoux0m" class="animable"></path>
                                            <path
                                                d="M135.52,398.59a3.3,3.3,0,0,1,2-.19,6.6,6.6,0,0,1,2.17.65,7.15,7.15,0,0,1,1.15.73,1.74,1.74,0,0,1,.8,1.47,1,1,0,0,1-.71.75,2.79,2.79,0,0,1-.78.08,5,5,0,0,1-1.37-.23,4.81,4.81,0,0,1-1.94-1.23c-.91-1-1-1.84-.94-1.84s.38.7,1.28,1.48a4.62,4.62,0,0,0,1.79,1,4.16,4.16,0,0,0,1.18.17c.44,0,.81-.1.8-.26s-.23-.6-.54-.83a6.54,6.54,0,0,0-1-.69,7.2,7.2,0,0,0-2-.74C136.3,398.62,135.53,398.71,135.52,398.59Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 138.58px 400.203px 0px;"
                                                id="el69e2115mkr" class="animable"></path>
                                            <path
                                                d="M222.23,296.86c-1.47,2.34-16.65,10.34-16.29,34.13L196,383l-59.24-5.55-5.49,23.78,75.19,12.4s10.61,2.56,16.83-9.88,22.86-57.76,23.22-58.86,10.61-27.81,10.61-27.81Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 194.195px 355.354px 0px;"
                                                id="ell9qygmwwb7" class="animable"></path>
                                            <path
                                                d="M211.25,314.58c-.13.7-4.06,15.77,11.46,27s60.92,40.14,60.92,40.14l1.2,4.78L280.76,457l25.73.5S314,388.16,314.21,381s-.56-17-9.73-24.9L256.4,314.58s-32.36-17.91-32-17.72S213.16,304.07,211.25,314.58Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 262.476px 377.179px 0px;"
                                                id="el93bas2pvba4" class="animable"></path>
                                            <path
                                                d="M222.23,296.86l3.44-4.61s15,6.12,24.78,13.18c6.21,4.49,15.28,10.51,14.47,16.89Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 243.6px 307.285px 0px;"
                                                id="elg2y5aojtatl" class="animable"></path>
                                            <path
                                                d="M283.63,381.71a1.32,1.32,0,0,1-.26-.14l-.74-.45-2.84-1.77-10.35-6.59c-8.72-5.6-20.77-13.32-33.93-22.09-3.3-2.19-6.4-4.49-9.49-6.59a66.07,66.07,0,0,1-8.44-6.69,22.79,22.79,0,0,1-5.59-8,23,23,0,0,1-1.47-8.38,26.12,26.12,0,0,1,2.83-11.89,18.89,18.89,0,0,1,1.79-2.82l.56-.67a1.87,1.87,0,0,1,.2-.22s-.05.09-.16.25l-.51.7a22,22,0,0,0-1.7,2.85,26.38,26.38,0,0,0-2.64,11.8,22.73,22.73,0,0,0,1.5,8.22,22.45,22.45,0,0,0,5.52,7.79,66.68,66.68,0,0,0,8.41,6.63c3.08,2.09,6.19,4.39,9.48,6.57C249,359,261,366.77,269.64,372.45l10.26,6.73,2.78,1.85.72.5C283.56,381.64,283.64,381.7,283.63,381.71Z"
                                                style="fill: rgb(69, 90, 100); transform-origin: 247.075px 343.56px 0px;"
                                                id="eld8c6wy1mm8f" class="animable"></path>
                                            <path
                                                d="M286,340.14a2.54,2.54,0,0,1-.45-.32l-1.21-1L280,335.18l-14.34-12.26a114.58,114.58,0,0,0-15-11.39c-2-1.33-3.66-2.37-4.8-3.09l-1.31-.84c-.3-.19-.45-.3-.44-.32a2.87,2.87,0,0,1,.49.23c.32.17.78.42,1.36.75,1.18.67,2.86,1.67,4.9,3A104.18,104.18,0,0,1,266,322.53l14.23,12.37,4.27,3.79,1.15,1.05C285.89,340,286,340.12,286,340.14Z"
                                                style="fill: rgb(69, 90, 100); transform-origin: 265.055px 323.71px 0px;"
                                                id="elibz54pw8q5" class="animable"></path>
                                            <path
                                                d="M205.07,397.87a68.91,68.91,0,0,1-4.83-7.11,72.14,72.14,0,0,1-4.4-7.39,71.28,71.28,0,0,1,4.84,7.11A74.37,74.37,0,0,1,205.07,397.87Z"
                                                style="fill: rgb(69, 90, 100); transform-origin: 200.455px 390.62px 0px;"
                                                id="elbhj4mhuri0o" class="animable"></path>
                                            <path
                                                d="M209.32,393.28a56,56,0,0,1-6.1-4.65,55,55,0,0,1-5.78-5.05,56.62,56.62,0,0,1,6.11,4.65A55.44,55.44,0,0,1,209.32,393.28Z"
                                                style="fill: rgb(69, 90, 100); transform-origin: 203.38px 388.43px 0px;"
                                                id="elffoj4sdbnkl" class="animable"></path>
                                            <path
                                                d="M296.2,377.13c0,.15-3,1-6.63,2.16s-6.61,2.21-6.67,2.07a8.12,8.12,0,0,1,1.85-.89c1.18-.48,2.82-1.09,4.66-1.68s3.53-1,4.76-1.32A7.8,7.8,0,0,1,296.2,377.13Z"
                                                style="fill: rgb(69, 90, 100); transform-origin: 289.55px 379.251px 0px;"
                                                id="elbkjzimyws0k" class="animable"></path>
                                            <path
                                                d="M297.82,385.57a62.41,62.41,0,0,1-6.32.45,62.57,62.57,0,0,1-6.33.35,28.48,28.48,0,0,1,6.3-.87A28,28,0,0,1,297.82,385.57Z"
                                                style="fill: rgb(69, 90, 100); transform-origin: 291.495px 385.861px 0px;"
                                                id="elylbulthz15m" class="animable"></path>
                                        </g>
                                        <g id="freepik--Documents--inject-15"
                                            style="transform-origin: 221.99px 384.565px 0px;" class="animable">
                                            <path
                                                d="M124.86,454.32c10.4-10.71,22-16.56,36.91-17.86-3.51-5.47-9.75-16.13-13.26-21.6-18.69.09-33.21,10.63-43,26.34C112.39,446.17,118,449.35,124.86,454.32Z"
                                                style="fill: rgb(224, 224, 224); transform-origin: 133.64px 434.59px 0px;"
                                                id="elk78uf8yrj8g" class="animable"></path>
                                            <path
                                                d="M124.86,454.32l-.34-.21-1-.69-3.87-2.59c-3.37-2.25-8.38-5.28-14.27-9.48l-.15-.1.1-.15a76.06,76.06,0,0,1,6-8.32,57.92,57.92,0,0,1,8.4-8.09,48.17,48.17,0,0,1,11-6.51,45.69,45.69,0,0,1,13.27-3.33,21.1,21.1,0,0,1,2.24-.17l2.21-.08h.15l.07.13c4.84,7.64,9.1,15.08,13.25,21.62l.21.32-.39,0a58.22,58.22,0,0,0-16.47,3.76,54,54,0,0,0-11.57,6.32,70.47,70.47,0,0,0-6.65,5.44l-1.67,1.59-.42.39q-.15.14-.15.12l.14-.16.41-.43c.36-.37.87-.93,1.58-1.62a64.89,64.89,0,0,1,6.59-5.56,52.52,52.52,0,0,1,11.59-6.45,57.84,57.84,0,0,1,16.58-3.87l-.18.36c-4.18-6.53-8.46-14-13.28-21.59l.22.12-2.2.08c-.73,0-1.47.06-2.21.16A45.38,45.38,0,0,0,131,418.65a47.64,47.64,0,0,0-10.93,6.42,58.76,58.76,0,0,0-8.37,8,79.78,79.78,0,0,0-6,8.23l0-.26c5.85,4.22,10.84,7.31,14.16,9.61,1.68,1.14,3,2.06,3.82,2.68l1,.72Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 133.68px 434.46px 0px;"
                                                id="elywz4dg5omx" class="animable"></path>
                                            <path
                                                d="M114.06,437.14a66.73,66.73,0,0,1,6.74,4.8,67.91,67.91,0,0,1,6.43,5.22,63.05,63.05,0,0,1-6.74-4.8A67.91,67.91,0,0,1,114.06,437.14Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 120.645px 442.15px 0px;"
                                                id="elc4nshxfu73f" class="animable"></path>
                                            <path
                                                d="M117.89,432.29a64.85,64.85,0,0,1,6.29,5.38,66.65,66.65,0,0,1,5.93,5.77,65.5,65.5,0,0,1-6.28-5.38A66.05,66.05,0,0,1,117.89,432.29Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 124px 437.865px 0px;"
                                                id="elhchxmrrqn7l" class="animable"></path>
                                            <path
                                                d="M123.6,427.75a12.11,12.11,0,0,1,1.69,1.71c1,1.09,2.4,2.58,4,4.22s2.95,3.15,3.89,4.3a9.2,9.2,0,0,1,1.42,1.94,12.31,12.31,0,0,1-1.69-1.7l-4-4.18c-1.56-1.64-2.93-3.18-3.86-4.34A10.05,10.05,0,0,1,123.6,427.75Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 129.1px 433.835px 0px;"
                                                id="elzlwaipwdlmg" class="animable"></path>
                                            <path
                                                d="M139.4,438.17a10.09,10.09,0,0,1-1.64-1.75c-.94-1.14-2.18-2.77-3.43-4.65s-2.3-3.62-3.05-4.9a11,11,0,0,1-1.11-2.12,76.92,76.92,0,0,1,4.59,6.73c1.25,1.87,2.43,3.53,3.29,4.72A11.74,11.74,0,0,1,139.4,438.17Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 134.785px 431.46px 0px;"
                                                id="elfsiebqmlh8s" class="animable"></path>
                                            <path
                                                d="M143.89,436.29a9.52,9.52,0,0,1-1.35-1.73c-.78-1.12-1.79-2.7-2.8-4.51s-1.83-3.49-2.38-4.73a9,9,0,0,1-.76-2.07c.14-.06,1.58,3,3.6,6.55S144,436.2,143.89,436.29Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 140.247px 429.77px 0px;"
                                                id="eln4uucgh4xb9" class="animable"></path>
                                            <path
                                                d="M149.9,434.34a9.69,9.69,0,0,1-1.39-1.76c-.79-1.13-1.85-2.73-2.95-4.53s-2-3.47-2.67-4.7a9,9,0,0,1-.93-2,10.26,10.26,0,0,1,1.25,1.86l2.8,4.61c1,1.7,2,3.24,2.81,4.6A9,9,0,0,1,149.9,434.34Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 145.93px 427.845px 0px;"
                                                id="el1t6p2yono2g" class="animable"></path>
                                            <path
                                                d="M207,327.85c-16.29.35-29.82-4-42.36-14.42-1.46,6.94-4.79,20-6.26,26.95C173,354.62,192.31,357.57,212,352.9,210.43,343.74,208.54,337,207,327.85Z"
                                                style="fill: rgb(250, 250, 250); transform-origin: 185.19px 334.191px 0px;"
                                                id="elkn7620oecah" class="animable"></path>
                                            <path
                                                d="M207,327.85s0,.14.1.43.15.75.26,1.31c.23,1.17.57,2.84,1,5,.88,4.33,2.44,10.52,3.81,18.3l0,.18-.18,0A84,84,0,0,1,201,354.92a64.07,64.07,0,0,1-12.73-.15,52.85,52.85,0,0,1-13.55-3.41,49.7,49.7,0,0,1-12.85-7.58,20.24,20.24,0,0,1-1.86-1.59l-1.79-1.63-.11-.09,0-.15c2.11-9.64,4.5-18.68,6.29-26.94l.09-.38.3.25a63.32,63.32,0,0,0,15.68,9.7,58.37,58.37,0,0,0,13.83,4,77.65,77.65,0,0,0,9.34.87l2.51,0,.63,0H207l-.23,0-.65,0c-.57,0-1.39.05-2.47,0a69.61,69.61,0,0,1-9.38-.74,57.49,57.49,0,0,1-13.94-3.88,63.47,63.47,0,0,1-15.84-9.7l.39-.13c-1.77,8.28-4.15,17.33-6.25,26.95l-.07-.24,1.77,1.62c.59.54,1.19,1.08,1.84,1.57a49.63,49.63,0,0,0,12.72,7.51,52.18,52.18,0,0,0,13.42,3.39,63.2,63.2,0,0,0,12.63.2,87.39,87.39,0,0,0,11-1.76l-.14.21c-1.31-7.76-2.82-14-3.64-18.31-.43-2.17-.72-3.86-.91-5-.09-.55-.15-1-.2-1.3A2.9,2.9,0,0,1,207,327.85Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 185.14px 334.083px 0px;"
                                                id="elikd2jqx6n3" class="animable"></path>
                                            <path
                                                d="M202.2,349.47a78.18,78.18,0,0,1-1.53-8.9,79,79,0,0,1-1-9,78.18,78.18,0,0,1,1.53,8.9A79,79,0,0,1,202.2,349.47Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 200.935px 340.52px 0px;"
                                                id="elfx6kcuemt9" class="animable"></path>
                                            <path
                                                d="M195.51,350.31a80.06,80.06,0,0,1-.73-9,76.51,76.51,0,0,1-.21-9,79.43,79.43,0,0,1,.73,9A79.38,79.38,0,0,1,195.51,350.31Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 195.038px 341.31px 0px;"
                                                id="elvqsxkf9pd2" class="animable"></path>
                                            <path
                                                d="M187.6,349.46a13.25,13.25,0,0,1,0-2.63c.06-1.61.12-3.84.16-6.31s.12-4.7.26-6.32a12,12,0,0,1,.37-2.6,15.1,15.1,0,0,1,0,2.62c0,1.8-.07,3.94-.11,6.31s-.16,4.71-.32,6.33A12.68,12.68,0,0,1,187.6,349.46Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 187.991px 340.53px 0px;"
                                                id="ellpq0z7wy11c" class="animable"></path>
                                            <path
                                                d="M183.31,329.25a11.15,11.15,0,0,1-.08,2.61,62.62,62.62,0,0,1-.91,6.24c-.46,2.42-1,4.58-1.38,6.15a13.87,13.87,0,0,1-.74,2.5,12.19,12.19,0,0,1,.38-2.59c.35-1.75.77-3.84,1.23-6.16s.82-4.59,1.05-6.18A15.13,15.13,0,0,1,183.31,329.25Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 181.776px 338px 0px;"
                                                id="el7yisbnsjexj" class="animable"></path>
                                            <path
                                                d="M178.38,327.27a9.94,9.94,0,0,1-.29,2.38c-.26,1.46-.69,3.46-1.29,5.64s-1.25,4.12-1.77,5.5a9.73,9.73,0,0,1-1,2.19,12.93,12.93,0,0,1,.63-2.31c.43-1.41,1-3.35,1.62-5.52s1.08-4.14,1.43-5.58A11.46,11.46,0,0,1,178.38,327.27Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 176.205px 335.125px 0px;"
                                                id="elx7zu6mgzyt" class="animable"></path>
                                            <path
                                                d="M172.22,324.17a11,11,0,0,1-.29,2.43c-.25,1.49-.66,3.54-1.18,5.78s-1.08,4.25-1.52,5.69a10.67,10.67,0,0,1-.83,2.31,11.67,11.67,0,0,1,.47-2.4c.4-1.65.86-3.59,1.37-5.72s.95-4.08,1.33-5.73A11.92,11.92,0,0,1,172.22,324.17Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 170.31px 332.275px 0px;"
                                                id="el1gknl3rc707" class="animable"></path>
                                            <path
                                                d="M232.59,412.81c-8.83,12.27-19.63,19.87-34.34,23.37,4.33,5,12.16,14.73,16.49,19.69,18.72-2.87,31.7-15.59,39.22-32.78C246.3,419.12,240.25,416.77,232.59,412.81Z"
                                                style="fill: rgb(235, 235, 235); transform-origin: 226.105px 434.34px 0px;"
                                                id="elxqhh6cehw1e" class="animable"></path>
                                            <path
                                                d="M232.59,412.81a2.39,2.39,0,0,1,.37.16l1.12.54,4.26,2c3.7,1.76,9.17,4.06,15.7,7.39l.17.08-.08.16a78.32,78.32,0,0,1-4.81,9.23,59,59,0,0,1-7.22,9.36A48.69,48.69,0,0,1,232,449.91a46.47,46.47,0,0,1-12.8,5.31,20.92,20.92,0,0,1-2.22.49l-2.21.42-.14,0-.09-.11c-6-7-11.36-13.77-16.48-19.7l-.26-.3.38-.09a58.64,58.64,0,0,0,15.95-6.22,53.81,53.81,0,0,0,10.66-8.05,69.45,69.45,0,0,0,5.86-6.44l1.43-1.83.37-.46c.08-.1.12-.15.13-.14l-.12.18-.35.49c-.31.43-.73,1.06-1.35,1.86a64.5,64.5,0,0,1-5.77,6.55,54.1,54.1,0,0,1-10.66,8.19,58.76,58.76,0,0,1-16,6.33l.13-.38c5.15,5.93,10.54,12.74,16.51,19.67l-.24-.09,2.19-.41a20.38,20.38,0,0,0,2.19-.49,45.93,45.93,0,0,0,12.67-5.24,48.24,48.24,0,0,0,10-8.06,58.92,58.92,0,0,0,7.2-9.25,81,81,0,0,0,4.83-9.15l.09.25c-6.49-3.36-11.94-5.72-15.62-7.53-1.85-.9-3.27-1.62-4.22-2.12L233,413Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 226.005px 434.459px 0px;"
                                                id="el2zp71s6zaqy" class="animable"></path>
                                            <path
                                                d="M246,428.43a71.13,71.13,0,0,1-7.46-3.82,67.39,67.39,0,0,1-7.21-4.28,70,70,0,0,1,7.46,3.82A67.39,67.39,0,0,1,246,428.43Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 238.665px 424.38px 0px;"
                                                id="elcc8slqf457s" class="animable"></path>
                                            <path
                                                d="M242.84,433.85a68,68,0,0,1-7.1-4.46,67.51,67.51,0,0,1-6.8-4.9A67.65,67.65,0,0,1,236,429,67.49,67.49,0,0,1,242.84,433.85Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 235.89px 429.17px 0px;"
                                                id="eleq41eoaz25q" class="animable"></path>
                                            <path
                                                d="M237.79,439.25a11.6,11.6,0,0,1-1.94-1.47c-1.17-.94-2.79-2.23-4.59-3.63s-3.43-2.72-4.55-3.73a9.7,9.7,0,0,1-1.71-1.74,12.92,12.92,0,0,1,1.95,1.45l4.63,3.61c1.81,1.41,3.4,2.75,4.51,3.76A10,10,0,0,1,237.79,439.25Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 231.395px 433.965px 0px;"
                                                id="el6fwnmwbd44b" class="animable"></path>
                                            <path
                                                d="M220.41,431.15a10.32,10.32,0,0,1,1.9,1.51,57.72,57.72,0,0,1,4.13,4.15c1.54,1.7,2.85,3.3,3.78,4.46a11.12,11.12,0,0,1,1.43,2c-.12.11-2.56-2.68-5.6-6.07-1.52-1.68-3-3.17-4-4.23A12.27,12.27,0,0,1,220.41,431.15Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 226.03px 437.212px 0px;"
                                                id="elesora9cnrqh" class="animable"></path>
                                            <path
                                                d="M216.19,433.71a8.78,8.78,0,0,1,1.61,1.53c.94,1,2.19,2.44,3.47,4.1s2.36,3.23,3.09,4.39a8.67,8.67,0,0,1,1.07,2c-.13.08-2-2.73-4.57-6S216.07,433.81,216.19,433.71Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 220.808px 439.721px 0px;"
                                                id="elhiveqpdnlrg" class="animable"></path>
                                            <path
                                                d="M210.45,436.55a9.39,9.39,0,0,1,1.65,1.56c1,1,2.26,2.46,3.63,4.1s2.55,3.18,3.38,4.31a8.82,8.82,0,0,1,1.23,1.91,10.51,10.51,0,0,1-1.52-1.68l-3.49-4.21c-1.3-1.55-2.47-3-3.5-4.18A11.13,11.13,0,0,1,210.45,436.55Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 215.395px 442.49px 0px;"
                                                id="elvvylmbxicw" class="animable"></path>
                                            <path
                                                d="M337.38,413.33c12.36-8.68,25-12.29,40.06-10.77-2.45-6.1-6.64-17.88-9.09-24-18.59-3.44-35,4.29-47.75,18C326.53,402.87,331.46,407.08,337.38,413.33Z"
                                                style="fill: rgb(250, 250, 250); transform-origin: 349.02px 395.538px 0px;"
                                                id="elipwfyd0oibd" class="animable"></path>
                                            <path
                                                d="M337.38,413.33a2.26,2.26,0,0,1-.29-.27l-.89-.88-3.35-3.31c-2.92-2.87-7.32-6.83-12.39-12.12l-.12-.13.12-.13a77.39,77.39,0,0,1,7.57-7.12,59.36,59.36,0,0,1,9.88-6.46,48.71,48.71,0,0,1,12.19-4.38,46,46,0,0,1,13.83-.8,21.53,21.53,0,0,1,2.25.26l2.22.33.14,0,0,.14c3.36,8.52,6.19,16.72,9.07,24l.15.36-.39,0a58.75,58.75,0,0,0-17.08.63,54.18,54.18,0,0,0-12.7,4.09,69,69,0,0,0-7.64,4.15l-2,1.26-.49.31c-.11.07-.17.1-.17.09l.17-.13.49-.35c.43-.3,1-.76,1.88-1.31a64.52,64.52,0,0,1,7.6-4.28A53.18,53.18,0,0,1,360.26,403a58.76,58.76,0,0,1,17.21-.71l-.25.32c-2.91-7.28-5.76-15.48-9.11-24l.19.15-2.2-.32a18.17,18.17,0,0,0-2.22-.26,46,46,0,0,0-13.67.78,48.72,48.72,0,0,0-12.08,4.31,59.83,59.83,0,0,0-9.83,6.37,81.81,81.81,0,0,0-7.56,7v-.26c5,5.3,9.39,9.31,12.26,12.23,1.45,1.45,2.55,2.6,3.28,3.39l.82.89A3.12,3.12,0,0,1,337.38,413.33Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 349.05px 395.441px 0px;"
                                                id="el6ycr5d1jri" class="animable"></path>
                                            <path
                                                d="M329.9,394.21a69.16,69.16,0,0,1,5.79,6.05,65.82,65.82,0,0,1,5.4,6.41,68.5,68.5,0,0,1-5.79-6.06A66.47,66.47,0,0,1,329.9,394.21Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 335.495px 400.44px 0px;"
                                                id="el2uzdyt3e06k" class="animable"></path>
                                            <path
                                                d="M334.62,390.12a65.24,65.24,0,0,1,5.23,6.54,68,68,0,0,1,4.81,6.85,68.77,68.77,0,0,1-5.23-6.54A70,70,0,0,1,334.62,390.12Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 339.64px 396.815px 0px;"
                                                id="elt56xqi1twlj" class="animable"></path>
                                            <path
                                                d="M341.16,386.68a12.84,12.84,0,0,1,1.35,2c.79,1.28,1.89,3,3.13,4.94s2.34,3.69,3.06,5a9.64,9.64,0,0,1,1.05,2.21,13.67,13.67,0,0,1-1.36-2l-3.19-4.91c-1.24-1.93-2.3-3.72-3-5A10.52,10.52,0,0,1,341.16,386.68Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 345.455px 393.755px 0px;"
                                                id="eldo9vwumh1e" class="animable"></path>
                                            <path
                                                d="M354.89,400a10.24,10.24,0,0,1-1.3-2c-.72-1.31-1.64-3.17-2.53-5.27s-1.6-4-2.1-5.45a11.23,11.23,0,0,1-.71-2.31c.16-.07,1.54,3.36,3.29,7.56.89,2.09,1.74,4,2.38,5.3A12.27,12.27,0,0,1,354.89,400Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 351.57px 392.484px 0px;"
                                                id="el2wipmi5rw8y" class="animable"></path>
                                            <path
                                                d="M359.71,399a9.58,9.58,0,0,1-1-2c-.56-1.25-1.26-3-1.92-5s-1.16-3.82-1.47-5.15a8.45,8.45,0,0,1-.37-2.2c.14,0,1,3.24,2.33,7.19S359.85,399,359.71,399Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 357.335px 391.825px 0px;"
                                                id="elwm6y1bjm3r" class="animable"></path>
                                            <path
                                                d="M366.05,398.21a9.88,9.88,0,0,1-1-2c-.58-1.27-1.33-3.05-2.08-5.05s-1.36-3.84-1.76-5.18a8.92,8.92,0,0,1-.54-2.2,10.52,10.52,0,0,1,.88,2.09l1.91,5.1c.72,1.89,1.36,3.61,1.93,5.1A9.86,9.86,0,0,1,366.05,398.21Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 363.36px 390.995px 0px;"
                                                id="el5ppr0qj7a8m" class="animable"></path>
                                            <path
                                                d="M232.83,398.11c5.25,3.9,12.57,4,18.77,1.92s11.56-6,16.86-9.88,10.79-7.67,17.1-9.41l-14.72-29.48s-14.1,5.54-23.52,16.22c-7.62,8.64-25,4.71-25,4.71Z"
                                                style="fill: rgb(250, 250, 250); transform-origin: 253.94px 376.319px 0px;"
                                                id="eltq3f92ovyoh" class="animable"></path>
                                            <path
                                                d="M232.83,398.11s-.08-.14-.21-.44-.32-.76-.56-1.32l-2.13-5.13c-1.84-4.49-4.48-11-7.75-19l-.13-.33.35.07a44.3,44.3,0,0,0,11.6.76,29.36,29.36,0,0,0,6.29-1.18,16,16,0,0,0,5.82-3.27c.83-.77,1.64-1.63,2.46-2.52s1.71-1.7,2.61-2.53a64.61,64.61,0,0,1,5.86-4.64,74.57,74.57,0,0,1,13.71-7.6l.21-.1.11.22c.61,1.21,1.26,2.52,1.91,3.83,4.51,9,8.84,17.71,12.8,25.66l.13.26-.29.08a41.53,41.53,0,0,0-11.09,5.25c-3.32,2.13-6.32,4.41-9.24,6.46a71.57,71.57,0,0,1-8.52,5.33,31.64,31.64,0,0,1-8.08,3,23.85,23.85,0,0,1-7,.45,18.78,18.78,0,0,1-5.08-1.17,15.79,15.79,0,0,1-2.9-1.47l-.68-.49c-.15-.11-.23-.17-.22-.18a18.41,18.41,0,0,0,3.86,2,19.2,19.2,0,0,0,5,1.08,23.84,23.84,0,0,0,6.9-.51,31.7,31.7,0,0,0,8-3,70.09,70.09,0,0,0,8.44-5.34c2.9-2.06,5.9-4.35,9.24-6.51a41.39,41.39,0,0,1,11.2-5.33l-.15.35L272.52,355.2c-.66-1.31-1.31-2.61-1.91-3.83l.33.13A75,75,0,0,0,257.33,359a64,64,0,0,0-5.82,4.6c-.89.82-1.77,1.64-2.59,2.5s-1.61,1.73-2.49,2.54a16.55,16.55,0,0,1-6,3.35,29.94,29.94,0,0,1-6.4,1.18,44.69,44.69,0,0,1-11.72-.83l.22-.25c3.2,8,5.78,14.48,7.58,19,.88,2.23,1.56,4,2,5.17.22.58.39,1,.52,1.36S232.83,398.11,232.83,398.11Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 253.98px 376.191px 0px;"
                                                id="eljywku68q6k" class="animable"></path>
                                            <path
                                                d="M241.7,396.24c-.13.05-2.09-4.18-4.37-9.45s-4-9.61-3.89-9.66a103.34,103.34,0,0,1,4.37,9.45C240.09,391.86,241.83,396.18,241.7,396.24Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 237.571px 386.685px 0px;"
                                                id="elk1ulae0cpe" class="animable"></path>
                                            <path
                                                d="M248.07,395.55a98.24,98.24,0,0,1-4.94-9c-2.6-5-4.6-9.13-4.48-9.19a98.82,98.82,0,0,1,4.94,9A100.76,100.76,0,0,1,248.07,395.55Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 243.357px 386.455px 0px;"
                                                id="el11ma0gjkub1" class="animable"></path>
                                            <path
                                                d="M252.8,393.66a18.29,18.29,0,0,1-1.39-2.6c-.81-1.62-1.95-3.85-3.25-6.29s-2.54-4.62-3.44-6.2a19.47,19.47,0,0,1-1.38-2.6,15.56,15.56,0,0,1,1.7,2.41c1,1.53,2.27,3.69,3.58,6.14s2.39,4.72,3.12,6.39A14.29,14.29,0,0,1,252.8,393.66Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 248.07px 384.815px 0px;"
                                                id="elpq6ijxly7m" class="animable"></path>
                                            <path
                                                d="M257.73,389.41a15.88,15.88,0,0,1-1.57-2.33l-3.63-5.7-3.73-5.64a15.91,15.91,0,0,1-1.49-2.38,14.23,14.23,0,0,1,1.79,2.17c1,1.39,2.42,3.34,3.87,5.57s2.66,4.28,3.51,5.79A14.42,14.42,0,0,1,257.73,389.41Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 252.52px 381.385px 0px;"
                                                id="elk4ooncz3j7" class="animable"></path>
                                            <path
                                                d="M262.49,385.88a15.42,15.42,0,0,1-1.83-2.18c-1.08-1.39-2.52-3.35-4-5.57s-2.82-4.27-3.73-5.78a15.59,15.59,0,0,1-1.37-2.51,17.06,17.06,0,0,1,1.68,2.31c1.08,1.6,2.39,3.54,3.85,5.68l3.89,5.65A16.34,16.34,0,0,1,262.49,385.88Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 257.025px 377.86px 0px;"
                                                id="eliazsaces5k" class="animable"></path>
                                            <path
                                                d="M266.44,382.26a14.28,14.28,0,0,1-1.84-2.18c-1.08-1.39-2.52-3.36-4-5.57s-2.82-4.27-3.73-5.78a14.07,14.07,0,0,1-1.36-2.51,16,16,0,0,1,1.67,2.31l3.85,5.68c1.47,2.14,2.8,4.07,3.9,5.65A16.8,16.8,0,0,1,266.44,382.26Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 260.975px 374.24px 0px;"
                                                id="el6d58sis811v" class="animable"></path>
                                            <path
                                                d="M270.77,379.29a91,91,0,0,1-5.8-7.76,91.17,91.17,0,0,1-5.37-8.06,89.09,89.09,0,0,1,5.8,7.76A91.17,91.17,0,0,1,270.77,379.29Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 265.185px 371.38px 0px;"
                                                id="el95xkd6d84wr" class="animable"></path>
                                            <path
                                                d="M274.47,377.86A16.4,16.4,0,0,1,273,375.2c-.91-1.84-2-4.1-3.29-6.61s-2.51-4.87-3.47-6.49-1.62-2.59-1.55-2.64a12.32,12.32,0,0,1,1.86,2.44,67.91,67.91,0,0,1,3.63,6.46c1.29,2.58,2.38,5,3.16,6.68A21.68,21.68,0,0,1,274.47,377.86Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 269.577px 368.66px 0px;"
                                                id="elduavlb93sqo" class="animable"></path>
                                            <path
                                                d="M77,368.13c5.25,3.9,12.57,4,18.77,1.91s11.57-6,16.86-9.88,10.79-7.67,17.1-9.41L115,321.27S101,326.82,91.52,337.49c-7.62,8.64-25,4.71-25,4.71Z"
                                                style="fill: rgb(250, 250, 250); transform-origin: 98.125px 346.333px 0px;"
                                                id="elnwtwkrukwlq" class="animable"></path>
                                            <path
                                                d="M77,368.13l-.2-.44-.57-1.33c-.49-1.19-1.21-2.91-2.12-5.12l-7.76-19-.13-.33.35.07a45.21,45.21,0,0,0,11.6.76,30,30,0,0,0,6.29-1.18,16.34,16.34,0,0,0,5.82-3.27c.84-.77,1.64-1.64,2.46-2.52s1.71-1.7,2.61-2.53a66.49,66.49,0,0,1,5.86-4.65A75.5,75.5,0,0,1,115,321l.22-.09.11.22,1.91,3.82c4.5,9,8.83,17.72,12.79,25.66l.13.27-.29.08a41.14,41.14,0,0,0-11.08,5.24c-3.32,2.13-6.33,4.41-9.25,6.47A70.87,70.87,0,0,1,101,368a32,32,0,0,1-8.09,3,24.16,24.16,0,0,1-7,.44,19,19,0,0,1-5.07-1.16,14.51,14.51,0,0,1-2.9-1.48l-.69-.49-.22-.17a19,19,0,0,0,3.86,2,19.23,19.23,0,0,0,5,1.07,23.8,23.8,0,0,0,6.9-.5,31.55,31.55,0,0,0,8-3,71.36,71.36,0,0,0,8.44-5.34c2.9-2.06,5.91-4.36,9.24-6.51a41.7,41.7,0,0,1,11.2-5.34l-.15.35-12.82-25.65-1.91-3.82.33.12a75.4,75.4,0,0,0-13.61,7.54,66.91,66.91,0,0,0-5.82,4.6c-.89.82-1.77,1.64-2.59,2.49s-1.61,1.73-2.49,2.54a16.64,16.64,0,0,1-6,3.36,30.43,30.43,0,0,1-6.4,1.17,44.63,44.63,0,0,1-11.71-.82l.22-.26,7.57,19c.88,2.23,1.57,4,2,5.18l.52,1.35A4.09,4.09,0,0,1,77,368.13Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 98.19px 346.217px 0px;"
                                                id="eld962dbed2og" class="animable"></path>
                                            <path
                                                d="M85.91,366.25a100.24,100.24,0,0,1-4.37-9.45,101.65,101.65,0,0,1-3.89-9.66c.13-.05,2.08,4.18,4.37,9.45S86,366.2,85.91,366.25Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 81.7817px 356.695px 0px;"
                                                id="el2tq5mfpvtts" class="animable"></path>
                                            <path
                                                d="M92.27,365.56a100.37,100.37,0,0,1-4.93-8.95,97.68,97.68,0,0,1-4.48-9.2,99.94,99.94,0,0,1,4.94,9A99.56,99.56,0,0,1,92.27,365.56Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 87.565px 356.485px 0px;"
                                                id="el3iaxtj16w1" class="animable"></path>
                                            <path
                                                d="M97,363.67a18.27,18.27,0,0,1-1.4-2.59c-.81-1.62-1.94-3.86-3.25-6.3s-2.53-4.62-3.43-6.19a19,19,0,0,1-1.39-2.6,14.37,14.37,0,0,1,1.7,2.41c1,1.53,2.27,3.69,3.58,6.14s2.4,4.72,3.13,6.38A15.51,15.51,0,0,1,97,363.67Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 92.265px 354.83px 0px;"
                                                id="eln6uhb8ymj28" class="animable"></path>
                                            <path
                                                d="M101.94,359.43a16.82,16.82,0,0,1-1.58-2.33l-3.63-5.71L93,345.76a16.09,16.09,0,0,1-1.49-2.39,14.16,14.16,0,0,1,1.79,2.17c1,1.39,2.43,3.35,3.87,5.57s2.67,4.28,3.51,5.8A13.75,13.75,0,0,1,101.94,359.43Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 96.725px 351.4px 0px;"
                                                id="elk01icffeoe" class="animable"></path>
                                            <path
                                                d="M106.7,355.9a14.28,14.28,0,0,1-1.84-2.18c-1.08-1.4-2.51-3.36-4-5.58s-2.82-4.27-3.73-5.77a14.07,14.07,0,0,1-1.36-2.51,16,16,0,0,1,1.67,2.31c1.08,1.59,2.4,3.53,3.85,5.68l3.9,5.65A16.8,16.8,0,0,1,106.7,355.9Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 101.235px 347.88px 0px;"
                                                id="elxlu4rieb9t" class="animable"></path>
                                            <path
                                                d="M110.64,352.27a13.7,13.7,0,0,1-1.84-2.18c-1.07-1.39-2.51-3.35-4-5.57s-2.82-4.27-3.73-5.78a15.62,15.62,0,0,1-1.36-2.5,16.23,16.23,0,0,1,1.67,2.3l3.85,5.69,3.9,5.65A16,16,0,0,1,110.64,352.27Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 105.175px 344.255px 0px;"
                                                id="eljb9af1lrmhn" class="animable"></path>
                                            <path
                                                d="M115,349.3a90.33,90.33,0,0,1-5.79-7.76,92.79,92.79,0,0,1-5.38-8.06,88.57,88.57,0,0,1,5.8,7.76A88.55,88.55,0,0,1,115,349.3Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 109.415px 341.39px 0px;"
                                                id="el5on2ydm4yzm" class="animable"></path>
                                            <path
                                                d="M118.67,347.88a16.44,16.44,0,0,1-1.51-2.67l-3.3-6.6c-1.29-2.58-2.51-4.88-3.47-6.5s-1.61-2.58-1.55-2.63a12.09,12.09,0,0,1,1.87,2.44,68.76,68.76,0,0,1,3.62,6.45c1.29,2.59,2.38,5,3.16,6.68A18,18,0,0,1,118.67,347.88Z"
                                                style="fill: rgb(38, 50, 56); transform-origin: 113.753px 338.68px 0px;"
                                                id="eldo549ski0r" class="animable"></path>
                                        </g>
                                        <defs>
                                            <filter id="active" height="200%">
                                                <feMorphology in="SourceAlpha" result="DILATED" operator="dilate"
                                                    radius="2"></feMorphology>
                                                <feFlood flood-color="#32DFEC" flood-opacity="1" result="PINK">
                                                </feFlood>
                                                <feComposite in="PINK" in2="DILATED" operator="in"
                                                    result="OUTLINE">
                                                </feComposite>
                                                <feMerge>
                                                    <feMergeNode in="OUTLINE"></feMergeNode>
                                                    <feMergeNode in="SourceGraphic"></feMergeNode>
                                                </feMerge>
                                            </filter>
                                            <filter id="hover" height="200%">
                                                <feMorphology in="SourceAlpha" result="DILATED" operator="dilate"
                                                    radius="2"></feMorphology>
                                                <feFlood flood-color="#ff0000" flood-opacity="0.5" result="PINK">
                                                </feFlood>
                                                <feComposite in="PINK" in2="DILATED" operator="in"
                                                    result="OUTLINE">
                                                </feComposite>
                                                <feMerge>
                                                    <feMergeNode in="OUTLINE"></feMergeNode>
                                                    <feMergeNode in="SourceGraphic"></feMergeNode>
                                                </feMerge>
                                                <feColorMatrix type="matrix"
                                                    values="0   0   0   0   0                0   1   0   0   0                0   0   0   0   0                0   0   0   1   0 ">
                                                </feColorMatrix>
                                            </filter>
                                        </defs>
                                    </svg>
                                </div>
                                <form action="{{ route('orders.update', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @if ($order->status == 'pending')
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        <input type="hidden" name="status" value="delivered">
                                        <button class="btn btn-primary py-2 w-100">
                                            Send To Delivery
                                        </button>
                                    @else
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        <input type="hidden" name="status" value="pending">
                                        <button class="btn btn-primary py-2 w-100">
                                            Redo
                                        </button>
                                    @endif


                                </form>
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
