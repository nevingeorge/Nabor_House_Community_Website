<!DOCTYPE html>
<html lang="en-US">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
	<link rel="stylesheet" href="style2.css">
</head>
<body>

<h1> Master Page </h1>

<b> Search for someone's hours </b>

<form action="masterSearch.php" method="post">
First Name: <input type="text" name="first"><br>
Last Name: <input type="text" name="last"><br>
<button type="submit">Search</button>
</form>

<form method="get" action="list.php">
    <button type="submit">List of All Volunteers</button>
</form>

<form method="get" action="pending.php">
    <button type="submit">List of All Hours That Need to be Verified</button>
</form>

<br><br>

<form method="get" action="index.php">
    <button type="submit">Logout</button>
</form>

</body>
</html>