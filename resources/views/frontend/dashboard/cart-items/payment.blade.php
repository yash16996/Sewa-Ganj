@extends('frontend.dashboard.layouts.master')
@section('title', 'Cart Items')
@section('content')

    <div class="dashboard-body__content">

        @php
            $service = App\Models\Service::where('id', $cartItem->service_id)->first();

        @endphp
        <div class="profile">
            <div class="row gy-4">
                <div class="col-xxl-3 col-xl-4">
                    <div class="profile-info bg-primary text-white">
                        <div class="profile-info__inner mb-40 text-center">

                            <div class="avatar-upload mb-24">

                                <div >
                                    <img src="{{ asset($service->avatar) }}" alt="service image" class="rounded mb-2" width="150px">
                                </div>
                            </div>

                            <h5 class="profile-info__name mb-1 text-white">{{ $service->category->name }}</h5>
                        </div>

                        <ul class="profile-info-list">

                            <li class="profile-info-list__item">
                                <span class="profile-info-list__content flx-align flex-nowrap gap-2">

                                    <span class="text text-heading fw-500">Name</span>
                                </span>
                                <span class="profile-info-list__info">{{ $service->name }}</span>
                            </li>
                            <li class="profile-info-list__item">
                                <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                    <span class="text text-heading fw-500">Description </span>
                                </span>
                                <span class="profile-info-list__info">{{ $service->description }}</span>
                            </li>
                            <li class="profile-info-list__item">
                                <span class="profile-info-list__content flx-align flex-nowrap gap-2">
                                    <span class="text text-heading fw-500">Service Charge</span>
                                </span>
                                <span class="profile-info-list__info">NRs. {{ $service->service_charge }}</span>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="col-xxl-9 col-xl-8">
                    <div class="dashboard-card">
                        <div class="dashboard-card__header pb-0">
                            <ul class="nav tab-bordered nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link font-18 font-heading active" id="pills-personalInfo-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-personalInfo" type="button"
                                        role="tab" aria-controls="pills-personalInfo" aria-selected="true">Payment Details</button>
                                </li>

                            </ul>
                        </div>

                        <div class="profile-info-content">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-personalInfo" role="tabpanel"
                                    aria-labelledby="pills-personalInfo-tab" tabindex="0">

                                    {{-- Start from here --}}
                                    

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Profile Content End -->

    </div>
@endsection
