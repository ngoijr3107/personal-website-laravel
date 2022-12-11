@extends('admin.layout.app')

@section('page-content')
    <div class="app-title">
        <div>
            <h1>Project - Create</h1>
            <p>Project Functionality Here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Projects</a></li>
            <li class="breadcrumb-item">Create</li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="tile">
                @include('admin.includes.alert')
                <h3 class="tile-title">Add Project</h3>
                <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="project_name">Project Title <span class="text-danger">*</span></label>
                                    <input id="project_name" class="form-control" type="text" placeholder="Enter project title" name="project_name" value="{{ old('project_name') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="category_id">Category Name <span class="text-danger">*</span></label>
                                    <select class="form-control" id="category_id" name="category_id" required>
                                        <option disabled selected class="text-muted">Select category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="project_description" class="control-label">Project Description <span class="text-danger">*</span></label>
                                    <textarea name="project_description" id="project_description" rows="5" class="form-control" placeholder="Enter project description">{{ old('project_description') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="code_link">Code Link</label>
                                    <input id="code_link" class="form-control" type="text" placeholder="Enter code link" name="code_link" value="{{ old('code_link') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="live_link">Live Link</label>
                                    <input id="live_link" class="form-control" type="text" placeholder="Enter live link" name="live_link" value="{{ old('live_link') }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="project_image">Project Image <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="project_image" id="project_image">
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Create Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
