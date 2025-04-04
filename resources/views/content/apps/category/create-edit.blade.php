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

    @if ($page_data['form_title'] == 'Add New Category')
        <form action="{{ route('app-category-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        @else
            <form action="{{ route('app-category-update', encrypt($category->id)) }}" method="POST"
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
                        <a href="{{ route('app-categories-list') }}" class="col-md-2 btn btn-primary float-end">Category
                            List</a>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{-- @if ($errors->any())
                            <div class="alert text-danger">
                                <ol>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ol>
                            </div>
                            @endif --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="name">Category Name</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        placeholder="Name" value="{{ $category != '' ? $category->name : '' }}" />
                                    @error('name')
                                        <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <label for="file" class="form-label">File Upload</label>
                                <input type="file" name="file" id="file" class="form-control"
                                    accept=".jpg, .jpeg, .png, .svg, .webp">
                                @if (isset($category->file) && $category->file)
                                    <div class="mt-2 d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $category->file) }}" alt="Uploaded Image"
                                            class="img-thumbnail" width="150">
                                        {{-- <img src="{{ asset('storage/app/public/' . $category->file) }}" alt="Uploaded Image"
                                        class="img-thumbnail" width="150"> --}}
                                        <a href="" class="delete_image" data-id="{{ $category->id }}"><i
                                                class='text-danger ' data-feather='trash-2'></i></a></a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6 pt-2">
                                <div class="form-group">
                                    <label for="description" class="form-label">Description</label>
                                    <div id="editor" style="height: 150px;">{!! $category ? $category->description : '' !!}</div>
                                    <textarea name="description" cols="form-control" id="description" class="d-none"></textarea>

                                </div>
                            </div>
                            <div class="col-md-3 pt-2">
                                <label class="form-label" for="customSwitch1">Status</label>

                                <div class="form-check form-switch">

                                    <input type="checkbox" class="form-check-input"
                                        {{ $category && $category->status == 'active' ? 'checked' : '' }} name="status"
                                        id="customSwitch1" data-id="{{ $category ? $category->id : ''}}" />
                                </div>
                            </div>


                            <div class="col-md-3 pt-2">
                                <label class="form-label" for="add_to_home">Add To Home</label>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input"
                                        {{ $category && $category->add_to_home == '1' ? 'checked' : '' }}
                                        name="add_to_home" id="add_to_home" />
                                </div>
                            </div>



                            <div class="col-12 pt-4">
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




        $(document).on("click", ".delete_image", function(e) {
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
                        url: "{{ route('category-destroy-image', ':id') }}".replace(':id',
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

    {{-- editor --}}

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


    <script>
        $(document).ready(function() {
            $('#customSwitch1').on('change', function() {
                let switchElement = $(this);
                let categoryId = switchElement.data("id");
                let status = switchElement.prop("checked") ? 1 : 0;

                if (!status) {
                    Swal.fire({
                        title: "Are you sure?",
                        text: "Are you sure you wants to disable this category? once you disable this category all the products belongs to this category will be disable on a website ",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, disable it!",
                        cancelButtonText: "Cancel"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('update-category-status') }}",
                                type: "POST",
                                data: {
                                    category_id: categoryId,
                                    status: status,
                                    _token: $('meta[name="csrf-token"]').attr("content"),
                                },
                                success: function(response) {
                                    if (response.success) {
                                        Swal.fire("Updated!", response.message,
                                            "success");
                                    } else {
                                        Swal.fire("Error!", "Something went wrong!",
                                            "error");
                                        switchElement.prop("checked",
                                            true); // Revert toggle
                                    }
                                },
                                error: function(xhr) {
                                    console.log(xhr.responseText);
                                    Swal.fire("Error!", "Something went wrong!",
                                        "error");
                                    switchElement.prop("checked",
                                        true); // Revert toggle
                                },
                            });
                        } else {
                            switchElement.prop("checked", true); // Revert toggle if canceled
                        }
                    });
                }
            });
        });
    </script>


@endsection
