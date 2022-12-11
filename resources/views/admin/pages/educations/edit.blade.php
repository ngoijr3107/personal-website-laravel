@extends('admin.layout.app')

@section('page-content')
    <div class="app-title">
        <div>
            <h1>Education - Edit</h1>
            <p>Education Functionality Here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('educations.index') }}">Educations</a></li>
            <li class="breadcrumb-item">Edit</li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="tile">
                @include('admin.includes.alert')
                <h3 class="tile-title">Edit Education</h3>
                <form action="{{ route('educations.update', $education->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="education_title">Education Title <span class="text-danger">*</span></label>
                            <input id="education_title" class="form-control" type="text" placeholder="Enter education title" name="education_title" value="{{ $education->education_title }}">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="starting_date">Starting Date  <span class="text-danger">*</span></label>
                            <input id="starting_date" class="form-control" type="date" placeholder="Enter skill icon" name="starting_date" value="{{ $education->starting_date }}">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="ending_date">Ending Date</label>
                            <input id="ending_date" class="form-control" type="date" placeholder="Enter ending date" name="ending_date" value="{{ $education->ending_date }}">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="education_description">Description  <span class="text-danger">*</span></label>
                            <textarea name="education_description" id="education_description"  rows="4" class="form-control">{{ $education->education_description }}</textarea>
                        </div>
                    </div>
                    <div class="tile-footer d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Education</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
