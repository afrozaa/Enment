<?php


//echo "I am here    ";


$servername = "localhost";
$username = "root";
$password = "";
$database = "enment";

$fullname =$_POST['fullname'];
$email=$_POST['email'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$pass=$_POST['password'];


$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    echo "Connection was successful<br>";
}


$sql = "INSERT INTO `signup` (`fullname`, `email`, `address`,`phone` ,`pass`) VALUES ('$fullname', '$email', '$address', '$phone', '$pass')";


$result = mysqli_query($conn, $sql);

if($result){
    header('location:index.php');
}
else{
    echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
}


?>