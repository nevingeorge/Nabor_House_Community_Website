<!DOCTYPE html>
<html lang="en-US">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<link rel="stylesheet" href="style2.css">
</head>
<body>

<h1> List of All Hours That Need to be Verified </h1>

<b> ID First Last Date Hours</b>

<br><br>

<?php
	require_once 'config.php';
	
	if(!mysqli_select_db($con,'volinfo'))
	{
		echo 'Database not selected';
	}

	$result = mysqli_query($con,"SELECT * FROM hours WHERE hours.Verified = '0'");

	if ($result && mysqli_num_rows($result) > 0) {
		while($row = $result->fetch_assoc()) {
			$result2 = mysqli_query($con,"SELECT * FROM person WHERE person.ID = '$row[UserID]'");
			$first = "";
			$last = "";
			if ($result2 && mysqli_num_rows($result2) > 0) {
				while($row2 = $result2->fetch_assoc()) {
					$first = $row2["First"];
					$last = $row2["Last"];
				}
			}	
			echo $row["UniqueID"] . "&nbsp&nbsp" . $first . "&nbsp&nbsp" . $last . "&nbsp&nbsp" . $row["Date"] . "&nbsp&nbsp" . $row["Hours"] . "&nbsp&nbspNot Verified" . "<br>";
		}
	} 
	else {
		echo "No hours need to be verified.<br>";
	}
?>

<br>

<form action="delete.php" method="post">
	ID: <input type="text" name="PID"><br>
	<input type="submit" value="Delete Hours">
</form>

<br>

<form method="get" action="master.php">
    <button type="submit">Go back</button>
</form>

</body>
</html>