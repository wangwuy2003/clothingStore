<?php
	session_start();
	if(empty($_SESSION['level'])){
		header('location:../index.php');
	} 

$id = $_GET['id'];
if(empty($_GET['id'])){
	header('location:index.php?error=Phải truyền mã để xóa');
	exit();
}

// $name = $_POST['name'];
// $address = $_POST['address'];
// $phone = $_POST['phone'];
// $photo = $_POST['photo'];

require '../connect.php';

$sql = "delete from manufacturers where id = '$id'";

mysqli_query($connect, $sql);
$error = mysqli_error($connect);
if(empty($error)){
	header('location:index.php?success= Sửa thành công');
}else{
	header("location:form_update.php?id=$id&error= Lỗi truy vấn");
}
mysqli_close($connect);

header('location:index.php?success=Xóa thành công');