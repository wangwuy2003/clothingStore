<?php
	require '../check_admin_login.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		*{
			
		}

		html, body{
			max-width: 100%;
			overflow-x: hidden;
		}
		table{
			margin-top: 50px;
			margin-left: 215px;
			border-collapse: collapse;
			font-family: Arial, sans-serif;
			font-size: 15px;
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
			background-color: black;
			color: white;
		}
	</style>
</head>
<body>
	<?php
		require '../menu.php';
		require '../connect.php';
		$sql = "select
			orders.*,
			customers.name,
			customers.phone,
			customers.address
			from orders join customers on customers.id = orders.customer_id";
		$result = mysqli_query($connect, $sql);
	?>
	<table border="1" width="86%">
		<tr>
			<th>Mã</th>
			<th>Thời gian đặt</th>
			<th>Thông tin người nhận</th>
			<th>Thông tin người đặt</th>
			<th>Trạng thái</th>
			<th>Tổng tiền</th>
			<th>Xem</th>
			<th>Duyệt</th>
			<th>Hủy</th>
		</tr>
		<?php foreach ($result as $each): ?>
			<tr>
				<td><?php echo $each['id'] ?></td>
				<td><?php echo $each['created_at'] ?></td>
				<td>
					<?php echo $each['name_receiver'] ?>
					<br>
					<?php echo $each['phone_receiver'] ?>
					<br>
					<?php echo $each['address_receiver'] ?>
				</td>
				<td>
					<?php echo $each['name'] ?>
					<br>
					<?php echo $each['phone'] ?>
					<br>
					<?php echo $each['address'] ?>
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
							case  '2':
								echo "Đã hủy!";
								break;
							default:
								// code...
								break;
						}
					?>
				</td>
				<td>
					<?php echo $each['total_price'] ?>
				</td>
				<td>
					<a href="detail.php?id=<?php echo $each['id'] ?>">Xem</a>
				</td>
				<td>
					<?php if($each['status'] == 1 || $each['status'] == 2) {?>
						<a onclick="confirmCheck()" style="visibility: hidden" href="update.php?id=<?php echo $each['id'] ?>&status=1">Duyệt</a>
					<?php } else {?>
						<a onclick="confirmCheck()" href="update.php?id=<?php echo $each['id'] ?>&status=1">Duyệt</a>
					<?php } ?>
				</td>
				<td>
					<?php if ($each['status'] == 2 || $each['status'] == 1){ ?>
						<a onclick="confirmDelete()" style="visibility: hidden" href="update.php?id=<?php echo $each['id'] ?>&status=2">Hủy</a>
					<?php } else { ?>
						<a onclick="confirmDelete()" href="update.php?id=<?php echo $each['id'] ?>&status=2">Hủy</a>
					<?php } ?>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
</body>
<script type="text/javascript">
	function confirmDelete(){
		if(confirm("Bạn có muốn hủy không?")){
			return true;
		}
		return false;
	}

	function confirmCheck(){
		if(confirm("Bạn có muốn duyệt không?")){
			return true;
		}
		return false;
	}
</script>
</html>