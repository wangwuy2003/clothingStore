<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
		}
		body{
			box-sizing: border-box;
			width: 100%;
			box-sizing: border-box;
		}
		.menu{
			height: 100%;
			width: 200px;
			position: fixed;
			z-index: 1;
			top: 81px;
			left: 0;
			background-color: #016A70;
			overflow-x: hidden;
		}

		.menu a{
			padding: 6px 8px 6px 16px;
			text-decoration: none;
			font-size: 20px;
			color: white;
			display: block;
		}

		.menu a:hover{
			color: black;
		}

		.sign_out{
			position: absolute;
			bottom: 10%;
			margin-left: 40px;
		}
	</style>
</head>
<body>
<div class="menu">
	<a href="#">
		Xin chào! <?php echo $_SESSION['name'] ?>
	</a>
	<br>
	<a href="../user_information.php">Thông tin cá nhân</a>
	<a href="../customer_order_information.php">Đơn hàng</a>
	<a class="sign_out" href="/log/sign_out.php">Đăng xuất</a>
</div>
</body>
</html>