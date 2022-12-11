@extends('admin.layout.app')

@section('page-content')
    <div class="app-title">
        <div>
            <h1>Stats</h1>
            <p>All Stat Details Here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item">Stats</li>
        </ul>
    </div>

    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-between align-items-center">
            <h5 style="font-weight: normal;">All Stats</h5>
            <a href="{{ route('stats.create') }}" class="btn btn-sm btn-primary">Add Stat</a>
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
                                <th>Stat ID</th>
                                <th>Stat Icon</th>
                                <th>Stat Title</th>
                                <th>Stat Number</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stats as $key => $stat)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><i class="{{ $stat->stat_icon }} fa-3x text-primary"></i></td>
                                    <td>{{ $stat->stat_title }}</td>
                                    <td>{{ $stat->stat_number }}</td>
                                    <td>{{ $stat->created_at->format('d-M-Y h:i a') }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a class="btn btn-outline-info btn-sm mr-2" href="{{ route('stats.edit', $stat->id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form action="{{ route('stats.destroy', $stat->id) }}" method="POST">
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
