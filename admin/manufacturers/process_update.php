<?php
	session_start();
	if(empty($_SESSION['level'])){
		header('location:../index.php');
	}

$id = $_POST['id'];
if(empty($_POST['id'])){
	header('location:index.php?error=Phải truyền mã để sửa');
}

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$photo = $_POST['photo'];

require '../connect.php';

$sql = "update manufacturers
set
name = '$name',
address = '$address',
phone = '$phone',
photo = '$photo'
where
id = '$id'";

mysqli_query($connect, $sql);


mysqli_query($connect, $sql);
$error = mysqli_error($connect);
if(empty($error)){
	header('location:index.php?success= Sửa thành công');
}else{
	header("location:form_update.php?id=$id&error= Lỗi truy vấn");
}

mysqli_close($connect);