@extends('admin.layout.app')

@section('page-content')
    <div class="app-title">
        <div>
            <h1>Service - Edit</h1>
            <p>Service Functionality Here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Services</a></li>
            <li class="breadcrumb-item">Edit</li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="tile">
                @include('admin.includes.alert')
                <h3 class="tile-title">Edit Service</h3>
                <form action="{{ route('services.update', $service->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="service_title">Service Title <span class="text-danger">*</span></label>
                            <input id="service_title" class="form-control" type="text" placeholder="Enter service title" name="service_title" value="{{ $service->service_name }}">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="service_icon">Service Icon <span class="text-danger">*</span></label>
                            <input id="service_icon" class="form-control" type="text" placeholder="Enter service icon" name="service_icon" value="{{ $service->service_icon }}">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="service_description">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="service_description" id="service_description" rows="6" placeholder="Enter service description">{{ $service->service_description }}</textarea>
                        </div>
                    </div>
                    <div class="tile-footer d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
