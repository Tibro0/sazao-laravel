@extends('vendor.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | All Orders
@endsection

@section('css-link')
    <!-- DataTables Css -->
    <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
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
                                    <h4>All Orders</h4>
                                </div>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Invoice ID</th>
                                            <th>Customer</th>
                                            <th>Date</th>
                                            <th>Product Qty</th>
                                            <th>Amount</th>
                                            <th>Order Status</th>
                                            <th>Payment Status</th>
                                            <th>Payment Method</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $item)
                                            <tr>
                                                <td width="50">{{ $loop->iteration }}</td>
                                                <td>{{ $item->invoice_id }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ date('j-F-Y', strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->product_qty }}</td>
                                                <td>{{ $settings->currency_icon }}{{ $item->amount }}</td>
                                                <td>
                                                    @if ($item->order_status === 'pending')
                                                        <span class='badge bg-warning'>Pending</span>
                                                    @elseif ($item->order_status === 'processed_and_ready_to_ship')
                                                        <span class='badge bg-info'>Processed</span>
                                                    @elseif ($item->order_status === 'dropped_off')
                                                        <span class='badge bg-secondary'>Dropped Off</span>
                                                    @elseif ($item->order_status === 'shipped')
                                                        <span class='badge bg-dark'>Shipped</span>
                                                    @elseif ($item->order_status === 'out_for_delivery')
                                                        <span class='badge bg-primary'>Out For Delivery</span>
                                                    @elseif ($item->order_status === 'delivered')
                                                        <span class='badge bg-success'>Delivered</span>
                                                    @elseif ($item->order_status === 'canceled')
                                                        <span class='badge bg-danger'>Canceled</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->payment_status === 1)
                                                        <span class="badge bg-primary">Complete</span>
                                                    @else
                                                        <span class="badge bg-danger">UnPaid</span>
                                                    @endif
                                                </td>
                                                <td>{{ Str::ucfirst($item->payment_method) }}</td>
                                                <td width="100">
                                                    <a href="{{ route('vendor.orders.show', $item->id) }}"
                                                        class="btn btn-primary"><i class="fas fa-eye"></i></a>
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

@push('js-link')
    <!-- Datatable js -->
    <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $('#datatable').DataTable();
    </script>
@endpush
