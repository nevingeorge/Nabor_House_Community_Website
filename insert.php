<?php

	require_once 'config.php';
	
	if(!mysqli_select_db($con,'volinfo'))
	{
		echo 'Database not selected';
	}
	
	$username = trim($_POST['username']);
	$password = $_POST['password'];
	$first = trim($_POST['first']);
	$last = trim($_POST['last']);
	$email = trim($_POST['email']);
	$hphone = trim($_POST['hphone']);
	$cphone = trim($_POST['cphone']);
	$staddress = trim($_POST['staddress']);
	$city = trim($_POST['city']);
	$state = trim($_POST['state']);
	$zip = trim($_POST['zip']);
	
	$sql = "INSERT INTO person (Username,Password,First,Last,Email,HomePhone,CellPhone,StreetAddress,City,State,Zipcode) VALUES ('$username','$password','$first','$last','$email','$hphone','$cphone','$staddress','$city','$state','$zip')";
		
	if(!mysqli_query($con,$sql))
	{
		echo 'Not Inserted';
	}
	else
	{
		header("refresh:0; url=successful.html");
	}
?>