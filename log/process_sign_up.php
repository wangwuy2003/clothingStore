<?php  

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];

require 'admin/connect.php';

$sql = "select count(*) from customers where email = '$email'";
$result = mysqli_query($connect, $sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];

if($number_rows == 1){
	session_start();
	$_SESSION['error'] = 'Trùng email rồi!';
	header('location:sign_up.php');
	exit();
}

$sql = "insert into customers(name, email, password, phone, address) values ('$name', '$email', '$password', '$phone', '$address')";
mysqli_query($connect, $sql);

$sql = "select id from customers where email = '$email'";
$result = mysqli_query($connect, $sql);
$id = mysqli_fetch_array($result)['id'];

session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;
header('location:user.php');
mysqli_close($connect);
