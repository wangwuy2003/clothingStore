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
		html, body{
			overflow-x: hidden;
			max-width: 100%;
		}
		*{
			padding: 0;
		}

		body{
			margin: 0;
			padding-left: 10px;
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

		#products{
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 86%;
		}

		#products td, #products th{
			border: 1px solid #ddd;
			padding: 8px;
		}

		#products tr:nth-child(even){
			background-color: #f2f2f2;
		}

		#products th{
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: center;
			background-color: black;
			color: white;
		}

		#products td{
			text-align: center;
		}

		#products td a{
			text-decoration: none;
			color: black;
		}

		#products td a:hover{
			text-decoration: underline;
		}

		table{
			margin-left: 210px;
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

	$sql = "select products.*, manufacturers.name as manufacturer_name 
		from products join manufacturers on products.manufacturer_id = manufacturers.id where products.name like '%$search%'";
	$result = mysqli_query($connect, $sql);

	
	$sql_count_products = "select count(*) from products join manufacturers on products.manufacturer_id = manufacturers.id where products.name like '%$search%'"; //sql so san pham
	$array_count_products = mysqli_query($connect, $sql_count_products); //mang so san pham
	$result_pages = mysqli_fetch_array($array_count_products); //ket qua so trang
	$count_products = $result_pages['count(*)'];  //so san pham

	$count_products_1_page = 10; //so san pham tren 1 trang

	$pages = ceil($count_products / $count_products_1_page); //so trang
	$skip = $count_products_1_page * ($page - 1); //bo qua
	
	$sql = "select products.*, manufacturers.name as manufacturer_name 
		from products join manufacturers on products.manufacturer_id = manufacturers.id where products.name like '%$search%' limit $count_products_1_page offset $skip";
	$result = mysqli_query($connect, $sql);
?>

<div style="margin-top: 10px; margin-bottom: 10px; margin-left: 210px; margin-top: 50px">
	<a class="add" href="form_insert.php">
		Thêm sản phẩm
	</a>
</div>
<table id="products" border="1" width=100%">
	<caption>
		<form>
			<input type="search" name="search" placeholder="Tìm kiếm theo tên,...." value="<?php echo $search ?>">
		</form>
	</caption>
	<tr>
		<th>Mã</th>
		<th>Tên</th>
		<th>Ảnh</th>
		<th>Giá</th>
		<th>Mô tả</th>
		<th>Tên nhà sản xuất</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	
		<?php foreach ($result as $each): ?>
			<tr>
				<td><?php echo $each['id'] ?></td>
				<td><?php echo $each['name'] ?></td>
				<td>
					<img height="100" src="./<?php echo $each['photo'] ?>">
				</td>
				<td><?php echo $each['price'] ?></td>
				<td><?php echo $each['description'] ?></td>
				<td><?php echo $each['manufacturer_name'] ?></td>
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