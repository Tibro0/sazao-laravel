@extends('admin.layouts.master')

@section('page-title')
    Sazao | Update Slider
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Update Slider</h4>
                        <div>
                            <a href="{{ route('admin.slider.index') }}" class="btn btn-primary px-5">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label>Preview</label><br>
                                <img src="{{ asset($slider->banner) }}" width="100">
                            </div>
                            <div class="col-md-12">
                                <label>Banner <span class="text-danger">(width:1300px, height:500px) 2MB Min</span></label>
                                <input type="file" name="banner" placeholder="Banner"
                                    class="form-control @error('banner') is-invalid @enderror">
                                @error('banner')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Type <span class="text-danger">*</span></label>
                                <input type="text" name="type" value="{{ old('type') ?? $slider->type }}"
                                    placeholder="Type" class="form-control @error('type') is-invalid @enderror">
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" value="{{ old('title') ?? $slider->title }}"
                                    placeholder="Title" class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Starting Price</label>
                                <input type="text" name="starting_price"
                                    value="{{ old('starting_price') ?? $slider->starting_price }}"
                                    placeholder="Starting Price"
                                    class="form-control @error('starting_price') is-invalid @enderror">
                                @error('starting_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Btn Url</label>
                                <input type="text" name="btn_url" value="{{ old('btn_url') ?? $slider->btn_url }}"
                                    placeholder="Btn Url" class="form-control @error('btn_url') is-invalid @enderror">
                                @error('btn_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Serial <span class="text-danger">*</span></label>
                                <input type="number" name="serial" value="{{ old('serial') ?? $slider->serial }}"
                                    placeholder="Serial Number" class="form-control @error('serial') is-invalid @enderror">
                                @error('serial')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Select a Status</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror">
                                    <option value="1" @selected($slider->status == 1)>Active</option>
                                    <option value="0" @selected($slider->status == 0)>InActive</option>
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
