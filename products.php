<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		.background{
			margin-bottom: 40px;
		}

		.tung_san_pham{
			width: 378px;
			height: 700px;
			float: left;
		}

		.center{
			width: 80%;
			height: 50%;
			margin: auto;
			display: flex;
			flex-direction: row;
  			justify-content: space-between;
  			flex-wrap: wrap;
		}

		.tung_san_pham img{
			border-radius: 5px;
		}

		.tung_san_pham .pic:hover{
			box-shadow: 5px 10px 18px black;
		}

		.tung_san_pham a{
			text-decoration: none;
			color: black;
			display: inline-block;
		}

		.flex{
			display: flex;
		}

		.flex a:hover{
			text-decoration: underline;
		}

		.flex .link:hover{
			color: red;
		}

		.search{
			text-align: center;
			margin-bottom: 30px;
		}

		.search input{
			padding: 8px;
			width: 300px;
			border: none;
		}
	</style>
</head>
<body>
	<?php 
		session_start();
		require 'admin/connect.php';
		$sql = "select * from products";
		$result = mysqli_query($connect, $sql);
	?>
	<div class="main">
		<div class="background">
			<a href="index.php">
				<img width="100%" src="./pictures/pic1.jpg">
			</a>
		</div>
		<div class="center">
			<?php foreach ($result as $each): ?>
				<div class="tung_san_pham">
					<a class="pic" href="product.php?id=<?php echo $each['id'] ?>">
						<img height="567px" width="378px" src="admin/products/<?php echo $each['photo'] ?>">
					</a>
					<div class="flex">
						<a style="width: 90%" href="">
							<p style="font-size: 17px; margin-top: 10px"><?php echo $each['name'] ?></p>
						</a>
						<?php if (!empty($_SESSION['id'])): ?>
							<a class="link" href="/cart/add_to_cart.php?id=<?php echo $each['id'] ?>">
								<i style="float: right; margin: 10px;  font-size: 25px;" class="fas fa-thin fa-shopping-cart"></i>
							</a>
						<?php endif ?>
						
					</div>
					<p style="font-weight: bold; font-size: 20px" ><?php echo $each['price'] ?> đ</p>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</body>
</html>