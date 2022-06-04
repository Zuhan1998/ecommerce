<?php
//for specifying form data we have to specify the form input name

$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['userName'];
$passwrd = $_POST['password'];

$conn = new mysqli('localhost','root','','zerox');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("INSERT INTO registration(name, email,username,passwrd)VALUES(?,?,?,?)");

$stmt->bind_param("ssss",$name,$email,$username,$passwrd);
$stmt->execute();
echo "done";
header('location:login.html');
$stmt->close();
$conn->close();
}
?>