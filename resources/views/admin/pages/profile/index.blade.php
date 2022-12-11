@extends('admin.layout.app')

@section('page-content')
    <div class="app-title mb-0">
        <div>
            <h1>Profile</h1>
            <p>All Profile Details Here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item">Profile</li>
        </ul>
    </div>
    <div class="row user">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#user-details" data-toggle="tab">About Me</a></li>
                    <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Change Password</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            @include('admin.includes.alert')
            <div class="tab-content">
                <div class="tab-pane active" id="user-details">
                    <div class="tile user-settings">
                        <h4 class="line-head">About Me</h4>
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="full_name">Full Name <span class="text-danger">*</span></label>
                                        <input id="full_name" type="text" name="full_name" class="form-control" placeholder="Enter full name" value="{{ $profile->full_name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="designation">Designation <span class="text-danger">*</span></label>
                                        <input id="designation" type="text" name="designation" class="form-control" placeholder="Enter designation" value="{{ $profile->designation }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input id="email" type="email" name="email" class="form-control" placeholder="Enter email" value="{{ $profile->email }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone <span class="text-danger">*</span></label>
                                        <input id="phone" type="text" name="phone" class="form-control" placeholder="Enter phone number" value="{{ $profile->phone }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location">Location <span class="text-danger">*</span></label>
                                        <input id="location" type="text" name="location" class="form-control" placeholder="Enter location" value="{{ $profile->location }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cv_link">CV Link <span class="text-danger">*</span></label>
                                        <input id="cv_link" type="text" name="cv_link" class="form-control" placeholder="Enter cv link" value="{{ $profile->cv_link }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="profile_image">Profile Image</label>
                                        <input id="profile_image" type="file" name="profile_image" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hire_link">Hire Link</label>
                                        <input id="hire_link" type="text" name="hire_link" class="form-control" placeholder="Enter hire link" value="{{ $profile->hire_link }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="facebook_link">Facebook Link</label>
                                        <input id="facebook_link" type="text" name="facebook_link" class="form-control" placeholder="Enter facebook link" value="{{ $profile->facebook_link }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="github_link">Github Link</label>
                                        <input id="github_link" type="text" name="github_link" class="form-control" placeholder="Enter github link" value="{{ $profile->github_link }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="linkedin_link">Linkedin Link</label>
                                        <input id="linkedin_link" type="text" name="linkedin_link" class="form-control" placeholder="Enter linkedin link" value="{{ $profile->linkedin_link }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="twitter_link">Twitter Link</label>
                                        <input id="twitter_link" type="text" name="twitter_link" class="form-control" placeholder="Enter twitter link" value="{{ $profile->twitter_link }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="profile_image">Profile Description <span class="text-danger">*</span></label>
                                        <textarea name="profile_description" id="profile_description" rows="5" class="form-control">{{ $profile->profile_description }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="user-settings">
                    <div class="tile user-settings">
                        <h4 class="line-head">Change Password</h4>
                        <form action="{{ route('user-password.update') }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="current_password">Current Password <span class="text-danger">*</span></label>
                                <input id="current_password" type="password" name="current_password" class="form-control" placeholder="Enter current password">
                            </div>
                            <div class="form-group">
                                <label for="password">New Password <span class="text-danger">*</span></label>
                                <input id="password" type="password" name="password" class="form-control" placeholder="Enter new password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password <span class="text-danger">*</span></label>
                                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
