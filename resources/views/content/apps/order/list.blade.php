@extends('layouts/contentLayoutMaster')

@section('title', 'Orders List')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection



@section('content')
    <!-- users list start -->
    @if (session('status'))
        <h6 class="alert alert-warning">{{ session('status') }}</h6>
    @endif
    <section class="app-user-list">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Orders list</h4>
                {{-- @if (auth()->user()->can('product-create'))
                    <a href="{{ route('app-product-add') }}" class="col-md-2 btn btn-primary">Add Product
                    </a>
                @endif --}}
            </div>
            @if (auth()->user()->can('order-list'))
                <div class="card-body border-bottom">
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table dt-responsive" id="orders-table">
                            <thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Total Price</th>
                                    <th>Shipping Address</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            @endif


            <div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="editStatusLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editStatusLabel">Update Order Status</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('order.updateStatus') }}">
                                @csrf
                                <input type="hidden" name="id" id="order_id">
                                <div class="mb-3">
                                    <label for="order_status" class="form-label">Status</label>
                                    <select class="form-control" name="status" id="order_status">
                                        <option value="pending">Pending</option>
                                        <option value="processing">Processing</option>
                                        <option value="shipped">Shipped</option>
                                        <option value="delivered">Delivered</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-2"> <label class="form-check-label" for="is_paid">Is Paid</label>
                                    </div>
                                    <div class="col-10">
                                        <div class="mb-3 form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="is_paid" name="is_paid"
                                                value="1">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- list and filter end -->
    </section>
    <!-- users list ends -->
@endsection

@section('vendor-script')
    {{-- Vendor js files --}}
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
    @yield('links')
@endsection

@section('page-script')
    <script>
        $(document).ready(function() {
            $('#orders-table').DataTable({
                "order": [
                    [1, "desc"]
                ],
                processing: true,
                serverSide: true,
                "lengthMenu": [10, 25, 50, 100, 200],
                ajax: "{{ route('app-orders-get-all') }}",
                columns: [{
                        data: 'order_number',
                        name: 'order_number'
                    },
                    {
                        data: 'total_price',
                        name: 'total_price',
                    },
                    {
                        data: 'shipping_address',
                        name: 'shipping_address',
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ],
                drawCallback: function() {
                    feather.replace();
                    $('[data-bs-toggle="tooltip"]').tooltip();
                },
                dom: '<"export-buttons"B>lfrtip',
                "paging": true,
                buttons: [{
                    extend: 'excel',
                    className: 'btn btn-primary',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                }]
            });
        });


        $(document).on("click", ".confirm-delete", function(e) {
            e.preventDefault();
            var id = $(this).data("idos");
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ms-1'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    window.location.href = '/app/orders/destroy/' + id;
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'Record has been deleted.',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: 'Cancelled',
                        text: 'Your imaginary record is safe :)',
                        icon: 'error',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                }
            });
        });

        $(document).ready(function() {
            $(document).on("click", ".edit-status", function() {
                let orderId = $(this).data("id");
                let status = $(this).data("status");
                let isPaid = $(this).data("is_paid");
                let description = $(this).data("description");

                $("#order_id").val(orderId);
                $("#order_status").val(status).change();
                $("#description").val(description);

                // Handling switch input
                if (isPaid == 1) {
                    $("#is_paid").prop("checked", true);
                } else {
                    $("#is_paid").prop("checked", false);
                }
            });
        });
    </script>
    {{-- Page js files --}}
@endsection
