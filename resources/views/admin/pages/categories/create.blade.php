@extends('admin.layout.app')

@section('page-content')
    <div class="app-title">
        <div>
            <h1>Category - Create</h1>
            <p>Category Functionality Here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
            <li class="breadcrumb-item">Create</li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="tile">
                @include('admin.includes.alert')
                <h3 class="tile-title">Add Category</h3>
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="tile-body">
                            <div class="form-group">
                                <label class="control-label" for="category_name">Name  <span class="text-danger">*</span></label>
                                <input id="category_name" class="form-control" type="text" placeholder="Enter category name" name="category_name" value="{{ old('category_name') }}">
                            </div>
                    </div>
                    <div class="tile-footer d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Create Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
