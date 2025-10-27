@extends('admin.layouts.master')

@section('page-title')
    Sazao | Update Brand
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Update Brand</h4>
                        <div>
                            <a href="{{ route('admin.brand.index') }}" class="btn btn-primary px-5">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label>Preview</label><br>
                                <img src="{{ asset($brand->logo) }}" width="100">
                            </div>
                            <div class="col-md-12">
                                <label>Logo <span class="text-danger">* (width:1280px, height:640px) 2MB Maximum</span></label>
                                <input type="file" name="logo" placeholder="Logo"
                                    class="form-control @error('logo') is-invalid @enderror">
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ $brand->name ?? old('name') }}" placeholder="Name"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Select a is Featured <span class="text-danger">*</span></label>
                                <select name="is_featured" class="form-select @error('is_featured') is-invalid @enderror">
                                    <option value="">Select a is Featured</option>
                                    <option value="1" @selected($brand->is_featured == 1)>Yes</option>
                                    <option value="0" @selected($brand->is_featured == 0)>No</option>
                                </select>
                                @error('is_featured')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Select a Status</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror">
                                    <option value="1" @selected($brand->status == 1)>Active</option>
                                    <option value="0" @selected($brand->status == 0)>InActive</option>
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
