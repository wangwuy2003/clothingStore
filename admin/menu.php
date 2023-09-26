<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<style type="text/css">
		body{
			margin: 0;
			font-family: Arial, sans-serif;
		}
		.menu{
			height: 100%;
			width: 210px;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: #f5f5f5;
			overflow-x: hidden;
			padding-top: 20px;
			box-shadow: 15px 0px 10px -15px #111;
		}

		.menu a{
			padding: 6px 8px 6px 16px;
			text-decoration: none;
			font-size: 19px;
			color: black;
			display: block;
		}

		.menu a:hover{
			color: red;
		}

		.sign_out{
			position: absolute;
			bottom: 30px;
			text-align: center;
			margin-left: 40px;
		}


		.top{
			height: 40px;
			text-align: center;
			font-weight: bold;
			font-size: 25px;
			position: fixed;
			width: 100%;
			background-color: #f5f5f5;
			box-shadow: 0px 15px 10px -15px #111;   
		}

		.top p{
			margin: 0;
			display: block;
			text-align: center;
			padding-top: 5px;
		}

	</style>
</head>
<body>
	<?php
		$name = $_SESSION['name'];
	?>
	<!-- <div class="top">
		<p style="display: inline-block;">fashion</p>
		<span style="font-size: 14px; float: right; padding-top: 10px; margin-right: 20px;"><?php echo $name ?></span>
	</div> -->
	<div class="menu">
		<a href="../manufacturers">Quản lý nhà sản xuất</a>
		<a href="../products">Quản lý sản phẩm</a>
		<a href="../orders">Quản lý đơn hàng</a>
		<a class="sign_out" href="/log/sign_out.php">Đăng xuất</a>
	</div>
</body>
<script type="text/javascript">
	
</script>
</html>

