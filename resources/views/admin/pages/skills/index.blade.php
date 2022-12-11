@extends('admin.layout.app')

@section('page-content')
    <div class="app-title">
        <div>
            <h1>Skills</h1>
            <p>All Skill Details Here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item">Skills</li>
        </ul>
    </div>

    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h5 style="font-weight: normal;">All Skills</h5>
            <a href="{{ route('skills.create') }}" class="btn btn-sm btn-primary">Add Skill</a>
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
                                <th>Skill ID</th>
                                <th>SKill Icon</th>
                                <th>Skill Name</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($skills as $key => $skill)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><i class="{{ $skill->skill_icon }} fa-3x text-primary"></i></td>
                                    <td>{{ $skill->skill_name }}</td>
                                    <td>{{ $skill->created_at->format('d-M-Y h:i a') }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a class="btn btn-outline-info btn-sm mr-2" href="{{ route('skills.edit', $skill->id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form action="{{ route('skills.destroy', $skill->id) }}" method="POST">
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
