@extends('admin.layout.app')

@section('login-page')
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1>Hello, Admin!</h1>
        </div>
        <div class="login-box">
            <form class="login-form" action="{{ url('/login') }}" method="POST">
                @csrf
                <h3 class="login-head"><i class="fad fa-lg fa-fw fa-user text-primary"></i>SIGN IN</h3>
                <div class="form-group">
                    <label class="control-label">USERNAME <span class="text-danger">*</span></label>
                    <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Email" autofocus value="{{ old('email') }}" name="email">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="control-label">PASSWORD <span class="text-danger">*</span></label>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group btn-container mt-4">
                    <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
                </div>
            </form>
        </div>
    </section>
@endsection
