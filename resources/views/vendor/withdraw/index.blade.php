@extends('vendor.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Withdraw
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

                        <div class="wsus__dashboard">
                            <div class="row">
                                <div class="col-xl-4 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                                        <i class="fas fa-shopping-cart"></i>
                                        <p>Current Balance</p>
                                        <h4 class="text-white">{{ $settings->currency_icon . $currentBalance }}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-4 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                                        <i class="fas fa-shopping-cart"></i>
                                        <p>Pending Amount</p>
                                        <h4 class="text-white">{{ $settings->currency_icon . $pendingAmount }}</h4>
                                    </a>
                                </div>
                                <div class="col-xl-4 col-6 col-md-4">
                                    <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                                        <i class="fas fa-shopping-cart"></i>
                                        <p>Total withdraw</p>
                                        <h4 class="text-white">{{ $settings->currency_icon . $totalWithdraw }}</h4>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <div class="d-flex justify-content-between mb-4">
                                    <h4>All withdraw</h4>
                                    <a href="{{ route('vendor.withdraw.create') }}" class="btn btn-primary px-5"><i
                                            class="fas fa-plus"></i> Create Request</a>
                                </div>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Method</th>
                                            <th>Total Amount</th>
                                            <th>Withdraw Amount</th>
                                            <th>Withdraw Charge</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($WithdrawRequests as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->method }}</td>
                                                <td>{{ $settings->currency_icon . $item->total_amount }}</td>
                                                <td>{{ $settings->currency_icon . $item->withdraw_amount }}</td>
                                                <td>{{ $item->withdraw_charge . '%' }}</td>
                                                <td>
                                                    @if ($item->status === 'pending')
                                                        <span class="badge bg-warning">Pending</span>
                                                    @elseif ($item->status === 'paid')
                                                        <span class="badge bg-success">Paid</span>
                                                    @elseif ($item->status === 'decline')
                                                        <span class="badge bg-danger">Decline</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('vendor.withdraw-request.show', $item->id) }}"
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
