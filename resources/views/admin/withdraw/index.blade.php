@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | All Withdraw Request List
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
                        <h4 class="mb-0">All Withdraw Request List</h4>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Vendor</th>
                                <th>Method</th>
                                <th>Total Amount</th>
                                <th>Withdraw Amount</th>
                                <th>Withdraw Charge</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($withdrawRequests as $item)
                                <tr>
                                    <td width="50">{{ $loop->iteration }}</td>
                                    <td>{{ $item->vendor->shop_name }}</td>
                                    <td>{{ $item->method }}</td>
                                    <td>{{ $item->total_amount }}</td>
                                    <td>{{ $item->withdraw_amount }}</td>
                                    <td>{{ $item->withdraw_charge }}</td>
                                    <td>
                                        @if ($item->status === 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif ($item->status === 'paid')
                                            <span class="badge bg-success">Paid</span>
                                        @elseif ($item->status === 'decline')
                                            <span class="badge bg-danger">Decline</span>
                                        @endif
                                    </td>
                                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                    <td width="100">
                                        <a href="{{ route('admin.withdraw.show', $item->id) }}" class="btn btn-primary"><i
                                                class="far fa-eye"></i></a>
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
@endpush
