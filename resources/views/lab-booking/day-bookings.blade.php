<?php

	if(!isset($_GET['date']))
		$today = date("Y-m-d", strtotime('2020-04-17'));
	else
		$today = date("Y-m-d", $_GET['date']);

	$todaysbookings = file_get_contents("http://localhost/lab_booking/api/Booking/dayBookings.php?date=".$today);

	$json_labs = file_get_contents("http://127.0.0.1:8000/api/labs/");
	$labs = json_decode($json_labs, true);

	$periods = slots("07:45", "16:55"); 
	$count = count($periods);
?>
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
			<h3><?php echo date("d-M-y", strtotime($today)); ?></h3>
		</div>
	</div>
	<button class="btn btn-light" onclick="window.print()">Print</button>
	<div class="container">
		<div class="row">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Period</th>
						<?php
							for($x = 0; $x < 5; $x++)
							{
								echo "<th>".$labs[$x]['lab_name']."</th>";
							}

						?>
					</tr>
				</thead>
				<tbody>
					<?php
						for($x = 0; $x < $count; $x++)
						{
							echo "<tr>";
								echo "<td>".$periods[$x]."</td>";


								for($y = 0; $y < 5; $y++)
								{
									$booking = search($today, substr($periods[$x],0,5), $labs[$y]['lab_id'], $monday, $friday);

									// print_r($booking)."<br/><br/>";

									if(!empty($booking))	
										echo "<td>".$booking['module']."</td>";
									else 
										echo "<td></td>";
								}

							echo "</tr>";
						}
					?>
				</tbody>
			</table>
		</div>

