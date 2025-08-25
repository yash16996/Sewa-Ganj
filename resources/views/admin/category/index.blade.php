@extends('admin.layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('All Categories') }}</h3>
                                <div class="card-actions">
                                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary flex gap-2">
                                        <i class="bi bi-plus"></i>
                                        {{ __('Add new') }}
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th>Avatar</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                {{-- <th>Status</th> --}}
                                                <th class="w-1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @dd($categories) --}}
                                            @foreach ($categories as $category)
                                            <tr>
                                                    <td>
                                                        <img src="{{ asset($category->avatar) }}" alt="avatar" width="50px" class="rounded">
                                                    </td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>
                                                        <p class="truncate">
                                                            {{ $category->description }}
                                                        </p>
                                                    </td>
                                                    {{-- <td>
                                                        @if ($category->is_active == 'active')
                                                            <span class="badge bg-green-lt">active</span>
                                                        @else
                                                            <span class="badge bg-red-lt">inactive</span>
                                                        @endif
                                                    </td> --}}
                                                    <td class="d-flex align-items-center fs-2 gap-2" style="height: 86px">

                                                            <a class="text-decoration-none"
                                                                href="{{ route('admin.categories.edit', $category->id) }}"><i
                                                                    class="bi bi-pencil-square"></i></i></a>

                                                            <form
                                                                action="{{ route('admin.categories.destroy', $category->id) }}"
                                                                method="POST" class="delete-role-form">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button class="btn-link text-decoration-none"
                                                                    type="submit"><i
                                                                        class="bi bi-trash3 text-danger"></i></i></button>

                                                            </form>

                                                    </td>
                                                </tr>
                                                @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>
@endsection
