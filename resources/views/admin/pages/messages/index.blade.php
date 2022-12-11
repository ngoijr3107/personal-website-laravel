@extends('admin.layout.app')

@section('page-content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-envelope-o"></i> Mailbox</h1>
            <p>A Mailbox Details Here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.page') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item">Mailbox</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="datatable">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Received at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr class="{{ $message->read === 0 ? 'bg-light' : ''}}">
                                    <td>{{ $message->guest_name }}</td>
                                    <td>{{ $message->guest_email }}</td>
                                    <td>{{ Str::words($message->guest_subject, 5, '...') }}</td>
                                    <td>{{ Str::words($message->guest_message, 10, '...') }}</td>
                                    <td>
                                        @if($message->created_at->diffInDays() < 1)
                                            {{ $message->created_at->diffForHumans() }}
                                        @else
                                            {{ $message->created_at->format('d-M-Y h:i a') }}
                                        @endif
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <a class="btn btn-outline-info btn-sm mr-2" href="{{ route('messages.show', $message->id) }}">
                                            <i class="far fa-external-link"></i>
                                        </a>
                                        @if($message->read === 0)
                                            <a class="btn btn-outline-primary btn-sm mr-2" href="{{ route('messages.read', $message->id) }}">
                                                <i class="far fa-check"></i>
                                            </a>
                                        @endif
                                        <form action="{{ route('messages.destroy', $message->id) }}" method="POST">
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
