<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="notify.js"></script>
<?php
session_start();
if(!isset($_SESSION['level'])){
	header('location:../index.php');
}


$name = $_POST['name'];
$photo = $_FILES['photo'];
$price = $_POST['price'];
$description = $_POST['description'];
$manufacturer_id = $_POST['manufacturer_id'];

$folder = 'photos/';
$file_extension = explode('.', $photo['name'])[1];
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;


move_uploaded_file($photo["tmp_name"], $path_file);

require '../connect.php';

$sql = "insert into products(name, photo, price, description, manufacturer_id) values 
('$name', '$path_file', '$price', '$description', '$manufacturer_id')";

mysqli_query($connect, $sql);
header('location:index.php?success=Thêm thành công');
mysqli_close($connect);
?> 

