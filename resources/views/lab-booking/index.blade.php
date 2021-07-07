<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Merienda|Kalam|Courgette|Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="resources/css/bootstrap/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="jumbotron bg-primary text-white">
			<h1>Lab Bookings for the day </h1>
			<h3>{{$date}}</h3>
		</div>
	</div>
	<button class="btn btn-light" onclick="window.print()">Print</button>
	<div class="container">
		<div class="row">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
                        <th>Period</th>
                        
                        @foreach ($labs as $lab)
                            <th>{{ $lab->lab_name }}</th>
                        @endforeach
					</tr>
				</thead>
				<tbody>
                    @for ($x = 0; $x < count($periods); $x++)
                        <tr>
                            <td>{{$periods[$x]}}</td>

							
							
							@for ($y = 0; $y < count($labs); $y++)
								@if (!empty($booking = searchBooking($bookings, substr($periods[$x],0,5), $labs[$y]->lab_id, $date)))
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
</body>
</html>