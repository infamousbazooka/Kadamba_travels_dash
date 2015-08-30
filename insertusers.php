<?php
	$mysql_host = "localhost";
	$mysql_user = "root";
	$mysql_pass = "";
	$mysql_db = "amberzile";
	$con = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
	$username = mysqli_real_escape_string($con, $_POST["uname"]);
	$password = mysqli_real_escape_string($con, $_POST["pword"]);
    $ins = "INSERT into login (uname, pass) VALUES ('$username', '$password')";
    if ($con->query($ins) === FALSE) {
        echo "Error: " . $ins . "<br>" . $con->error;
    }
    $con->close();
?>