<?php
	$mysql_host = "localhost";
	$mysql_user = "root";
	$mysql_pass = "";
	$mysql_db = "amberzile";
	$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
	$username = mysqli_real_escape_string($con, $_POST["uname"]);
	$password = mysqli_real_escape_string($con, $_POST["pword"]);

	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$query = "select id from login where uname = '$username' and pass = '$password'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result, MYSQL_ASSOC);
		$count = mysqli_num_rows($result);
		if($count == 1)
		{
			header("location: /kadamba/dashboard/");
		}
		elseif($count > 1){
			echo "Duplicate";
		}
		else
		{
			echo "Wrong Details";
		}
	}
?>