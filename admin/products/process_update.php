<?php  

session_start();
if(!isset($_SESSION['level'])){
	header('location:../index.php');
}
 
$id = $_POST['id'];
$name = $_POST['name'];
$photo_new = $_FILES['photo_new'];
if($photo_new['size'] > 0){
	$folder = 'photoss/';
	$file_extension = explode('.', $photo_new['name'])[1];
	$file_name = time() . '.' . $file_extension;
	$path_file = $folder . $file_name;
	move_uploaded_file($photo_new["tmp_name"], $path_file);
} else{
	$file_name = $_POST['photo_old'];

}

$price = $_POST['price'];
$description = $_POST['description'];
$manufacturer_id = $_POST['manufacturer_id'];

require '../connect.php';

$sql = "update products 
set
name = '$name',
photo = '$file_name',
price = '$price',
manufacturer_id = '$manufacturer_id'
where
id = '$id'
";

mysqli_query($connect, $sql);
header('location:index.php');
mysqli_close($connect);