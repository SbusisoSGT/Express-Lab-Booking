@extends('layouts.dashboard')

@section('title', 'Book A Lab')

@section('styles')
	<link rel="stylesheet" href="{{ asset('css/lab-booking/create.css') }}">
@endsection

@section('scripts')
	<script src="{{asset('js/lab-booking/create.js')}}"></script>
@endsection

@section('dashboard-content')
	@if (session('unsuccessful'))
		<div class="timetable-pop-up">
			<button class="btn btn-dark pull-left" id="close-btn"><strong>X</strong></button>
			<br/><br/>
			<div class="container">
				<div class="row">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Period</th>
								@foreach (session('labs') as $lab)
									<th>{{ $lab->lab_name }}</th>
								@endforeach
						</thead>
						<tbody>
							@for ($x = 0; $x < count(session('periods')); $x++)
								<tr>
									<td>{{session('periods')[$x]}}</td>

									@for ($y = 0; $y < count(session('labs')); $y++)
										@if (!empty($booking = searchBooking(session('bookings'), substr(session('periods')[$x],0,5), session('labs')[$y]->lab_id, session('date'))))
											<td>{{$booking->module}}</td>
										@else
											<td></td>
										@endif
									@endfor
								</tr>
							@endfor	
						</tbody>
					</table>
				</div>
			</div>
		</div>
	@endif
	<div class="container">
		@if(session('successful'))
			<h4 class="alert alert-success">{{session('successful')}}</h4>
		@endif

		@if(session('unsuccessful'))
			<div class="alert alert-danger" role="alert">
				<h4 class="alert-heading">{{session('unsuccessful')}}</h4>
				<hr>
				<p>
					@if (count(session('otherAvailLabs')) != 0)
						Other Labs available at that time: 
						<strong>
							@for ($i = 0; $i < count(session('otherAvailLabs')); $i++)
								@if ($i ==  count(session('otherAvailLabs')) - 1)
									{{" and ".session('otherAvailLabs')[$i]->name.". "}}
								@else 
									{{session('otherAvailLabs')[$i]->name.", "}}
								@endif
							@endfor
						</strong>
					@else
						All labs are booked at that time	
					@endif
					</p>
				<p><span class="show-timetable"><strong>Click Here</strong></span> to see timetable</p>
			</div>
		@endif

			<div class="form">
            <form action="/lab-booking/book" method="POST"><br/><br/>
                @csrf

				<h3>Enter Info to book a lab</h3><br/>
				<label for="lab">Computer Lab</label>
				<select class="form-control" name="lab_id" id="labs" required>
				</select>
				<br/><br/>
				<label for="module">Module</label>
					<input type="text" name="module" class="form-control" required><br/>
				<label for="purpose">Purpose</label>
					<select class="custom-select" name="purpose">
						<option selected>--Select Option--</option>
						<option>Teaching</option>
						MMTA021<option>Practicals</option>
						<option>Exam</option>
						<option>Test</option>
					</select><br/><br/>
				<label for="date">Date</label>
					<input type="date" class="form-control" name="date" min="<?php echo date('Y-m-d'); ?>" required><br/>
				<label for="start">Start Time</label>
					<select class="custom-select" name="start_time" required>
						<option value>--Select Option--</option>
						<option value="07:45">07:45</option>
						<option value="08:30">08:30</option>
						<option value="09:15">09:15</option>
						<option value="10:00">10:00</option>
						<option value="10:45">10:45</option>
						<option value="11:30">11:30</option>
						<option value="12:15">12:15</option>
						<option value="13:00">13:00</option>
						<option value="14:00">14:00</option>
						<option value="14:45">14:45</option>
						<option value="15:30">15:30</option>
						<option value="16:15">16:15</option>
					</select><br/><br/>
				<label for="end">End Time</label>
					<select class="custom-select" name="end_time" required>
						<option value>--Select Option--</option>
						<option value="08:25">08:25</option>
						<option value="09:10">09:10</option>
						<option value="09:55">09:55</option>
						<option value="10:40">10:40</option>
						<option value="11:25">11:25</option>
						<option value="12:10">12:10</option>
						<option value="12:55">12:55</option>
						<option value="13:55">13:55</option>
						<option value="14:40">14:40</option>
						<option value="15:25">15:25</option>
						<option value="16:10">16:10</option>
						<option value="16:55">16:55</option>
					</select><br/><br/>
				<input type="submit" class="btn btn-primary btn-block" name="book" value="Book">
			</form>
		</div>
	</div>
@endsection
