@extends('layouts.auth')

@section('title', 'Register')

@section('page-seo')
    @include('inc._basic-seo')
@endsection

@section('image-background')
    <img src="{{ asset('images/IMG_0024.JPG') }}">    
@endsection

@section('form')
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group row">
        {{-- <span class="iconify" data-icon="bi:person-fill" data-inline="false"></span> --}}
        <img src="{{asset('images/icons/person-fill.svg')}}" alt="Lock Icon">
        <input type="text" id="name" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Full Name" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                 </span>
            @enderror
    </div>
    <div class="form-group row">
        {{-- <span class="iconify" data-icon="fluent:mail-28-filled" data-inline="false"></span> --}}
        <img src="{{asset('images/icons/mail-28-filled.svg')}}" alt="Lock Icon">
        <input type="email" id="email"  class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
            @error('email')
                @if($message == "Invalid Format.")
                    <span class="invalid-feedback" role="alert">
                        <strong>Email is not registered with SMU</strong>
                    </span>
                @else
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @endif
            @enderror        
    </div>
    <div class="form-group row">
        {{-- <span class="iconify" data-icon="bx:bxs-lock" data-inline="false"></span> --}}
        <img src="{{asset('images/icons/bxs-lock.svg')}}" alt="Lock Icon">
        <input type="password" id="password" class="input @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>
    <div class="form-group row">
        {{-- <span class="iconify" data-icon="bx:bxs-lock" data-inline="false"></span> --}}
        <img src="{{asset('images/icons/bxs-lock.svg')}}" alt="Lock Icon">
        <input type="password" id="password-confirm" class="input" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
    </div>
    <div class="form-group row">
        <input type="hidden" name="role_id" value="1">
    </div>    
    <input type="submit" name="register" value="Register" class="submit">
</form>
@endsection