<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		*{
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}

		#all{
			width: 100%;
			height: 2200px;
/*			background: pink;*/
		}

		.top{
			width: 100%;
			height: 4%;
		}

		.main{
			width: 100%;
			height: 90%;
		}

		.bottom{
			width: 100%;
			height: 6%;		
		}
	</style>
</head>
<body>

<div id="all">
	<?php include 'menu.php' ?>
	<?php include 'product_detail.php' ?>
	<?php include 'footer.php' ?>
</div>
</body>
</html>