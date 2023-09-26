<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đây là giao diện admin</title>
	<style type="text/css">
		*{
			box-sizing: border-box;
		}

		body{
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}

		.all{
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.background{
			width: 100%;
			height: 100vh;
			background-image: url('../pictures/backgroundv2.jpg');
			background-size: cover;
		}

		.login{
			width: 450px;
			height: 300px;
			text-align: center;
			margin: auto;
			background: white;
			position: absolute;
			top: 250px;
			box-shadow: 0px 0px 6px 1px white; /*any color you want*/
		}

		input{
			width: 90%;
			padding: 10px;
			margin-bottom: 15px;
			margin-top: 5px;
		}

		button{
			padding: 16px;
			background: ;
			border: none;
			font-size: 15px;
			font-weight: bold;
		}

		button:hover{
			background: black;
			color: white;
		}

		span{
			font-size: 13px;
		}
	</style>
</head>
<body>
	<div class="background"></div>
	<div class="all">
		<div class="login">
			<h1>Welcome!</h1>
			<form method="post" action="process_login.php">
				<span style="float: left; margin-left: 20px">
					TÊN ĐĂNG NHẬP
					<span id="errorEmail" style="color: red"></span>
				</span>
				<input id="email"  type="text" name="email">
				<br>
				<span style="float: left; margin-left: 20px">
					MẬT KHẨU
					<span id="errorPassword" style="color: red"></span>
				</span>
				<input id="password" type="password" name="password">
				<br>
				<button type="submit" onclick="return check()">Đăng nhập</button>
			</form>
		</div>
	</div>
</body>
<script type="text/javascript">
	function check(){
		let isError = false;

		//email
		let email = document.getElementById('email').value;
		if(!email){
			document.getElementById('errorEmail').innerHTML = "Vui lòng nhập email";
			isError = true;
		}
		else {
			let regex = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
			if(regex.test(email) == false){
				document.getElementById('errorEmail').innerHTML = "Sai email. Vui lòng nhập lại!";
				isError = true;
			} else {
				document.getElementById('errorEmail').innerHTML = "";
			}
		}


		//password
		let password = document.getElementById('password').value;
		if(password.length === 0){
			document.getElementById('errorPassword').innerHTML = "Vui lòng nhập mật khẩu";
			isError = true;
		} else {
			document.getElementById('errorPassword').innerHTML = "";
		}

		if(isError){
			return false;
		} else {
			return true;
		}
	}
</script>
</html>