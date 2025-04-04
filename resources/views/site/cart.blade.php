@extends('layouts.site')

@section('title', 'Shopping Cart')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

@section('content')
    <section id="cart" class="cart section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-4">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <div class="cart-items">
                        <div class="cart-header d-none d-lg-block">
                            <div class="row align-items-center gy-4">
                                <div class="col-lg-6">
                                    <h5>Product</h5>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <h5>Price</h5>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <h5>Quantity</h5>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <h5>Total</h5>
                                </div>
                            </div>
                        </div>

                        @foreach ($cartItems as $item)
                            <div class="cart-item" data-aos="fade-up">
                                <div class="row align-items-center gy-4">
                                    <div class="col-lg-6 col-12 mb-3 mb-lg-0">
                                        <div class="product-info d-flex align-items-center">
                                            <div class="product-image">
                                                <img src="{{ asset('storage/' . $item->attributes->image) }}" alt="Product"
                                                    class="img-fluid">
                                            </div>
                                            <div class="product-details">
                                                <h6 class="product-title">{{ $item->name }}</h6>
                                                <button class="remove-item" data-id="{{ $item->id }}">
                                                    <i class="bi bi-trash"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-2 text-center">
                                        <div class="price-tag">
                                            <span class="current-price">${{ number_format($item->price, 2) }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-2 text-center">
                                        <div class="quantity-selector">
                                            <button class="quantity-btn decrease" data-id="{{ $item->id }}">-</button>
                                            <input type="number" class="quantity-input" readonly
                                                min="{{ (int) $item->minimum_quantity }}" max="{{ (int) $item->quantity }}"
                                                value="{{ (int) $item->quantity }}">
                                            <button class="quantity-btn increase" data-id="{{ $item->id }}">+</button>
                                        </div>

                                    </div>
                                    <div class="col-12 col-lg-2 text-center mt-3 mt-lg-0">
                                        <div class="item-total">
                                            <span>${{ number_format($item->price * $item->quantity, 2) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="cart-actions">
                            <div class="row g-3">
                                <div class="col-lg-6 col-md-6">
                                    {{-- <div class="coupon-form">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Coupon code">
                                        <button class="btn btn-accent" type="button">Apply</button>
                                    </div>
                                </div> --}}
                                </div>
                                <div class="col-lg-6 col-md-6 text-md-end">
                                    <button class="btn btn-outline-accent me-2 update-cart" style="display: none">
                                        <i class="bi bi-arrow-clockwise"></i> Update
                                    </button>
                                    <button class="btn btn-outline-danger clear-cart">
                                        <i class="bi bi-trash"></i> Clear
                                    </button>


                                    {{-- <button class="btn btn-outline-danger clear-cart">Clear Cart</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="cart-summary">
                        <h4 class="summary-title">Order Summary</h4>
                        <div class="summary-item">
                            <span class="summary-label">Subtotal</span>
                            <span class="summary-value">${{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Total</span>
                            <span class="summary-value">${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="checkout-button">
                            <a href="{{ route('checkout') }}" class="btn btn-accent w-100">
                                Proceed to Checkout <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const updateCartBtn = document.querySelector('.update-cart');

            function showUpdateButton() {
                updateCartBtn.style.display = 'inline-block';
            }

            document.querySelectorAll('.remove-item').forEach(button => {
                button.addEventListener('click', function() {
                    let itemId = this.getAttribute('data-id');
                    fetch(`/cart/remove/${itemId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(() => showUpdateButton());
                });
            });

            document.querySelector('.clear-cart').addEventListener('click', function() {
                fetch('/cart/clear', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(() => showUpdateButton());
            });

            document.querySelectorAll('.quantity-btn').forEach(button => {
                button.addEventListener('click', function() {
                    let itemId = this.getAttribute('data-id');
                    let quantityInput = this.parentElement.querySelector('.quantity-input');
                    let newQuantity = parseInt(quantityInput.value);

                    if (this.classList.contains('increase')) newQuantity++;
                    if (this.classList.contains('decrease') && newQuantity > 1) newQuantity--;

                    fetch('/cart/update', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                id: itemId,
                                quantity: newQuantity
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'error') {
                                toastr.error(data.message, "", {
                                    "closeButton": true,
                                    "progressBar": true,
                                    "timeOut": "3000",
                                    "extendedTimeOut": "1000",
                                    "positionClass": "toast-top-right",
                                    "toastClass": "toast-danger"
                                }); // Show error in Toastr
                            } else {
                                quantityInput.value =
                                    newQuantity; // Update input field only on success
                                // toastr.success(data.message);
                                showUpdateButton();
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });

            updateCartBtn.addEventListener('click', function() {
                location.reload();
            });
        });
    </script>

@endsection
