@extends('admin.layout.app')

@section('page-content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-envelope-o"></i> Mailbox</h1>
            <p>A Mailbox Functionality Here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.page') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('messages.index') }}">Mailbox</a></li>
            <li class="breadcrumb-item">Show -
                @if($message->created_at->diffInDays() < 1)
                    {{ $message->created_at->diffForHumans() }}
                @else
                    {{ $message->created_at->format('d-M-Y h:i a') }}
                @endif</li>
        </ul>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h5 class="title"><u>From:</u> {{ $message->guest_name }}</h5>
                    <div class="btn-group">
                        <a class="btn btn-primary" href="{{ route('messages.index') }}"><i class="far fa-lg fa-mailbox mr-2"></i></a>
                        <a class="btn btn-primary" href="{{ route('messages.index') }}"><i class="far fa-lg fa-reply mr-2"></i></a>
                    </div>
                </div>
                <div class="tile-body">
                    <h5 class="mb-3"><u>Email:</u> {{ $message->guest_email }}</h5>
                    <h5 class="mb-3"><u>Subject:</u> {{ $message->guest_subject }}</h5>
                    <p class="lead font-weight-bold"><u>Message:</u> {{ $message->guest_message }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
