@extends('vendor.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Create withdraw Request
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
                                    <h4>Create withdraw Request</h4>
                                    <div>
                                        <a href="{{ route('vendor.withdraw.index') }}" class="btn btn-primary px-5">Back</a>
                                    </div>
                                </div>

                                <div class="col-md-12 remove-class d-none mb-4">
                                    <div class="wsus__dash_pro_area" id="account_info_area">

                                    </div>
                                </div>

                                <form action="{{ route('vendor.withdraw.store') }}" method="POST">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label">Method <span class="text-danger">*</span></label>
                                            <select name="method" id="method"
                                                class="form-select @error('method') is-invalid @enderror">
                                                <option value="">Select a Method</option>
                                                @foreach ($methods as $method)
                                                    <option value="{{ $method->id }}">{{ $method->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('method')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Withdraw Amount <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="amount" value="{{ old('amount') }}"
                                                placeholder="Withdraw Amount"
                                                class="form-control @error('amount') is-invalid @enderror">
                                            @error('amount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Account Information <span
                                                    class="text-danger">*</span></label>
                                            <textarea name="account_info" id="elm1" placeholder="Account Information"
                                                class="form-control @error('account_info') is-invalid @enderror"></textarea>
                                            @error('account_info')
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
            </div>
        </div>
    </section>
@endsection

@push('js-link')
    <!--tinymce js-->
    <script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#method').on('change', function(e) {
                let id = $(this).val();
                if (!id) {
                    $('.remove-class').addClass('d-none');
                    return;
                }
                $.ajax({
                    method: 'GET',
                    url: "{{ route('vendor.withdraw.show', ':id') }}".replace(':id', id),
                    success: function(response) {
                        $('.remove-class').removeClass('d-none');
                        $('#account_info_area').html(`
                        <h3>Payout Range: {{ $settings->currency_icon }}${response.minimum_amount} - {{ $settings->currency_icon }}${response.maximum_amount}</h3>
                        <h3>withdraw Charge: ${response.withdraw_charge}%</h3>
                        <p>${response.description}</p>
                        `)
                    },
                    error: function(error) {
                        console.log(error);
                        $('.remove-class').addClass('d-none');
                    }
                })
            })
        })
    </script>
@endpush
