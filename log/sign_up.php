<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		body{
			margin: 0;
			background: #242424;
		}

		.main{
			width: 450px;
			height: 600px;
			background: #303030;
			margin: auto;
			
		}

		h2{
			margin-top: 30px;
			padding-top: 20px;
			color: #3580BB;
			text-align: center;
		}

		form{
			text-align: center;
		}

		p{
			text-align: left;
			margin-left: 34px;
			color: #BDBDBD;
		}

		input{
			width: 80%;
			padding: 10px;
			border: 1px solid #303030;
		}

		input[type="text"], textarea {

			background-color : #4A4A4A; 	
		}
		input[type="password"], textarea {

			background-color : #4A4A4A; 	
		}

		button{
			width: 85%;
			padding: 10px;
			color: white;
			background: #37D6C4;
			border: none;
		}

		button:hover{
			background: #29A193;
		}
	</style>
</head>
<body>
	<?php 
		session_start();
		if(isset($_SESSION['error'])){
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		}
	?>
	<div class="main">
		<h2>Sign Up</h2>
		<form method="post" action="process_sign_up.php">
			<p>
				Name
				<span id="errorName" style="color: red"></span>
			</p>
			<input id="name" type="text" name="name" placeholder="Name">
			<p>
				Email
				<span id="errorEmail" style="color: red"></span>
			</p>
			<input id="email" type="text" name="email" placeholder="Email">
			<br>
			<p>
				Password
				<span id="errorPassword" style="color: red"></span>
			</p>
			<input id="password" type="password" name="password" placeholder="Password">
			<p>
				Phone
				<span id="errorPhone" style="color: red"></span>
			</p>
			<input id="phone" type="text" name="phone" placeholder="Phone">
			<p>
				Address
				<span id="errorAddress" style="color: red"></span>
			</p>
			<input id="address" type="text" name="address" placeholder="Address">
			<br>
			<br>
			<br>
			<button type="submit" onclick="return check()">Sign Up</button>
		</form>
	</div>
</body>
<script type="text/javascript">
	function check(){
		let isError = false;

		//name
		let name = document.getElementById('name').value;
		if(name.length === 0){
			document.getElementById('errorName').innerHTML = "Vui lòng nhập tên!";
			isError = true;
		} else {
			let regex_name = /^[A-Z][a-z]+(( [A-z][a-z]+)+)?$/;
			if(regex_name.test(name) == false){
				document.getElementById('errorName').innerHTML = "Tên không đúng định dạng, vui lòng nhập lại tên";
				isError = true;
			} else {
				document.getElementById('errorName').innerHTML = "";
			}
		}

		//email
		let email = document.getElementById('email').value;
		if(email.length === 0){
			document.getElementById('errorEmail').innerHTML = "Vui lòng nhập email!";
			isError = true;
		} else {
			let regex_name = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
			if(regex_name.test(email) == false){
				document.getElementById('errorEmail').innerHTML = "Email không đúng, vui lòng nhập lại";
				isError = true;
			} else {
				document.getElementById('errorEmail').innerHTML = "";
			}
		}

		//password
		let password = document.getElementById('password').value;
		if(password.length === 0){
			document.getElementById('errorPassword').innerHTML = "Vui lòng nhập mật khẩu!";
			isError = true;
		} else {
			document.getElementById('errorPassword').innerHTML = "";
		}

		//phone
		let phone = document.getElementById('phone').value;
		if(phone.length === 0){
			document.getElementById('errorPhone').innerHTML = "Vui lòng nhập số điện thoại";
		} else {
			document.getElementById('errorPhone').innerHTML = "";
		}

		//address
		let address = document.getElementById('address').value;
		if(address.length === 0){
			document.getElementById('errorAddress').innerHTML = "Vui lòng nhập địa chỉ!";
		} else {
			document.getElementById('errorAddress').innerHTML = "";
		}


		if(isError){
			return false;
		}
		else {
			return true;
		}
	}
</script>
</html>