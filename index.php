<?php
	session_start(); 
?>

<!DOCTYPE html>
<html lang="en-US">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<h1> Nabor House Volunteer Sign In</h1>

<div class="loginInfo">

<form action="info.php" method="post">
	<div class="imgcontainer">
		<img src="back.jpg" alt="Avatar" class="avatar">
	</div>
	
	<div class="container">
		<label><b>Username</b></label>
		<input type="text" placeholder="Enter Username" name="username" required>
		
		<label><b>Password</b></label>
		<input type="password" placeholder="Enter Password" name="password" required>
		<button type="submit">Login</button>
		
	</div>
</form>	

</div>

<form method="get" action="signup.html" border = 0;>

<div class = "container">
	<button type="submit">Sign Up</button>
</div>

</form>

<br>

<div class = "f"> Nabor House Community invests in the growth and development of Christian low-income children and their families by providing quality, affordable early childhood centers in a Christian environment, enabling parents to pursue employment or education. </div>

<br>

<div class="image">
<img src="NHwithText.png" alt="Nabor House Logo" align="center" style="width:650px;height:237px;">
</div>

<br>

<div class = "e"> Dwayne Jones, Executive Director: djones@naborhousecommunity.org </div> 
<div class = "e"> For technical support email Nevin George: nevingeorge2000@gmail.com </div>

</body>
</html>