@extends('layouts/contentLayoutMaster')

@section('title', $page_data['page_title'])

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection


@section('page-style')
    {{-- Page Css files --}}
@endsection

@section('content')

    @if ($page_data['form_title'] == 'Add New Product')
        <form id="productForm" action="{{ route('app-product-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        @else
            <form action="{{ route('app-product-update', encrypt($product->id)) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
    @endif

    <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $page_data['form_title'] }}</h4>
                        <a href="{{ route('app-products-list') }}" class="col-md-2 btn btn-primary float-end">Product
                            List</a>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 pt-2">
                                <div class="form-group">
                                    <label class="form-label" for="name">Product Name</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        placeholder="Name" value="{{ old('name' , $product ? $product->name : '') }}" />
                                    @error('name')
                                        <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 pt-2">
                                <div class="form-group">
                                    <label class="form-label" for="category">Category</label>
                                    <select name="category" id="category" class="form-control select2">
                                        <option value="">select category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ isset($product) && $product->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('category')
                                        <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 pt-2">
                                <label for="price" class="form-label">Price/Unit</label>
                                <input type="number" name="price" id="price" class="form-control"
                                    value="{{ old('price',$product != '' ? $product->price : '')}}">
                                    @error('price')
                                    <div style="color: red;">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="col-md-6 pt-2">
                                <label for="discount_price" class="form-label">Discounted Price/Unit</label>
                                <input type="number" name="discount_price" id="discount_price" class="form-control"
                                    value="{{ old('discount_price', $product != '' ? $product->discount_price : '')}}">
                                    @error('discount_price')
                                    <div style="color: red;">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="col-md-6 pt-2">
                                <label for="quntity" class="form-label">Quantity</label>
                                <input type="number" name="quntity" id="quntity" class="form-control"
                                    value="{{ old('quntity', $product != '' ? $product->quntity : '') }}">
                                    @error('quntity')
                                    <div style="color: red;">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="col-md-6 pt-2">
                                <label for="minimum_quntity" class="form-label">Minimum Quantity</label>
                                <input type="number" name="minimum_quntity" id="minimum_quntity"
                                    class="form-control"value="{{ old('minimum_quntity', $product != '' ? $product->minimum_quntity : '') }}">
                                    @error('minimum_quntity')
                                    <div style="color: red;">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="col-md-4 pt-2">
                                <label for="cover_image" class="form-label">Cover Image</label>
                                <input type="file" name="cover_image" id="cover_image" class="form-control" accept=".jpg, .jpeg, .png, .svg, .webp">

                                @error('cover_image')
                                    <div style="color: red;">{{ $message }}</div>
                                @enderror

                                @if (isset($product->cover_image) && $product->cover_image)
                                    <div class="mt-2 d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $product->cover_image) }}" alt="Uploaded Image"
                                            class="img-thumbnail" width="150" accept=".png, .jpg, .jpeg, .svg">
                                        {{-- <img src="{{ asset('storage/app/public/' . $product->cover_image) }}" alt="Uploaded Image" class="img-thumbnail"
                                        width="150"> --}}
                                        <a href="" class="delete_cover_image" data-id="{{ $product->id }}"><i
                                                class='text-danger ' data-feather='trash-2'></i></a></a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4 pt-2">
                                <div class="form-group">
                                    <label class="form-label" for="brand">Brand</label>
                                    <input type="text" id="brand" class="form-control" name="brand" placeholder="Brand"
                                        value="{{ old('expiration_date' , $product ? $product->brand : '') }}" />
                                    @error('brand')
                                    <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 pt-2">
                                <div class="form-group">
                                    <label class="form-label" for="location">Location</label>
                                    <input type="text" id="location" class="form-control" name="location" placeholder="Location"
                                        value="{{ old('expiration_date' , $product ? $product->location : '') }}" />
                                    @error('location')
                                    <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4 pt-2">
                                <div class="form-group">
                                    <label class="form-label" for="roi">ROI (%)</label>
                                    <input type="text" id="roi" class="form-control" name="roi" placeholder="ROI"
                                        value="{{ old('roi' , $product ? $product->roi : '') }}" />
                                    @error('roi')
                                    <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 pt-2">
                                <div class="form-group">
                                    <label class="form-label" for="expiration_date">Expiration Date</label>
                                    <input type="date" id="expiration_date" class="form-control" name="expiration_date" placeholder="Expiration Date"
                                        value="{{ old('expiration_date' , $product ? $product->expiration_date : '') }}" />
                                    @error('expiration_date')
                                    <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 pt-2">
                                <div class="form-group">
                                    <label class="form-label" for="asin_no">ASIN No.</label>
                                    <input type="text" id="asin_no" class="form-control" name="asin_no"
                                        placeholder="ASIN Number"
                                        value="{{ old('asin_no' , $product ? $product->asin_no : '') }}" />
                                    @error('asin_no')
                                    <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 pt-2">
                                <label class="form-label" for="customSwitch1">Status</label>

                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" {{ $product && $product->status == 'active' ? 'checked' : ''
                                    }} name="status"
                                    id="customSwitch1" />
                                </div>
                            </div>

                            <div class="col-md-4 pt-2">
                                <label class="form-label" for="add_to_home">Add To Home</label>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" {{ $product && $product->add_to_home == '1' ? 'checked' : ''
                                    }} name="add_to_home"
                                    id="add_to_home" />
                                </div>
                            </div>

                            <div class="col-md-12 py-2">
                                <label for="description" class="form-label">Description</label>
                                <div id="editor" style="height: 150px">{!! $product ? $product->description : '' !!}</div>
                                <textarea name="description" cols="form-control" id="description" class="d-none"></textarea>
                            </div>
                            <div class="col-12 pt-5">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary me-1">Submit
                                </button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    </form>
@endsection

@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
    <script>
        // Function to generate a random password
        function generateRandomPassword(length) {
            const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            let password = "";
            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * charset.length);
                password += charset.charAt(randomIndex);
            }
            return password;
        }

        $(document).ready(function() {
            // Generate password when the button is clicked
            $("#generatePassword").click(function() {
                const generatedPassword = generateRandomPassword(
                    10); // You can adjust the length of the password here
                $("#password").val(generatedPassword);
                $("#password").select();
                document.execCommand("copy");
                alert("Password copied to clipboard!");
            });
        });




        $(document).on("click", ".delete_cover_image", function(e) {
            e.preventDefault();
            var productId = $(this).data("id");
            var $this = $(this); // Store reference for later use

            Swal.fire({
                title: 'Are you sure?',
                text: "This will permanently delete the image!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ms-1'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('app-product-destroy-cover-image', ':id') }}".replace(':id',
                            productId), // Use Laravel route helper
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr(
                                'content') // Fetch CSRF token from meta tag
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Image has been deleted.',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                });
                                $this.closest('.d-flex').remove(); // Remove image from UI
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'Something went wrong.',
                                    customClass: {
                                        confirmButton: 'btn btn-danger'
                                    }
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>

    {{-- editor  --}}

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>


    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });


        quill.on('text-change', function() {
            let quillContent = quill.root.innerHTML;
            $('#description').val(quillContent);
        });
    </script>
@endsection
