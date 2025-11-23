@extends('admin.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Update Footer Social
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Update Footer Social</h4>
                        <div>
                            <a href="{{ route('admin.footer-socials.index') }}" class="btn btn-primary px-5">Back</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.footer-socials.update', $footer->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label>Icon <span class="text-danger">* <a target="_blank"
                                            href="https://fontawesome.com/v5/search?o=r">https://fontawesome.com</a></span></label>
                                <input type="text" name="icon" value="{{ old('icon') ?? $footer->icon }}"
                                    placeholder="fas fa-star" class="form-control @error('icon') is-invalid @enderror">
                                @error('icon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ old('name') ?? $footer->name }}"
                                    placeholder="Name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Url</label>
                                <input type="text" name="url" value="{{ old('url') ?? $footer->url }}"
                                    placeholder="URL" class="form-control @error('url') is-invalid @enderror">
                                @error('url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Select a Status</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror">
                                    <option value="1" @selected($footer->status == 1)>Active</option>
                                    <option value="0" @selected($footer->status == 0)>InActive</option>
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
