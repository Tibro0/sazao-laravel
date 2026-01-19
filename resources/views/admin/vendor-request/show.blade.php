@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Show Vendor Request
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Show Vendor Request</h4>
                        <div>
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light px-5"
                                data-bs-toggle="modal" data-bs-target="#myModal">Change Status</button>
                            <a href="{{ route('admin.vendor-request.index') }}" class="btn btn-primary px-5">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-md">
                            <tbody>
                                <tr>
                                    <td><b>User Name:</b></td>
                                    <td>{{ $vendor->user->name }}</td>
                                </tr>
                                <tr>
                                    <td><b>User Email:</b></td>
                                    <td>{{ $vendor->user->email }}</td>
                                </tr>
                                <tr>
                                    <td><b>Shop Name:</b></td>
                                    <td>{{ $vendor->shop_name }}</td>
                                </tr>
                                <tr>
                                    <td><b>Shop Email:</b></td>
                                    <td>{{ $vendor->email }}</td>
                                </tr>
                                <tr>
                                    <td><b>Shop Phone:</b></td>
                                    <td>{{ $vendor->phone }}</td>
                                </tr>
                                <tr>
                                    <td><b>Shop Address:</b></td>
                                    <td>{{ $vendor->address }}</td>
                                </tr>
                                <tr>
                                    <td><b>Description:</b></td>
                                    <td>{{ $vendor->description }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Change Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.vendor-request.change-status', $vendor->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label>Action</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror">
                                    <option @selected($vendor->status === 0) value="0">
                                        Pending</option>
                                    <option @selected($vendor->status === 1) value="1">
                                        Approve</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
