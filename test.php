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
			height: 400px;
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

		input[type="radio"]{
			display: inline-block;
			width: 20px;
			float: left;
			margin-left: 40px;
		}

		.remember{
			float: left;
			color: #BDBDBD;
		}
	</style>
</head>
<body>

	<div class="main">
		<h2>Sign In</h2>
		<form>
			<p>
				Email
				<span  id="errorEmail" style="color: red; padding-left: 4px"></span>
			</p>
			
			<input id="email" type="text" name="email" placeholder="Email">
			<br>
			<p>Password</p>
			<input type="password" name="password" placeholder="Password">
			<br>
			<br>
			<input type="radio" name="remember">
			<span class="remember">Ghi nhớ</span>
			<br>
			<br>
			<br>
			<button type="submit" onclick="return check()">Login</button>
		</form>
	</div>
</body>
<script type="text/javascript">
	function check(){
		let isError = false;

		//email
		let email = document.getElementById('email').value;
		if(email.length === 0){
			document.getElementById('errorEmail').innerHTML = "Vui lòng nhập email";
			isError = true;
		}
		else {
			let regex = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
			if(regex.test(email) == false){
				document.getElementById('errorEmail').innerHTML = "Sai email. Vui lòng nhập lại!";
				isError = false;
			} else {
				document.getElementById('errorEmail').innerHTML = "";
			}
		}

		//password
		let password = document.getElementById('')
		if(isError){
			console.log('0')
			return false;
		}
		else {
			console.log('1')
			return true;
		}
	}
</script>
</html>