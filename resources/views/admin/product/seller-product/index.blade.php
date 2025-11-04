@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | All Seller Products
@endsection

@section('css-link')
    <!-- DataTables Css -->
    <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Sweet Alert-->
    <link href="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">All Seller Products</h4>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Vendor</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Type</th>
                                <th>Is Approved</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td width="50">{{ $loop->iteration }}</td>
                                    <td width="100"><img src="{{ asset($item->thumb_image) }}" width="100"></td>
                                    <td>{{ $item->vendor->shop_name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        @if ($item->product_type === 'new_arrival')
                                            <span class="badge bg-success">New Arrival</span>
                                        @elseif ($item->product_type === 'featured_product')
                                            <span class="badge bg-warning">Featured Product</span>
                                        @elseif ($item->product_type === 'top_product')
                                            <span class="badge bg-info">Top Product</span>
                                        @elseif ($item->product_type === 'best_product')
                                            <span class="badge bg-danger">Best Product</span>
                                        @else
                                            <span class="badge bg-dark">None</span>
                                        @endif
                                    </td>
                                    <td>
                                        <select class="form-select is_approve" data-id="{{ $item->id }}">
                                            <option value="0">Pending</option>
                                            <option value="1" selected>Approved</option>
                                        </select>
                                    </td>
                                    <td width="100">
                                        <a href="{{ route('admin.products.edit', $item->id) }}" class="btn btn-primary"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a href="{{ route('admin.products.destroy', $item->id) }}" id="delete"
                                            class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        <div class="btn-group dropstart">
                                            <button type="button"
                                                class="btn btn-info waves-effect waves-light dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-chevron-left"></i> <i class="fas fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.products-image-gallery.index', ['product' => $item->id]) }}"><i
                                                        class="fas fa-images"></i> Image Gallery</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.products-variant.index', ['product' => $item->id]) }}"><i
                                                        class="fab fa-product-hunt"></i> Product Variant</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('js-link')
    <!-- Datatable js -->
    <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#datatable').DataTable();
    </script>
    <!-- Sweet Alerts js -->
    <script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('body').on('click', '#delete', function(event) {
                event.preventDefault();

                let deleteUrl = $(this).attr('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'DELETE',
                            url: deleteUrl,

                            success: function(data) {

                                if (data.status == 'success') {
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    )
                                    window.location.reload();
                                } else if (data.status == 'error') {
                                    Swal.fire(
                                        'Cant Delete',
                                        data.message,
                                        'error'
                                    )
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        })
                    }
                })
            })
            // change approve status
            $('body').on('change', '.is_approve', function() {
                let value = $(this).val();
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('admin.change-approve-status') }}",
                    method: 'PUT',
                    data: {
                        value: value,
                        id: id
                    },
                    success: function(data) {
                        toastr.success(data.message)
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })

            })

        })
    </script>
@endsection
