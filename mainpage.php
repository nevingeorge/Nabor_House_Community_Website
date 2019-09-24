<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<link rel="stylesheet" href="style2.css">
	<style>
	p.serif {
		font-family: "Times New Roman", Times, serif;
		font-size: 100%;
		display: inline;
	}
	</style>
</head>
<body>

<h1> Main Page </h1>

<br>

<form action="addHours.php" method="post">
Time In: <input type="time" name="timein" required><p id="t" class="serif"></p><br>
Time Out: <input type="time" name="timeout" required><p id="t" class="serif"></p><br>
Date: <input type="date" name="date" required><p id="d" class="serif"></p><br><br>
<u>Activities Performed</u> <br>
Classroom Help Teacher Name: <input type="text" name="teacher" style="width:140px; height:20px"> <br>
<input type="checkbox" name="activity[]" value="B"> Prepping Activities<br>
<input type="checkbox" name="activity[]" value="C"> Preparing/Serving Snacks & Lunch<br>
<input type="checkbox" name="activity[]" value="D"> Administrative Help<br>
<input type="checkbox" name="activity[]" value="E"> Observation and Assessments<br>
<input type="checkbox" name="activity[]" value="F"> Ground/Building Maintenance<br>
Other (please specify): <input type="text" name="other" style="width:140px; height:20px"> <br>
P.A.L. Child Name: <input type="text" name="pal" style="width:140px; height:20px"> <br>
<input type="submit" value="Add Hours">
</form>

<script>
var test = document.createElement('input');
test.type = 'time';
if(test.type === 'text'){
  	document.getElementById("t").innerHTML = "Enter the times in the following format EXACTLY: hh:mm (military time)"; 
	document.getElementById("d").innerHTML = "Enter the date in the following format EXACTLY: yyyy-mm-dd"; 
}
</script>

<br><br>

<?php

	$sum = 0;
	$monthly = 0;

	require_once 'config.php';
	
	if(!mysqli_select_db($con,'volinfo'))
	{
		echo 'Database not selected';
	}

	$result = mysqli_query($con,"SELECT * FROM hours WHERE hours.UserID = '$_SESSION[ID]'");

	if ($result && mysqli_num_rows($result) > 0) {
		while($row = $result->fetch_assoc()) {
			echo "ID: " . $row["UniqueID"] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Date: " . $row["Date"] .  "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Hours: " . $row["Hours"] .  "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Time In: " . $row["TimeIn"] .  "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . "Time Out: " . $row["TimeOut"] .  "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
			$str = "Activities Performed: &nbsp";
			if($row["Teacher"]!=""){
				$str = $str . "Helped Classroom Teacher: &nbsp" . $row["Teacher"] . ",";
			}
			if($row["ActB"]=="1"){
				$str = $str . "&nbspPrepping Activities,";
			}
			if($row["ActC"]=="1"){
				$str = $str . "&nbspPreparing/Serving Snacks & Lunch,";
			}
			if($row["ActD"]=="1"){					
				$str = $str . "&nbspAdministrative Help,";
			}
			if($row["ActE"]=="1"){
				$str = $str . "&nbspObservation and Assessments,";
			}
			if($row["ActF"]=="1"){
				$str = $str . "&nbspGround/Building Maintenance,";
			}
			if($row["Other"]!=""){
				$str = $str . "&nbspOther: &nbsp" . $row["Other"] . ",";
			}
			if($row["PAL"]!=""){
				$str = $str . "&nbspP.A.L. Child Name: &nbsp" . $row["PAL"] . ",";
			}
			echo substr($str,0,strlen($str)-1);
			if($row["Verified"] == "1"){
				echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspVerified: &nbsp yes" . "<br>";
				$sum = $sum + (double)$row["Hours"];
				if((int)substr($row["Date"],5,2) == date("m")){
					$monthly = $monthly + (double)$row["Hours"];
				}
			}
			else{
				echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspVerified: &nbsp no" . "<br><br>";
			}
		}
	} 
	
	echo "<strong><br>Total Verified Hours This Month:</strong>" . "&nbsp" . $monthly . "<br>";
	
	echo "<strong><br>Total Verified Hours:</strong>" . "&nbsp" . $sum;
?>


<br>
<br>

<form action="delete2.php" method="post">
	ID: <input type="text" name="PID"><br>
	<input type="submit" value="Delete Hours">
</form>

<br>

<form method="get" action="updateInfo.html">
    <button type="submit">Update Personal Information</button>
</form>

<br>

<form method="get" action="index.php">
    <button type="submit">Logout</button>
	<?//php session_destroy(); ?>
</form>

</body>
</html>