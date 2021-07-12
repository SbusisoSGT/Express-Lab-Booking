@extends('layouts.auth')

@section('title', 'Login')

@section('page-seo')
    @include('inc._basic-seo')
@endsection

@section('image-background')
    <img src="{{ asset('images/IMG_0981.PNG') }}">    
@endsection

@section('form')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group row">
            {{-- <span class="iconify" data-icon="fluent:mail-28-filled" data-inline="false"></span> --}}
            <img src="{{asset('images/icons/mail-28-filled.svg')}}" alt="Lock Icon">
            <input type="email" id="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('Email') }}" required autocomplete="email" autofocus><br/>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group row">
            {{-- <span class="iconify" data-icon="bx:bxs-lock" data-inline="false"></span> --}}
        <img src="{{asset('images/icons/bxs-lock.svg')}}" alt="Lock Icon">
            <input type="password" id="password" class="input @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password"><br/>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <input type="submit" name="login" value="Login" class="submit">
        <div class="form-links-container">
            <a href="{{route('register')}}"><span class="register">Register here</span></a>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    <span class="forgot">Forgot Password?</span>
                </a>
            @endif
        </div>
    </form>
@endsection