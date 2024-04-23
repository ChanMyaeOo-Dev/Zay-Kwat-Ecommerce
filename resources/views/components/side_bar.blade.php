<ul class="list-unstyled ps-0">
    {{-- Home Nav --}}
    <li class="mb-2">
        <a href="#"
            class="btn btn_menu d-inline-flex align-items-center justify-content-between rounded border-0 collapsed w-100 px-3 py-2">
            <p class="mb-0"><i class="bi bi-house me-2"></i>
                Dashboard</p>
        </a>
    </li>

    {{-- Product Nav --}}
    <li class="mb-2">
        <button
            class="btn btn_menu d-inline-flex align-items-center justify-content-between rounded border-0 collapsed w-100 px-3 py-2 {{ request()->segment(1) == 'category' || request()->segment(1) == 'product' || request()->segment(1) == 'brands' ? 'nav_active' : '' }}"
            data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
            <p class="mb-0"><i class="bi bi-cart-fill me-2"></i>
                Product</p>
            <i class="bi bi-chevron-down"></i>
        </button>
        <div class="collapse show border-bottom pb-2" id="home-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                <li class="btn_menu mb-2 mt-2">
                    <a href="{{ route('product.index') }}"
                        class="py-2 w-100 link-body-emphasis d-inline-flex align-items-baseline text-decoration-none rounded px-3">
                        <i class="bi bi-list me-2"></i>
                        Product List
                    </a>
                </li>
                <li class="btn_menu mb-2">
                    <a href="{{ route('product.create') }}"
                        class="py-2 w-100 link-body-emphasis d-inline-flex align-items-baseline text-decoration-none rounded px-3">
                        <i class="bi bi-cart-plus me-2"></i>
                        Add Product
                    </a>
                </li>
                <li class="btn_menu">
                    <a href="{{ route('category.index') }}"
                        class="py-2 w-100 link-body-emphasis d-inline-flex align-items-baseline text-decoration-none rounded px-3">
                        <i class="bi bi-card-checklist me-2"></i>
                        Category List
                    </a>
                </li>

                <li class="btn_menu">
                    <a href="{{ route('brands.index') }}"
                        class="py-2 w-100 link-body-emphasis d-inline-flex align-items-baseline text-decoration-none rounded px-3">
                        <i class="bi bi-list-stars me-2"></i>
                        Brand List
                    </a>
                </li>

            </ul>
        </div>
    </li>

    {{-- Order Nav --}}
    <li class="mb-2">
        <button
            class="btn btn_menu d-inline-flex align-items-center justify-content-between rounded border-0 collapsed w-100 px-3 py-2"
            data-bs-toggle="collapse" data-bs-target="#order-collapse" aria-expanded="false">
            <p class="mb-0"><i class="bi bi-truck me-2"></i>
                Order</p>
            <i class="bi bi-chevron-down"></i>
        </button>
        <div class="collapse" id="order-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                <li class="btn_menu mb-2 mt-2">
                    <a href="{{ route('orders.index') }}"
                        class="py-2 w-100 link-body-emphasis d-inline-flex align-items-baseline text-decoration-none rounded px-3">
                        <i class="bi bi-list me-2"></i>
                        Order List
                    </a>
                </li>
                <li class="btn_menu mb-2">
                    <a href="#"
                        class="py-2 w-100 link-body-emphasis d-inline-flex align-items-baseline text-decoration-none rounded px-3">
                        <i class="bi bi-card-checklist me-2"></i>
                        Order detail
                    </a>
                </li>
            </ul>
        </div>
    </li>


    {{-- Customer Nav --}}
    <li class="mb-2">
        <a href="#"
            class="btn btn_menu d-inline-flex align-items-center justify-content-between rounded border-0 w-100 px-3 py-2">
            <p class="mb-0"><i class="bi bi-people me-2"></i>
                Customers</p>
        </a>
    </li>


    {{-- Reviews Nav --}}
    <li class="mb-2">
        <a href="#"
            class="btn btn_menu d-inline-flex align-items-center justify-content-between rounded border-0 w-100 px-3 py-2">
            <p class="mb-0"><i class="bi bi-chat-left-text me-2"></i>
                Reviews</p>
        </a>
    </li>




</ul>
