<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./fontawesome-free-6.4.0-web/css/all.min.css">
	<title></title>
	<style type="text/css">
		body{
			background-color: #F4F6F8;
		}

		.tung_san_pham{
			width: 550px;
			height: 150px;
			background-color: white;
			margin: auto;
			border-radius: 5px;
			margin-top: 30px;
			padding: 20px;
		}

		img{
			float: left;
			margin-right: 20px;
		}

		.price{
			font-size: 20px;
			color: red;
			display: inline-block;
		}

		.quantity{
			float: right;
			display: inline-block;
			font-size: 20px;
			display: flex;
			align-items: center;
			justify-content: space-around;
			width: 100px;
		}

		.delete{
			color: black;
			text-decoration: none;
			background: #F4F6F8;
			width: 30px;
			text-align: center;
			border-radius: 5px;
		}

		.quantity a{
			color: black;
			text-decoration: none;
			background: #F4F6F8;
			width: 30px;
			text-align: center;
			border-radius: 5px;
		}

		i{
			float: right;
		}

		.total{
			display: inline-block;
			float: right;
			margin-right: 31%;
		}

		.form{
			width: 550px;
			margin: auto;
			margin-top: 90px;
		}

		input{
			padding: 8px;
			width: 60%;
		}

		button{
			width: 30%;
			margin-top: 20px;
			font-size: 20px;
			padding: 10px;
			margin-left: 180px	;
		}

	</style>
</head>
<body>
<?php
	session_start();
	$cart = $_SESSION['cart'];
	$sum = 0;
	include '../menu.php';
?>

<?php if(empty($_SESSION['cart'])) {
	header('location:view_cart_4_error.php');
?>
	<p>Bạn chưa mua sản phẩm nào. Hãy quay lại trang chủ</p>
<?php } ?>


<?php foreach ($cart as $id => $each): ?>
	<div class="tung_san_pham">
		<img width="100" src="../admin/products/<?php echo $each['photo'] ?>">
		<span><?php echo $each['name'] ?></span>
		<a class="delete" href="delete_cart.php?id=<?php echo $id ?>"><i class="fa fa-trash"></i></a>
		<br>
		<p class="price"><?php echo $each['price'] * $each['quantity']; ?>đ</p>
		<div class="quantity">
			<a style="margin-right: 13px" href="update_quantity_cart.php?id=<?php echo $id?>&type=decrease">
				-
			</a>
			<p>
				<?php 
					$result = $each['price'] * $each['quantity'];
					$sum += $result;
					echo $each['quantity'];
				?>
			</p>
			<a style="margin-left: 13px" href="update_quantity_cart.php?id=<?php echo $id?>&type=increase">
				+
			</a>
		</div>
	</div>
<?php endforeach ?>

<div class="total">
	<br>
	<h2>Tổng tiền: <?php echo $sum ?></h2>
</div>
<?php
	$id = $_SESSION['id'];
	require '../admin/connect.php';
	$sql = "select * from customers where id  = '$id'";
	$result = mysqli_query($connect, $sql);
	$each = mysqli_fetch_array($result);
?>
<div class="form">
	<form method="post" action="process_checkout.php">
		Tên người nhận
		<input style="margin-left: 80px"  type="text" name="name_receiver" value="<?php echo $each['name'] ?>">
		<br>
		Số điện thoại người nhận
		<input style="margin-left: 20px" type="text" name="phone_receiver" value="<?php echo $each['phone'] ?>">
		<br>
		Địa chỉ người nhận
		<input style="margin-left: 57px" type="text" name="address_receiver" value="<?php echo $each['address'] ?>">
		<br>
		<button>Đặt hàng</button>
	</form>
</div>
</table>
</body>
</html>