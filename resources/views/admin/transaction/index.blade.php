@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | All Transactions
@endsection

@section('css-link')
    <!-- DataTables Css -->
    <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">All Transactions</h4>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Invoice Id</th>
                                <th>Transaction Id</th>
                                <th>Payment Method</th>
                                <th>Amount In Base Currency</th>
                                <th>Amount In Real Currency</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $item)
                                <tr>
                                    <td width="50">{{ $loop->iteration }}</td>
                                    <td>#{{ $item->order->invoice_id }}</td>
                                    <td>{{ $item->transaction_id }}</td>
                                    <td>{{ Str::ucfirst($item->payment_method) }}</td>
                                    <td>{{ $item->amount . $item->order->currency_name }}</td>
                                    <td>{{ $item->amount_real_currency . $item->amount_real_currency_name }}</td>
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
@endsection
