<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đây là giao diện khách hàng</title>
	<style type="text/css">
		*{
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}

		#all{
			width: 100%;
			height: 3000px;
		}

		.top{
			width: 100%;
			height: 3%;
			position: fixed;
			top: 0;
		}

		.main{
			width: 100%;
			height: 95%;
			background-color: #ebebeb;
		}

		.bottom{
			width: 100%;
			height: 3%;	
			position: absolute;
			bottom: 0;	
		}
	</style>
</head>
<body>
<?php
	$search = '';
	if(isset($_GET['search'])){
		$search = $_GET['search'];
	}

	require 'admin/connect.php';
	$sql = "select * from products where name like '%$search%'";
	$result = mysqli_query($connect, $sql);
?>
<div id="all">
	<?php include 'menu.php' ?>
	<?php include 'products.php' ?>
	<?php include 'footer.php' ?>
</div>
</body>
</html>