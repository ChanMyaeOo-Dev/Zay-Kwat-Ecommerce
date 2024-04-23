 <div class="col-md-8 card border-0">
     <div class="card-body bg-white border border-1 rounded p-4">
         <div class="d-flex align-items-baseline mb-3 pb-3 border-bottom">
             <p class="text-primary fw-bold fs-4 mb-0">
                 My Cart
             </p>
         </div>
         @foreach ($carts as $cart)
             <div class="card border-0 border-bottom mb-4">
                 <div class="card-body">
                     <div class="d-flex justify-content-between">

                         <div class="d-flex">
                             <img src="{{ asset('storage/' . $cart->product->feature_image) }}" height="180px"
                                 width="180px" class=" object-fit-cover rounded shadow me-4">
                             <div class="menu_info_box">
                                 <p class="mb-0 text-dark fw-bold fs-5">{{ $cart->product->title }}</p>
                                 <div class="d-flex align-items-center small">
                                     <i class=" text-black-50 bi bi-star-fill"></i>
                                     <i class=" text-black-50 bi bi-star-fill"></i>
                                     <i class=" text-black-50 bi bi-star-fill"></i>
                                     <i class=" text-black-50 bi bi-star-fill"></i>
                                     <i class=" text-black-50 bi bi-star-half"></i>
                                 </div>
                                 <p class="mb-3 text-black-50">{{ $cart->product->description }}</p>
                                 <p class="mb-0 text-dark fw-bold fs-5">{{ $cart->product->price }} Kyats</p>
                                 {{-- Qty Update --}}
                                 <div class="d-inline-flex border rounded mt-2" style="height: 40px;">
                                     <form action="{{ route('carts.update', $cart->id) }}" method="POST">
                                         @csrf
                                         @method('PUT')
                                         <input type="hidden" name="cart_qty_update" value="{{ $cart->qty - 1 }}">
                                         <button class="btn btn-light h-100 rounded-end-0"><i
                                                 class="bi bi-dash fw-bolder"></i></button>
                                     </form>
                                     <div class="d-flex align-items-center justify-content-center px-4">
                                         <p class="mb-0 fw-bold">
                                             {{ $cart->qty }}</p>
                                     </div>
                                     <form action="{{ route('carts.update', $cart->id) }}" method="POST">
                                         @csrf
                                         @method('PUT')
                                         <input type="hidden" name="cart_qty_update" value="{{ $cart->qty + 1 }}">
                                         <button class="btn btn-light h-100 rounded-start-0"><i
                                                 class="bi bi-plus fw-bolder"></i></button>
                                     </form>
                                 </div>
                             </div>
                         </div>

                         <form action="{{ route('carts.destroy', $cart->id) }}" method="POST">
                             @csrf
                             @method('DELETE')
                             <button class="btn btn-light">
                                 <i class="bi bi-x fw-bold fs-4"></i>
                             </button>
                         </form>

                     </div>
                 </div>
             </div>
         @endforeach
     </div>
 </div>
 <div class="col-md-4">
     {{-- Delivery Details --}}
     <div class="card border-0 mb-4">
         <div class="card-body bg-white border border-1 rounded p-4">
             <p class="fs-5 fw-bold text-dark mb-3 pb-3 border-bottom">Delivery</p>
             <div>

                 <div class="mb-3">
                     <label for="name" class="form-label">Name</label>
                     <input form="orderUploadForm" type="text"
                         class="form-control
                                        @error('name')
                                        is-invalid
                                        @enderror"
                         value="{{ Auth::user()->name }}" id="name" name="name" placeholder="name">
                     <div class=" invalid-feedback">
                         @error('name')
                             {{ $message }}
                         @enderror"
                     </div>
                 </div>

                 <div class="mb-3">
                     <label for="phone" class="form-label">Phone Number</label>
                     <input form="orderUploadForm" type="text"
                         class="form-control
                                        @error('phone')
                                        is-invalid
                                        @enderror"
                         value="{{ Auth::user()->phone }}" id="phone" name="phone" placeholder="phone">
                     <div class=" invalid-feedback">
                         @error('phone')
                             {{ $message }}
                         @enderror"
                     </div>
                 </div>

                 <div>
                     <label for="address" class="form-label">Address</label>
                     <textarea form="orderUploadForm" name="address"
                         class="form-control
                                        @error('address')
                                        is-invalid
                                        @enderror"
                         id="address" rows="3">{{ old('address') }}</textarea>
                     <div class=" invalid-feedback">
                         @error('address')
                             {{ $message }}
                         @enderror"
                     </div>
                 </div>

             </div>
         </div>
     </div>
     {{-- Check Out Details --}}
     <div class="card border-0 mb-3">
         <div class="card-body bg-white border border-1 rounded p-4">
             <p class="fs-5 fw-bold text-dark mb-3 pb-3 border-bottom">Total Cost</p>
             <div class="mb-3 pb-3 border-bottom">
                 <?php
                 $total_cost = 0;
                 $product_ids = [];
                 ?>
                 @foreach ($carts as $cart)
                     <?php
                     $total_cost += $cart->product->price * $cart->qty;
                     array_push($product_ids, (object) ['id' => $cart->product->id, 'qty' => $cart->qty]);
                     ?>
                     <div class="d-flex align-items-center justify-content-between mb-2">
                         <p class="text-dark mb-0">
                             {{ $cart->product->title . ' x ' . $cart->qty }}
                         </p>
                         <p class="fs-5 fw-bold text-dark mb-0">
                             {{ $cart->product->price * $cart->qty . ' Kyats' }}
                         </p>
                     </div>
                 @endforeach
             </div>
             <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                 <p class="fs-5 fw-bold text-dark mb-0">
                     Total
                 </p>
                 <p class="fs-5 fw-bold text-dark mb-0">
                     {{ $total_cost . ' Kyats' }}
                 </p>
             </div>

             <form id="orderUploadForm" action="{{ route('orders.store') }}" method="POST">
                 @csrf
                 <input form="orderUploadForm" type="hidden" name="total_amount" value="{{ $total_cost }}">
                 <input form="orderUploadForm" type="hidden" name="product_ids"
                     value="{{ json_encode($product_ids) }}">
             </form>
             <button form="orderUploadForm" class="w-100 btn btn-dark py-2">
                 PROCEED TO CHECKOUT
             </button>
         </div>
     </div>

 </div>
