@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Update Shipping Rule
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Update Shipping Rule</h4>
                        <div>
                            <a href="{{ route('admin.shipping-rule.index') }}" class="btn btn-primary px-5">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.shipping-rule.update', $shipping->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{$shipping->name ?? old('name') }}" placeholder="Name"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Type</label>
                                <select name="type"
                                    class="form-select shipping-type @error('type') is-invalid @enderror">
                                    <option @selected($shipping->type === 'flat_cost') value="flat_cost">Flat Cost</option>
                                    <option @selected($shipping->type === 'min_cost') value="min_cost">Minimum Order Amount</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 min_cost {{ $shipping->type === 'min_cost' ? '' : 'd-none' }}">
                                <label>Minimum Amount</label>
                                <input type="number" name="min_cost" value="{{ old('min_cost') }}"
                                    placeholder="Minimum Amount"
                                    class="form-control @error('min_cost') is-invalid @enderror">
                                @error('min_cost')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Cost <span class="text-danger">*</span></label>
                                <input type="number" name="cost" value="{{$shipping->cost ?? old('cost') }}" placeholder="Cost"
                                    class="form-control @error('cost') is-invalid @enderror">
                                @error('cost')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Select a Status</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror">
                                    <option value="1" @selected($shipping->status == 1)>Active</option>
                                    <option value="0" @selected($shipping->status == 0)>InActive</option>
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
            </div>
        </div>
    </div>
@endsection

@push('js-link')
    <script>
        $(document).ready(function() {
            $('body').on('change', '.shipping-type', function() {
                let value = $(this).val();

                if (value != 'min_cost') {
                    $('.min_cost').addClass('d-none')
                } else {
                    $('.min_cost').removeClass('d-none')
                }
            })
        })
    </script>
@endpush
