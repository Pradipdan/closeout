@extends('../layouts.site')

<style>
    /* General Styles */
    /* .category_swiper {
    width: 200px;
    margin-right: 20px;
} */

    /* Category Card Styling */
    .category-card {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        text-align: center;
    }

    .category-card:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    /* Image Styling */
    .category-image {
        width: 100%;
        /* height: 150px; */
        background-color: #f9f9f9;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .category-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
    }

    .category-card:hover .category-image img {
        transform: scale(1.1);
    }

    /* Product Info */
    .product-info {
        padding: 15px;
        /*padding:10px 0px 0px 10px !important;*/
    }



    .category-card {
        border: 1px solid var(--accent-color);
    }

    .product-info h6 a {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        text-decoration: none;
        transition: color 0.3s;
    }

    .product-info h6 a:hover {
        color: #e63946;
    }

    .best-sellers .product-card {
        height: 97% !important;
        border: 1px solid var(--accent-color);
    }

    /* View Product Button */
    .view_product {
        display: inline-block;
        background: #e63946;
        color: #fff;
        font-weight: 600;
        padding: 8px 15px;
        border-radius: 5px;
        text-transform: uppercase;
        font-size: 14px;
        transition: background 0.3s ease-in-out;
    }

    .view_product:hover {
        /* background: #c02739;s */
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .category_swiper {
            width: 100%;
        }

        .category-card {
            width: 100%;
        }
    }
</style>

