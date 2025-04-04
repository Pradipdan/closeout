
@extends('layouts.site')

@section('title', 'Shopping Cart')

@section('content')
<section id="checkout" class="checkout section">

      <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-7">
            <!-- Checkout Form -->
            <div class="checkout-container aos-init aos-animate" data-aos="fade-up">
              {{-- <form > --}}
                <form class="checkout-form" action="{{ route('place.order') }}" method="POST">
                    @csrf
                <!-- Customer Information -->
                <div class="checkout-section" id="customer-info">
                  <div class="section-header">
                    <div class="section-number">1</div>
                    <h3>Customer Information</h3>
                  </div>
                  <div class="section-content">
                    <div class="row">
                      <div class="col-md-6 form-group">
                        <label for="first-name">First Name</label>
                        <input type="text" name="first-name" class="form-control" value="{{auth()->user()->first_name}}" id="first-name" placeholder="Your First Name" required="">
                      </div>
                      <div class="col-md-6 form-group">
                        <label for="last-name">Last Name</label>
                        <input type="text" name="last-name" class="form-control" id="last-name" value="{{auth()->user()->last_name}}" placeholder="Your Last Name" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="email">Email Address</label>
                      <input type="email" class="form-control" name="email" id="email" value="{{auth()->user()->email}}" placeholder="Your Email" required="">
                    </div>
                    <div class="form-group">
                      <label for="phone">Phone Number</label>
                      <input type="tel" class="form-control" name="phone" id="phone" value="{{auth()->user()->phone_no}}"  placeholder="Your Phone Number" required="">
                    </div>
                  </div>
                </div>

                <!-- Shipping Address -->
                <div class="checkout-section" id="shipping-address">
                  <div class="section-header">
                    <div class="section-number">2</div>
                    <h3>Shipping Address</h3>
                  </div>
                  <div class="section-content">
                    <div class="form-group">
                      <label for="address">Street Address</label>
                      <input type="text" class="form-control" name="address" id="address" placeholder="Street Address" required="">
                    </div>
                    <div class="form-group">
                      <label for="apartment">Apartment, Suite, etc. (optional)</label>
                      <input type="text" class="form-control" name="apartment" id="apartment" placeholder="Apartment, Suite, Unit, etc.">
                    </div>
                    <div class="row">
                      <div class="col-md-4 form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" class="form-control" id="city" placeholder="City" required="">
                      </div>
                      <div class="col-md-4 form-group">
                        <label for="state">State</label>
                        <input type="text" name="state" class="form-control" id="state" placeholder="State" required="">
                      </div>
                      <div class="col-md-4 form-group">
                        <label for="zip">ZIP Code</label>
                        <input type="text" name="zip" class="form-control" id="zip" placeholder="ZIP Code" required="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="country">Country</label>
                      <select class="form-select" id="country" name="country" required="">
                        <option value="">Select Country</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="UK">United Kingdom</option>
                        <option value="AU">Australia</option>
                        <option value="DE">Germany</option>
                        <option value="FR">France</option>
                      </select>
                    </div>
                    {{-- <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="save-address" name="save-address">
                      <label class="form-check-label" for="save-address">
                        Save this address for future orders
                      </label>
                    </div> --}}
                    {{-- <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="billing-same" name="billing-same" checked="">
                      <label class="form-check-label" for="billing-same">
                        Billing address same as shipping
                      </label>
                    </div> --}}
                  </div>
                </div>

                <!-- Payment Method -->
                {{-- <div class="checkout-section" id="payment-method">
                  <div class="section-header">
                    <div class="section-number">3</div>
                    <h3>Payment Method</h3>
                  </div>
                  <div class="section-content">
                    <div class="payment-options">
                      <div class="payment-option active">
                        <input type="radio" name="payment-method" id="credit-card" checked="">
                        <label for="credit-card">
                          <span class="payment-icon"><i class="bi bi-credit-card-2-front"></i></span>
                          <span class="payment-label">Credit / Debit Card</span>
                        </label>
                      </div>
                      <div class="payment-option">
                        <input type="radio" name="payment-method" id="paypal">
                        <label for="paypal">
                          <span class="payment-icon"><i class="bi bi-paypal"></i></span>
                          <span class="payment-label">PayPal</span>
                        </label>
                      </div>
                      <div class="payment-option">
                        <input type="radio" name="payment-method" id="apple-pay">
                        <label for="apple-pay">
                          <span class="payment-icon"><i class="bi bi-apple"></i></span>
                          <span class="payment-label">Apple Pay</span>
                        </label>
                      </div>
                    </div>

                    <div class="payment-details" id="credit-card-details">
                      <div class="form-group">
                        <label for="card-number">Card Number</label>
                        <div class="card-number-wrapper">
                          <input type="text" class="form-control" name="card-number" id="card-number" placeholder="1234 5678 9012 3456" required="">
                          <div class="card-icons">
                            <i class="bi bi-credit-card-2-front"></i>
                            <i class="bi bi-credit-card"></i>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6 form-group">
                          <label for="expiry">Expiration Date</label>
                          <input type="text" class="form-control" name="expiry" id="expiry" placeholder="MM/YY" required="">
                        </div>
                        <div class="col-md-6 form-group">
                          <label for="cvv">Security Code (CVV)</label>
                          <div class="cvv-wrapper">
                            <input type="text" class="form-control" name="cvv" id="cvv" placeholder="123" required="">
                            <span class="cvv-hint" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="3-digit code on the back of your card" data-bs-original-title="3-digit code on the back of your card">
                              <i class="bi bi-question-circle"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="card-name">Name on Card</label>
                        <input type="text" class="form-control" name="card-name" id="card-name" placeholder="John Doe" required="">
                      </div>
                    </div>

                    <div class="payment-details d-none" id="paypal-details">
                      <p class="payment-info">You will be redirected to PayPal to complete your purchase securely.</p>
                    </div>

                    <div class="payment-details d-none" id="apple-pay-details">
                      <p class="payment-info">You will be prompted to authorize payment with Apple Pay.</p>
                    </div>
                  </div>
                </div> --}}

                <!-- Order Review -->
                <div class="checkout-section" id="order-review">
                  <div class="section-header">
                    <div class="section-number">3</div>
                    <h3>Review &amp; Place Order</h3>
                  </div>
                  <div class="section-content">
                    <div class="form-check terms-check">
                      <input class="form-check-input" type="checkbox" id="terms" name="terms" required="">
                      <label class="form-check-label" for="terms">
                        I agree to the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms and Conditions</a> and <a href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy Policy</a>
                      </label>
                    </div>
                    {{-- <div class="success-message d-none">Your order has been placed successfully! Thank you for your purchase.</div> --}}
                    <div class="place-order-container">
                        {{-- <button type="submit" class="btn btn-primary">Place Order</button> --}}
                      <button type="submit" class="btn btn-primary place-order-btn">
                        <span class="btn-text">Place Order</span>
                        <span class="btn-price">${{ number_format($total, 2) }}</span>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div class="col-lg-5">
            <!-- Order Summary -->
            <div class="order-summary aos-init aos-animate" data-aos="fade-left" data-aos-delay="200">
                <div class="order-summary-header">
                    <h3>Order Summary</h3>
                    <span class="item-count">{{ $cartItems->count() }} Items</span>
                </div>
        
                <div class="order-summary-content">
                    <div class="order-items">
                        @foreach($cartItems as $item)
                            <div class="order-item">
                                <div class="order-item-image">
                                    <img src="{{ asset('storage/'.$item->attributes->image) }}" alt="Product" class="img-fluid">
                                </div>
                                <div class="order-item-details">
                                    <h4>{{ $item->name }}</h4>
                                    <p class="order-item-variant">
                                        Color: {{ $item->attributes->color ?? 'N/A' }} | 
                                        Size: {{ $item->attributes->size ?? 'N/A' }}
                                    </p>
                                    <div class="order-item-price">
                                        <span class="quantity">{{ $item->quantity }} ×</span>
                                        <span class="price">${{ number_format($item->price * $item->quantity, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @php
                        $shipping =0;
                        $tax=0;
                    @endphp
        
                    <div class="order-totals">
                        <div class="order-subtotal d-flex justify-content-between">
                            <span>Subtotal</span>
                            <span>${{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="order-shipping d-flex justify-content-between">
                            <span>Shipping</span>
                            <span>${{ number_format($shipping, 2) }}</span>
                        </div>
                        <div class="order-tax d-flex justify-content-between">
                            <span>Tax</span>
                            <span>${{ number_format($tax, 2) }}</span>
                        </div>
                        <div class="order-total d-flex justify-content-between">
                            <span>Total</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                    </div>
        
                    {{-- <div class="secure-checkout">
                        <div class="secure-checkout-header">
                            <i class="bi bi-shield-lock"></i>
                            <span>Secure Checkout</span>
                        </div>
                        <div class="payment-icons">
                            <i class="bi bi-credit-card-2-front"></i>
                            <i class="bi bi-credit-card"></i>
                            <i class="bi bi-paypal"></i>
                            <i class="bi bi-apple"></i>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        
        <!-- Terms and Privacy Modals -->
        <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.</p>
                <p>Suspendisse in orci enim. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.</p>
                <p>Suspendisse in orci enim. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">I Understand</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="privacyModalLabel">Privacy Policy</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim.</p>
                <p>Suspendisse in orci enim. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.</p>
                <p>Suspendisse in orci enim. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">I Understand</button>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>
    @endsection