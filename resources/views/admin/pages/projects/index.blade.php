@extends('admin.layout.app')

@section('page-content')
    <div class="app-title">
        <div>
            <h1>Projects</h1>
            <p>All Project Details Here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item">Projects</li>
        </ul>
    </div>

    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h5 style="font-weight: normal;">All Projects</h5>
            <a href="{{ route('projects.create') }}" class="btn btn-sm btn-primary">Add Project</a>
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
                                <th>Project Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category Name</th>
                                <th>Code Link</th>
                                <th>Live Link</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $key => $project)
                                <tr>
                                    <td><img src="{{ asset('storage/project_images') . '/' . $project->project_image }}" alt="project image" width="50"></td>
                                    <td>{{ $project->project_name }}</td>
                                    <td>{{ Str::words($project->project_description, 4, '...') }}</td>
                                    <td>{{ $project->category->category_name }}</td>
                                    <td>{{ $project->code_link }}</td>
                                    <td>{{ $project->live_link }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a class="btn btn-outline-info btn-sm mr-2" href="{{ route('projects.edit', $project->id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
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
