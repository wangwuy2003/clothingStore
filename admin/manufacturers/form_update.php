<?php
	session_start();
	if(empty($_SESSION['level'])){
		header('location:../index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		.main{
			margin-left: 240px;
			width: 80%;
			text-align: center;
		}

		input{
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
		}

		textarea{
			width: 100%;
			padding: 8px;
			margin-bottom: 20px;
		}

		form p{
			margin-bottom: 20px;
			text-align: left;
			font-size: 18px;
		}

		button{
			font-size: 16px;
			padding: 10px;
			width: 150px;
		}

		button:hover{
			color: white;
			background: black;
			border: none;
		}
	</style>
</head>
<body>
<?php
	include '../menu.php';
	require '../connect.php';
	$id = $_GET['id'];
	$sql = "select * from manufacturers where id = '$id'";
	$result = mysqli_query($connect, $sql);
	$each = mysqli_fetch_array($result);
?>
<div class="main">
	<br>
	<br>
	<br>
	<form method="post" action="process_update.php" onsubmit="return confirmUpdate()">
		<h2 style="text-align: center; margin: 0">Sửa nhà sản xuất</h2>
		<br>
		<input type="hidden" name="id" value="<?php echo $id?>">
		<p>Tên</p>
		<input type="text" name="name" value="<?php echo $each['name'] ?>">
		<br>
		<p>Địa chỉ</p>
		<textarea name="address"><?php echo $each['address'] ?></textarea>
		<p>Số điện thoại</p>
		<input type="text" name="phone" value="<?php echo $each['phone'] ?>">
		<p>Ảnh</p>
		<input type="text" name="photo" value="<?php echo $each['photo'] ?>">
		<br>
		<br>
		<button>Sửa</button>
	</form>
</div>
</body>
<script type="text/javascript">
	function confirmUpdate(){
		return confirm("Bạn có muốn sửa không?");
	}
</script>
</html>