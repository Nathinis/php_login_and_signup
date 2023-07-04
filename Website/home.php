<?php 
session_start();

	include("db_conn.php");
	


?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
<br>
	currently logged in as, <?php echo $_SESSION['user_id']; ?></br>
	<a href="logout.php">Logout</a>
	<h1>Welcome to S³ TECH</h1>
</body>
</html>

