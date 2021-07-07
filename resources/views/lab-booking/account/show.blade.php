<!DOCTYPE html>
<html>
<head>
	<title>Lab Booking | Account </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link href="css/fonts/font-awesome.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('css/layouts/main.css') }}">
	<link rel="stylesheet" href="{{ asset('css/lab-booking/account/show.css') }}">
</head>
<body>
	<div class="overlay">
	</div>
	<div class="loader">
		<img src="" >
	</div>
	<div class="container-fluid">
		<div class="side-bar-menu">
			<div class="welcome-panel">
				<h3>Welcome <br/><span class="name">James</span></h3>
			</div><hr/>
			<div class="menu-panel">
				<a href="/lab-booking/account/">Account</a><br/><br/>
				<a href="/lab-booking/mybookings/">My Bookings</a><br/><br/>
				<a href="/lab-booking/availability/">Lab Availability</a><br/><br/>
				<a href="/lab-booking/create/">Book a Lab</a><br/><br/>
				<a></a>
			</div><hr/>
			<div class="admin-panel">
				<a href="/lab-booking/admin/">Admin</a><br/><br/>
			</div><hr/>
		</div>
		<div class="tab-2">
			<nav class="nav">
				<i class="material-icons" id="menu-icon">menu</i> 
				<span class="logo"><a href="/lab-booking/dashboard/">Lab Booking</a></span>
				<div class="profile">
					<span class="profile-options"></span>
					<img alt="logo" class="profile-pic" src="{{ asset('images/blank-profile.png') }}">
					@auth
						<a href="{{ route('logout') }}"
							onclick="event.preventDefault();
									  document.getElementById('logout-form').submit();">
							<span class="full-name h5">Logout</span>
					 	</a>

					 	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					@else
						<a href="/login/"><span class="full-name h5">Login</span></a>
					@endauth
				</div>
			</nav>
			<div class="container">
				<div class="row-date">
					<span class="date">Thur, 07 May 2020</span>
				</div>
			</div>
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
        </div>
    </div>
</body>
</html>

<script>
    $(document).ready(function(){
		$('.overlay').click(function(){
			$('.overlay').hide();
			$('.side-bar-menu').hide();
		});

		$('#menu-icon').click(function(){
			$('.side-bar-menu').show();
			$('.overlay').show();
		});

		$('.btn-lg').click(function(){
			window.location.assign('/');
		});
    });

</script>