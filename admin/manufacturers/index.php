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
		html, body{
			max-width: 100%;
			overflow-x: hidden;
		}
		*{
			padding: 0;
		}

		body{
			margin: 0;
		}

		.add{
			text-decoration: none;
			color: white;
			background: black;
			font-size: 17px;
		}

		.add:hover{
			font-size: 20px;
		}

		#manufacturers{
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 85%;
		}

		#manufacturers td, #manufacturers th{
			border: 1px solid #ddd;
			padding: 8px;
		}

		#manufacturers tr:nth-child(even){
			background-color: #f2f2f2;
		}

		#manufacturers th{
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: center;
			background-color: black;
			color: white;
		}

		#manufacturers td{
			text-align: center;
		}

		#manufacturers td a{
			text-decoration: none;
			color: black;
		}

		#manufacturers td a:hover{
			text-decoration: underline;
		}

		table{
			margin-left: 225px;
			padding: 0px 10px;
			box-sizing: border-box;
		}

		caption {
			margin-bottom: 10px;
		}

		caption input{
			padding: 8px;
			width: 300px;
		}

		.page{
			margin-top: 20px;
			margin-left: 55%;
		}
		.page a{
			text-decoration: none;
			color: black;
		}

		.page a:hover{
			text-decoration: underline;
		}
	</style>
</head>
<body>

<?php 
	include '../menu.php';
	require '../connect.php';

	if(isset($_GET['page'])){
			$page = $_GET['page'];
	} else {
		$page = 1;
	}

	$search = '';
	if(isset($_GET['search'])){
		$search = $_GET['search'];
	}

	$sql = "select * from manufacturers where name like '%$search%'";
	$result = mysqli_query($connect, $sql);
	

	$sql_count_manufacturers = "select count(*) from manufacturers where name like '%$search%'";
	$array_count_manufacturers = mysqli_query($connect, $sql_count_manufacturers);
	$result_pages = mysqli_fetch_array($array_count_manufacturers);
	$count_manufacturers = $result_pages['count(*)'];

	$count_manufacturers_1_page = 5;

	$pages = ceil($count_manufacturers / $count_manufacturers_1_page);
	$skip = $count_manufacturers_1_page * ($page - 1);
	
	$sql = "select * from manufacturers where name like '%$search%' limit $count_manufacturers_1_page offset $skip";
	$result = mysqli_query($connect, $sql);
?>
<div style="margin-top: 10px; margin-bottom: 10px; margin-left: 220px; margin-top: 50px">
	<a class="add" href="form_insert.php">
		Thêm nhà sản xuất
	</a>
</div>
<table id="manufacturers">
	<caption>
		<form>
			<input type="search" name="search" placeholder="Tìm kiếm theo tên, id...." value="<?php echo $search ?>">
		</form>
	</caption>
	<tr>
		<th>Mã</th>
		<th>Tên</th>
		<th>Địa chỉ</th>
		<th>Số điện thoại</th>
		<th>Ảnh</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	
	<?php foreach ($result as $each): ?>
		<tr>
			<td><?php echo $each['id'] ?></td>
			<td><?php echo $each['name'] ?></td>
			<td><?php echo $each['address'] ?></td>
			<td><?php echo $each['phone'] ?></td>
			<td>
				<img width="100" src="<?php echo $each['photo'] ?>">
			</td>
			<td>
				<a href="form_update.php?id=<?php echo $each['id'] ?>">Sửa</a>
			</td>
			<td>
				<a onclick="confirmDelete()" href="delete.php?id=<?php echo $each['id'] ?>">Xóa</a>
			</td>
		</tr>
	<?php endforeach ?>	
</table>
<div class="page">

	<?php for($i = 1; $i <= $pages; $i++){ ?>
		<a href="?page=<?php echo $i ?>&search=<?php echo $search ?>">
			<?php echo $i ?>
		</a>
	<?php } ?>

</div>

	<?php mysqli_close($connect); ?>
</body>
<script type="text/javascript">
	function confirmDelete(){
		if(confirm("Bạn có muốn xóa không?")){
			return true;
		}
		 return false;
	}
</script>
</html>