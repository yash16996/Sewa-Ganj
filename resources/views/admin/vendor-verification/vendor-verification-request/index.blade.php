@extends('admin.layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Vendor Verification Requests') }}</h3>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Email') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th class="w-1">{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($vendorVerificationRequests as $vendorVerificationRequest)
                                                <tr>
                                                    <td>{{ $vendorVerificationRequest->user->name }}</td>
                                                    <td class="text-secondary">
                                                        {{ $vendorVerificationRequest->user->email }}
                                                    </td>
                                                    <td>
                                                        <span
                                                            @switch($vendorVerificationRequest->status)
                                                                @case($vendorVerificationRequest->status == 'approved')
                                                                class="badge bg-green-lt"
                                                                @break
                                                                @case($vendorVerificationRequest->status == 'rejected')
                                                                class="badge bg-red-lt"
                                                                @break
                                                                @default
                                                                class="badge bg-yellow-lt"
                                                            @endswitch>{{ $vendorVerificationRequest->status }}</span>
                                                    </td>
                                                    <td class="d-flex gap-2">
                                                        <a
                                                            href="{{ route('admin.vendor-verification-requests.show', $vendorVerificationRequest->id) }}"><i
                                                                class="bi bi-eye"></i></a>

                                                        <form action="{{ route('admin.vendor-verification-requests.destroy', $vendorVerificationRequest->id) }}"
                                                            method="POST" class="delete-role-form">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button class="btn-link text-decoration-none" type="submit"><i
                                                                    class="bi bi-trash3 text-danger"></i></i></button>

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
