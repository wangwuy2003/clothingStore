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

		.personal{
			margin-top: 20px;
			margin-left: 220px;
			font-size: 25px;
		}

		table tr td input{
			width: 80%;
			padding: 10px;
			font-size: 20px;
		}
		span{
			margin-right: 10px;
		}

		table{
			margin-top: 50px;
			margin-left: 210px;
		}
		tr, td{
			padding-bottom: 20px;
		}
	</style>
</head>
<body>
<?php
	include 'menu.php';
	session_start();
	$id = $_SESSION['id'];
	include 'side_bar.php';
	require 'admin/connect.php';
	$sql = "select * from customers where id = '$id'";
	$result = mysqli_query($connect, $sql);
	$each = mysqli_fetch_array($result);
?>
<table width="87%">
	<tr>
		<td style="font-size: 25px; width: 180px;">Tên:</td>
		<td>
			<input type="text" name="name" value="<?php echo $each['name'] ?>" readonly>
		</td>
	</tr>
	<tr>
		<td style="font-size: 25px">Email:</td>
		<td>
			<input type="email" name="email" value="<?php echo $each['email'] ?>" readonly>
		</td>
	</tr>
	<tr>
		<td style="font-size: 25px">Mật khẩu:</td>
		<td>
			<input type="password" name="password" value="<?php echo $each['password'] ?>" readonly>
		</td>
	</tr>
	<tr>
		<td style="font-size: 25px">Số điện thoại: </td>
		<td>
			<input type="text" name="phone" value="<?php echo $each['phone'] ?>" readonly>
		</td>
	</tr>
	<tr>
		<td style="font-size: 25px">Địa chỉ: </td>
		<td>
			<input type="text" name="address" value="<?php echo $each['address'] ?>" readonly>
		</td>
	</tr>
</table>
</body>
</html>