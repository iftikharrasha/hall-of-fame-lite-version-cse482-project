<?php
require_once('dbconnect.php');

//redirect function
function Redirect_To ($location) {
	header('location:' . $location);
	exit;
}  

//query function
function Query ($query) {
	global $con;

	try {

		$exec = mysqli_query($con,$query) or die(mysqli_error($con));
		if($exec) {
			return $exec;
		}
	
	}catch (Exception $e) {
		echo $e->getMessage();
	}
	return false;
}

//admin login attemt
function LoginAttempt($username, $password) {
	$query = "SELECT * FROM admin WHERE username = '$username'  AND password = '$password'";
	$exec = Query($query);
	if ($admin = mysqli_fetch_assoc($exec)) {
		return $admin;
	}else {
		return null;
	}
}

//user login attemt
function userAttempt($username, $password) {
	$query = "SELECT * FROM user WHERE username = '$username'  AND password = '$password'";
	$exec = Query($query);
	if ($user = mysqli_fetch_assoc($exec)) {
		return $user;
	}else {
		return null;
	}

}

//connection close
function conectionEnd($value)
  {
    mysqli_close($value);
  }

?>