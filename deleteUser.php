<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<link rel="stylesheet" href="style2.css">
</head>
<body>

<?php

	require_once 'config.php';
	
	$db_found = mysqli_select_db($con,'volinfo');
	
	if(!$db_found)
	{
		echo 'Database not selected';
	}
	
	$pid = $_POST['PID'];

	$sql = "DELETE FROM hours WHERE hours.UserID = '$pid'";

	if(!mysqli_query($con,$sql))
	{
		echo 'Not Inserted';
	}
	else
	{
		header("refresh:0; url=pending.php");
	}
	
	$sql2 = "DELETE FROM person WHERE person.ID = '$pid'";
	
	if(!mysqli_query($con,$sql2))
	{
		echo 'Not Inserted';
	}
	else
	{
		header("refresh:0; url=list.php");
	}

?>

<hr>

</body>
</html>