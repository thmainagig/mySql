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
	// Form values in post method $_POST 
	// Perform  a database query
	$query = "INSERT INTO votersr (Name, Contact, Polling_Station, Date) VALUES ('Grace', '0729597979', 'Donholm', '2017/03/08')";
	$result= mysqli_query($connect, $query);
	// test if there was query error
	if ($result) {
		// echo successful
		// redirect_to ("somepage.php")
		echo "Success";
	}else{
		// Failure
		// $message = "error message"
		die("Database query failed" . mysqli_error($connect))
		;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>