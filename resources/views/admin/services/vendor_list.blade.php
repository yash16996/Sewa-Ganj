@extends('admin.layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Vendor List') }}</h3>
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Service Category</th>
                                                    <th>Rating</th>
                                                    <th class="w-1">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($vendors as $vendor)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex py-1 align-items-center">
                                                                <span class="avatar me-2"
                                                                    style="background-image: url({{ asset($vendor->avatar) }})"></span>
                                                                <div class="flex-fill">
                                                                    <div class="font-weight-medium">{{ $vendor->name }}
                                                                    </div>
                                                                    <div class="text-secondary"><a href="#"
                                                                            class="text-reset">{{ $vendor->email }}</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="text-secondary">{{ $vendor->address }}</div>
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-blue-lt">
                                                                {{ $vendor->serviceCategory->name }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span>{{ $vendor->vendor_rating }} <i class="bi bi-star-fill"></i></span>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm" href="{{ route('admin.vendor.services', $vendor->id) }}">Services</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
