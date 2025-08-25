@extends('admin.layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Services List') }}</h3>
                                <div class="card-actions">
                                    <a href="{{ route('admin.services.vendor-list') }}" class="btn btn-primary">
                                        <i class="bi bi-arrow-left"></i> {{ __('Back to Vendor list') }}
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Category</th>
                                                    <th>Service Charge</th>
                                                    {{-- <th>Status</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($services as $service)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex py-1 align-items-center">
                                                                <span class="avatar me-2"
                                                                    style="background-image: url({{ asset($service->avatar) }})"></span>
                                                                <div class="flex-fill">
                                                                    <div class="font-weight-medium">{{ $service->name }}
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="text-secondary">{{ $service->description }}</div>
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-blue-lt">
                                                                {{ $service->category->name }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span>NRs. {{ $service->service_charge }}</span>
                                                        </td>
                                                        {{-- <td>
                                                            <span class="badge bg-green-lt">{{ $service->status }}</span>
                                                        </td> --}}
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
