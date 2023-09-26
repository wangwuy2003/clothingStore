<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../fontawesome-free-6.4.0-web/css/all.min.css">
	<style type="text/css">
		.top{
			height: 80px;
		}

		*{
			margin: 0;
			padding: 0;
		}
		.top{
			position: relative;
			background: #d6a99a;
			border: 1px solid #d6a99a;
		}

		.header{
			position: absolute;
			top: 45%;
  			transform: translateY(-50%);
			width: 97%;
			padding: 10px 20px;
			overflow-x: hidden;
		}

		.logo{
			margin-left: 100px;
			display: inline-block;
		}

		.logo a{
			text-decoration: none;
			color: black;
		}

		.top-menu{
			width: 30%;
			display: inline-block;
		}

		.top-menu ul{
			list-style-type: none;
			display: flex;
			justify-content: space-around;
		}

		.top-menu ul li a{
			font-size: 20px;
			line-height: 1.5;
			color: black;
			text-decoration: none;
		}

		.top-menu a:hover{
			text-decoration: underline;
		}

		.right-menu{
			display: inline-block;
			right: 100px;
			top: 60%;
  			transform: translateY(-50%);
			position: absolute;
			width: 80px;
		}

		.right-menu ul{
			display: flex;
			list-style-type: none;
			justify-content: space-around;
		}

		.right-menu ul li a{
			color: black;
		}	
	</style>
</head>
<body>
	<?php  
		$search = '';
	?>
	<div class="top">
		<div class="header">
			<div class="logo">
				<a href="../index.php">
					<h1>FASHION</h1>
				</a>
			</div>
			<div class="top-menu">
				<ul>
					<li><a href="#">Nam</a></li>
					<li><a href="#">Nữ</a></li>
					<li><a href="#">Giảm giá</a></li>
					<li><a href="#">Cửa hàng</a></li>
				</ul>
			</div>
			<div class="right-menu">
				<ul>
					<!-- <li>
						<i style="color: black" class="fa fa-search"></i>
						<form style="display: inline-block;">
							<input style="display: inline-block; border: none; background: transparent;" type="search" name="search" placeholder="Tìm kiếm..." name="search" value="<?php echo $search ?>">
						</form>
					</li> -->
					<li>
						<a href="/cart/view_cart.php">
							<i class="fa fa-shopping-cart"></i>
						</a>
					</li>
					<li>
						<a href="/user.php">
							<i class="fa fa-user"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>