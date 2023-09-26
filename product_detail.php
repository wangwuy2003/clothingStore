<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		.product{
			position: relative;
		}

		.name{
			position: absolute;
			top: 50px;
			font-size: 20px;
			left: 40%;
			font-weight: bold;
		}

		.price{
			position: absolute;
			top: 120px;
			left: 40%;
			font-size: 25px;
			font-weight: bold;
		}

		.description{
			position: absolute;
			top: 170px;
			left: 40%;
			font-size: 18px;
		}

		button{
			position: absolute;
			bottom: 65%;
			left: 40%;
			width: 300px;
			padding: 15px;
			font-size: 14px;
			border-radius: 5px;
			border: none;
			background: black;
			color: white;
		}

		button:hover{
			background: lightgrey;
			color: black;
		}

		a{

		}
	</style>
</head>
<body>
	<?php
		$id = $_GET['id'];

		require 'admin/connect.php';

		$sql = "select * from products where id = '$id'";
		$result = mysqli_query($connect, $sql);
		$each = mysqli_fetch_array($result);
	?>
<div class="main">
	<div class="product">
		<br>
		<br>
		<img width="600px" height="750px" src="admin/products/<?php echo $each['photo']?>">
		<span class="name"><?php echo $each['name'] ?></span>
		<span class="price"><?php echo $each['price']  ?><span style="text-decoration: underline;">đ</span></span>
		<span class="description"><?php echo $each['description'] ?></span>
		<a href="">
			<button>MUA NGAY</button>
		</a>
	</div>
</div>
</body>
</html>