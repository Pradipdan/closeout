@extends('../layouts.site')

@section('title', 'Categories')

<style>
    .best-sellers .product-card {
        height: 97% !important;
        border: 1px solid var(--accent-color);
    }
</style>


@section('content')

    <section id="best-sellers" class="best-sellers section">

        <!-- Section Title -->
        <div class="container section-title aos-init aos-animate" data-aos="fade-up">
            <h2 class="nav_fonts category_text" style="text-align: left">All Products</h2>

        </div><!-- End Section Title -->

        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                @foreach ($products as $product)
                    @php
                        $id = encrypt($product->id);
                    @endphp
                    <div class="col-md-6 col-lg-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="250">
                        <a href="{{ route('view_site_product_detail', $id) }}">
                            <div class="product-card">
                                <div class="product-image">
                                    @if (!empty($product->cover_image) && Storage::exists('public/' . $product->cover_image))
                                        <img src="{{ Storage::url($product->cover_image) }}" class="img-fluid default-image"
                                            alt="Product" loading="lazy">
                                        <img src="{{ Storage::url($product->cover_image) }}" class="img-fluid hover-image"
                                            alt="Product hover" loading="lazy">
                                    @else
                                        <img src="{{ asset('site/images/logo_fav.png') }}" class="img-fluid"
                                            alt="Default Image">
                                    @endif

                                    <a href="{{ route('view_site_product_detail', $id) }}"
                                        class="view_product_list bgn btn-danger nav_fonts">View Product
                                    </a>
                                    <div class="product-tags">
                                        @if ($product->quntity <= $product->minimum_quntity)
                                            <span class="badge bg-sold-out">Sold Out</span>
                                        @endif
                                    </div>
                                    {{-- <div class="product-actions">
                                    <button class="btn-wishlist" type="button" aria-label="Add to wishlist">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                    <button class="btn-quickview" type="button" aria-label="Quick view">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div> --}}
                                </div>
                                <div class="product-info">
                                    <h3 class="product-title"><a href="{{ route('view_site_product_detail', $id) }}">{{ $product->name }}</a></h3>
                                    <div class="product-price">

                                        @if (auth()->check())
                                            <span
                                                class="current-price">${{ number_format($product->discount_price, 2) }}</span>

                                            <span
                                                class="text-decoration-line-through">${{ number_format($product->price, 2) }}</span>
                                        @endif

                                        {{-- <span class="current-price">$75.50</span> --}}
                                    </div>
                                    @if ($product->quntity >= $product->minimum_quntity)
                                        <button class="btn btn-add-to-cart add-to-cart-btn" data-id="{{ $product->id }}"
                                            data-name="{{ $product->name }}" data-price="{{ $product->discount_price }}">
                                            <i class="bi bi-bag-plus me-2"></i>Add to Cart
                                        </button>


                                        {{-- <button class="btn btn-warning text-white ms-1 add-to-cart-btn"
                                            data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                            data-price="{{ $product->discount_price }}">
                                            <i class="bi bi-cart-plus"></i>
                                        </button> --}}
                                    @else
                                        <button class="btn btn-add-to-cart btn-disabled" disabled="">
                                            <i class="bi bi-bag-plus me-2"></i>Sold Out
                                        </button>
                                    @endif

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
            <!-- Pagination Links -->
            <section id="category-pagination" class="category-pagination section">
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links('vendor.pagination.bootstrap-5') }}
                </div>
            </section>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.add-to-cart-btn').click(function() {
                @if (Auth::check())
                    var productId = $(this).data('id');
                    var productName = $(this).data('name');
                    var productPrice = $(this).data('price');
                    var quantity = $('.quantity-input').val();

                    $.ajax({
                        url: "{{ route('cart.add') }}",
                        method: "POST",
                        data: {
                            product_id: productId,
                            name: productName,
                            price: productPrice,
                            quantity: quantity,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "Product Added!",
                                text: response.message,
                                icon: "success",
                                showCancelButton: true,
                                confirmButtonText: "Go to Cart",
                                cancelButtonText: "Continue Shopping"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ url('/cart-page') }}";
                                }
                            });
                        },
                        error: function(error) {
                            if (error.status === 401) {
                                window.location.href = "{{ url('/site-login') }}";
                            } else {
                                console.log(error);
                            }
                        }
                    });
                @else
                    window.location.href = "{{ url('/site-login') }}"; // Redirect to login page
                @endif
            });
        });
    </script>
@endsection
