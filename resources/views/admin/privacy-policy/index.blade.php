@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Privacy Policy
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0">Update Privacy Policy</h3>
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <form action="{{ route('admin.privacy-policy.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label>Content <span class="text-danger">*</span></label>
                                    <textarea name="content" id="elm1" class="form-control @error('content') is-invalid @enderror">{!! @$content->content !!}</textarea>
                                    @error('content')
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
@endsection

@push('js-link')
    <!--tinymce js-->
    <script src="{{ asset('backend/assets/libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/form-editor.init.js') }}"></script>
@endpush
