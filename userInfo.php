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
	
	$sum = 0;
	$monthly = 0;
	
	echo "<strong>Hours of: </strong>" . $_SESSION["fn"] . "&nbsp" . $_SESSION["ln"] . "<br><br>";
	
	require_once 'config.php';
	
	if(!mysqli_select_db($con,'volinfo'))
	{
		echo 'Database not selected';
	}

	$result = mysqli_query($con,"SELECT * FROM hours WHERE hours.UserID = '$_SESSION[ID]'");

	if ($result && mysqli_num_rows($result) > 0) {
		while($row = $result->fetch_assoc()) {
			if($row["Verified"] == '1'){
				echo "ID: " . $row["UniqueID"] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Hours: " . $row["Hours"] .  "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Date: " . $row["Date"] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Time In: " . $row["TimeIn"] .  "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Time Out: " . $row["TimeOut"] .  "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Verified: yes" . "<br>";
				$sum = $sum + (double)$row["Hours"];
				if((int)substr($row["Date"],5,2) == date("m")){
					$monthly = $monthly + (double)$row["Hours"];
				}
			}
			else{
				echo "ID: " . $row["UniqueID"] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Hours: " . $row["Hours"] .  "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Date: " . $row["Date"] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Time In: " . $row["TimeIn"] .  "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Time Out: " . $row["TimeOut"] .  "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Verified: no" . "<br>";
				
			}
		}
	} 
	else {
		echo "No hours logged yet<br>";
	}
	
	echo "<strong><br>Total Verified Hours This Month:</strong>" . "&nbsp" . $monthly . "<br>";
	
	echo "<strong><br>Total Verified Hours:</strong>" . "&nbsp" . $sum . "<br>";
?>

<br>

<form action="verify.php" method="post">
	ID: <input type="text" name="PID"><br>
	<input type="submit" value="Verify">
</form>

<br> 

<form method="get" action="perInfo.php">
    <button type="submit">Get Personal Information</button>
</form>

<br>

<form method="get" action="master.php">
    <button type="submit">Go back</button>
</form>

</body>
</html>