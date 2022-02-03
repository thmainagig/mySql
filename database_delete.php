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
// perform database query
$query = "DELETE FROM nasa WHERE ID = 2 limit 1";
$run = mysqli_query($connect, $query);
// test if there was a query error
if ($run && mysqli_affected_rows($connect)==1) {
	echo "Delete record successful";
}else{
	die("Database query failed" . mysqli_error($connect));
}
?>