<?php 
	//1. Creating a database connection 
	$servername = "localhost";
	$dbuser = "Emmanuel";
	$dbpass = "letterpass";
	$dbname = "dbjl";
	$connect = mysqli_connect($servername, $dbuser, $dbpass, $dbname);
	// 2.test if connection occured
	if (!$connect) {
		die("Database connection failed: " . mysql_connect_error());
	}
	echo "Connection successful <br></br>";
?>
<?php 
	// Perform a db query
	$query = "UPDATE nasa SET Name = 'Simon' WHERE ID = 5";
	$result = mysqli_query($connect, $query);
	if ($result) {
		echo "Update was successful";
	}else{
		die("Database query failed" . mysqli_error($connect));
	}
?> 
