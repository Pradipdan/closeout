@extends('layouts.site')

@section('title', 'Shopping Cart')

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
                            <!-- Orders Tab -->
                            <div class="tab-pane fade active show" id="orders" role="tabpanel">
                                <div class="section-header aos-init aos-animate" data-aos="fade-up">
                                    <h2>My Orders</h2>

                                </div>

                                @if ($orders->count() > 0)
                                    <div class="orders-grid">
                                        @foreach ($orders as $order)
                                            <div class="order-card aos-init aos-animate" data-aos="fade-up"
                                                data-aos-delay="100">
                                                <div class="order-header">
                                                    <div class="order-id">
                                                        <span class="label">Order ID:</span>
                                                        <span class="value">#{{ $order->order_number }}</span>
                                                    </div>
                                                    <div class="order-date">{{ $order->created_at->format('M d, Y') }}</div>
                                                </div>

                                                <div class="order-content">
                                                    <div class="product-grid">
                                                        @foreach ($order->orderItems as $item)
                                                            <img src="{{ asset('storage/' . $item->product->cover_image) }}"
                                                                alt="{{ $item->product_name }}" loading="lazy">
                                                        @endforeach
                                                    </div>
                                                    <div class="order-info">
                                                        <div class="info-row">
                                                            <span>Status</span>
                                                            <span
                                                                class="status {{ strtolower($order->status) }}">{{ ucfirst($order->status) }}</span>
                                                        </div>
                                                        <div class="info-row">
                                                            <span>Items</span>
                                                            <span>{{ $order->orderItems->count() }} items</span>
                                                        </div>
                                                        <div class="info-row">
                                                            <span>Total</span>
                                                            <span
                                                                class="price">${{ number_format($order->total_price, 2) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Pagination -->
                                    <div class="pagination-wrapper aos-init" data-aos="fade-up">
                                        <!-- Previous Button -->
                                        <button type="button" class="btn-prev"
                                            {{ $orders->onFirstPage() ? 'disabled' : '' }}
                                            onclick="location.href='{{ $orders->previousPageUrl() }}'">
                                            <i class="bi bi-chevron-left"></i>
                                        </button>

                                        <!-- Page Numbers -->
                                        <div class="page-numbers">
                                            @for ($i = 1; $i <= $orders->lastPage(); $i++)
                                                @if ($i == $orders->currentPage())
                                                    <button type="button" class="active">{{ $i }}</button>
                                                @elseif ($i == 1 || $i == $orders->lastPage() || abs($i - $orders->currentPage()) < 2)
                                                    <button type="button"
                                                        onclick="location.href='{{ $orders->url($i) }}'">{{ $i }}</button>
                                                @elseif ($i == 2 || $i == $orders->lastPage() - 1)
                                                    <span>...</span>
                                                @endif
                                            @endfor
                                        </div>

                                        <!-- Next Button -->
                                        <button type="button" class="btn-next"
                                            {{ $orders->hasMorePages() ? '' : 'disabled' }}
                                            onclick="location.href='{{ $orders->nextPageUrl() }}'">
                                            <i class="bi bi-chevron-right"></i>
                                        </button>
                                    </div>
                                @else
                                    <p class="text-center text-muted">You have no orders yet.</p>
                                @endif


                            </div>




                            <!-- Settings Tab -->

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection
