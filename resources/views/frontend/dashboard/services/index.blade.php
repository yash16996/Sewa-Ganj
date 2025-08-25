@extends('frontend.dashboard.layouts.master')
@section('title', 'Vendor Services')
@section('content')
    {{-- <div class="table-responsive bg-white">
        <table class="table">
            <thead>
                <tr>
                    <th>Service Details</th>
                    <th>Description</th>
                    <th>Service Charge</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>
                            <div class="cart-item">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="cart-item__thumb">
                                        <a href="product-details.html" class="link">
                                            <img src="assets/images/thumbs/product-img2.png" alt="" class="cover-img">
                                        </a>
                                    </div>
                                    <div class="cart-item__content">
                                        <h6 class="cart-item__title">
                                            {{ $service->name }}
                                        </h6>

                                        <span class="text-body font-14">{{ $service->category->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ $service->description }}
                        </td>
                        <td>
                            <span class="cart-item__totalPrice text-body font-18 fw-400 mb-0">NRs.
                                {{ $service->service_charge }}</span>
                        </td>
                        <td class="text-center" style="width: 200px">
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <a href="cart-personal.html" class="btn btn-primary btn-sm">
                                    Edit
                                </a>

                                <form action="" method="post">
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
     --}}


    <div class="page-wrapper pt-2">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="">{{ __('Services List') }}</h3>

                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Title</th>
                                                    <th>Description</th>
                                                    <th>Service Charge</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($services as $service)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex gap-3 py-1 align-items-center">
                                                                <img src="{{ asset($service->avatar) }}" alt=""
                                                                    width="50px" class="rounded">
                                                                <div class="">

                                                                    <div class="font-weight-medium">{{ $service->name }}
                                                                    </div>
                                                                    <span
                                                                        class="text-secondary">{{ $service->category->name }}</span>
                                                                </div>
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <div class="text-secondary text-truncate"
                                                                style="max-width: 300px;">
                                                                {{ $service->description }}
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <span>NRs. {{ $service->service_charge }}</span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                @if ($service->status == 'active') class="badge rounded-pill bg-primary" @else
                                                                class="badge rounded-pill bg-danger" @endif>{{ $service->status }}</span>
                                                        </td>
                                                        <td>
                                                            <div
                                                                class="d-flex justify-content-center align-items-center gap-2">
                                                                <a href="{{ route('vendor-services.edit', $service->id) }}"
                                                                    class="">
                                                                    <i class="ti ti-edit"></i>
                                                                </a>

                                                                <form
                                                                    action="{{ route('vendor-services.destroy', $service->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="text-danger" type="submit"><i
                                                                            class="ti ti-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('vendor-services.create', $vendor) }}"
                                    class="btn btn-primary radius-20">Add
                                    New</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
