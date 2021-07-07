<!DOCTYPE html>

<!--
	-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_
	
		 ________            __    __  __                                      ______               __
		/\_____  \          /\ \__/\ \/\ \                                    /\__  _\             /\ \
		\/___//'/' __    ___\ \ ,_\ \ \_\ \    ___   __  __    ____     __    \/_/\ \/    __    ___\ \ \___
			/' /'/'__`\/' _ `\ \ \/\ \  _  \  / __`\/\ \/\ \  /',__\  /'__`\     \ \ \  /'__`\ /'___\ \  _ `\
		  /' /' /\  __//\ \/\ \ \ \_\ \ \ \ \/\ \L\ \ \ \_\ \/\__, `\/\  __/      \ \ \/\  __//\ \__/\ \ \ \ \
		 /\_/   \ \____\ \_\ \_\ \__\\ \_\ \_\ \____/\ \____/\/\____/\ \____\      \ \_\ \____\ \____\\ \_\ \_\
		 \//     \/____/\/_/\/_/\/__/ \/_/\/_/\/___/  \/___/  \/___/  \/____/       \/_/\/____/\/____/ \/_/\/_/

	-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_
	
	#	Author: 7entHouse Tech PTY(LTD)
	#	About: A House of Perfect Tech Solutions
	#	Website: www.7enthousetech.co.za
	#	Email: info@7enthousetech.co.za
	
	-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_
	
-->


<html lang="en">
<head>
    <!--    Page descriptions     -->
    <meta charset="UTF-8">
    <title> @yield('title') {{ " • ".config('app.name', "Yandy Beauty Bar • Official Website")}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="canonical" href="{{url()->full()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--    Page SEO                    -->
    @yield('page-seo')

    <!--    DNS Prefetch statements     -->
    <link rel='dns-prefetch' href='https://www.yandybeautybar.co.za'/>
    <link rel='dns-prefetch' href='https://fonts.googleapis.com'/>
    <link rel='dns-prefetch' href='https://kit.fontawesome.com'/>

    <!--    Main page includes   -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Orbitron&family=Courgette&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="{{ asset('css/lab-booking/dashboard.css') }}">
	<link rel="stylesheet" href="{{ asset('css/layouts/main.css') }}">
    @yield('page-includes-styles')
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script src="https://kit.fontawesome.com/3ef12e339b.js"></script>
</head>
<body onload="preloaderDisp()">
    <div class="overlay">
    </div>
    <div class="preloader">
    </div>
    <nav class="nav-bar">
        @yield('dashboard-nav')
    </nav>
    <main class="main-container">
        @yield('main-content')
    </main>
    {{-- <script src="{{asset('js/layouts/main.js')}}"></script>
    @yield('page-includes-scripts')
    @yield('js-code') --}}
</body>
</html>