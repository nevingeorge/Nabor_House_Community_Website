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
	
	$sql = "UPDATE person SET Username = '$username', Password = '$password', First = '$first', Last = '$last', Email = '$email', HomePhone = '$hphone', CellPhone = '$cphone', StreetAddress = '$staddress', City = '$city', State = '$state', Zipcode = '$zip' WHERE person.ID = '$_SESSION[ID]'";

	if(!mysqli_query($con,$sql))
	{
		echo 'Not Inserted';
	}
	else
	{
		header("refresh:0; url=updateSuccessful.html");
	}
?>

</body>
</html>