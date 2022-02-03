<?php 
	//1. Creating a database connection 
	$servername = "localhost";
	$dbuser = "Emmanuel";
	$dbpass = "letterpass";
	$dbname = "dbjl";
	$connect = mysqli_connect($servername, $dbuser, $dbpass, $dbname);
	// 2.test if connection occured
	if (!$connect) {
		die("Database connection failed: " . mysqli_connect_error());
	}
	echo "Connection successful <br></br>";
?>
<?php 
	// Form values in post method $_POST 
	// Perform  a database query
	$query = "SELECT * FROM nasa";
	$run= mysqli_query($connect, $query);
	// test if there was query error_log(message)
	if (!$run) {
		// echo successful
		// redirect_to ("somepage.php")
		die("Query failed.<br/>");
	}else{
		// Failure
		// $message = "error message"
		echo "Query successful.<br/>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Connecting to database</title>
	<link rel="stylesheet" type="text/css" href="Bootstrap-Copy/css/bootstrap.css">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
</head>
<body>
<div class="container"><!--container -->
		<div> <!--jumbotron div-->
  <div class="jumbotron">
  <h1>Voter registration app</h1>
  </div> 
<div class="form-group">
<form action="database_read.php" method="post">
    <label class="control-label col-sm-2" for="Name">Name:</label>
    <div class="col-sm-10"> 
      <input type="name" class="form-control" id="Name" placeholder="Enter name" name="name" required="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="station">Polling Station:</label>
    <div class="col-sm-10"> 
      <input type="station" class="form-control" id="station" placeholder="Enter station" name="Polling" required="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="identification">Identification:</label>
    <div class="col-sm-10"> 
      <input type="number" class="form-control" id="comment" placeholder="Enter Identification" name="ID" required="">
    </div>
  </div>
  <div class="form-group">
     <label for="sel1" class="control-label col-sm-2">Gender:</label>
     <div class="col-sm-10"> 
     <!-- <input type="gender" name="gender" required=""> -->
     <select class="form-control" id="sel1" name="gender" required>
    <option>Male</option>
    <option>Female</option>
    <option>Specify if any other</option>
  </select>
  </div>
 </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="Date">Date:</label>
    <div class="col-sm-10"> 
      <input type="Date" class="form-control" id="Date" name="date" required="">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="register" value="Register" class="btn btn-success">
    </div>
  </div>
</form>
    </div>
<?php 
// use the returned data in a table
// Buttons for edit and delete in each label
	echo "
	<table border=2 class=table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Identification</th>
				<th>Gender</th>
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
			<td>$voter[ID]</td>
			<td>$voter[Name]</td>
			<td>$voter[Identification]</td>
			<td>$voter[Gender]</td>
			<td>$voter[Polling_Station]</td>
			<td>$voter[Date]</td>
		</tr>
		" ;
		
	}
	echo "</tbody>";
	echo "</table>";
?>
</div>
</div>
</body>
</html>
<?php 
if (isset($_POST['register'])) {
	$name = $_POST['name'];
	$Polling = $_POST['Polling'];
	$ID = $_POST['ID'];
	$gender = $_POST['gender'];
	$date = $_POST['date'];
	// $Phone = $_POST['Phone'];
	// Push them to db
	$insert = "INSERT INTO nasa (Name, Identification, Gender, Polling_Station, Date) VALUES ('$name', '$ID', '$gender', '$Polling', '$date')";
	
if (mysqli_query($connect, $insert)) {
	echo "Query successful";
	header("location: database_read.php");
}else{
	die("Query failed" . mysqli_error($connect));
}
}
?>
<?php 
// Close database connection
mysqli_close($connect);
?>