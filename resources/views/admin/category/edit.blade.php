@extends('admin.layouts.master')

@section('page-title')
    Sazao | Update Category
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Update Category</h4>
                        <div>
                            <a href="{{ route('admin.category.index') }}" class="btn btn-primary px-5">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label>Icon <span class="text-danger">* <a target="_blank" href="https://fontawesome.com/v5/search?o=r">https://fontawesome.com</a></span></label>
                                <input type="text" name="icon" value="{{ $category->icon ?? old('icon') }}" placeholder="fas fa-star"
                                    class="form-control @error('icon') is-invalid @enderror">
                                @error('icon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ $category->name ?? old('name') }}" placeholder="Name"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label>Select a Status</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror">
                                    <option value="1" @selected($category->status == 1)>Active</option>
                                    <option value="0" @selected($category->status == 0)>InActive</option>
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
