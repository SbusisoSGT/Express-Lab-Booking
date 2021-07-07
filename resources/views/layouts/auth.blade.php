@extends('layouts.main')

@section('page-includes-styles')
	<link rel="stylesheet" href="{{asset('css/layouts/auth.css')}}">
@endsection

@section('main-content')
	<div class="container-div">
		<div class="background-image">
            <img src="{{ asset('images/IMG_0981.PNG') }}">
		</div>
		<div class="form-container">
			<div class="logo">
				<a href="/lab-booking/dashboard/"><img src="{{ asset('images/SMU-logo.png') }}"></a>
			</div>
			<div class="form">
                @yield('form')
			</div> 
			<footer class="footer">
				@include('inc._footer')
			</footer>
		</div>
	</div>
@endsection