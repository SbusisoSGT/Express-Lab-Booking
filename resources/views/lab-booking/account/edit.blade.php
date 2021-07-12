@extends('layouts.dashboard')

@section('title', 'Edit Account')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/lab-booking/account/edit.css') }}">
@endsection

@section('dashboard-content')
	<div class="container">
		<div class="account-head">
			<span class="account-header">Account Profile</span>
		</div>
		<div class="account-info">
			<form action="/lab-booking/account/update" method="POST">
				@csrf
				@method('PUT')
                <label for="name"><b>Full Name</b></label> 
				<input type="text" class="form-control" value="{{auth()->user()->name}}"><br/>

                <label for="email"><b>Email</b></label>
                <input type="email" class="form-control" value="{{auth()->user()->email}}"><br/>

                <label for="department"><b>Department</b></label>
				<input type="text" class="form-control" value="Computer Science" disabled><br/>

                <label for="user"><b>User</b></label><br/>
                <input type="text" class="form-control" value="{{$role->role}}" disabled><br/>

                <label for="password"><b>Password</b></label><br/>
				<input type="password" class="form-control"><br/>
						
				<label for="confirm-password"><b>Confirm Password</b></label><br/>
				<input type="password" class="form-control"><br/>
						
                <button class="btn btn-info btn-lg">Update</button>
            </form>
		</div>
	</div>
</div>
@endsection