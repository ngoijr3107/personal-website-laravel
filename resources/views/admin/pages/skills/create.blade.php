@extends('admin.layout.app')

@section('page-content')
    <div class="app-title">
        <div>
            <h1>Skill - Create</h1>
            <p>Skill Functionality Here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('skills.index') }}">Skills</a></li>
            <li class="breadcrumb-item">Create</li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="tile">
                @include('admin.includes.alert')
                <h3 class="tile-title">Add Skill</h3>
                <form action="{{ route('skills.store') }}" method="POST">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="skill_name">Skill Name <span class="text-danger">*</span></label>
                            <input id="skill_name" class="form-control" type="text" placeholder="Enter skill name" name="skill_name" value="{{ old('skill_name') }}">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="skill_icon">Skill Icon  <span class="text-danger">*</span></label>
                            <input id="skill_icon" class="form-control" type="text" placeholder="Enter skill icon" name="skill_icon" value="{{ old('skill_icon') }}">
                        </div>
                    </div>
                    <div class="tile-footer d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Create Skill</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
