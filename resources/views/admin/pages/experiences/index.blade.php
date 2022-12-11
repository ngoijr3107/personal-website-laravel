@extends('admin.layout.app')

@section('page-content')
    <div class="app-title">
        <div>
            <h1>Experiences</h1>
            <p>All Experience Details Here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item">Experiences</li>
        </ul>
    </div>

    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h5 style="font-weight: normal;">All Experience</h5>
            <a href="{{ route('experiences.create') }}" class="btn btn-sm btn-primary">Add Experience</a>
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
                                <th>Experience ID</th>
                                <th>Title</th>
                                <th>Starting Date</th>
                                <th>Ending Date</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($experiences as $key => $experience)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $experience->experience_title }}</td>
                                    <td>{{ date('F Y', strtotime($experience->starting_date)) }}</td>
                                    <td>
                                        @if($experience->ending_date)
                                            {{ date('F Y', strtotime($experience->ending_date)) }}
                                        @else
                                            {{ 'Running' }}
                                        @endif
                                    </td>
                                    <td>{{ $experience->experience_description }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a class="btn btn-outline-info btn-sm mr-2" href="{{ route('experiences.edit', $experience->id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form action="{{ route('experiences.destroy', $experience->id) }}" method="POST">
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
