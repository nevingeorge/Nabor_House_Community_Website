<!DOCTYPE html>
<html lang="en-US">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<link rel="stylesheet" href="style2.css">
</head>
<body>

<h1> List of All Volunteers </h1>

<b> ID First Last </b>

<br><br>

<?php
	require_once 'config.php';
	
	if(!mysqli_select_db($con,'volinfo'))
	{
		echo 'Database not selected';
	}

	$result = mysqli_query($con,"SELECT * FROM person");

	if ($result && mysqli_num_rows($result) > 0) {
		while($row = $result->fetch_assoc()) {
			if($row["First"]!="master" && $row["Last"]!="master")
				echo $row["ID"] . "&nbsp" .  $row["First"] . "&nbsp" . $row["Last"] . "<br>";
		}
	} 
	else {
		echo "There are no volunteers.";
	}
?>

<br>

<form action="deleteUser.php" method="post">
	ID: <input type="text" name="PID"><br>
	<input type="submit" value="Delete User">
</form>

<br>

<form method="get" action="master.php">
    <button type="submit">Go back</button>
</form>

</body>
</html>