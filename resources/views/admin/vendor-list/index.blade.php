@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | All Vendors
@endsection

@push('css-link')
    <!-- DataTables Css -->
    <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Sweet Alert-->
    <link href="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">All Vendors</h4>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Shop Name</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendors as $item)
                                <tr>
                                    <td width="50">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->vendor->shop_name }}</td>
                                    <td>{{ Str::ucfirst($item->role) }}</td>
                                    <td>
                                        @if ($item->status === 'active')
                                            <div class="form-check form-switch mb-3">
                                                <input type="checkbox" class="form-check-input change-status"
                                                    data-id="{{ $item->id }}" checked>
                                            </div>
                                        @elseif ($item->status === 'inactive')
                                            <div class="form-check form-switch mb-3">
                                                <input type="checkbox" class="form-check-input change-status"
                                                    data-id="{{ $item->id }}">
                                            </div>
                                        @endif
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

@push('js-link')
    <!-- Datatable js -->
    <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#datatable').DataTable();
    </script>
    <!--Toggle Button script -->
    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('admin.vendor-list.status-change') }}",
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
@endpush
