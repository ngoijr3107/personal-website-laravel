@extends('admin.layout.app')

@section('page-content')
    <div class="app-title">
        <div>
            <h1>Stat - Edit</h1>
            <p>Stat Functionality Here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('stats.index') }}">Stats</a></li>
            <li class="breadcrumb-item">Edit</li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="tile">
                @include('admin.includes.alert')
                <h3 class="tile-title">Add Stat</h3>
                <form action="{{ route('stats.update') }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="stat_title">Stats Title <span class="text-danger">*</span></label>
                            <input id="stat_title" class="form-control" type="text" placeholder="Enter stat title" name="stat_title" value="{{ $stat->stat_title }}">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="stat_icon">Stat Icon  <span class="text-danger">*</span></label>
                            <input id="stat_icon" class="form-control" type="text" placeholder="Enter stat icon" name="stat_icon" value="{{ $stat->stat_icon }}">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="stat_number">Stat Number  <span class="text-danger">*</span></label>
                            <input id="stat_number" class="form-control" type="number" placeholder="Enter stat number" name="stat_number" value="{{ $stat->stat_number }}">
                        </div>
                    </div>
                    <div class="tile-footer d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Stat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
