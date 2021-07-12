@extends('layouts.dashboard')

@section('title', 'Express Lab Booking')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/lab-booking/index.css') }}">
@endsection

@section('scripts')
	<script src="{{ asset('js/lab-booking/index.js') }}"></script>
@endsection

@section('dashboard-content')
	<div class="container">
		<div class="row-btn">		
			<a href="/lab-booking/create"><button class="view-avail-btn">Book a Lab</button></a>
			<a href="/lab-booking/availability"><button class="book-btn">View Availability</button></a>
		</div>
	</div>
	<div class="filter-pop-up">
		<button class="pop-up-close"><b>x</b></button><br/>
		<form>
			<label class="form-check-label">Purpose</label><br/>
			<div class="form-check form-check-inline">
				<input type="radio"class="form-check-input" name="purpose" value="Teaching">
				<label class="form-check-label">Teaching </label>
			</div>
			<div class="form-check form-check-inline">
				<input type="radio" class="form-check-input" name="purpose" value="Exam">
				<label for="purpose" class="form-check-label">Exam </label>
			</div>
			<div class="form-check form-check-inline">
				<input type="radio" class="form-check-input" name="purpose" value="Praticals">
				<label for="purpose" class="form-check-label">Practicals </label>
			</div>
			<div class="form-check form-check-inline">
				<input type="radio" class="form-check-input" name="purpose" value="Other">
				<label for="purpose" class="form-check-label">Other</label>
			</div>
			<br/><br/>
			<label class="form-check-label">Number of Computers</label><br/>
			<div class="form-check form-check-inline">
				<input type="radio" class="form-check-input" name="numComputers" value="0-29">
				<label class="form-check-label">0 - 29 </label>
			</div>
			<div class="form-check form-check-inline">
				<input type="radio" class="form-check-input" name="numComputers" value="30-59">
				<label class="form-check-label">30 - 59 </label>
			</div>
			<div class="form-check form-check-inline">
				<input type="radio" class="form-check-input" name="numComputers" value="60-89">
				<label class="form-check-label">60 - 89 </label>
			</div>
			<div class="form-check form-check-inline">
				<input type="radio" class="form-check-input" name="numComputers" value="90-119">
				<label class="form-check-label">90 - 119 </label>
			</div><br/><br/>

			<div class="form-group">
				<label for="date">Date</label>
				<input type="date" class="form-control" min="2020-05-07">
			</div>
						
		</form>
	</div>
	<div class="container">
		<div class="row-table">
        	<h2>Today's Bookings</h2>
    		<span class="page-count">
    	       Page {{$labs->currentPage()}} of {{$labs->lastPage()}}
            </span>
			<div class="form-group">
				<form method="GET" action="">
					<select name="building_id" class="form-control filter-select" id="buildings"></select>
					<select name="purpose" class="form-control filter-select">
						<option value="any">Any Purpose</option>
						<option>Exam</option>
						<option>Test</option>
						<option>Teaching</option>
						<option>Practical</option>
					</select>
					<select name="computers" class="form-control filter-select">
						<option value="any">Any Number of computers</option>
						<option value="0-29">0 - 29</option>
						<option value="30-59">30 - 59</option>
						<option value="60-89">60 - 89</option>
						<option value="90-119">90 - 119</option>
						<option value="120"> 120 or more</option>
					</select>
					<input type="date" name="date" class="filter-date" value="today">
					<button class="btn btn-info filter-btn" type="submit" name="apply-filter" value="true"><i class="fas fa-sort"></i><span id="filter-btn-name">Filter</span></button>
				</form>
			</div>
			<span class="page-number">Page 1 of 3</span>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Period</th>                  
                        @foreach ($labs as $lab)
                        	<th>{{ $lab->name }}</th>
                        @endforeach
					</tr>
				</thead>
				<tbody>
                    @for ($x = 0; $x < count($periods); $x++)
                        <tr>
                            <td>{{$periods[$x]}}</td>

                            @for ($y = 0; $y < count($labs); $y++)
                        	    {{-- @if (!empty($booking = searchBooking($bookings, substr($periods[$x],0,5), $labs[$y]->id, $date)))
                    	        	<td>{{$booking->module}}</td>
                                @else --}}
                                <td></td>
                                {{-- @endif --}}
                            @endfor
                        </tr>
                    @endfor	
				</tbody>
            </table>
            <div class="paginator">
                <span class="paginator-info">
                    <p>Showing {{$labs->firstItem()}} - {{$labs->lastItem()}} of {{$labs->total()}} labs</p> 
               	</span>
    	    	<span class="paginator-links">
                    {{ $labs->links() }}
             	</span>
        	</div>
		</div>
	</div>
@endsection