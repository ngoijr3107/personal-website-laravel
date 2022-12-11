@extends('admin.layout.app')

@section('page-content')
    <div class="app-title">
        <div>
            <h1>Educations</h1>
            <p>All Education Details Here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item">Educations</li>
        </ul>
    </div>

    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h5 style="font-weight: normal;">All Education</h5>
            <a href="{{ route('educations.create') }}" class="btn btn-sm btn-primary">Add Education</a>
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
                                <th>Education ID</th>
                                <th>Title</th>
                                <th>Starting Date</th>
                                <th>Ending Date</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($educations as $key => $education)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $education->education_title }}</td>
                                    <td>{{ date('F Y', strtotime($education->starting_date)) }}</td>
                                    <td>
                                        @if($education->ending_date)
                                            {{ date('F Y', strtotime($education->ending_date)) }}
                                        @else
                                            {{ 'Running' }}
                                        @endif
                                    </td>
                                    <td>{{ $education->education_description }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a class="btn btn-outline-info btn-sm mr-2" href="{{ route('educations.edit', $education->id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form action="{{ route('educations.destroy', $education->id) }}" method="POST">
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
