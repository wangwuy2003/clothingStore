<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
		}
		body{
			box-sizing: border-box;
			width: 100%;
			box-sizing: border-box;
		}
	</style>
</head>
<body>
	<?php 
		session_start();
		if(!isset($_SESSION['id'])){
			header('location:log/sign_in.php');
		}
		include 'menu.php';
		include 'side_bar.php';
	?>
	<br>

</body>
</html>