@section('content')
    <html lang="en">




    <!-- Hero Section -->
    <section class="ecommerce-hero-1 hero section" id="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 ">
                    <div class="swiper mySwiper_new">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="content-col aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                                    <div class="content">
                                        <div class="text-center">
                                            <span class="promo-badge">Trusted Wholesale Supplier Since 2021</span>
                                        </div>
                                        <h1>Explore Brand Name <span>Products</span> Across Every Category</h1>
                                        <p>Supplying a diverse range of products, from kitchen essentials to electronics and
                                            apparel. We guarantee product authenticity, always delivered in their original
                                            manufacturer-sealed condition. Shop with confidence today!
                                        </p>
                                        <div class="hero-cta">
                                            <a href="{{ route('get_all_site_products') }}" class="btn btn-shop">Shop Now <i
                                                    class="bi bi-arrow-right"></i></a>
                                            {{-- <a href="#" class="btn btn-collection">View Collection</a> --}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="content-col aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                                    <div class="content">
                                        <div class="text-center">
                                            <span class="promo-badge">Trusted Wholesale Supplier Since 2021</span>
                                        </div>
                                        <h1>Explore Brand Name <span>Products</span> Across Every Category</h1>
                                        <p>Supplying a diverse range of products, from kitchen essentials to electronics and
                                            apparel. We guarantee product authenticity, always delivered in their original
                                            manufacturer-sealed condition. Shop with confidence today!
                                        </p>
                                        <div class="hero-cta">
                                            <a href="{{ route('get_all_site_products') }}" class="btn btn-shop">Shop Now <i
                                                    class="bi bi-arrow-right"></i></a>
                                            {{-- <a href="#" class="btn btn-collection">View Collection</a> --}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="content-col aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                                    <div class="content">
                                        <div class="text-center">
                                            <span class="promo-badge">Trusted Wholesale Supplier Since 2021</span>
                                        </div>
                                        <h1>Explore Brand Name <span>Products</span> Across Every Category</h1>
                                        <p>Supplying a diverse range of products, from kitchen essentials to electronics and
                                            apparel. We guarantee product authenticity, always delivered in their original
                                            manufacturer-sealed condition. Shop with confidence today!
                                        </p>
                                        <div class="hero-cta">
                                            <a href="{{ route('get_all_site_products') }}" class="btn btn-shop">Shop Now <i
                                                    class="bi bi-arrow-right"></i></a>
                                            {{-- <a href="#" class="btn btn-collection">View Collection</a> --}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="swiper-pagination"></div>
                    </div>
                </div>


                {{-- <div class="col-lg-6 image-col aos-init aos-animate" data-aos="fade-left" data-aos-delay="200">
                    <div class="hero-image">
                        <img src="assets/img/product/product-f-9.webp" alt="Fashion Product" class="main-product"
                            loading="lazy">
                        <div class="floating-product product-1 aos-init aos-animate" data-aos="fade-up"
                            data-aos-delay="300">
                            <img src="assets/img/product/product-4.webp" alt="Product 2">
                            <div class="product-info">
                                <h4>Summer Collection</h4>
                                <span class="price">$89.99</span>
                            </div>
                        </div>
                        <div class="floating-product product-2 aos-init aos-animate" data-aos="fade-up"
                            data-aos-delay="400">
                            <img src="assets/img/product/product-3.webp" alt="Product 3">
                            <div class="product-info">
                                <h4>Casual Wear</h4>
                                <span class="price">$59.99</span>
                            </div>
                        </div>
                        <div class="discount-badge aos-init aos-animate" data-aos="zoom-in" data-aos-delay="500">
                            <span class="percent">30%</span>
                            <span class="text">OFF</span>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section><!-- /Hero Section -->

    <!-- Info Cards Section -->
    <section id="info-cards" class="info-cards section light-background">

        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4 justify-content-center">
                <!-- Info Card 1 -->
                <div class="d-flex justify-content-center">
                    <h2 class="nav_fonts category_text">Why choose us?</h2>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <div class="info-card text-center">
                        <div class="icon-box">
                            <img class="org_icon" src="{{ asset('site/images/shiping.svg') }}" alt="">
                            <img class="hover_icon" src="{{ asset('site/images/shiping_hover.svg') }}" alt="">
                            {{-- <i class="bi bi-truck"></i> --}}
                        </div>
                        <h3 class="nav_fonts">Prep & Shipping services</h3>
                        <p>If you purchase a product from us, we offer professional assistance in arranging shipment and
                            preparing your products for any marketplace.</p>
                    </div>
                </div><!-- End Info Card 1 -->

                <!-- Info Card 2 -->
                <div class="col-12 col-sm-6 col-lg-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                    <div class="info-card text-center">
                        <div class="icon-box">
                            <img class="org_icon" src="{{ asset('site/images/vector.svg') }}" alt="">
                            <img class="hover_icon" src="{{ asset('site/images/vector_hover.svg') }}" alt="">
                            {{-- <i class="bi bi-piggy-bank"></i> --}}
                        </div>
                        <h3 class="nav_fonts">Fast Lead Times</h3>
                        <p>When you purchase from us, you can trust in our efficient processing and prompt delivery. Most
                            orders are prepared for pickup within 3-4 days after payment.</p>
                    </div>
                </div><!-- End Info Card 2 -->

                <!-- Info Card 3 -->
                <div class="col-12 col-sm-6 col-lg-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                    <div class="info-card text-center">
                        <div class="icon-box">
                            <img class="org_icon" src="{{ asset('site/images/percent.svg') }}" alt="">
                            <img class="hover_icon" src="{{ asset('site/images/percent_hover.svg') }}" alt="">
                            {{-- <i class="bi bi-percent"></i> --}}
                        </div>
                        <h3 class="nav_fonts">Unbeatable Pricing</h3>
                        <p>When you choose to purchase from us, you are guaranteed the best value available in the market,
                            paired with unmatched service. We are committed to providing high-quality products at
                            competitive prices.</p>
                    </div>
                </div><!-- End Info Card 3 -->

                <!-- Info Card 4 -->
                <div class="col-12 col-sm-6 col-lg-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                    <div class="info-card text-center">
                        <div class="icon-box">
                            <img class="org_icon" src="{{ asset('site/images/package.svg') }}" alt="">
                            <img class="hover_icon" src="{{ asset('site/images/package_hover.svg') }}" alt="">
                            {{-- <i class="bi bi-headset"></i> --}}
                        </div>
                        <h3 class="nav_fonts">Retail Ready</h3>
                        <p>When you purchase from us, you can be assured that every product has undergone a rigorous
                            authenticity verification and comprehensive condition inspection.</p>
                    </div>
                </div><!-- End Info Card 4 -->
            </div>

        </div>

    </section><!-- /Info Cards Section -->

    <!-- Category Cards Section -->
    <section id="category-cards" class="category-cards section">
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

            <div class="d-flex justify-content-between align-items-center">
                <h2 class="nav_fonts category_text">Shop by Categories</h2>
                <a href="{{ route('get_all_site_categories') }}" class="btn view_all_categories_btn">View All
                    Categories</a>
            </div>

            <div class="category-slider swiper init-swiper swiper-initialized swiper-horizontal swiper-backface-hidden">
                <script type="application/json" class="swiper-config">
                            {
                  "loop": true,
                  "autoplay": {
                    "delay": 5000,
                    "disableOnInteraction": false
                  },
                  "grabCursor": true,
                  "speed": 600,
                  "slidesPerView": "auto",
                  "spaceBetween": 20,
                  "navigation": {
                    "nextEl": ".swiper-button-next",
                    "prevEl": ".swiper-button-prev"
                  },
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 2,
                      "spaceBetween": 15
                    },

                    "768": {
                      "slidesPerView": 3,
                      "spaceBetween": 20
                    },
                    "992": {
                      "slidesPerView": 4,
                      "spaceBetween": 20
                    },
                    "1200": {
                      "slidesPerView": 4,
                      "spaceBetween": 10
                    }
                  }
                }
                        </script>

                <div class="swiper-wrapper">
                    @foreach ($categories as $category)
                        <div class="swiper-slide">
                            <div class="category-card aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                                <div class="category-image">
                                    @if ($category->file != null && Storage::exists('public/' . $category->file))
                                        <img class='w-100' src="{{ Storage::url($category->file) }}"
                                            class="img-fluid default-image" alt="Product" loading="lazy">
                                    @else
                                        <img src="{{ asset('site/images/logo_fav.png') }}" alt="Category"
                                            class="img-fluid">
                                    @endif
                                </div>
                                <h3 class="category-title">{{ $category->name }}</h3>
                                @php
                                    $product_count = App\Models\Product::where('category_id', $category->id)->count();
                                @endphp
                                <p class="category-count">{{ $product_count }} Products</p>
                                @php
                                    $id = encrypt($category->id);
                                @endphp
                                <a href="{{ route('get_category_vise_product', $id) }}" class="stretched-link"></a>
                            </div>
                        </div>
                        {{-- <div class="swiper-slide category_swiper">

                                        <div class="category-card aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                            <div class="category-image">

                                                @if ($category->file != null)
                                                <img class='w-100' src="{{ Storage::url($category->file) }}" class="img-fluid default-image"
                                                    alt="Product" loading="lazy">
                                                @else
                                                <img src="{{ asset('site/images/logo_fav.png') }}" alt="Category" class="img-fluid">
                                                @endif
                                            </div>
                                            @php
                                            $id = encrypt($category->id);
                                            @endphp
                                            <a href="{{ route('get_category_vise_product', $id) }}"
                                                class="view_product bgn btn-danger nav_fonts">View Product</a>
                                            <div class="product-info">
                                                <h6 class=""><a href="#" class="text-black">{{ $category->name }}</a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div> --}}
                    @endforeach


                </div>

                <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                    aria-controls="swiper-wrapper-8c4246f5aeb5b867"></div>
                <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"
                    aria-controls="swiper-wrapper-8c4246f5aeb5b867"></div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>

        </div>

    </section><!-- /Category Cards Section -->

    <!-- Best Sellers Section -->
    <section id="best-sellers" class="best-sellers section pb-0">

        <!-- Section Title -->
        <div class="container section-title aos-init aos-animate" data-aos="fade-up">

            <div class="d-flex justify-content-between align-items-center">
                <h2 class="nav_fonts category_text" style="text-align: left">Latest Products</h2>
                <a href="{{ route('get_all_site_products') }}" class="btn view_all_categories_btn">View All
                    Products</a>
            </div>

        </div><!-- End Section Title -->

        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">


                @if ($products->isEmpty())
                    <div class="col-12 text-center">

                        <h2>No products found</h2>
                    </div>
                @else
                    @foreach ($products as $product)
                        @php
                            $id = encrypt($product->id);
                        @endphp
                        <div class="col-md-6 col-lg-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="250">
                            <a href="{{ route('view_site_product_detail', $id) }}">
                                <div class="product-card">
                                    <div class="product-image">
                                        @if (!empty($product->cover_image) && Storage::exists('public/' . $product->cover_image))
                                            <img src="{{ Storage::url($product->cover_image) }}"
                                                class="img-fluid default-image" alt="Product" loading="lazy">
                                            <img src="{{ Storage::url($product->cover_image) }}"
                                                class="img-fluid hover-image" alt="Product hover" loading="lazy">
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
                                            <button class="btn btn-add-to-cart add-to-cart-btn" data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                data-price="{{ $product->discount_price }}">
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
                        {{-- <div class="col-md-6 col-lg-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                            <!-- Product Card -->
                            <a href="{{ route('view_site_product_detail', $id) }}">
                                <div class="product-card">
                                    <div class="product-image">
                                        @if (!empty($product->cover_image) && Storage::exists('public/' . $product->cover_image))
                                            <img src="{{ Storage::url($product->cover_image) }}"
                                                class="img-fluid default-image" alt="Product" loading="lazy">
                                            <img src="{{ Storage::url($product->cover_image) }}"
                                                class="img-fluid hover-image" alt="Product hover" loading="lazy">
                                        @else
                                            <img src="{{ asset('site/images/logo_fav.png') }}" class="img-fluid"
                                                alt="Default Image">
                                        @endif

                                        <a href="{{ route('view_site_product_detail', $id) }}"
                                            class="view_product_list bgn btn-danger nav_fonts">View Product
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a href="#">{{ $product->name }}</a></h3>
                                        <div class="product-price">
                                            @if (auth()->check())
                                                <span class="current-price">${{ $product->discount_price }}.00</span>
                                                <span class="text-decoration-line-through">${{ $product->price }}.00</span>
                                                @if ($product->quntity >= $product->minimum_quntity)

                                                    <button class="btn btn-warning text-white ms-1 add-to-cart-btn" data-id="{{ $product->id }}"
                                                        data-name="{{ $product->name }}" data-price="{{ $product->discount_price }}">
                                                        <i class="bi bi-cart-plus"></i>
                                                    </button>
                                                    @endif
                                            @endif
                                        </div>

                                    </div>


                                </div>
                            </a>
                        </div> --}}
                    @endforeach
                @endif

            </div>

        </div>



        <div id="about-2" class="about-2 mt-5  purchase_process_section">

            <div class="container aos-init aos-animate pt-5" data-aos="fade-up" data-aos-delay="100">

                <div class="row pb-5 d-flex align-items-center">
                    <div class="col-lg-6">
                        <h2 class="about-title purchase_title">Purchase process with <span class="new_section_title"> <br>
                                Closeout Center
                            </span></h2>
                        <p class="about-text process_text"> We want you to have the best shopping experience at Closeout
                            Center. To ensure that, it's important to understand our buying process. Here are the key steps
                            to follow.</p>
                        <a href="#" class="  btn view_all_categories_btn ">Learn More</a>

                    </div>
                    <div class="col-lg-6">
                        <div class="row features-boxes gy-4 mt-3">

                            <div class="col-lg-12 m-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                                <div class="feature-box">
                                    <div class="icon-box">
                                        <i class="bi bi-person-check"></i>
                                    </div>
                                    <h3><a href="#" class="stretched-link ">Sign up for an account.</a></h3>
                                </div>
                            </div>

                            <div class="col-lg-12 m-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                <div class="feature-box">
                                    <div class="icon-box">
                                        <i class="bi bi-cart"></i>


                                    </div>
                                    <h3><a href="#" class="stretched-link">Browse our catalog and select your
                                            products.</a></h3>

                                </div>
                            </div>



                            <div class="col-lg-12 m-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                                <div class="feature-box">
                                    <div class="icon-box">
                                        <i class="bi bi-clipboard-check"></i>

                                    </div>
                                    <h3><a href="#" class="stretched-link">Submit a purchase request.</a></h3>
                                </div>
                            </div>

                            <div class="col-lg-12 m-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                                <div class="feature-box">
                                    <div class="icon-box">
                                        <i class="bi bi-person-lines-fill"></i>

                                    </div>
                                    <h3><a href="#" class="stretched-link">A sales representative will contact you
                                            and invoice you.</a></h3>
                                </div>
                            </div>

                            <div class="col-lg-12 m-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                                <div class="feature-box">
                                    <div class="icon-box">
                                        <i class="bi bi-truck"></i>

                                    </div>
                                    <h3><a href="#" class="stretched-link">Complete your payment and receive product
                                            dimensions to arrange pickup.</a></h3>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>





            </div>

        </div>


        {{-- <div class="gray_bg py-5 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 purchase_section">
                        <h1 class="purchase_heading">
                            How to <span>Purchase on Close Out Center</span>
                        </h1>
                        <p>
                            We want you to have the best experience possible when shopping on Close Out Center.com. To do
                            that, it’s
                            important to understand our buying process. Below are some of the basic steps you’ll need to
                            follow.
                        </p>
                        <div class="row mt-1 g-1">
                            <div class="col-md-4 mb-2 purchase_left_circle">
                                <p>1</p>
                            </div>
                            <div class="col-md-8 mb-2 purchase_right_side">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="35" viewBox="0 0 50 35"
                                    fill="none">
                                    <g clip-path="url(#clip0_340_413)">
                                        <path
                                            d="M49.8079 29.6059C49.7391 29.2539 49.4305 29 49.0718 29H45.9998V1.376C45.9998 3.57628e-07 44.9935 0 44.4527 0H5.60406C5.08356 0 3.49982 3.57628e-07 3.49982 1.376V29H1.02132C0.657262 29 0.345762 29.2617 0.282512 29.6201C0.0374123 31.0151 0.235162 32.1612 0.870662 33.0269C1.69221 34.1455 2.91166 34.3345 3.04816 34.3526C3.07891 34.3565 3.10966 34.3589 3.14066 34.3589C3.28056 34.3599 17.2571 34.4483 29.3101 34.4483C45.501 34.4483 46.6649 34.292 47.0472 34.2403C47.9727 34.1162 48.7208 33.6905 49.2103 33.0078C50.1912 31.6406 49.824 29.6885 49.8079 29.6059ZM4.99982 1.5332C5.12361 1.51125 5.32576 1.5 5.60406 1.5H44.4527C44.4659 1.5 44.482 1.5 44.4998 1.5V29H4.99982V1.5332ZM47.9913 32.1338C47.742 32.4809 47.368 32.6841 46.8477 32.7539C46.1876 32.8423 42.609 32.9482 29.3101 32.9482C17.6722 32.9482 4.23956 32.8657 3.21196 32.8594C3.07036 32.8291 2.47271 32.6743 2.07991 32.1391C1.78156 31.7329 1.64996 31.1831 1.68682 30.5H3.49982H45.9998H48.3892C48.3992 30.9814 48.3375 31.6509 47.9913 32.1338Z"
                                            fill="#FABD2F"></path>
                                        <path
                                            d="M41.5393 4H8.46069C8.19214 4 8 4.03615 8 4.3047V26.1953C8 26.4639 8.19215 26.5 8.4607 26.5H41.5393C41.8078 26.5 42 26.4639 42 26.1953V4.3047C42 4.03615 41.8078 4 41.5393 4ZM40.5 25H9.5V5.5H40.5V25Z"
                                            fill="#FABD2F"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_340_413">
                                            <rect width="50" height="35" fill="white"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <h4>Sign up for an account</h4>
                            </div>
                        </div>
                        <div class="row mt-1 g-1">
                            <div class="col-md-4 mb-2 purchase_left_circle">
                                <p>2</p>
                            </div>
                            <div class="col-md-8 mb-2 purchase_right_side">
                                <svg xmlns="http://www.w3.org/2000/svg" width="41" height="37" viewBox="0 0 41 37"
                                    fill="none">
                                    <path
                                        d="M22.6152 16.6685C22.7726 16.6685 22.9301 16.6084 23.05 16.4883L29.1772 10.3625C29.4174 10.1223 29.4174 9.7331 29.1772 9.49318C28.937 9.25301 28.5474 9.25301 28.3076 9.49318L22.615 15.1844L19.9844 12.5564C19.7442 12.3166 19.3548 12.3164 19.1146 12.5566C18.8745 12.7969 18.8745 13.1862 19.1148 13.4261L22.1804 16.4886C22.3005 16.6084 22.4578 16.6685 22.6152 16.6685Z"
                                        fill="#FABD2F"></path>
                                    <path
                                        d="M15.3673 27.4667C13.026 27.4667 11.1211 29.3707 11.1211 31.7111C11.1211 34.0517 13.026 35.956 15.3673 35.956C17.7087 35.956 19.6138 34.0517 19.6138 31.7111C19.6138 29.3707 17.7087 27.4667 15.3673 27.4667ZM15.3673 34.7265C13.7042 34.7265 12.3511 33.3738 12.3511 31.7111C12.3511 30.0487 13.7042 28.6963 15.3673 28.6963C17.0307 28.6963 18.3838 30.0487 18.3838 31.7111C18.3838 33.3738 17.0307 34.7265 15.3673 34.7265Z"
                                        fill="#FABD2F"></path>
                                    <path
                                        d="M32.7844 27.4667C30.4429 27.4667 28.5381 29.3707 28.5381 31.7111C28.5381 34.0517 30.4429 35.956 32.7844 35.956C35.1263 35.956 37.0316 34.0517 37.0316 31.7111C37.0316 29.3707 35.1263 27.4667 32.7844 27.4667ZM32.7844 34.7265C31.1212 34.7265 29.7681 33.3738 29.7681 31.7111C29.7681 30.0487 31.1212 28.6963 32.7844 28.6963C34.448 28.6963 35.8016 30.0487 35.8016 31.7111C35.8016 33.3738 34.448 34.7265 32.7844 34.7265Z"
                                        fill="#FABD2F"></path>
                                    <path
                                        d="M40.5989 4.19976C40.4836 4.03628 40.296 3.87078 40.096 3.87078H11.2099C10.8701 3.87078 10.5949 4.14595 10.5949 4.48555C10.5949 4.82515 10.8701 5.10032 11.2099 5.10032H39.2226L33.7196 20.6745H12.1816L6.89223 4.48555C6.827 4.24419 6.30868 2.48837 4.68249 1.51577C3.54036 0.832553 2.1482 0.682464 0.546254 1.08811C0.216938 1.17156 0.0175548 1.50136 0.101031 1.83036C0.184507 2.15955 0.519026 2.35726 0.848133 2.27304C2.49756 1.85495 3.80583 2.13434 4.73916 3.10371C5.46305 3.85578 5.70368 4.76453 5.70548 4.77133C5.70909 4.78572 5.71311 4.79953 5.7177 4.81355L10.9522 20.798C10.9402 20.8848 10.9448 20.9751 10.9728 21.0645L12.5089 25.9809C12.589 26.2376 12.8268 26.4123 13.0959 26.4123H33.6197C33.9594 26.4123 34.2347 26.1371 34.2347 25.7975C34.2347 25.4579 33.9594 25.1828 33.6197 25.1828H13.5481L12.5001 21.904H34.1526C34.4123 21.904 34.6441 21.7031 34.7316 21.459L40.675 4.81416C40.7425 4.62584 40.714 4.36346 40.5989 4.19976Z"
                                        fill="#FABD2F"></path>
                                </svg>
                                <h4>Browse & add to cart</h4>
                            </div>
                        </div>
                        <div class="row mt-1 g-1">
                            <div class="col-md-4 mb-2 purchase_left_circle">
                                <p>3</p>
                            </div>
                            <div class="col-md-8 mb-2 purchase_right_side">
                                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="36" viewBox="0 0 46 36"
                                    fill="none">
                                    <g clip-path="url(#clip0_340_429)">
                                        <path
                                            d="M42.6313 16.579H41.4V9.65038C41.4 9.3053 41.2063 9.14667 40.9489 9.03611C40.7746 8.99353 40.8151 9.00002 40.6749 9.00002H37.72V4.30296C37.72 3.91208 37.3997 3.47818 37.0201 3.47586L29.329 3.3158C29.3277 3.3158 29.3268 3.3158 29.3254 3.3158C29.3038 3.3158 29.1817 3.32599 29.1606 3.32784L26.3817 0.288204C26.1894 0.0749516 25.8912 0.0319412 25.6256 0.137383L17.2989 3.47401C3.53169 3.41016 3.47286 3.43745 3.35428 3.47866L3.29811 3.49481C0.820224 3.95234 0.459961 5.7152 0.459961 6.7232V35.4995C0.459961 35.8918 0.749706 36 1.13064 36H40.9206C41.3016 36 41.4 35.8918 41.4 35.4995V27H42.6313C44.2458 27 45.54 25.5586 45.54 23.8327V19.935C45.54 18.2096 44.2458 16.579 42.6313 16.579ZM36.34 5.00979V9.00002H34.0013L30.5518 5.05972L36.34 5.00979ZM25.6867 1.8309L32.1218 9.00002H7.71484L25.6867 1.8309ZM3.52903 4.89781C3.5645 4.89137 3.59596 4.88488 3.62379 4.87887C3.97104 4.86731 6.14528 4.94457 13.7752 4.97602L3.89514 9.00002H3.43018C3.43289 9.00002 2.8031 8.92228 2.35474 8.47778C2.02414 8.14885 1.83996 7.54519 1.83996 6.85825V6.7232C1.83996 6.70563 1.82647 6.68896 1.8256 6.67186C1.84354 5.66248 2.36237 5.11291 3.52903 4.89781ZM40.02 34.579H1.83996V9.76051C2.29996 10.212 3.21006 10.4211 3.41582 10.4211C3.44278 10.4211 3.43376 10.4211 3.44278 10.4211H33.695C33.6963 10.4211 33.6981 10.4211 33.6995 10.4211H33.7021H40.02V16.579H32.7498C31.1357 16.579 29.9 18.2096 29.9 19.935V23.8327C29.9 25.5586 31.1357 27 32.7498 27H40.02V34.579ZM44.16 23.8327C44.16 24.775 43.4848 25.579 42.6313 25.579H32.7498C31.8963 25.579 31.28 24.775 31.28 23.8327V19.935C31.28 18.9932 31.8963 18 32.7498 18H42.6313C43.4848 18 44.16 18.9932 44.16 19.935V23.8327Z"
                                            fill="#FABD2F"></path>
                                        <path
                                            d="M34.918 20.6302C34.2446 20.6302 33.7002 21.1918 33.7002 21.8839C33.7002 22.5763 34.2446 23.1379 34.918 23.1379C35.5901 23.1379 36.1358 22.5763 36.1358 21.8839C36.1358 21.1918 35.5901 20.6302 34.918 20.6302Z"
                                            fill="#FABD2F"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_340_429">
                                            <rect width="46" height="36" fill="white"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <h4>Securely Checkout</h4>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="row mb-2">
                            <div class="col-md-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="47" height="47" viewBox="0 0 47 47"
                                    fill="none">
                                    <path
                                        d="M17.164 18.2455C22.6966 16.0413 27.398 17.5213 27.5953 17.5853C27.9657 17.7056 28.1686 18.1033 28.0484 18.4734C27.9281 18.8439 27.5297 19.0462 27.1602 18.9264C27.1166 18.912 22.7498 17.5376 17.6863 19.5555C17.6005 19.5895 17.5124 19.6058 17.4252 19.6058C17.1452 19.6058 16.8803 19.4375 16.7702 19.1614C16.6261 18.7998 16.8023 18.3897 17.164 18.2455Z"
                                        fill="white"></path>
                                    <path
                                        d="M3.04229 20.3324C3.42735 20.3039 3.76379 20.6089 3.78489 20.9974C3.94464 23.9 5.88843 24.398 6.76695 24.4747C6.97163 23.6694 7.27135 22.8765 7.66931 22.0884C9.12015 19.2134 12.5235 16.4223 16.3395 14.9776C18.1865 14.2786 20.4662 13.564 23.3758 13.564C25.1901 13.564 27.049 13.8368 29.0497 14.3974L34.8324 11.3083C35.0693 11.182 35.3571 11.2008 35.5751 11.3569C35.7931 11.513 35.9037 11.7792 35.8606 12.044L35.0018 17.2946C35.9937 17.9771 38.5553 19.9262 39.8849 22.6651L44.5942 23.9005C44.9039 23.9817 45.1201 24.2619 45.1201 24.5823V30.9083C45.1201 31.2422 44.8856 31.5304 44.5588 31.5986L39.8735 32.5732C39.409 33.5435 37.9219 36.2795 35.2501 37.8853V45.825C35.2501 46.2145 34.9343 46.53 34.5451 46.53H27.7402C27.4286 46.53 27.1541 46.3255 27.0646 46.027L25.7267 41.5514C25.0983 41.6889 24.1009 41.8576 22.9939 41.8576C22.1993 41.8576 21.465 41.7703 20.8008 41.5978L19.5125 46.0222C19.4248 46.323 19.149 46.53 18.8355 46.53H13.3951C13.0059 46.53 12.6901 46.2145 12.6901 45.825V37.6338C11.5927 37.0609 8.68455 35.2902 7.45818 32.0865C6.60123 29.8471 6.28915 27.8049 6.5154 25.8558C5.84025 25.772 4.81667 25.515 3.94464 24.7388C2.99134 23.8908 2.46396 22.658 2.37672 21.075C2.35562 20.6862 2.65351 20.3537 3.04229 20.3324ZM8.77544 31.5825C10.0537 34.9237 13.6416 36.532 13.6765 36.5476C13.934 36.6596 14.1001 36.9134 14.1001 37.1938V45.12H18.3062L19.6492 40.5084C19.7048 40.3184 19.8374 40.1605 20.0151 40.073C20.1922 39.9856 20.3988 39.9762 20.5828 40.0489C21.2603 40.3135 22.0713 40.4476 22.9939 40.4476C24.604 40.4476 25.9901 40.0331 26.0039 40.029C26.1833 39.9748 26.3779 39.9939 26.5423 40.0824C26.7075 40.1713 26.831 40.322 26.8847 40.5015L28.2653 45.12H33.8401V37.4759C33.8401 37.2166 33.9824 36.9783 34.2105 36.8553C37.2307 35.2278 38.7132 31.7218 38.7278 31.6865C38.8169 31.4712 39.0074 31.3131 39.2355 31.2656L43.7101 30.3348V25.1262L39.2056 23.9446C38.9977 23.8902 38.8261 23.7438 38.7393 23.5468C37.3583 20.4111 33.8979 18.2536 33.8635 18.2323C33.6198 18.0824 33.4908 17.8002 33.5367 17.5179L34.239 13.224L29.4628 15.7755C29.2998 15.8623 29.1098 15.882 28.9331 15.8304C26.9563 15.2542 25.1383 14.9739 23.3758 14.9739C20.6934 14.9739 18.5661 15.6424 16.8389 16.2963C13.3878 17.6025 10.2088 20.1855 8.92782 22.7236C7.55317 25.4475 7.50452 28.2624 8.77544 31.5825Z"
                                        fill="white"></path>
                                    <path
                                        d="M33.0589 23.1138C33.8475 23.1138 34.4873 23.7532 34.4873 24.5417C34.4873 25.3302 33.8475 25.9696 33.0589 25.9696C32.2704 25.9696 31.6315 25.3302 31.6315 24.5417C31.6315 23.7532 32.2704 23.1138 33.0589 23.1138Z"
                                        fill="white"></path>
                                    <path
                                        d="M22.2142 11.7365C19.1404 11.7365 16.6394 9.23571 16.6394 6.16191C16.6394 3.08807 19.1404 0.587524 22.2142 0.587524C25.2876 0.587524 27.7881 3.08807 27.7881 6.16191C27.7881 9.23571 25.2876 11.7365 22.2142 11.7365ZM22.2142 1.99752C19.9179 1.99752 18.0494 3.86559 18.0494 6.16191C18.0494 8.45819 19.9179 10.3265 22.2142 10.3265C24.51 10.3265 26.3781 8.45819 26.3781 6.16191C26.3781 3.86559 24.51 1.99752 22.2142 1.99752Z"
                                        fill="white"></path>
                                </svg>
                            </div>
                            <div class="col-md-10 right_section">
                                <h3>Great Deals</h3>
                                <p>
                                    Purchase products for your e-commerce, retail store or international sales platform at
                                    wholesale prices.
                                </p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="47" height="30" viewBox="0 0 47 30"
                                    fill="none">
                                    <g clip-path="url(#clip0_340_378)">
                                        <path
                                            d="M46.3915 16.209L42.472 9.52014C42.3465 9.30755 42.0905 9.09091 41.8374 9.09091H34.7787V1.60114C34.7787 1.00318 34.5205 0 32.7918 0H11.4233C9.88455 0 8.92871 0.613454 8.92871 1.60114V3.18182C8.92871 3.55845 9.24426 3.86364 9.63371 3.86364C10.0231 3.86364 10.3387 3.55845 10.3387 3.18182L10.3353 1.60114C10.3922 1.51832 10.7697 1.36364 11.4233 1.36364H32.7918C33.2512 1.36364 33.3455 1.44841 33.3455 1.44841C33.3455 1.44841 33.3687 1.48573 33.3687 1.60114V22.7273C33.3687 22.8027 33.3843 22.8742 33.4079 22.9421C33.1872 23.2901 33.0137 23.6681 32.8964 24.0698C32.8861 24.0769 32.8753 24.0845 32.8657 24.0909H23.6699C23.1274 22.182 21.3218 20.7737 19.178 20.7737C17.0344 20.7737 15.2287 22.182 14.6862 24.0909H11.4207C11.018 24.0909 10.3387 23.4575 10.3387 23.1616V17.2727C10.3387 16.8961 10.0231 16.5909 9.63371 16.5909C9.24426 16.5909 8.92871 16.8961 8.92871 17.2727V23.1616C8.92871 24.3209 10.3557 25.4545 11.4207 25.4545H14.5242C14.6183 27.8615 16.6667 29.7929 19.178 29.7929C21.6894 29.7929 23.7378 27.8615 23.8319 25.4545H32.7271C32.8177 27.8646 34.8678 29.7996 37.3816 29.7996C39.9019 29.7996 41.9563 27.8542 42.0364 25.4348C42.0632 25.435 42.0938 25.4384 42.1204 25.4384C45.6316 25.4381 46.4216 23.2169 46.4534 23.1161C46.4739 23.0515 46.5287 22.9843 46.5287 22.9168V16.547C46.5287 16.4285 46.4523 16.3119 46.3915 16.209ZM19.178 28.4293C17.3843 28.4293 15.9252 27.0181 15.9252 25.2836C15.9252 23.5487 17.3859 22.0655 19.178 22.1373C22.5587 22.2727 22.4309 25.2266 22.4309 25.2836C22.4309 27.0181 20.9718 28.4293 19.178 28.4293ZM37.3816 28.436C35.5877 28.436 34.1283 27.0246 34.1283 25.2899C34.1283 23.5554 35.5877 22.1442 37.3816 22.1442C39.1749 22.1442 40.634 23.5554 40.634 25.2899C40.634 27.0246 39.1749 28.436 37.3816 28.436ZM45.1187 22.7848C44.6487 23.0895 44.2232 24.1457 41.9097 24.0674C41.3569 22.1737 39.5361 20.7806 37.4038 20.7806C36.4407 20.7806 35.5227 21.0645 34.7787 21.5503V10.4545H41.428L45.1187 16.7279V22.7848Z"
                                            fill="white"></path>
                                        <path
                                            d="M12.9244 6.13635C12.9244 5.75971 12.6088 5.45453 12.2194 5.45453H0.939375C0.549928 5.45453 0.234375 5.75971 0.234375 6.13635C0.234375 6.51298 0.549928 6.81817 0.939375 6.81817H12.2194C12.6088 6.81817 12.9244 6.51298 12.9244 6.13635Z"
                                            fill="white"></path>
                                        <path
                                            d="M12.9243 10.2273C12.9243 9.85065 12.6087 9.54547 12.2193 9.54547H2.81926C2.42981 9.54547 2.11426 9.85065 2.11426 10.2273C2.11426 10.6039 2.42981 10.9091 2.81926 10.9091H12.2193C12.6087 10.9091 12.9243 10.6039 12.9243 10.2273Z"
                                            fill="white"></path>
                                        <path
                                            d="M12.9248 14.3182C12.9248 13.9415 12.6093 13.6364 12.2198 13.6364H5.16984C4.7804 13.6364 4.46484 13.9415 4.46484 14.3182C4.46484 14.6948 4.7804 15 5.16984 15H12.2198C12.6093 15 12.9248 14.6948 12.9248 14.3182Z"
                                            fill="white"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_340_378">
                                            <rect width="47" height="30" fill="white"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="col-md-10 right_section">
                                <h3>Easy Shipping</h3>
                                <p>
                                    Super-fast and easy shipping on all of our products.
                                </p>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-md-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="47" height="37" viewBox="0 0 47 37"
                                    fill="none">
                                    <g clip-path="url(#clip0_340_394)">
                                        <path
                                            d="M43.5578 17.0395H42.2997V9.91849C42.2997 9.56382 42.1019 9.40078 41.8389 9.28715C41.6608 9.24338 41.7021 9.25005 41.5589 9.25005H38.5397V4.42253C38.5397 4.02078 38.2125 3.57484 37.8246 3.57245L29.9664 3.40795C29.965 3.40795 29.9641 3.40795 29.9627 3.40795C29.9407 3.40795 29.8158 3.41841 29.7942 3.42031L26.955 0.296247C26.7585 0.0770709 26.4538 0.0328657 26.1825 0.141237L17.6747 3.57055C3.60824 3.50493 3.54812 3.53297 3.42697 3.57532L3.36957 3.59192C0.837821 4.06217 0.469727 5.874 0.469727 6.91V36.4857C0.469727 36.8888 0.76577 37.0001 1.15499 37.0001H41.81C42.1992 37.0001 42.2997 36.8888 42.2997 36.4857V27.7501H43.5578C45.2074 27.7501 46.5297 26.2686 46.5297 24.4948V20.4888C46.5297 18.7154 45.2074 17.0395 43.5578 17.0395ZM37.1297 5.14899V9.25005H34.7402L31.2157 5.2003L37.1297 5.14899ZM26.2449 1.88179L32.8199 9.25005H7.88232L26.2449 1.88179ZM3.60551 5.0339C3.64176 5.02728 3.67389 5.02061 3.70233 5.01443C4.05713 5.00255 6.27863 5.08195 14.0745 5.11428L3.97958 9.25005H3.50452C3.50728 9.25005 2.8638 9.17016 2.40569 8.71331C2.06791 8.37525 1.87973 7.75481 1.87973 7.0488V6.91C1.87973 6.89193 1.86595 6.8748 1.86505 6.85722C1.88338 5.81981 2.4135 5.25498 3.60551 5.0339ZM40.8897 35.5395H1.87973V10.0317C2.34973 10.4957 3.27961 10.7106 3.48984 10.7106C3.51738 10.7106 3.50817 10.7106 3.51738 10.7106H34.4272C34.4286 10.7106 34.4304 10.7106 34.4318 10.7106H34.4346H40.8897V17.0395H33.4615C31.8124 17.0395 30.5497 18.7154 30.5497 20.4888V24.4948C30.5497 26.2686 31.8124 27.7501 33.4615 27.7501H40.8897V35.5395ZM45.1197 24.4948C45.1197 25.4632 44.4299 26.2895 43.5578 26.2895H33.4615C32.5894 26.2895 31.9597 25.4632 31.9597 24.4948V20.4888C31.9597 19.5208 32.5894 18.5001 33.4615 18.5001H43.5578C44.4299 18.5001 45.1197 19.5208 45.1197 20.4888V24.4948Z"
                                            fill="white"></path>
                                        <path
                                            d="M35.6759 21.2034C34.9879 21.2034 34.4316 21.7806 34.4316 22.4918C34.4316 23.2035 34.9879 23.7807 35.6759 23.7807C36.3626 23.7807 36.9202 23.2035 36.9202 22.4918C36.9202 21.7806 36.3626 21.2034 35.6759 21.2034Z"
                                            fill="white"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_340_394">
                                            <rect width="47" height="37" fill="white"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="col-md-10 right_section">
                                <h3>Multiple Payment Options</h3>
                                <p>
                                    Payment options for every business.
                                </p>
                            </div>
                        </div>



                        <div class="row mb-2">
                            <div class="col-md-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="43" height="43" viewBox="0 0 43 43"
                                    fill="none">
                                    <g clip-path="url(#clip0_340_387)">
                                        <path
                                            d="M7.42355 7.39733C3.2974 11.5365 2.2967 17.8198 4.93359 23.0327C5.0472 23.2574 5.27415 23.3867 5.50954 23.3867C5.60758 23.3867 5.70691 23.3644 5.80034 23.3174C6.1182 23.1566 6.24543 22.7686 6.08461 22.4507C3.69967 17.7354 4.60482 12.0522 8.3373 8.30772C8.58859 8.05579 8.58799 7.6472 8.33579 7.39565C8.08321 7.14372 7.67484 7.14453 7.42355 7.39733Z"
                                            fill="white"></path>
                                        <path
                                            d="M42.5185 41.5542L28.9151 28.4107C35.1128 21.9157 35.0309 11.5772 28.6592 5.18563C25.5283 2.04964 21.3658 0.322937 16.9386 0.322937C12.5111 0.322937 8.34906 2.04964 5.21836 5.18602C-1.24089 11.6654 -1.24067 22.205 5.21853 28.6802C8.34884 31.8183 12.5111 33.5467 16.9386 33.5467C21.0584 33.5467 24.9477 32.0485 27.9911 29.3122L41.622 42.4822C41.7473 42.6032 41.9088 42.6632 42.0703 42.6632C42.2391 42.6632 42.4077 42.5973 42.5341 42.4663C42.7816 42.2101 42.7747 41.802 42.5185 41.5542ZM6.13189 27.769C0.17338 21.7961 0.173595 12.074 6.13168 6.09685C9.01822 3.20527 12.8561 1.61294 16.9386 1.61294C21.0209 1.61294 24.8591 3.20527 27.7459 6.09642C33.7043 12.074 33.7046 21.7961 27.7461 27.769C24.8589 30.6627 21.0209 32.2567 16.9386 32.2567C12.8563 32.2567 9.01844 30.6627 6.13189 27.769Z"
                                            fill="white"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_340_387">
                                            <rect width="43" height="43" fill="white"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="col-md-10 right_section">
                                <h3>Product Sourcing</h3>
                                <p>
                                    We’re always looking for the best products out there.
                                </p>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="text-center pt-5">
                    <a href="" class="btn btn-purchase">learn more how Close Out Center works</a>
                </div>
            </div>
        </div> --}}

    </section><!-- /Best Sellers Section -->


    {{-- <section id="product-list" class="product-list section">

        <div class="container isotope-layout aos-init aos-animate" data-aos="fade-up" data-aos-delay="100"
            data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <div class="row">
                <div class="col-12">
                    <div class="product-filters isotope-filters mb-5 d-flex justify-content-center aos-init aos-animate"
                        data-aos="fade-up">
                        <ul class="d-flex flex-wrap gap-2 list-unstyled">
                            <li class="filter-active" data-filter="*">All</li>
                            <li data-filter=".filter-clothing">Clothing</li>
                            <li data-filter=".filter-accessories">Accessories</li>
                            <li data-filter=".filter-electronics">Electronics</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-container isotope-container aos-init aos-animate" data-aos="fade-up"
                data-aos-delay="200" style="position: relative; height: 926.376px;">

                <!-- Product Item 1 -->
                <div class="col-md-6 col-lg-3 product-item isotope-item filter-clothing"
                    style="position: absolute; left: 0px; top: 0px;">
                    <div class="product-card">
                        <div class="product-image">
                            <span class="badge">Sale</span>
                            <img src="{{ asset('site/images/product.png') }}" alt="Product" class="img-fluid main-img">
                            <img src="{{ asset('site/images/product.png') }}.webp" alt="Product Hover"
                                class="img-fluid hover-img">
                            <div class="product-overlay">
                                <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                                <div class="product-actions">
                                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-title"><a href="product-details.html">Lorem ipsum dolor sit amet</a>
                            </h5>
                            <div class="product-price">
                                <span class="current-price">$89.99</span>
                                <span class="old-price">$129.99</span>
                            </div>
                            <div class="product-rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                                <span>(24)</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Product Item -->

                <!-- Product Item 2 -->
                <div class="col-md-6 col-lg-3 product-item isotope-item filter-electronics"
                    style="position: absolute; left: 330px; top: 0px;">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('site/images/product.png') }}" alt="Product" class="img-fluid main-img">
                            <img src="{{ asset('site/images/product.png') }}" alt="Product Hover"
                                class="img-fluid hover-img">
                            <div class="product-overlay">
                                <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                                <div class="product-actions">
                                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-title"><a href="product-details.html">Consectetur adipiscing elit</a>
                            </h5>
                            <div class="product-price">
                                <span class="current-price">$249.99</span>
                            </div>
                            <div class="product-rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                                <span>(18)</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Product Item -->

                <!-- Product Item 3 -->
                <div class="col-md-6 col-lg-3 product-item isotope-item filter-accessories"
                    style="position: absolute; left: 660px; top: 0px;">
                    <div class="product-card">
                        <div class="product-image">
                            <span class="badge">New</span>
                            <img src="{{ asset('site/images/product.png') }}" alt="Product" class="img-fluid main-img">
                            <img src="{{ asset('site/images/product.png') }}" alt="Product Hover"
                                class="img-fluid hover-img">
                            <div class="product-overlay">
                                <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                                <div class="product-actions">
                                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-title"><a href="product-details.html">Sed do eiusmod tempor</a></h5>
                            <div class="product-price">
                                <span class="current-price">$59.99</span>
                            </div>
                            <div class="product-rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <span>(7)</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Product Item -->

                <!-- Product Item 4 -->
                <div class="col-md-6 col-lg-3 product-item isotope-item filter-clothing"
                    style="position: absolute; left: 990px; top: 0px;">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('site/images/product.png') }}" alt="Product" class="img-fluid main-img">
                            <img src="{{ asset('site/images/product.png') }}" alt="Product Hover"
                                class="img-fluid hover-img">
                            <div class="product-overlay">
                                <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                                <div class="product-actions">
                                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-title"><a href="product-details.html">Incididunt ut labore et
                                    dolore</a></h5>
                            <div class="product-price">
                                <span class="current-price">$79.99</span>
                                <span class="old-price">$99.99</span>
                            </div>
                            <div class="product-rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <span>(32)</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Product Item -->

                <!-- Product Item 5 -->
                <div class="col-md-6 col-lg-3 product-item isotope-item filter-electronics"
                    style="position: absolute; left: 0px; top: 463.188px;">
                    <div class="product-card">
                        <div class="product-image">
                            <span class="badge">Sale</span>
                            <img src="{{ asset('site/images/product.png') }}" alt="Product" class="img-fluid main-img">
                            <img src="{{ asset('site/images/product.png') }}" alt="Product Hover"
                                class="img-fluid hover-img">
                            <div class="product-overlay">
                                <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                                <div class="product-actions">
                                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-title"><a href="product-details.html">Magna aliqua ut enim ad
                                    minim</a></h5>
                            <div class="product-price">
                                <span class="current-price">$199.99</span>
                                <span class="old-price">$249.99</span>
                            </div>
                            <div class="product-rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                                <i class="bi bi-star"></i>
                                <span>(15)</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Product Item -->

                <!-- Product Item 6 -->
                <div class="col-md-6 col-lg-3 product-item isotope-item filter-accessories"
                    style="position: absolute; left: 330px; top: 463.188px;">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('site/images/product.png') }}" alt="Product" class="img-fluid main-img">
                            <img src="{{ asset('site/images/product.png') }}" alt="Product Hover"
                                class="img-fluid hover-img">
                            <div class="product-overlay">
                                <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                                <div class="product-actions">
                                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-title"><a href="product-details.html">Veniam quis nostrud
                                    exercitation</a></h5>
                            <div class="product-price">
                                <span class="current-price">$45.99</span>
                            </div>
                            <div class="product-rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star"></i>
                                <span>(21)</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Product Item -->

                <!-- Product Item 7 -->
                <div class="col-md-6 col-lg-3 product-item isotope-item filter-clothing"
                    style="position: absolute; left: 660px; top: 463.188px;">
                    <div class="product-card">
                        <div class="product-image">
                            <span class="badge">New</span>
                            <img src="{{ asset('site/images/product.png') }}" alt="Product" class="img-fluid main-img">
                            <img src="{{ asset('site/images/product.png') }}" alt="Product Hover"
                                class="img-fluid hover-img">
                            <div class="product-overlay">
                                <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                                <div class="product-actions">
                                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-title"><a href="product-details.html">Ullamco laboris nisi ut
                                    aliquip</a></h5>
                            <div class="product-price">
                                <span class="current-price">$69.99</span>
                            </div>
                            <div class="product-rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                                <i class="bi bi-star"></i>
                                <span>(11)</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Product Item -->

                <!-- Product Item 8 -->
                <div class="col-md-6 col-lg-3 product-item isotope-item filter-electronics"
                    style="position: absolute; left: 990px; top: 463.188px;">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="assets/img/product/product-8" alt="Product" class="img-fluid main-img">
                            <img src="assets/img/product/product-8-variant.webp" alt="Product Hover"
                                class="img-fluid hover-img">
                            <div class="product-overlay">
                                <a href="cart.html" class="btn-cart"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                                <div class="product-actions">
                                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-title"><a href="product-details.html">Ex ea commodo consequat</a>
                            </h5>
                            <div class="product-price">
                                <span class="current-price">$159.99</span>
                            </div>
                            <div class="product-rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <span>(29)</span>
                            </div>
                        </div>
                    </div>
                </div><!-- End Product Item -->

            </div>

            <div class="text-center mt-5 aos-init aos-animate" data-aos="fade-up">
                <a href="#" class="view-all-btn">View All Products <i class="bi bi-arrow-right"></i></a>
            </div>

        </div>

    </section> --}}
    {{-- <script>
        function updateCartCount() {
            $.ajax({
                url: "{{ route('cart.count') }}",
                method: "GET",
                success: function(response) {
                    $('.cart-count').text(response.count);
                }
            });

            $.ajax({
                url: "{{ route('cart.items') }}",
                method: "GET",
                success: function(response) {
                    $('#cart-items').html(response.html);
                }
            });
        }
    </script> --}}
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
