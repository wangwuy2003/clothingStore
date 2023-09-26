<?php
	session_start();
	if(empty($_SESSION['level'])){
		header('location:../index.php');
	}
	include '../menu.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../notify.min.js">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="../notify.js"></script>
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
	<div class="main">
		<form method="post" action="process_insert.php" id="myForm">
			<br>
			<br>
			<br>
			<h2>Thêm nhà sản xuất</h2>
			<p>
				Tên
				<span id="errorName" style="color: red"></span>
			</p>
			<input id="name" type="text" name="name">
			<br>
			<p>
				Địa chỉ
				<span id="errorAddress" style="color: red"></span>
			</p>
			<textarea id="address" name="address"></textarea>
			<p>
				Số điện thoại
				<span id="errorPhone" style="color: red"></span>
			</p>
			<input id="phone" type="text" name="phone">
			<p>
				Ảnh
				<span id="errorImage" style="color: red"></span>
			</p>
			<input id="image" type="text" name="photo">
			<br>
			<br>
			<button type="submit" onclick="return check()">Thêm</button>
		</form>
	</div>
</body>
<script type="text/javascript">
	function check(){
		let isError = false;

		//name
		let name = document.getElementById('name').value;
		if(name.length === 0){
			document.getElementById('errorName').innerHTML = "Bạn phải nhập tên nhà sản xuất";
			isError = true;
		} else {
			document.getElementById('errorName').innerHTML = "";
		}

		//address
		let address = document.getElementById('address').value;
		if(address.length === 0){
			document.getElementById('errorAddress').innerHTML = "Bạn phải nhập địa chỉ nhà sản xuất";
			isError = true;
		} else {
			document.getElementById('errorAddress').innerHTML = "";
		}

		//phone
		let phone = document.getElementById('phone').value;
		if(phone.length === 0){
			document.getElementById('errorPhone').innerHTML = "Vui lòng nhập số điện thoại nhà sản xuất";
			isError = true;
		} else {
			document.getElementById('errorPhone').innerHTML = "";
		}

		//Image
		let image = document.getElementById('image').value;
		if(image.length === 0){
			document.getElementById('errorImage').innerHTML = "Vui lòng gửi ảnh nhà sản xuất";
			isError = true;
		} else {
			document.getElementById('errorImage').innerHTML = "";
		}

		if(isError){
			return false;
		} else {
			return true;
		}
	}

	$(document).ready(function() {
        // Intercept the form submission event
        $('#myForm').submit(function(event) {
            // Prevent the default form submission
            event.preventDefault();

            // Serialize the form data into a format suitable for AJAX
            var formData = $(this).serialize();

            // Send an AJAX request to the server
            $.ajax({
                type: 'POST', // Use POST or GET based on your form's method
                url: $(this).attr('action'), // Use the form's action attribute as the URL
                data: formData,
                success: function(response) {
                    // Handle the response from the server here
                    console.log(response);

                    // Display a success notification using notify.js
                    $.notify("Thêm thành công!", "success");

                    // You can update the page content without a full reload
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    console.error(error);
                    $.notify("Thêm thất bại!", "success");
                }
            });
            $('#myForm').reset();
        });
    });
	

</script>
</html>