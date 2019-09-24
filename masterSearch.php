<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
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
	
	$first = trim($_POST['first']);
	$last = trim($_POST['last']);

	if($db_found) {
		$result = mysqli_query($con,"SELECT * FROM person WHERE First LIKE '$first' AND Last LIKE '$last'");
		if ($result && mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result,MYSQLI_NUM);
			$_SESSION["ID"] = $row[0];
			$_SESSION["fn"] = $first;
			$_SESSION["ln"] = $last;
			header("location: userInfo.php");
		}
		else{
			echo 'Person NOT Found.';
			header("refresh:3; url = master.php");
		}
	}
	else {
		print "Database NOT Found.";
		mysql_close($db_handle);
	}

?>

</body>
</html>