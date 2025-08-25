@extends('admin.layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Vendor Verification Settings') }}</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.vendor-verification-settings.update') }}" method="POST"
                                    id="vendorVerificationSettingForm">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        {{-- ID verification --}}
                                        <div class="col-md-4">
                                            <label class="form-check form-switch">
                                                <!-- Hidden input forces "0" if checkbox is unchecked -->
                                                <input type="hidden" name="id_verification" value="0">
                                                <input class="form-check-input" type="checkbox" name="id_verification"
                                                    value="1" @checked($vendorVerificationSetting->id_verification == 1)>
                                                <span class="form-check-label">ID</span>
                                            </label>
                                            <x-input-error :messages="$errors->get('id_verification')" class="mt-2" />
                                        </div>
                                        {{-- Pan Verification --}}
                                        <div class="col-md-4">
                                            <label class="form-check form-switch">
                                                <!-- Hidden input forces "0" if checkbox is unchecked -->
                                                <input type="hidden" name="pan_verification" value="0">
                                                <input class="form-check-input" type="checkbox" name="pan_verification"
                                                    value='1' @checked($vendorVerificationSetting->pan_verification == 1)>
                                                <span class="form-check-label">PAN</span>
                                            </label>
                                            <x-input-error :messages="$errors->get('pan_verification')" class="mt-2" />
                                        </div>
                                        {{-- IRC Verification --}}
                                        <div class="col-md-4">
                                            <label class="form-check form-switch">
                                                <!-- Hidden input forces "0" if checkbox is unchecked -->
                                                <input type="hidden" name="irc_verification" value="0">
                                                <input class="form-check-input" type="checkbox" name="irc_verification"
                                                    value="1" @checked($vendorVerificationSetting->irc_verification == 1)>
                                                <span class="form-check-label">IRC</span>
                                            </label>
                                            <x-input-error :messages="$errors->get('irc_verification')" class="mt-2" />
                                        </div>

                                    </div>
                                    <hr>
                                    {{-- Instructions Textarea --}}
                                    <div class="col-mb-12">
                                        <label class="form-label">{{ __('Instructions') }}</label>
                                        <textarea class="form-control" name="instructions" rows="6" placeholder="Enter Instructions">{{ $vendorVerificationSetting->instructions }}</textarea>
                                        <x-input-error :messages="$errors->get('instructions')" class="mt-2" />
                                    </div>

                                    <div class="row">
                                        {{-- Auto Approve --}}
                                        <div class="col-md-6 mt-3">
                                            <div class="form-label">{{ __('Auto Approve') }}</div>
                                            <select class="form-select" name="auto_approve">
                                                <option value="1" @selected($vendorVerificationSetting->auto_approve == 1)>Enabled</option>
                                                <option value="0" @selected($vendorVerificationSetting->auto_approve == 0)>Disabled</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('auto_approve')" class="mt-2" />
                                        </div>

                                        {{-- Status field --}}
                                        <div class="col-md-6 mt-3">
                                            <div class="form-label">{{ __('Status') }}</div>
                                            <select class="form-select" name="status">
                                                <option value="1" @selected($vendorVerificationSetting->status == 1)>Active</option>
                                                <option value="0" @selected($vendorVerificationSetting->status == 0)>Inactive</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="card-footer">
                                <div class="card-actions text-end">
                                    {{-- submit button --}}
                                    <button class="btn btn-primary" onclick="$('#vendorVerificationSettingForm').submit()"
                                        type="submit">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>
@endsection
