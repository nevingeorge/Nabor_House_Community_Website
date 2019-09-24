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
	
	if(!mysqli_select_db($con,'volinfo'))
	{
		echo 'Database not selected';
	}

	$result = mysqli_query($con,"SELECT * FROM person WHERE person.ID = '$_SESSION[ID]'");

	if ($result && mysqli_num_rows($result) > 0) {
		while($row = $result->fetch_assoc()) {
			echo "ID: " . $row["ID"] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "First: " . $row["First"] .  "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Last: " . $row["Last"] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Email: " . $row["Email"] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Home Phone: " . $row["HomePhone"] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Cell Phone: " . $row["CellPhone"] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Street Address: " . $row["StreetAddress"] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "City: " . $row["City"] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "State: " . $row["State"] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Zipcode: " . $row["Zipcode"] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "<br>";
		}
	} 
	else {
		echo "0 results";
	}
?>

<br>

<form method="get" action="userInfo.php">
    <button type="submit">Go back</button>
</form>

</body>
</html>