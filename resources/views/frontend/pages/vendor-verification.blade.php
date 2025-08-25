@extends('frontend.layouts.master')
@section('title', 'Vendor Verification')
@section('content')
    <div class="container" style="padding-top: 12svh">
        <div class="row">
            <div class="col-md-6 pt-md-5">
                <h2 class="py-md-3">Instructions</h2>
                <ul class="px-md-3">
                    <li>Each document uploaded must be in PNG format only.</li>
                    <li>ID documents should be a single collage/image combining the front page and back page.</li>
                    <li>Possible ID documents include:</li>
                    <ul>
                        <li>National Identity Card (NID)</li>
                        <li>Citizenship Certificate</li>
                        <li>Passport</li>
                        <li>Driving License</li>
                    </ul>
                    <li>Ensure all images are clear and legible without any blur or shadow.</li>
                    <li>For PAN (Permanent Account Number/स्थायी लेखा नम्बर), ensure the document clearly show the Nepali text.</li>
                    <li>IRC stands for Industry Registration Certificate (उद्योग दर्ता प्रमाण पत्र), which verifies your business registration.</li>
                    <li>All profile picture should be recent (issued within the last 6 months).</li>
                    <li>Do not upload scanned copies (photocoy/xerox); use original digital copies or high-quality photos.</li>
                    <li>Each file size should not exceed 2 MB for faster verification.</li>
                    <li>Make sure no part of the document is cropped or cut off in the image.</li>
                    <li>Personal information such as names and dates must be readable and consistent across all submitted
                        documents.</li>
                </ul>

            </div>
            <div class="col-md-6 border rounded p-md-5">
                <div class="rounded-0 m-3 shadow-none bg-transparent">
                    <div class="text-center mb-4">
                        <img width="100" src="{{ asset('assets/frontend/home/img/logo2.png') }}" alt="">
                        <p class="mb-0">{{ __('Vendor Verification Form') }}</p>
                    </div>
                    <div class="form-body">
                        <form class="row g-3" method="POST" action="{{ route('vendor-verification.store') }}" enctype="multipart/form-data">
                            @csrf

                            {{-- name field --}}
                            <div class="col-12">
                                <label for="inputEmailAddress" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="inputEmailAddress"
                                    value="{{ Auth::user()->name }}" disabled>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            {{-- email field --}}
                            <div class="col-12">
                                <label for="inputEmailAddress" class="form-label">Email</label>
                                <input type="email" placeholder="Email" name="email" class="form-control"
                                    id="inputEmailAddress" value="{{ Auth::user()->email }}" disabled>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            {{-- id verification field --}}
                            <div class="col-12">
                                <label class="form-label">{{ __('ID Verification') }}<span
                                        class="text-danger">*</span></label>
                                <input type="file" name="id_verification" class="form-control" required>
                                <x-input-error :messages="$errors->get('id_verification')" class="mt-2" />
                            </div>

                            {{-- pan verification field --}}
                            <div class="col-12">
                                <label class="form-label">{{ __('PAN Verification') }}<span
                                        class="text-danger">*</span></label>
                                <input type="file" name="pan_verification" class="form-control" required>
                                <x-input-error :messages="$errors->get('pan_verification')" class="mt-2" />
                            </div>

                            {{-- irc verification field --}}
                            <div class="col-12">
                                <label class="form-label">{{ __('IRC Verification') }}<span
                                        class="text-danger">*</span></label>
                                <input type="file" name="irc_verification" class="form-control" required>
                                <x-input-error :messages="$errors->get('irc_verification')" class="mt-2" />
                            </div>

                            {{-- service category --}}
                            <div class="col-12">
                                <label class="form-label">{{ __('Service Category') }}<span
                                        class="text-danger">*</span></label>
                                <select name="service_category_id" id="service_category_id" class="form-select" required>
                                    <option value="" disabled selected>Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('service_category_id')" class="mt-2" />
                            </div>



                            {{-- submit button --}}
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">{{ __('Request') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
@endsection
