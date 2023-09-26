<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		body{
			max-width: 100%;
			overflow-x: hidden;
		}

		table{
			width: 100%;
			border-collapse: collapse;
			font-family: Arial, sans-serif;
			text-align: center;
		}

		table td, table th{
			border: 1px solid #ddd;
			padding: 8px;
		}

		table tr:nth-child(even){
			background-color: #f2f2f2;
		}

		table th{
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: center;
			background-color: #04AA6D;
			color: white;
		}
	</style>
</head>
<body>
	<?php
		require 'admin/connect.php';
		$order_id = $_GET['id'];
		$sql = "select * from order_detail join products on products.id = order_detail.product_id where order_id = '$order_id'";
		$result = mysqli_query($connect, $sql);
		$sum = 0;
		include 'menu.php';
	?>
	<table width="100%" border="1">
		<tr>
			<th>Ảnh</th>
			<th>Tên sản phẩm</th>
			<th>Giá</th>
			<th>Số lượng</th>
			<th>Tổng tiền</th>
		</tr>
		<?php foreach ($result as $each): ?>
			<tr>
				<td>
					<img width="100" src="admin/products/<?php echo $each['photo'] ?>">
				</td>
				<td>
					<?php echo $each['name'] ?>
				</td>
				<td>
					<?php echo $each['price'] ?>
				</td>
				<td>
					<?php echo $each['quantity'] ?>
				</td>
				<td>
					<?php
						$result = $each['quantity'] * $each['price'];
						$sum += $result;
						echo $result;
					?>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
	<br>
	<h1 style="float: right; margin-right: 80px">Tổng tiền đơn hàng: <?php echo $sum ?></h1>
</body>
</html>