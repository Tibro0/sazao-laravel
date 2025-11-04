@extends('vendor.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | All Products
@endsection

@section('css-link')
    <!-- DataTables Css -->
    <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Sweet Alert-->
    <link href="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('vendor.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <div class="d-flex justify-content-between mb-4">
                                    <h4>All Products</h4>
                                    <div>
                                        <a href="{{ route('vendor.products.create') }}" class="btn btn-primary px-5">Create
                                            New</a>
                                    </div>
                                </div>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Approved</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                            <tr>
                                                <td width="50">{{ $loop->iteration }}</td>
                                                <td width="100"><img src="{{ asset($item->thumb_image) }}"
                                                        width="100"></td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>
                                                    @if ($item->is_approved === 1)
                                                        <span class="badge bg-primary">Yes</span>
                                                    @elseif ($item->is_approved === 0)
                                                    <span class="badge bg-danger">No</span>
                                                    @endif
                                                </td>
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
                                                    @if ($item->status === 1)
                                                        <div class="form-check form-switch mb-3">
                                                            <input type="checkbox" class="form-check-input change-status"
                                                                data-id="{{ $item->id }}" checked>
                                                        </div>
                                                    @elseif ($item->status === 0)
                                                        <div class="form-check form-switch mb-3">
                                                            <input type="checkbox" class="form-check-input change-status"
                                                                data-id="{{ $item->id }}">
                                                        </div>
                                                    @endif
                                                </td>
                                                <td width="100">
                                                    <a href="{{ route('vendor.products.edit', $item->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="{{ route('vendor.products.destroy', $item->id) }}"
                                                        id="delete" class="btn btn-danger"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                    <div class="btn-group dropstart">
                                                        <button type="button"
                                                            class="btn btn-info waves-effect waves-light dropdown-toggle"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-chevron-left"></i> <i class="fas fa-cog"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('vendor.products-image-gallery.index', ['product' => $item->id]) }}"><i
                                                                    class="fas fa-images"></i> Image Gallery</a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('vendor.products-variant.index', ['product' => $item->id]) }}"><i
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
                    </div>
                </div>
            </div>
        </div>
    </section>
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

        })
    </script>
    <!--Toggle Button script -->
    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('vendor.products.change-status') }}",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id
                    },
                    success: function(data) {
                        toastr.success(data.message)
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })

            })
        })
    </script>
@endsection
