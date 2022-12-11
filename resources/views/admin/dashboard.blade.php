@extends('admin.layout.app')

@section('page-content')
    <div class="app-title">
        <div>
            <h1>Dashboard</h1>
            <p>All Website Details Here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item">Dashboard</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon far fa-users fa-3x"></i>
                <div class="info">
                    <h4>Visitors</h4>
                    <p><b>Total: 5</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon far fa-mailbox fa-3x"></i>
                <div class="info">
                    <h4>Messages</h4>
                    <p><b>New: {{ \App\Models\Message::where('read', 0)->count() }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon far fa-file-code fa-3x"></i>
                <div class="info">
                    <h4>Projects</h4>
                    <p><b>Total: {{ $project_count }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon far fa-briefcase fa-3x"></i>
                <div class="info">
                    <h4>Services</h4>
                    <p><b>Total: {{ $service_count }}</b></p>
                </div>
            </div>
        </div>
    </div>
@endsection
