@extends('vendor.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | All Reviews
@endsection

@push('css-link')
    <!-- DataTables Css -->
    <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endpush

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
                                    <h4>All Reviews</h4>
                                </div>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Product Name</th>
                                            <th>Ratting</th>
                                            <th>Review</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $item)
                                            <tr>
                                                <td width="50">{{ $loop->iteration }}</td>
                                                <td><a target="_blank"
                                                        href="{{ route('product-detail', $item->product->slug) }}">{{ $item->product->name }}</a>
                                                </td>
                                                <td>
                                                    @for ($i = 1; $i <= $item->rating; $i++)
                                                        <i class="fas fa-star text-primary"></i>
                                                    @endfor
                                                </td>
                                                <td>{{ $item->review }}</td>
                                                <td>
                                                    @if ($item->status === 1)
                                                        <span class="badge bg-primary">Approved</span>
                                                    @elseif ($item->status === 0)
                                                        <span class="badge bg-danger">Pending</span>
                                                    @endif
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
