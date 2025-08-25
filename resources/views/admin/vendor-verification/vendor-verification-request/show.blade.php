@extends('admin.layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Request Details') }}</h3>
                                <div class="card-actions">
                                    <a href="{{ route('admin.vendor-verification-requests.index') }}"
                                        class="btn btn-primary flex gap-2">
                                        <i class="bi bi-arrow-left"></i>
                                        {{ __('Back to all Requests') }}
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <tbody>
                                            <tr>
                                                <th>{{ __('Name') }}</th>
                                                <td>{{ $vendorVerificationRequest->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Email') }}</th>
                                                <td>{{ $vendorVerificationRequest->user->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Address') }}</th>
                                                <td>{{ $vendorVerificationRequest->user->address }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('ID Verification') }}</th>
                                                <td><a
                                                        href="{{ route('admin.download-file', $vendorVerificationRequest->id_verification) }}">{{ __('ID Attachment') }}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('PAN Verification') }}</th>
                                                <td><a
                                                        href="{{ route('admin.download-file', $vendorVerificationRequest->pan_verification) }}">{{ __('PAN Attachment') }}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('IRC Verification') }}</th>
                                                <td><a
                                                        href="{{ route('admin.download-file', $vendorVerificationRequest->irc_verification) }}">{{ __('IRC Attachment') }}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Service Category') }}</th>
                                                <td>
                                                    <span class="badge bg-blue-lt">{{ $vendorVerificationRequest->service_category_id }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Status') }}</th>
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
                                            </tr>
                                            <tr>
                                                <th>{{ __('Action') }}</th>
                                                <td>
                                                    <form id="vendorVerificationStatusForm"
                                                        action="{{ route('admin.vendor-verification-requests.update-status', $vendorVerificationRequest) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        @php
                                                            $statuses = ['pending', 'approved', 'rejected'];
                                                        @endphp
                                                        <select class="form-select" name="status">
                                                            @foreach ($statuses as $status)
                                                                <option @selected($vendorVerificationRequest->status == $status)
                                                                    value="{{ $status }}">
                                                                    {{ __($status) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                                        </td>

                                                        <input type="number" hidden name="service_category_id" value="{{ $vendorVerificationRequest->service_category_id }}">
                                                    </form>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" onclick="$('#vendorVerificationStatusForm').submit()"
                                    type="submit">{{ __('Update') }}</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>
    <script>
        console.log('helo')
        $(document).ready(function() {
            console.log('jQuery is working!');
            // Or show an alert:
            // alert('jQuery is working!');
        });
    </script>
@endsection
