<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		body{
/*			padding: 0;
			margin: 0;*/
			background-color: #adadad;
			font-family: Arial, sans-serif;
		}

		.count{
			width: 300px;
			height: 100px;
			background-color: #f5f5f5;
			margin-left: 240px;
			position: relative;
			border-radius: 10px;
		}

		.count p{
			font-size: 20px;
		}

		.vertical{
			width: 60%;
		  	position: absolute;
		  	top: 50%;
		  	left: 50%;
		  	transform: translate(-50%, -50%);
		}

		h2{
			margin-left: 240px;
			margin-top: 0;
		}
	</style>
</head>
<body>
	<?php 
		include '../menu.php';
		require '../connect.php';

		$sql = "select count(*) from orders";
		$result = mysqli_query($connect, $sql);
		$num = mysqli_fetch_array($result)['count(*)'];
	?>
	<br>
	<h2>Tổng quan</h2>
	<hr style="color: black">
	<br>
	<br>
	<div class="count">
		<div class="vertical">
			<p>Tổng đơn hàng: <?php echo $num ?></p>
		</div>
	</div>
</body>
</html>