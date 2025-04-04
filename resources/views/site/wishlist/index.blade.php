@extends('layouts.site')

@section('title', 'Wishlist')

@section('content')
    <section id="account" class="account section">
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

            <!-- Mobile Menu Toggle -->
            <div class="mobile-menu d-lg-none mb-4">
                <button class="mobile-menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#profileMenu">
                    <i class="bi bi-grid"></i>
                    <span>Menu</span>
                </button>
            </div>

            <div class="row g-4">
                <!-- Profile Menu -->
                @include('site.profile-menu')

                <!-- Content Area -->
                <div class="col-lg-9">
                    <div class="content-area">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="wishlist" role="tabpanel">
                                <div class="section-header aos-init aos-animate" data-aos="fade-up">
                                    <h2>My Wishlist</h2>
                                    {{-- <div class="header-actions">
                                        <button type="button" class="btn-add-all">Add All to Cart</button>
                                    </div> --}}
                                </div>

                                <div class="wishlist-grid">
                                    @forelse($wishlist as $item)
                                        @php
                                            $product = $item->product;
                                        @endphp

                                        <div class="wishlist-card aos-init aos-animate" data-aos="fade-up"
                                            data-aos-delay="100">
                                            <div class="wishlist-image">
                                                <img src="{{ asset('storage/' . $item->product->cover_image) }}"
                                                    alt="{{ $product->name }}" loading="lazy">
                                                <button class="btn-remove remove-wishlist" data-id="{{ $item->id }}"
                                                    type="button">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                @if ($product->discount_price)
                                                    <div class="sale-badge">
                                                        -{{ round((($product->price - $product->discount_price) / $product->price) * 100) }}%
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="wishlist-content">
                                                <h4>{{ $product->name }}</h4>
                                                <div class="product-meta">
                                                    <div class="price">
                                                        <span
                                                            class="current">${{ number_format($product->discount_price ?? $product->price, 2) }}</span>
                                                        @if ($product->discount_price)
                                                            <span
                                                                class="original">${{ number_format($product->price, 2) }}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if ($product->quntity > 0)
                                                    @if (in_array($product->id, $cartProductIds))
                                                        <button type="button" class="btn-notify" disabled>In
                                                            Cart</button>
                                                    @else
                                                        <button type="button" class="btn-add-cart add-to-cart"
                                                            data-id="{{ $product->id }}">Add to Cart</button>
                                                    @endif
                                                @else
                                                    <button type="button" class="btn-notify">Notify When Available</button>
                                                @endif


                                            </div>
                                        </div>
                                    @empty
                                        <p class="text-center">Your wishlist is empty.</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $(".remove-wishlist").click(function() {
                var wishlistId = $(this).data("id");
                var card = $(this).closest(".wishlist-card");

                Swal.fire({
                    title: "Are you sure?",
                    text: "Do you want to remove this item from your wishlist?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, remove it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('wishlist.destroy', '') }}/" + wishlistId,
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function() {
                                Swal.fire({
                                    title: "Removed!",
                                    text: "The item has been removed from your wishlist.",
                                    icon: "success",
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    location
                                        .reload(); // Reload page after success
                                });
                            },
                            error: function() {
                                Swal.fire("Error!",
                                    "Something went wrong. Please try again.",
                                    "error");
                            }
                        });
                    }
                });
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $(".remove-wishlist").click(function() {
                var wishlistId = $(this).data("id");
                var card = $(this).closest(".wishlist-card");

                Swal.fire({
                    title: "Are you sure?",
                    text: "Do you want to remove this item from your wishlist?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, remove it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('wishlist.destroy', '') }}/" + wishlistId,
                            type: "POST", // Use POST because DELETE needs _method
                            data: {
                                _token: "{{ csrf_token() }}",
                                _method: "DELETE" // Tells Laravel to process as DELETE
                            },
                            success: function() {
                                Swal.fire({
                                    title: "Removed!",
                                    text: "The item has been removed from your wishlist.",
                                    icon: "success",
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    location
                                        .reload(); // Reload page after success
                                });
                            },
                            error: function() {
                                Swal.fire("Error!",
                                    "Something went wrong. Please try again.",
                                    "error");
                            }
                        });
                    }
                });
            });
        });
    </script>


    <script script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $(".add-to-cart").click(function() {
                var productId = $(this).data("id");
                var button = $(this);

                $.ajax({
                    url: "{{ route('cart.add') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        product_id: productId,
                        quantity: 1
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Added to Cart!",
                            text: "The product has been successfully added to your cart.",
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false
                        });

                        // Disable button and change text
                        button.text("In Cart").prop("disabled", true).removeClass(
                            "btn-add-cart").addClass("btn-notify");
                    },
                    error: function() {
                        Swal.fire("Error!", "Something went wrong. Please try again.", "error");
                    }
                });
            });
        });
    </script>
@endsection
