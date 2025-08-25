@extends('admin.layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Edit Category') }}</h3>
                                <div class="card-actions">
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left"></i> {{ __('Back to list') }}
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="avatar" class="form-label">{{ __('Avatar URL') }}</label>
                                        <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                            id="avatar" name="avatar" value="{{ old('avatar', $category->avatar) }}"
                                            placeholder="Enter avatar URL">
                                        @error('avatar')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                        @if ($category->avatar)
                                            <div class="mt-2">
                                                <img src="{{ asset($category->avatar) }}" alt="Avatar" class="img-thumbnail"
                                                    style="max-width: 120px;">
                                            </div>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('Name') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name', $category->name) }}"
                                            placeholder="Enter category name" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="slug" class="form-label">{{ __('Slug') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                            id="slug" name="slug" value="{{ old('slug', $category->slug) }}"
                                            placeholder="Enter slug" required>
                                        @error('slug')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small class="form-text text-muted">URL friendly and unique identifier</small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="description" class="form-label">{{ __('Description') }}</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                            rows="4" placeholder="Enter description">{{ old('description', $category->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- <div class="mb-3">
                                        <label for="is_active" class="form-label">{{ __('Status') }}</label>
                                        <select class="form-select @error('is_active') is-invalid @enderror" id="is_active" name="is_active">
                                            <option value="" disabled>select</option>
                                            <option value="active" {{ old('is_active', $category->is_active) == 1 ? 'selected' : '' }}>{{ __('Active') }}</option>
                                            <option value="inactive" {{ old('is_active', $category->is_active) == 0 ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                        </select>
                                        @error('is_active')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                </form>
                            </div>
                            <div class="card-footer">
                                <button onclick="$('form').submit()" type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>
@endsection
