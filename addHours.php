<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<link rel="stylesheet" href="style2.css">
</head>

<?php
	require_once 'config.php';
	
	if(!mysqli_select_db($con,'volinfo'))
	{
		echo 'Database not selected';
	}
	
	$timein = trim($_POST['timein']);
	$timeout = trim($_POST['timeout']);
	$date = trim($_POST['date']);
	$activity = $_POST['activity'];
	$teacher = $_POST['teacher'];
	
	$activity = $_POST['activity'];
	$actB = "0";
	$actC = "0";
	$actD = "0";
	$actE = "0";
	$actF = "0";
	$n = count($activity);
	for($i=0;$i<$n;$i++){
		if($activity[$i]=="B"){
			$actB = "1";
		}
		if($activity[$i]=="C"){
			$actC = "1";
		}
		if($activity[$i]=="D"){
			$actD = "1";
		}
		if($activity[$i]=="E"){
			$actE = "1";
		}
		if($activity[$i]=="F"){
			$actF = "1";
		}
	}

	$other = $_POST['other'];
	$pal = $_POST['pal'];
	$ID = $_SESSION['ID'];

	$hour1 = (int)substr($timein,0,2);
	$min1 = (int)substr($timein,3,2);
	$hour2 = (int)substr($timeout,0,2);
	$min2 = (int)substr($timeout,3,2);
	
	$hours = (double)($hour2-$hour1) + ((double)($min2-$min1))/60;
	if($hour2<$hour1)
		$hours = $hours + 24;
	$hours = ((double)floor(4*$hours))/4;
	
	$sql = "INSERT INTO hours (UniqueID,UserID,TimeIn,TimeOut,Hours,Date,Teacher,ActB,ActC,ActD,ActE,ActF,Other,PAL,Verified) VALUES (NULL,'$ID','$timein','$timeout','$hours','$date','$teacher','$actB','$actC','$actD','$actE','$actF','$other','$pal','0')";
		
	if(!mysqli_query($con,$sql))
	{
		echo 'Not Inserted';
	}
	else
	{
		header("refresh:0; url=mainpage.php");
	}
?>