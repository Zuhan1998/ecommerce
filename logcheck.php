<?php
session_start();
// creates a session or resumes the current one based on a session identifier passed via a GET or POST request

$conn = new mysqli('localhost','root','');
mysqli_select_db($conn, 'zerox');

$uname = $_POST['username'];
$pword = $_POST['password'];

$s = "SELECT * from  registration where username ='$uname'";

$result = mysqli_query($conn, $s);
// stores query

$num = mysqli_num_rows($result);


if($uname=='admin' && $pword==112112){


	header('location:adminpanel.php');
}
elseif($num == 1){

      $_SESSION['username'] = $uname;
	// session variable stores the current username

	header('location:home.php');
	// header indicates the URL to redirect a page to.
}
else{
	header('location:login.html');
}
	//num counts how many times the name appeared



?>