<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./fontawesome-free-6.4.0-web/css/all.min.css">
	<title></title>
	<style type="text/css">
		body{
			margin: 0;
			background-color: #F4F6F8;
		}
		.main{
			margin-left: 200px;
		}
	</style>
</head>
<body>
	<?php
		session_start();
		include '../menu.php';
		if(!isset($_SESSION['id'])){
			header('location:../log/sign_in.php');
		}
	?>
	<div class="main">	
		<p>Bạn chưa mua sản phẩm nào. Hãy quay lại trang mua sản phẩm</p>
		<a href="../index.php">Trang chủ</a>
	</div>
</table>
</body>
</html>