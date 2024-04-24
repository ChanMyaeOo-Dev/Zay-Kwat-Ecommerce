<nav class="navbar navbar-expand-lg bg-white py-2 col-md-10">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">

            <a class="navbar-brand ms-2" href="{{ route('shop.index') }}">
                <img src="{{ asset('src_images/logo_expend.png') }}" alt="logo" class="app_logo_expend">
            </a>

            <ul class="navbar-nav me-auto ps-3 border-start">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">About us</a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" href="#">FAQs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact us</a>
                </li>
            </ul>

            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                    data-bs-target="#searchModal">
                    <i class="bi bi-search"></i>
                </button>
            </div>

            <!-- Right Side Of Navbar -->
            <div class="d-flex align-items-center">
                <ul class="navbar-nav px-2 mx-3 border-start border-end">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item ms-2">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item px-3 dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end border p-2" aria-labelledby="navbarDropdown">

                                <a class="btn btn-light w-100 mb-2" href="{{ route('users.index') }}">
                                    Profile
                                </a>

                                <a class="btn btn-light w-100" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

                <a href="{{ route('carts.index') }}" class="btn btn-light position-relative">
                    <i class="bi bi-cart"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                        {{ count($carts) }}
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>

            </div>

        </div>
    </div>
</nav>
<!--Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="searchModalLabel">Search Products</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" style="height: 650px;">
                <div class="container">
                    <h1 class="mt-4">Search Products</h1>

                    <form id="searchForm" class="mt-4">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="category_id">Category:</label>
                                    <input type="text" class="form-control" id="category_id" name="category_id">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="brand_id">Brand:</label>
                                    <input type="text" class="form-control" id="brand_id" name="brand_id">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="keywords">Keywords (comma-separated):</label>
                                    <input type="text" class="form-control" id="keywords" name="keywords">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>

                    <div id="searchResults" class="mt-4">
                        <!-- Search results will be displayed here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // Submit form using Axios
    document.getElementById('searchForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);

        axios.get('/products/search', {
                params: Object.fromEntries(formData.entries())
            })
            .then(function(response) {
                const products = response.data;
                let html = '<h2>Search Results</h2>';
                html += '<ul class="list-group">';
                products.forEach(function(product) {
                    html += '<li class="list-group-item">' + product.name + ' - ' + product.category
                        .name + '</li>'; // Assuming category relationship exists
                });
                html += '</ul>';
                document.getElementById('searchResults').innerHTML = html;
            })
            .catch(function(error) {
                console.error('Error:', error);
            });
    });
</script>



{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const suggestions = document.getElementById('suggestions');

        searchInput.addEventListener('input', function(event) {
            const inputValue = event.target.value.trim();

            if (inputValue === '') {
                suggestions.innerHTML = '';
                suggestions.classList.remove('show');
                return;
            }

            axios.get(`/products/search?query=${inputValue}`)
                .then(response => {
                    const products = response.data;
                    // Clear previous suggestions
                    suggestions.innerHTML = '';
                    products.forEach(product => {
                        const a = document.createElement('a');
                        var baseUrl = "{{ route('products', '') }}";
                        a.href = baseUrl + '/' + product.id;
                        a.classList.add('text-decoration-none', 'text-dark');

                        const div = document.createElement('div');
                        div.classList.add('d-flex', 'align-items-center', 'gap-2', 'mb-3');

                        const img = document.createElement('img');
                        img.src = '{{ asset('storage/') }}' + '/' + product.feature_image;
                        img.classList.add('search_product_img', 'rounded');

                        const titleSpan = document.createElement('span');
                        titleSpan.textContent = product.title;
                        titleSpan.classList.add('text-dark');

                        div.appendChild(img);
                        div.appendChild(titleSpan);
                        a.appendChild(div);
                        suggestions.appendChild(a);
                    });

                    suggestions.classList.add('show');
                })
                .catch(error => {
                    console.error('Error fetching products:', error);
                });
        });

        // Hide suggestions when clicking outside the dropdown menu
        document.addEventListener('click', function(event) {
            if (!event.target.matches('.dropdown-toggle')) {
                suggestions.classList.remove('show');
            }
        });
    });
</script> --}}
