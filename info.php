<?php
session_start();
?>

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
	
	$username = trim($_POST['username']);
	$password = $_POST['password'];

	if($db_found) {
		$result = mysqli_query($con,"SELECT * FROM person WHERE Username LIKE '$username' AND Password LIKE '$password'");
		if ($result && mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result,MYSQLI_NUM);
			$_SESSION["ID"] = $row[0];
			if($row[1] == "master" && $row[2] == "master"){
				header("location: master.php");
			}
			else{
				header("location: mainpage.php");
			}
		}
		else{
			echo 'Username and Password NOT Found';
			header("refresh:3; url=index.php");
		}
	}
	else {
		print "Database NOT Found.";
		mysql_close($db_handle);
	}

?>

</body>
</html>