@extends('vendor.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | All Variant Items
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

                            <div class="d-flex justify-content-between mb-4">
                                <h4>Product : {{ $product->name }}</h4>
                                <div>
                                     <a href="{{ route('vendor.products-variant.index', ['product' => $product->id]) }}" class="btn btn-primary px-5">Back</a>
                                </div>
                            </div>

                            <div class="wsus__dash_pro_area">
                                <div class="d-flex justify-content-between mb-4">
                                    <h4 class="mb-0">All Product Variant Ttems</h4>
                                    <div>
                                        <a href="{{ route('vendor.products-variant-item.create', ['productId'=>$product->id, 'variantId' => $variant->id]) }}" class="btn btn-primary px-5 rounded">Create New</a>
                                    </div>
                                </div>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Product Variant Name</th>
                                            <th>Price</th>
                                            <th>Is Default</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($variantItems as $item)
                                            <tr>
                                                <td width="50">{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->productVariant->name }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>
                                                    @if ($item->is_default === 1)
                                                        <span class="badge bg-primary">Yes</span>
                                                    @elseif ($item->is_default === 0)
                                                        <span class="badge bg-danger">No</span>
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
                                                    <a href="{{ route('vendor.products-variant-item.edit', $item->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="{{ route('vendor.products-variant-item.destroy', $item->id) }}"
                                                        id="delete" class="btn btn-danger"><i
                                                            class="fas fa-trash-alt"></i></a>
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
                    url: "{{ route('vendor.products-variant-item.change-status') }}",
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
