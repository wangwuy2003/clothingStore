<?php  

session_start();
if(!isset($_SESSION['level'])){
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
		body{
			box-sizing: border-box;
			margin: 0;
			padding: 0;
			overflow-x: hidden;
		}

		.main{
			margin-left: 240px;
			width: 80%;
			text-align: center;
		}

		input{
			width: 100%;
			padding: 10px;
		}
		textarea{
			width: 100%;
			padding: 10px;
		}

		form p{
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

		select{
			padding: 10px;
			width: 100%;
		}
	</style>
</head>
<body>
	<?php 
		include '../menu.php';
		$id = $_GET['id'];
		require '../connect.php';

		$sql = "select * from products where id = '$id'";
		$result = mysqli_query($connect, $sql);
		$each = mysqli_fetch_array($result);

		$sql = "select * from manufacturers";
		$manufacturers = mysqli_query($connect, $sql);
	?>
	<div class="main">
		<br>
		<br>
		<br>
		<br>
		<form method="post" action="process_update.php" enctype="multipart/form-data" onsubmit="return confirmUpdate()">
			<h2 style="margin: 0">Sửa sản phẩm</h2>
			<input type="hidden" name="id" value="<?php echo $each['id'] ?>">
	 		<p>Tên</p>
	 		<input type="text" name="name" value="<?php echo $each['name'] ?>">
	 		<p>Ảnh mới</p>
	 		<input type="file" name="photo_new">
	 		<br>
	 		<p>Ảnh cũ</p>
	 		<img height="100" src="./<?php echo $each['photo'] ?>">
	 		<input type="hidden" name="photo_old" value="<?php echo $each['photo'] ?>">
	 		<p>Giá</p>
	 		<input type="number" name="price" value="<?php echo $each['price'] ?>">
	 		<p>Mô tả</p>
	 		<textarea name="description"><?php echo $each['description'] ?></textarea>
	 		<p>Nhà sản xuất</p>
	 		<select name="manufacturer_id">
	 			<?php foreach ($manufacturers as $manufacturers): ?>
	 				<option 
	 					value="<?php echo $manufacturers['id'] ?>"
	 					<?php if($each['manufacturer_id'] == $manufacturers['id']){ ?>
	 						selected 
	 					<?php } ?>
	 					>
	 					<?php echo $manufacturers['name'] ?>
	 				</option>
	 			<?php endforeach ?>
	 		</select>
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