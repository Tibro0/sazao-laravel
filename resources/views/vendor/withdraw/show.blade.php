@extends('vendor.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Show Withdraw Request
@endsection

@section('content')
    <!--=============================DASHBOARD START==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('vendor.layouts.sidebar')

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <div class="wsus__dashboard_profile">
                            <div class="row">
                                <div class="wsus__dash_pro_area col-md-12">
                                    <div class="d-flex justify-content-between mb-4">
                                    <h4>Show Withdraw Request</h4>
                                    <div>
                                        <a href="{{ route('vendor.withdraw.index') }}" class="btn btn-primary px-5">Back</a>
                                    </div>
                                </div>

                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td><b>Withdraw Method</b></td>
                                                <td>{{ $request->method }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Withdraw Charge</b></td>
                                                <td>{{ ($request->withdraw_charge / $request->total_amount) * 100 }}%</td>
                                            </tr>
                                            <tr>
                                                <td><b>Withdraw Charge Amount</b></td>
                                                <td>{{ $settings->currency_icon . $request->withdraw_charge }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Total Amount</b></td>
                                                <td>{{ $settings->currency_icon . $request->total_amount }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Withdraw Amount</b></td>
                                                <td>{{ $settings->currency_icon . $request->withdraw_amount }}</td>
                                            </tr>
                                            <tr>
                                                <td><b>Status</b></td>
                                                <td>
                                                    @if ($request->status === 'pending')
                                                        <span class="badge bg-warning">Pending</span>
                                                    @elseif ($request->status === 'paid')
                                                        <span class="badge bg-success">Paid</span>
                                                    @elseif ($request->status === 'decline')
                                                        <span class="badge bg-danger">Decline</span>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><b>Account Information</b></td>
                                                <td>{!! $request->account_info !!}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================DASHBOARD START==============================-->
@endsection
