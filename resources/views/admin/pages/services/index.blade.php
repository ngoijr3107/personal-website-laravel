@extends('admin.layout.app')

@section('page-content')
    <div class="app-title">
        <div>
            <h1>Services</h1>
            <p>All Service Details Here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item">Services</li>
        </ul>
    </div>

    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h5 style="font-weight: normal;">All Services</h5>
            <a href="{{ route('services.create') }}" class="btn btn-sm btn-primary">Add Service</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="datatable">
                            <thead>
                                <tr>
                                    <th>Service ID</th>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $key => $service)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><i class="{{ $service->service_icon }} fa-3x text-primary"></i></td>
                                        <td>{{ $service->service_name }}</td>
                                        <td>{{ $service->service_description }}</td>
                                        <td>{{ $service->created_at->format('d-M-Y h:i a') }}</td>
                                        <td class="d-flex justify-content-center">
                                            <a class="btn btn-outline-info btn-sm mr-2" href="{{ route('services.edit', $service->id) }}">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                                @csrf
                                                @method('delete')

                                                <button class="btn btn-outline-danger btn-sm" type="submit">
                                                    <i class="far fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
