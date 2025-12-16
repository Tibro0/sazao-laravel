@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Withdraw Request Show
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Withdraw Request Show</h4>
                        <div>
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light px-5"
                                data-bs-toggle="modal" data-bs-target="#myModal">Status Change</button>
                            <a href="{{ route('admin.withdraw.index') }}" class="btn btn-primary px-5">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
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
                                <td><b>Vendor Shop Name</b></td>
                                <td>{{ $request->vendor->shop_name }}</td>
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
@endsection

@section('modal')
    <!-- sample modal content -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Modal Heading</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.withdraw.update', $request->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label>Status</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror">
                                    <option @selected($request->status === 'pending') value="pending">
                                        Pending</option>
                                    <option @selected($request->status === 'paid') value="paid">Paid
                                    </option>
                                    <option @selected($request->status === 'decline') value="decline">
                                        Decline</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary px-5">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
