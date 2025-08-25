@extends('frontend.layouts.master')
@section('title', 'Services')
@section('content')

    <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" style="padding-top: 15svh;">

        <div class="row g-4 g-lg-5">
            <div class="col-lg-4 bg-primary rounded px-4 py-3 text-white">
                <div class="info-box aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset($category->avatar) }}" alt="" width="200px" class="rounded-circle mb-2">
                    <h3 class="text-white">{{ $category->name }}</h3>
                    <p class="">{{ $category->description }}</p>

                    <div class="info-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="content">
                            <h4>Our Location</h4>
                            <p>Main Road, Adarsh Nagar</p>
                            <p>Birgunj, Nepal</p>
                        </div>
                    </div>

                    <div class="info-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="content">
                            <h4>Phone Number</h4>
                            <p>+977 9829487519</p>
                            <p>+977 51-520456</p>
                        </div>
                    </div>

                    <div class="info-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="content">
                            <h4>Email Address</h4>
                            <p>info@sewagunj.com</p>
                            <p>support@sewagunj.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

                    <div class="row g-4">
                        @foreach ($services as $service)
                            <div class="col-lg-12 aos-init aos-animate rounded p-3" data-aos="fade-up" data-aos-delay="100"
                                style="background-color:rgb(254, 217, 175)">
                                <div class="service-card d-flex gap-3">
                                    <div class="icon flex-shrink-0">
                                        <img src="{{ $service->avatar }}" alt="" width="100px" class="rounded">
                                    </div>
                                    <div>
                                        <h3>{{ $service->name }}</h3>
                                        <p>{{ $service->description }}</p>
                                        <div>Vendor: <span>{{ $service->vendor->name }}</span>
                                        </div>
                                        <div class=" mt-2">
                                            <p>Charge: NRs. <span
                                                    class="bg-success badge badge-success">{{ $service->service_charge }}</span>
                                            </p>
                                        </div>
                                        @php
                                            $inCart = $cartItems->where('service_id', $service->id)->where('user_id', Auth::id())->first();
                                        @endphp

                                        @if ($inCart)
                                            <form action="{{ route('cart-items.destroy', $inCart->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="read-more border-0 bg-danger px-2 py-1 rounded text-white">
                                                    <i class="bi bi-cart-x"></i>
                                                    <span>{{ __('Remove from cart') }} <i class="bi bi-arrow-right"></i></span>
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('cart-items.store', [$service->id, Auth::id()]) }}" class="read-more bg-primary px-3 py-2 rounded text-white">
                                                <i class="bi bi-cart"></i>
                                                <span>{{ __('Add to cart') }} <i class="bi bi-arrow-right"></i></span>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div><!-- End Service Card -->
                        @endforeach


                    </div>

                </div>
            </div>

        </div>

    </div>
    <hr>

@endSection
