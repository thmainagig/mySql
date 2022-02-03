<?php 
	//1. Creating a database connection 
	$servername = "localhost";
	$dbuser = "Emmanuel";
	$dbpass = "letterpass";
	$dbname = "voters_reg";
	$connect = mysqli_connect($servername, $dbuser, $dbpass, $dbname);
	// 2.test if connection occured
	if (!$connect) {
		die("Database connection failed: " . mysql_connect_error());
	}
	echo "Connection successful <br></br>";
?>
<?php 
	//3.Perform database query
	$query = "SELECT*FROM votersr";
	$run = mysqli_query ($connect, $query);
	// 5.test if there was a query error
	if(!$run){
		die("Database query failed <br></br>");
	} echo "Query successful <br></br>";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Read from mySQl</title>
</head>
<body>
	<div><!--container -->
		<div> <!--jumbotron div-->
			<h1>Voter registration app</h1>
		</div>
		<form>
			
		</form>
	</div>
	<?php 
		// Use returned data (if any)
	echo "
		<table border=2>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Contact</th>
					<th>Id_number</th>
					<th>Polling_Station</th>
					<th>Date</th>
				</tr>
			</thead>
		<tbody>
	";
	while ($voter = mysqli_fetch_assoc($run)) {
			// Output data from each row
		echo "
			<tr>
				<td>$voter[Voters_id]</td>
				<td>$voter[Name]</td>
				<td>$voter[Contact]</td>
				<td>$voter[Id_number]</td>
				<td>$voter[Polling_Station]</td>
				<td>$voter[Date]</td>
			</tr>
		";
		// echo $voter['Voters id'] . '<br/>';
		// echo $voter['Name'] . '<br/>';
		// echo $voter['Contact'] . '<br/>';
		// echo $voter['Id-number'] . '<br/>';
		// echo $voter['Polling_Station'] . '<br/>';
		// echo $voter['Date'] . '<br/>';
		// echo "<hr>";
		// var_dump($row);
		// echo "<hr/>";
		}
		echo "
			</tbody>
			</table>
		";
	?>
</body>
</html>
<?php 
	//4.Close your database connection
	mysqli_close($connect);
?>