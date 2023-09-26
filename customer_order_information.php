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
			margin-left: 200px;
			width: 87%;
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
	session_start();
	if(!isset($_SESSION['id'])){
		header('location:sign_in.php');
	}
	$id = $_SESSION['id'];
	include 'menu.php';
	include 'side_bar.php';
	require 'admin/connect.php';

	$sql = "select * from orders where customer_id = '$id'";
	$result = mysqli_query($connect, $sql);
?>
<table width="100%" border="1">
	<tr>
		<th>Thời gian đặt</th>
		<th>Thông tin người nhận</th>
		<th>Tổng tiền</th>
		<th>Xem chi tiết</th>
		<th>Trạng thái</th>
	</tr>
	<?php foreach ($result as $each): ?>
		<tr>
			<td><?php echo $each['created_at'] ?></td>
			<td><?php echo $each['name_receiver'] ?></td>
			<td><?php echo $each['total_price'] ?></td>
			<td>
				<a href="customer_order_information_detail.php?id=<?php echo $each['id'] ?>">Xem</a>
			</td>
			<td>
				<?php
					switch ($each['status']) {
						case '0':
							// code...
							echo "Mới đặt!";
							break;

						case '1':
							echo "Đã duyệt!";
							break;
						case '2':
							echo "Đã hủy!";
							break;
						default:
							// code...
							break;
					}
				?>
			</td>
		</tr>
	<?php endforeach ?>
</table>
</body>
</html>