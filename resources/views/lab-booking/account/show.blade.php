@extends('layouts.dashboard')

@section('title', 'Account')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/lab-booking/account/show.css') }}">
@endsection

@section('dashboard-content')
	<div class="container">
		<div class="account-head">
			<span class="account-header">Account Profile</span>
		</div>
		<div class="account-info">
			<p><b>Full Name</b> <br/>{{auth()->user()->name}}</p><br/>
			<p><b>Email</b><br/>{{auth()->user()->email}}</p><br/>
			<p><b>Department</b><br/> Computer Science</p><br/>
			<p><b>User</b><br/>{{$role->role}}</p><br/>
			<p><b>Password</b><br/> *********</p>
			<a href="/lab-booking/account/edit"><button class="btn btn-info btn-lg">Edit Account</button></a>
		</div>
	</div>
@endsection