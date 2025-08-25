@extends('frontend.dashboard.layouts.master')
@section('content')
{{-- 'avatar' => null,
                'name' => 'Pipe Leak Repair',
                'description' => 'Reliable plumbing pipe leak repairs by certified professionals.',
                'category_id' => 2, // fallback to first if second missing
                'service_charge' => 80.00,
                'status' => 'active',
                'vendor_id' => 3, --}}
    <div class="wsus__dashboard dashboard-body__content">
        <div class="wsus__dash_form">
            <h5>New Service</h5>
            <form action="{{ route('vendor-services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    {{-- name field --}}
                    <div class="col-xl-6">
                        <div class="form_box">
                            <label for="name">Name</label>
                            <input type="text" placeholder="Name" name="name" required>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                    </div>

                    {{-- avatar field --}}
                    <div class="col-xl-6">
                        <div class="form_box">
                            <label for="avatar">Avatar</label>
                            <input type="file" name="avatar">
                            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                        </div>
                    </div>

                    {{-- description textarea --}}
                    <div class="col-xl-12">
                        <div class="form_box">
                            <label for="description">Description</label>
                            <textarea rows="5" placeholder="Tell about your service" name="description"></textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                    </div>

                    {{-- service charge field --}}
                    <div class="col-xl-6">
                        <div class="form_box">
                            <label for="#">Service Charge</label>
                            <input type="number" placeholder="Service Charge" name="service_charge" required>
                            <x-input-error :messages="$errors->get('service_charge')" class="mt-2" />
                        </div>
                    </div>

                    {{-- status field --}}
                    <div class="col-xl-6">
                        <div class="form_box">
                            <label for="#">Status</label>
                            <div class="select-has-icon">
                                <select class="common-input border" name="status" required>
                                    <option>Select</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>
                        </div>
                    </div>

                    {{-- Service Category --}}
                    <div class="col-xl-6">
                        <div class="form_box">
                            <label>Service Category</label>
                            <select class="select_2 select2-hidden-accessible" disabled>
                                <option>{{ $vendor->serviceCategory->name }}</option>
                            </select>
                            </div>
                    </div>

                    {{-- hidden fields --}}
                    <input type="number" name="vendor_id" value="{{ $vendor->id }}" hidden>
                    <input type="number" name="category_id" value="{{ $vendor->service_category_id }}" hidden>
                </div>
                <button type="submit" class="btn btn-main mt-2">Create New Service</button>
            </form>
        </div>
    </div>
@endsection
