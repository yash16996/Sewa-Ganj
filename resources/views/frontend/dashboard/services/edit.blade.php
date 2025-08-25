
@extends('frontend.dashboard.layouts.master')
@section('content')
    <div class="wsus__dashboard dashboard-body__content">
        <div class="wsus__dash_form">
            <h5>Update Your Service</h5>
            <p class="text-black mb-1">Avatar</p>
            <img src="{{ asset($service->avatar) }}" alt="avatar" class="rounded mb-3" width="100px">

            <form action="{{ route('vendor-services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="row">

                    {{-- name field --}}
                    <div class="col-xl-6">
                        <div class="form_box">
                            <label for="name">Name</label>
                            <input type="text" placeholder="Name" name="name" required value="{{ $service->name }}">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                    </div>

                    {{-- avatar field --}}
                    <div class="col-xl-6">
                        <div class="form_box">
                            <label for="avatar">Avatar</label>
                            <input type="file" name="avatar" >
                            <x-input-error :messages="$errors->get('avatar')" class="mt-2" />
                        </div>
                    </div>

                    {{-- description textarea --}}
                    <div class="col-xl-12">
                        <div class="form_box">
                            <label for="description">Description</label>
                            <textarea rows="5" placeholder="Tell about your service" name="description">{{ $service->description }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                    </div>

                    {{-- service charge field --}}
                    <div class="col-xl-6">
                        <div class="form_box">
                            <label for="Service Charge">Service Charge</label>
                            <input type="number" step="any" placeholder="Service Charge" name="service_charge" required value="{{ $service->service_charge }}">
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
                                    <option @selected($service->status == 'active') value="active">Active</option>
                                    <option @selected($service->status == 'inactive') value="inactive">Inactive</option>
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
                                <option>{{ $service->category->name }}</option>
                            </select>
                            </div>
                    </div>

                    {{-- hidden fields --}}
                    <input type="number" name="vendor_id" value="{{ $service->vendor_id }}" hidden>
                    <input type="number" name="category_id" value="{{ $service->category_id }}" hidden>
                </div>
                <button type="submit" class="btn btn-main mt-2">Update Service</button>
            </form>
        </div>
    </div>
@endsection
