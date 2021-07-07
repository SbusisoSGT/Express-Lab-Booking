@extends('layouts.main')

@section('title', 'About')

@section('page-seo')
    @include('inc._basic-seo')
@endsection

@section('page-includes-styles')
    
@endsection

@section('page-includes-scripts')
    
@endsection


@section('main-content')
    <div class="container-fluid">
        <div class="side-bar-menu">
            <div class="welcome-panel">
                @auth
                    <h3>Welcome <br/><span class="name">{{auth()->user()->name}}</span></h3>
                @else
                    <h3>Welcome <br/><span class="name">Guest</span></h3>
                @endauth
            </div><hr/>
            <div class="menu-panel">
                <a href="/lab-booking/account/">Account</a><br/><br/>
                <a href="/lab-booking/mybookings/">My Bookings</a><br/><br/>
                <a href="/lab-booking/availability/">Lab Availability</a><br/><br/>
                <a href="/lab-booking/create/">Book a Lab</a><br/><br/>
                <a></a>
            </div><hr/>
            <div class="admin-panel">
                <a href="lab-booking/admin/">Admin</a><br/><br/>
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
        </div>
    </div>
    <div class="dashboard-content-container">
        @yield('dashboard-content')
    </div>
    <footer class="footer">
        @include('inc._footer')
    </footer>
@endsection


@section('footer')
    
@endsection