@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('register') }}">
                        @csrf
    <h4 class="text-center">Sign in to account</h4>
    <p class="text-center">Enter your email & password to login</p>
    <div class="form-group">
        <label class="col-form-label">Full Name</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>
    <div class="form-group">
        <label class="col-form-label">Email Address</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>

    <div class="form-group">
    <label class="col-form-label">Password</label>
    <div class="form-input position-relative">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  required="" placeholder="*********">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>
    </div>
    <div class="form-group">
        <label class="col-form-label">Confirm Email</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
    <div class="form-group mb-0">
    <div class="checkbox p-0">

    <div class="text-end mt-3">
        <button class="btn btn-primary btn-block w-100" type="submit">Sign in                 </button>
    </div>
    </div>


    <p class="mt-4 mb-0 text-center">Already have account?<a class="ms-2" href="{{ route('login') }}">Login</a></p>
</form>
@endsection
