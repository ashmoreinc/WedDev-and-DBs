<!DOCTYPE html>
<html>
<head>
	<title>Customer Info</title>
	<style>
		.error-text {
			color: #dd0000;
		}

		table th {
			background: white;
			position: sticky;
			top: 0;
		}

		table tr td,
		table tr th{
			padding: 5px;
		}

		table  tr:nth-child(1) th {
			border-bottom: 2px solid black;
		}

		table tr:nth-child(even){
			background-color: #eeeeee;
		}
	</style>
</head>
<body>
	<?php
		$host = "localhost";
		$user = "root";
		$pass = "";
		$db = "classicmodels";
		$conn = new mysqli($host, $user, $pass, $db);

		if (mysqli_connect_errno()) {
			?> <h1 class="error-text">An error occured.</h1> <?php
			die("Connection to database has failed.");
			exit();
		}
	?>
	<table>
		
		<tr>
			<th>Surname</th>
			<th>City</th>
			<th>Country</th>
		</tr>
		<?php
			
			$sql = "SELECT contactLastName as surname, city, country FROM customers";

			if($result = $conn->query($sql)){
				if($result->num_rows > 0) {
					while($row = $result->fetch_assoc()){
						?>
							<tr>
								<td><?php echo $row["surname"]; ?></td>
								<td><?php echo $row["city"]; ?></td>
								<td><?php echo $row["country"]; ?></td>
							</tr>
						<?php
					}
				} else {
					?> <p class="error-text">No data is available</p> <?php
				}
			} else {
				?> <p class="error-text">There was an issue querying the database.</p> <?php
				die();
				exit();
			}
	?>
	</table>

</body>
</html>