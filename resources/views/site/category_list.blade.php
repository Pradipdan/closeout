@extends('../layouts.site')

@section('title', 'Categories')
<style>
    .product-info {

        padding: 10px 0px 0px 10px !important;
    }

    .best-sellers .product-card {
        height: 97% !important;
        border: 1px solid var(--accent-color);
    }
</style>

@section('content')

    <section id="best-sellers" class="best-sellers section">

        <!-- Section Title -->
        <div class="container section-title aos-init aos-animate" data-aos="fade-up">
            <h2 class="nav_fonts category_text" style="text-align: left">All Categories</h2>
        </div><!-- End Section Title -->

        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">



                @foreach ($categories as $category)
                    @php
                        $id = encrypt($category->id);
                    @endphp
                    <div class="col-md-6 col-lg-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <!-- Product Card -->
                        <a href="{{ route('get_category_vise_product', $id) }}">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="{{ Storage::url($category->file) }}" class="img-fluid default-image"
                                    alt="Product" loading="lazy">
                                <img src="{{ Storage::url($category->file) }}" class="img-fluid hover-image"
                                    alt="Product hover" loading="lazy">
                                @php
                                    $id = encrypt($category->id);
                                @endphp
                                <a href="{{ route('get_category_vise_product', $id) }}"
                                    class="view_product_list btn btn-danger nav_fonts">View Products</a>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title"><a href="{{ route('get_category_vise_product', $id) }}">{{ $category->name }}</a></h3>
                                @php
                                    $product_count = App\Models\Product::where('category_id', $category->id)->count();
                                @endphp
                                <p class="category-count">{{ $product_count }} Products</p>

                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach





            </div>
            <!-- Pagination Links -->
            <section id="category-pagination" class="category-pagination section">
                <div class="d-flex justify-content-center mt-4">
                    {{ $categories->links('vendor.pagination.bootstrap-5') }}
                </div>
            </section>

        </div>





    </section>

@endsection
