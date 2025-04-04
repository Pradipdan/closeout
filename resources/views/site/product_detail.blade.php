@extends('../layouts.site')

@section('title', 'Categories')


@section('content')

    <section id="product-details" class="product-details section">

        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <!-- Product Images -->
                <div class="col-lg-6 mb-5 mb-lg-0 aos-init aos-animate" data-aos="fade-right" data-aos-delay="200">
                    <div class="product-images">
                        <div class="main-image-container mb-3 ">
                            <div class="image-zoom-container">
                                {{-- <img src="assets/img/product/product-details-1.webp" alt="Product Image" class="img-fluid main-image drift-zoom" id="main-product-image" data-zoom="assets/img/product/product-details-1.webp"> --}}
                                <img src="{{ Storage::url($product->cover_image) }}"
                                    class="img-fluid default-image img-fluid main-image drift-zoom" id="main-product-image"
                                    data-zoom="{{ Storage::url($product->cover_image) }}">
                            </div>
                        </div>

                        <div class="product-thumbnails">
                            <div
                                class="swiper product-thumbnails-slider init-swiper swiper-initialized swiper-horizontal swiper-backface-hidden">
                                <script type="application/json" class="swiper-config">
                                    {
                                    "loop": false,
                                    "speed": 400,
                                    "slidesPerView": 4,
                                    "spaceBetween": 10,
                                    "navigation": {
                                        "nextEl": ".swiper-button-next",
                                        "prevEl": ".swiper-button-prev"
                                    },
                                    "breakpoints": {
                                        "320": {
                                        "slidesPerView": 3
                                        },
                                        "576": {
                                        "slidesPerView": 4
                                        }
                                    }
                                    }

                  </script>
                                {{-- <div class="swiper-wrapper" id="swiper-wrapper-7b5e22fb6fd3e823" aria-live="polite">
                                    <div class="swiper-slide thumbnail-item active swiper-slide-active"
                                        data-image="{{ Storage::url($product->cover_image) }}"
                                        style="width: 151.5px; margin-right: 10px;" role="group" aria-label="1 / 5">
                                        <img src="{{ Storage::url($product->cover_image) }}" alt="Product Thumbnail"
                                            class="img-fluid">
                                    </div>
                                    <div class="swiper-slide thumbnail-item swiper-slide-next"
                                        data-image="{{ Storage::url($product->cover_image) }}"
                                        style="width: 151.5px; margin-right: 10px;" role="group" aria-label="2 / 5">
                                        <img src="{{ Storage::url($product->cover_image) }}" alt="Product Thumbnail"
                                            class="img-fluid">
                                    </div>
                                    <div class="swiper-slide thumbnail-item"
                                        data-image="{{ Storage::url($product->cover_image) }}"
                                        style="width: 151.5px; margin-right: 10px;" role="group" aria-label="3 / 5">
                                        <img src="{{ Storage::url($product->cover_image) }}" alt="Product Thumbnail"
                                            class="img-fluid">
                                    </div>
                                    <div class="swiper-slide thumbnail-item"
                                        data-image="{{ Storage::url($product->cover_image) }}"
                                        style="width: 151.5px; margin-right: 10px;" role="group" aria-label="4 / 5">
                                        <img src="{{ Storage::url($product->cover_image) }}" alt="Product Thumbnail"
                                            class="img-fluid">
                                    </div>
                                    <div class="swiper-slide thumbnail-item"
                                        data-image="{{ Storage::url($product->cover_image) }}" role="group"
                                        aria-label="5 / 5" style="width: 151.5px; margin-right: 10px;">
                                        <img src="{{ Storage::url($product->cover_image) }}" alt="Product Thumbnail"
                                            class="img-fluid">
                                    </div>
                                </div>
                                <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                                    aria-controls="swiper-wrapper-7b5e22fb6fd3e823" aria-disabled="false"></div>
                                <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button"
                                    aria-label="Previous slide" aria-controls="swiper-wrapper-7b5e22fb6fd3e823"
                                    aria-disabled="true"></div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-lg-6 aos-init aos-animate" data-aos="fade-left" data-aos-delay="200">
                    <div class="product-info">
                        <div class="product-meta mb-2">
                            <span class="product-category">{{ strip_tags($product->category->name) }}</span>
                            {{-- <div class="product-rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                                <span class="rating-count">(42)</span>
                            </div> --}}
                        </div>

                        <h1 class="product-title">
                            {{ $product->name }}
                        </h1>

                        <div class="product-price-container mb-4">
                            @php
                                $discountPercentage = 0;
                                if ($product->price > 0) {
                                    $discountPercentage = round(
                                        (($product->price - $product->discount_price) / $product->price) * 100,
                                    );
                                }
                            @endphp

                            @if (auth()->user())
                                <span class="current-price">${{ number_format($product->discount_price, 2) }}</span>

                                <span class="original-price"> ${{ number_format($product->price, 2) }}</span>
                                <span class="discount-badge">-{{ $discountPercentage }}%</span>
                            @endif

                        </div>

                        <div class="product-short-description mb-4">
                            {!! $product->description !!}
                        </div>

                        {{-- <div class="product-availability mb-4">
                            <i class="bi bi-check-circle-fill text-success"></i>
                            <span>In Stock</span>
                            <span class="stock-count">(24 items left)</span>
                        </div> --}}

                        <!-- Color Options -->
                        {{-- <div class="product-colors mb-4">
                            <h6 class="option-title">Color:</h6>
                            <div class="color-options">
                                <div class="color-option active" data-color="Black" style="background-color: #222;">
                                    <i class="bi bi-check"></i>
                                </div>
                                <div class="color-option" data-color="Silver" style="background-color: #C0C0C0;">
                                    <i class="bi bi-check"></i>
                                </div>
                                <div class="color-option" data-color="Blue" style="background-color: #1E3A8A;">
                                    <i class="bi bi-check"></i>
                                </div>
                                <div class="color-option" data-color="Rose Gold" style="background-color: #B76E79;">
                                    <i class="bi bi-check"></i>
                                </div>
                            </div>
                            <span class="selected-option">Black</span>
                        </div> --}}

                        <!-- Size Options if applicable -->
                        {{-- <div class="product-sizes mb-4">
                            <h6 class="option-title">Size:</h6>
                            <div class="size-options">
                                <div class="size-option" data-size="S">S</div>
                                <div class="size-option active" data-size="M">M</div>
                                <div class="size-option" data-size="L">L</div>
                            </div>
                            <span class="selected-option">M</span>
                        </div> --}}

                        <!-- Quantity Selector -->
                        @if ($product->quntity >= $product->minimum_quntity)
                            <div class="product-quantity mb-4">
                                <h6 class="option-title">Quantity:</h6>
                                <div class="quantity-selector">
                                    <button class="quantity-btn decrease">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input type="number" class="quantity-input" value="{{ $product->minimum_quntity }}"
                                        min="{{ $product->minimum_quntity }}" max="{{ $product->quntity }}">
                                    <button class="quantity-btn increase">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>
                        @endif

                        <!-- Action Buttons -->
                        @if (
                            $product->brand != '' ||
                                $product->location != '' ||
                                $product->roi != '' ||
                                $product->expiration_date != '' ||
                                $product->asin_no != '')
                            <div class="product-specifications mb-3">
                                <strong>Specifications:</strong><br>
                                @if ($product->brand != '')
                                    <span class="spec-item btn btn-outline-warning mt-1"><strong>Brand:</strong>
                                        {{ $product->brand }}</span><br>
                                @endif
                                @if ($product->location != '')
                                    <span class="spec-item btn btn-outline-warning mt-1"><strong>Location:</strong>
                                        {{ $product->location }}</span><br>
                                @endif

                                @if ($product->roi != '')
                                    <span class="spec-item btn btn-outline-warning mt-1"><strong>ROI (%):</strong>
                                        {{ $product->roi }}</span><br>
                                @endif
                                @if ($product->expiration_date != '')
                                    <span class="spec-item btn btn-outline-warning mt-1"><strong>Expiration Date:</strong>
                                        {{ $product->expiration_date }}</span><br>
                                @endif
                                @if ($product->asin_no != '')
                                    <span class="spec-item btn btn-outline-warning mt-1"><strong>ASIN No.:</strong>
                                        {{ $product->asin_no }}</span>
                                @endif

                            </div>
                        @endif

                        <div class="product-actions">
                            @if ($product->quntity >= $product->minimum_quntity)
                                <button class="btn btn-primary add-to-cart-btn" data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}" data-price="{{ $product->discount_price }}">
                                    <i class="bi bi-cart-plus"></i> Add to Cart
                                </button>
                            @else
                                <button class="btn btn-secondary" data-id="{{ $product->id }}"
                                    data-name="{{ $product->name }}" data-price="{{ $product->discount_price }}">
                                    <i class="bi bi-cart-plus"></i> Sold Out
                                </button>
                            @endif

                            {{-- <button class="btn btn-outline-primary buy-now-btn">
                                <i class="bi bi-lightning-fill"></i> Buy Now
                            </button> --}}
                            {{-- <button class="btn btn-primary add-to-cart-btn">
                                <i class="bi bi-cart-plus"></i> Add to Cart
                            </button> --}}
                            @php
                                $inWishlist = \App\Models\Wishlist::where('user_id', auth()->id())
                                    ->where('product_id', $product->id)
                                    ->exists();
                            @endphp

                            <button class="btn {{ $inWishlist ? 'btn-danger' : 'btn-outline-secondary' }} wishlist-btn"
                                data-id="{{ $product->id }}">
                                <i class="bi bi-heart"></i>
                            </button>
                            {{-- <button class="btn btn-outline-secondary wishlist-btn">
                                <i class="bi bi-heart"></i>
                            </button> --}}
                        </div>

                        <!-- Additional Info -->
                        {{-- <div class="additional-info mt-4">
                            <div class="row mt-5 aos-init aos-animate" data-aos="fade-up">
                                <div class="col-12">
                                    <div class="product-details-tabs">
                                        <ul class="nav nav-tabs" id="productTabs" role="tablist">

                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="specifications-tab" data-bs-toggle="tab"
                                                    data-bs-target="#specifications" type="button" role="tab"
                                                    aria-controls="specifications" aria-selected="false"
                                                    tabindex="-1">Specifications</button>
                                            </li>

                                        </ul>
                                        <div class="tab-content" id="productTabsContent"> --}}
                        <!-- Description Tab -->


                        <!-- Specifications Tab -->
                        {{-- <div class="tab-pane fade show active" id="specifications" role="tabpanel"
                                                aria-labelledby="specifications-tab">
                                                <div class="product-specifications">
                                                    <div class="specs-group">
                                                        <h4> Specifications</h4>
                                                        <div class="specs-table">
                                                            <div class="specs-row">
                                                                <div class="specs-label">Brand</div>
                                                                <div class="specs-value">{{ $product->brand }}</div>
                                                            </div>
                                                            <div class="specs-row">
                                                                <div class="specs-label">Location</div>
                                                                <div class="specs-value">{{ $product->location }}</div>
                                                            </div>
                                                            <div class="specs-row">
                                                                <div class="specs-label">ROI (%)</div>
                                                                <div class="specs-value">{{ $product->roi }}</div>
                                                            </div>
                                                            <div class="specs-row">
                                                                <div class="specs-label">Expiration Date </div>
                                                                <div class="specs-value">{{ $product->expiration_date }}
                                                                </div>
                                                            </div>
                                                            <div class="specs-row">
                                                                <div class="specs-label">ASIN No.</div>
                                                                <div class="specs-value">{{ $product->asin_no }}</div>
                                                            </div> --}}
                        {{-- <div class="specs-row">
                                                                <div class="specs-label">Impedance</div>
                                                                <div class="specs-value">32 Ohm</div>
                                                            </div>
                                                            <div class="specs-row">
                                                                <div class="specs-label">Weight</div>
                                                                <div class="specs-value">250g</div>
                                                            </div> --}}
                        {{-- </div>
                                                    </div> --}}

                        {{-- <div class="specs-group">
                                                        <h4>Features</h4>
                                                        <div class="specs-table">
                                                            <div class="specs-row">
                                                                <div class="specs-label">Noise Cancellation</div>
                                                                <div class="specs-value">Active Noise Cancellation (ANC)</div>
                                                            </div>
                                                            <div class="specs-row">
                                                                <div class="specs-label">Controls</div>
                                                                <div class="specs-value">Touch controls, Voice assistant</div>
                                                            </div>
                                                            <div class="specs-row">
                                                                <div class="specs-label">Microphone</div>
                                                                <div class="specs-value">Dual beamforming microphones</div>
                                                            </div>
                                                            <div class="specs-row">
                                                                <div class="specs-label">Water Resistance</div>
                                                                <div class="specs-value">IPX4 (splash resistant)</div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                        {{-- </div>
                                            </div> --}}

                        <!-- Reviews Tab -->

                        {{-- </div>
                                    </div>
                                </div>
                            </div> --}}

                        {{-- <div class="info-item">
                                <i class="bi bi-truck"></i>
                                <span>Free shipping on orders over $50</span>
                            </div>
                            <div class="info-item">
                                <i class="bi bi-arrow-repeat"></i>
                                <span>30-day return policy</span>
                            </div>
                            <div class="info-item">
                                <i class="bi bi-shield-check"></i>
                                <span>2-year warranty</span>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>

            <!-- Product Details Tabs -->
            {{-- <div class="row mt-5 aos-init aos-animate" data-aos="fade-up">
                <div class="col-12">
                    <div class="product-details-tabs">
                        <ul class="nav nav-tabs" id="productTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description" type="button" role="tab"
                                    aria-controls="description" aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="specifications-tab" data-bs-toggle="tab"
                                    data-bs-target="#specifications" type="button" role="tab"
                                    aria-controls="specifications" aria-selected="false"
                                    tabindex="-1">Specifications</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                                    type="button" role="tab" aria-controls="reviews" aria-selected="false"
                                    tabindex="-1">Reviews (42)</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="productTabsContent">
                            <!-- Description Tab -->
                            <div class="tab-pane fade show active" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <div class="product-description">
                                    <h4>Product Overview</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at lacus congue,
                                        suscipit elit nec, tincidunt orci. Phasellus egestas nisi vitae lectus imperdiet
                                        venenatis. Suspendisse vulputate quam diam, et consectetur augue condimentum in.
                                        Aenean dapibus urna eget nisi pharetra, in iaculis nulla blandit. Praesent at
                                        consectetur sem, sed sollicitudin nibh. Ut interdum risus ac nulla placerat aliquet.
                                    </p>

                                    <h4>Key Features</h4>
                                    <ul>
                                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                                        <li>Vestibulum at lacus congue, suscipit elit nec, tincidunt orci</li>
                                        <li>Phasellus egestas nisi vitae lectus imperdiet venenatis</li>
                                        <li>Suspendisse vulputate quam diam, et consectetur augue condimentum in</li>
                                        <li>Aenean dapibus urna eget nisi pharetra, in iaculis nulla blandit</li>
                                    </ul>

                                    <h4>What's in the Box</h4>
                                    <ul>
                                        <li>Lorem Ipsum Wireless Headphones</li>
                                        <li>Carrying Case</li>
                                        <li>USB-C Charging Cable</li>
                                        <li>3.5mm Audio Cable</li>
                                        <li>User Manual</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Specifications Tab -->
                            <div class="tab-pane fade" id="specifications" role="tabpanel"
                                aria-labelledby="specifications-tab">
                                <div class="product-specifications">
                                    <div class="specs-group">
                                        <h4>Technical Specifications</h4>
                                        <div class="specs-table">
                                            <div class="specs-row">
                                                <div class="specs-label">Connectivity</div>
                                                <div class="specs-value">Bluetooth 5.0, 3.5mm jack</div>
                                            </div>
                                            <div class="specs-row">
                                                <div class="specs-label">Battery Life</div>
                                                <div class="specs-value">Up to 30 hours</div>
                                            </div>
                                            <div class="specs-row">
                                                <div class="specs-label">Charging Time</div>
                                                <div class="specs-value">3 hours</div>
                                            </div>
                                            <div class="specs-row">
                                                <div class="specs-label">Driver Size</div>
                                                <div class="specs-value">40mm</div>
                                            </div>
                                            <div class="specs-row">
                                                <div class="specs-label">Frequency Response</div>
                                                <div class="specs-value">20Hz - 20kHz</div>
                                            </div>
                                            <div class="specs-row">
                                                <div class="specs-label">Impedance</div>
                                                <div class="specs-value">32 Ohm</div>
                                            </div>
                                            <div class="specs-row">
                                                <div class="specs-label">Weight</div>
                                                <div class="specs-value">250g</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="specs-group">
                                        <h4>Features</h4>
                                        <div class="specs-table">
                                            <div class="specs-row">
                                                <div class="specs-label">Noise Cancellation</div>
                                                <div class="specs-value">Active Noise Cancellation (ANC)</div>
                                            </div>
                                            <div class="specs-row">
                                                <div class="specs-label">Controls</div>
                                                <div class="specs-value">Touch controls, Voice assistant</div>
                                            </div>
                                            <div class="specs-row">
                                                <div class="specs-label">Microphone</div>
                                                <div class="specs-value">Dual beamforming microphones</div>
                                            </div>
                                            <div class="specs-row">
                                                <div class="specs-label">Water Resistance</div>
                                                <div class="specs-value">IPX4 (splash resistant)</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Reviews Tab -->
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="product-reviews">
                                    <div class="reviews-summary">
                                        <div class="overall-rating">
                                            <div class="rating-number">4.5</div>
                                            <div class="rating-stars">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-half"></i>
                                            </div>
                                            <div class="rating-count">Based on 42 reviews</div>
                                        </div>

                                        <div class="rating-breakdown">
                                            <div class="rating-bar">
                                                <div class="rating-label">5 stars</div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 65%;"
                                                        aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="rating-count">27</div>
                                            </div>
                                            <div class="rating-bar">
                                                <div class="rating-label">4 stars</div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="rating-count">10</div>
                                            </div>
                                            <div class="rating-bar">
                                                <div class="rating-label">3 stars</div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 8%;"
                                                        aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="rating-count">3</div>
                                            </div>
                                            <div class="rating-bar">
                                                <div class="rating-label">2 stars</div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 2%;"
                                                        aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="rating-count">1</div>
                                            </div>
                                            <div class="rating-bar">
                                                <div class="rating-label">1 star</div>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 2%;"
                                                        aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="rating-count">1</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="review-form-container">
                                        <h4>Write a Review</h4>
                                        <form class="review-form">
                                            <div class="rating-select mb-4">
                                                <label class="form-label">Your Rating</label>
                                                <div class="star-rating">
                                                    <input type="radio" id="star5" name="rating"
                                                        value="5"><label for="star5" title="5 stars"><i
                                                            class="bi bi-star-fill"></i></label>
                                                    <input type="radio" id="star4" name="rating"
                                                        value="4"><label for="star4" title="4 stars"><i
                                                            class="bi bi-star-fill"></i></label>
                                                    <input type="radio" id="star3" name="rating"
                                                        value="3"><label for="star3" title="3 stars"><i
                                                            class="bi bi-star-fill"></i></label>
                                                    <input type="radio" id="star2" name="rating"
                                                        value="2"><label for="star2" title="2 stars"><i
                                                            class="bi bi-star-fill"></i></label>
                                                    <input type="radio" id="star1" name="rating"
                                                        value="1"><label for="star1" title="1 star"><i
                                                            class="bi bi-star-fill"></i></label>
                                                </div>
                                            </div>

                                            <div class="row g-3 mb-3">
                                                <div class="col-md-6">
                                                    <label for="review-name" class="form-label">Your Name</label>
                                                    <input type="text" class="form-control" id="review-name"
                                                        required="">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="review-email" class="form-label">Your Email</label>
                                                    <input type="email" class="form-control" id="review-email"
                                                        required="">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="review-title" class="form-label">Review Title</label>
                                                <input type="text" class="form-control" id="review-title"
                                                    required="">
                                            </div>

                                            <div class="mb-4">
                                                <label for="review-content" class="form-label">Your Review</label>
                                                <textarea class="form-control" id="review-content" rows="4" required=""></textarea>
                                                <div class="form-text">Tell others what you think about this product. Be
                                                    honest and helpful!</div>
                                            </div>

                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">Submit Review</button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="reviews-list mt-5">
                                        <h4>Customer Reviews</h4>

                                        <!-- Review Item -->
                                        <div class="review-item">
                                            <div class="review-header">
                                                <div class="reviewer-info">
                                                    <img src="assets/img/person/person-m-1.webp" alt="Reviewer"
                                                        class="reviewer-avatar">
                                                    <div>
                                                        <h5 class="reviewer-name">John Doe</h5>
                                                        <div class="review-date">03/15/2024</div>
                                                    </div>
                                                </div>
                                                <div class="review-rating">
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                </div>
                                            </div>
                                            <h5 class="review-title">Exceptional sound quality and comfort</h5>
                                            <div class="review-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at
                                                    lacus congue, suscipit elit nec, tincidunt orci. Phasellus egestas nisi
                                                    vitae lectus imperdiet venenatis. Suspendisse vulputate quam diam, et
                                                    consectetur augue condimentum in.</p>
                                            </div>
                                        </div><!-- End Review Item -->

                                        <!-- Review Item -->
                                        <div class="review-item">
                                            <div class="review-header">
                                                <div class="reviewer-info">
                                                    <img src="assets/img/person/person-f-2.webp" alt="Reviewer"
                                                        class="reviewer-avatar">
                                                    <div>
                                                        <h5 class="reviewer-name">Jane Smith</h5>
                                                        <div class="review-date">02/28/2024</div>
                                                    </div>
                                                </div>
                                                <div class="review-rating">
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star"></i>
                                                </div>
                                            </div>
                                            <h5 class="review-title">Great headphones, battery could be better</h5>
                                            <div class="review-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at
                                                    lacus congue, suscipit elit nec, tincidunt orci. Phasellus egestas nisi
                                                    vitae lectus imperdiet venenatis.</p>
                                            </div>
                                        </div><!-- End Review Item -->

                                        <!-- Review Item -->
                                        <div class="review-item">
                                            <div class="review-header">
                                                <div class="reviewer-info">
                                                    <img src="assets/img/person/person-m-3.webp" alt="Reviewer"
                                                        class="reviewer-avatar">
                                                    <div>
                                                        <h5 class="reviewer-name">Michael Johnson</h5>
                                                        <div class="review-date">02/15/2024</div>
                                                    </div>
                                                </div>
                                                <div class="review-rating">
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-half"></i>
                                                </div>
                                            </div>
                                            <h5 class="review-title">Impressive noise cancellation</h5>
                                            <div class="review-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at
                                                    lacus congue, suscipit elit nec, tincidunt orci. Phasellus egestas nisi
                                                    vitae lectus imperdiet venenatis. Suspendisse vulputate quam diam.</p>
                                            </div>
                                        </div><!-- End Review Item -->

                                        <div class="text-center mt-4">
                                            <button class="btn btn-outline-primary load-more-btn">Load More
                                                Reviews</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".wishlist-btn").click(function() {
                var productId = $(this).data("id");
                var button = $(this);

                $.ajax({
                    url: "{{ route('wishlist.toggle') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        product_id: productId
                    },
                    success: function(response) {
                        if (response.status === "added") {
                            button.addClass("btn-danger").removeClass("btn-outline-secondary");
                        } else {
                            button.addClass("btn-outline-secondary").removeClass("btn-danger");
                        }
                    },
                    error: function() {
                        alert("Something went wrong. Please try again.");
                    }
                });
            });
        });
    </script>

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

    {{-- <script>
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
                            id: productId,
                            name: productName,
                            price: productPrice,
                            quantity: quantity,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            alert(response.message); // Show success message
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                @else
                    window.location.href = "{{ url('/site-login') }}"; // Redirect if not logged in
                @endif
            });

            function updateCartCount() {
                $.ajax({
                    url: "{{ route('cart.count') }}",
                    method: "GET",
                    success: function(response) {
                        $('.cart-count').text(response.count);
                    }
                });
            }
        });
    </script>
     --}}
    {{-- <script>
        $(document).ready(function() {
            $('.wishlist-btn').click(function() {
                var productId = $(this).data('id');

                $.ajax({
                    url: "{{ route('wishlist.add') }}",
                    method: "POST",
                    data: {
                        id: productId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        alert(response.message);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    </script> --}}

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function () {

            // document.querySelector(".add-to-cart-btn").addEventListener("click", function () {
            //     let productId = "{{ $product->id }}";
            //     let quantity = document.querySelector(".quantity-input").value;

            //     fetch("{{ route('cart.add') }}", {
            //         method: "POST",
            //         headers: {
            //             "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
            //             "Content-Type": "application/json"
            //         },
            //         body: JSON.stringify({ product_id: productId, quantity: quantity })
            //     }).then(response => response.json())
            //       .then(data => alert(data.success))
            //       .catch(error => console.log(error));
            // });

            document.querySelector(".wishlist-btn").addEventListener("click", function () {
                let productId = "{{ $product->id }}";

                fetch("{{ route('wishlist.add') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({ product_id: productId })
                }).then(response => response.json())
                  .then(data => alert(data.success))
                  .catch(error => console.log(error));
            });
        });
        </script> --}}


@endsection
