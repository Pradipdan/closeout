@extends('layouts/contentLayoutMaster')

@section('title', 'View Orders')

@section('vendor-style')
    {{-- Page CSS files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page CSS files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')
    <!-- Order Details Start -->
    @if (session('status'))
        <div class="alert alert-warning">{{ session('status') }}</div>
    @endif

    <section class="app-user-list">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Order Details </h4><br>

            </div>
            <div>
                <h4 class="ms-2 card-title">(Order Number: {{ $order_details[0]->order_number }})</h4>

            </div>

            <div class="card-body">
                @if ($order_details->isNotEmpty())
                    @foreach ($order_details as $orderItem)
                        <div class="card border p-2  mb-3">
                            <div class="row align-items-center gy-4">
                                <div class="col-lg-4 col-12 mb-3 mb-lg-0">
                                    <div class="product-info d-flex align-items-center">
                                        <div class="product-image me-3">
                                            @if ($orderItem->cover_image)
                                                <img src="{{ asset('storage/' . $orderItem->cover_image) }}"
                                                    alt="{{ $orderItem->product_name }}" class="img-fluid" width="100">
                                            @else
                                                <img src="{{ asset('images/default-product.png') }}" alt="Default Image"
                                                    class="img-fluid" width="100">
                                            @endif
                                        </div>
                                        <div class="product-details">
                                            <h6 class="product-title mb-1">{{ $orderItem->product_name }}</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-12 text-center">
                                    <span class="fw-bold">Price:</span>
                                    <p class="mb-0">₹{{ number_format($orderItem->price, 2) }}</p>
                                </div>
                                <div class="col-12 col-lg-2 text-center">
                                    <span class="fw-bold">Qantity:</span><br>

                                    {{ $orderItem->quantity }}
                                </div>
                                <div class="col-lg-2 col-12 text-center">
                                    <span class="fw-bold">Subtotal:</span>
                                    <p class="mb-0">₹{{ number_format($orderItem->price * $orderItem->quantity, 2) }}</p>
                                </div>

                                @php
                                    $statusLabels = [
                                        'pending' => ['class' => 'badge-light-primary', 'text' => 'Pending'],
                                        'processing' => ['class' => 'badge-light-warning', 'text' => 'Processing'],
                                        'shipped' => ['class' => 'badge-light-info', 'text' => 'Shipped'],
                                        'delivered' => ['class' => 'badge-light-success', 'text' => 'Delivered'],
                                        'cancelled' => ['class' => 'badge-light-danger', 'text' => 'Cancelled'],
                                    ];

                                    $status = $orderItem->status ?? 'pending'; // Default to 'pending' if null
                                    $badgeClass = $statusLabels[$status]['class'] ?? 'badge-light-secondary';
                                    $statusText = $statusLabels[$status]['text'] ?? ucfirst($status);
                                @endphp

                                <div class="col-lg-2 col-12 text-center">
                                    <span class="fw-bold">Status:</span>
                                    <p class="mb-0">
                                        <span class="badge {{ $badgeClass }}">{{ $statusText }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center text-muted">No items found for this order.</p>
                @endif
            </div>
        </div>
    </section>
@endsection
