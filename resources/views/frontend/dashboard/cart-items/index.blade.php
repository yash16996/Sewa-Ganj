@extends('frontend.dashboard.layouts.master')
@section('title', 'Cart Items')
@section('content')
{{-- @dd($cartItems) --}}
    <div class="page-wrapper pt-2">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="">{{ __('Cart Items') }}</h3>

                            </div>
                            <div class="card-body">
                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter card-table" class="text-center">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Title</th>
                                                    <th>Description</th>
                                                    <th>Service Charge</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cartItems as $cartItem)

                                                    @php
                                                        $service = \App\Models\Service::where('id', $cartItem->service_id)->first();
                                                    @endphp
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
                                                            <div
                                                                class="d-flex justify-content-center align-items-center gap-2">
                                                                <a href="{{ route('payment.index', $cartItem->id) }}"
                                                                    class="btn btn-primary rounded">
                                                                    Payment
                                                                </a>

                                                                <form
                                                                    action="{{ route('cart-items.destroy', $cartItem->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger" type="submit"><i
                                                                            class="ti ti-trash"></i> Remove
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
