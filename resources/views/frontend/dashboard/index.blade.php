@extends('frontend.dashboard.layouts.master')

@section('content')
    @php
        // dd(Auth::guard('web')->user()->vendorVerifications)
        $latestVerification = Auth::guard('web')->user()->vendorVerifications->first();
        $status = $latestVerification ? $latestVerification->status : null;
    @endphp

    @if ($status === 'pending')
        <div class="alert alert-warning">
            <strong><i class="bi bi-exclamation-triangle-fill"></i> {{ __('Alert!') }}</strong>
            {{ __('Your Vendor Verification request is pending. You will be notified once it is approved or rejected.') }}
        </div>
    @endif



    <div class="dashboard-body__content">
        <!-- welcome balance Content Start -->
        <div class="welcome-balance mt-2 mb-40 flx-between gap-2">
            <div class="welcome-balance__left">
                <h4 class="welcome-balance__title mb-0">Welcome back! {{ Auth::user()->name }}</h4>
                <i class="bi bi-exclamation-triangle-fill"></i>
            </div>
            <div class="welcome-balance__right flx-align gap-2">
                <span class="welcome-balance__text fw-500 text-heading"></span>
                <h4 class="welcome-balance__balance mb-0"></h4>
            </div>
        </div>

        <div class="dashboard-body__item-wrapper">
            {{-- Your other content --}}
        </div>
    </div>
@endsection
