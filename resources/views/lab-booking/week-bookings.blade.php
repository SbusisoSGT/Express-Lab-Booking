<?php
    $period = slots("07:45", "16:55");
	$count = count($period);

	$monday = date("Y-m-d", strtotime('monday this week'));
	$friday = date("Y-m-d", strtotime('friday this week'));
	$saturday = date("Y-m-d",(strtotime($friday." +1 day")));
	$weekBookings = weekBookings($monday, $friday);
	$currentDay = $monday;
	$lab_id = 16; //Res 2B
?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Merienda|Kalam|Courgette|Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row jumbotron bg-info text-white">
			<h1 class="header">Lab Availability</h1><br/>
			<h2>Computer Lab: Res-2B</h2>
		</div>
		<div class="row">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Time</th>
						<th>Monday</th>
						<th>Tuesday</th>
						<th>Wednesday</th>
						<th>Thursday</th>
						<th>Friday</th>
					</tr>
				</thead>
				<tbody>
				
				</tbody>
			</table>
	</div>
</body>
</html>
<style>
	.header{
		text-align: center;
	}

</style>
<script>
	$(document).ready(function(){
		$url = "http://127.0.0.1:8000/api/bookings/periods/";
		$getJSON($url, function(periods){
			$.each(periods, function (entryIndex, entry){
				var table = "<td class='periods'>"+ entry + "</td>";
				table += "<td></td>";
				table += "<td></td>";
				table += "<td></td>";
				table += "<td></td>";
				table += "<td></td>";
				$('tbody').html(table);
			});

		});
	});

</script>