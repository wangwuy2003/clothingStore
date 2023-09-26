<?php  

session_start();
if(!isset($_SESSION['level'])){
	header('location:../index.php');
}
include '../menu.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="../notify.js"></script>
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
		require '../connect.php';
		$sql = "select * from manufacturers";
		$result = mysqli_query($connect, $sql);
	?>
	<div class="main">
		<br>
		<br>
		<br>
		<br>
		<form  id="myForm" method="post" action="process_insert.php" enctype="multipart/form-data">
			<h2 style="margin: 0">Thêm sản phẩm</h2>
			<p>
				Tên sản phẩm
				<span id="errorName" style="color: red"></span>	
			</p>
			<input id="name" type="text" name="name">
			<br>
			<p>
				Ảnh
				<span id="errorPhoto" style="color: red"></span>	
			</p>
			<input id="photo" type="file" name="photo">
			<br>
			<p>
				Giá
				<span id="errorPrice" style="color: red"></span>
			</p>
			<input id="price" type="number" name="price">
			<br>
			<p>
				Mô tả
				<span id="errorDescription" style="color: red"></span>
			</p>
			<textarea id="description" name="description"></textarea>
			<br>
			<p>Mã nhà sản xuất</p>
			<select name="manufacturer_id">
				<?php foreach ($result as $each): ?>
					<option value="<?php echo $each['id'] ?>">
						<?php echo $each['name'] ?>
					</option>
				<?php endforeach ?>
			</select>
			<br>
			<br>
			<button id="submitForm" type="submit" onclick="return check()">Thêm</button>
		</form>
	</div>
</body>
<script type="text/javascript">
	function check(){
		let isError = false;
		//name
		let name = document.getElementById('name').value;
		if(name.length === 0){
			document.getElementById('errorName').innerHTML = "Vui lòng nhập tên sản phẩm";
			isError = true;
		} else {
			document.getElementById('errorName').innerHTML = "";
		}

		//photo
		let photo = document.getElementById('photo').value;
		if(photo.length === 0){
			document.getElementById('errorPhoto').innerHTML = "Vui lòng tải ảnh sản phẩm";
			isError = true;
		} else {
			document.getElementById('errorPhoto').innerHTML = "";
		}

		//price
		let price = document.getElementById('price').value;
		if(price.length === 0){
			document.getElementById('errorPrice').innerHTML = "Vui lòng nhập giá sản phẩm";
			isError = true;
		} else if(price <= 0){
			document.getElementById('errorPrice').innerHTML = "Giá phải lớn hơn 0";
			isError = true;
		} else {
			document.getElementById('errorPrice').innerHTML = "";
		}

		//description
		let description = document.getElementById('description').value;
		if(description.length === 0){
			document.getElementById('errorDescription').innerHTML = "Vui lòng nhập mô tả sản phẩm";
			isError = true;
		} else {
			document.getElementById('errorDescription').innerHTML = "";
		}


		if(isError){
			return false;
		} else {
			return true;
		}
	}

	// $(document).ready(function() {
    //     // Intercept the form submission event
    //     $('#myForm').submit(function(event) {
    //         // Prevent the default form submission
    //         event.preventDefault();

    //         // Serialize the form data into a format suitable for AJAX
    //         var formData = $(this).serialize();

    //         // Send an AJAX request to the server
    //         $.ajax({
    //             type: 'POST', // Use POST or GET based on your form's method
    //             url: $(this).attr('action'), // Use the form's action attribute as the URL
    //             data: formData,
    //             success: function(response) {
    //                 // Handle the response from the server here
    //                 console.log(response);

    //                 // Display a success notification using notify.js
    //                 $.notify("Form submitted successfully!", "success");

    //                 // You can update the page content without a full reload
    //             },
    //             error: function(xhr, status, error) {
    //                 // Handle errors here
    //                 console.error(error);
    //             }
    //         });
    //         $('#myForm').reset();
    //     });
    // });
	
	// document.addEventListener("DOMContentLoaded", function() {
    //     document.getElementById("myForm").addEventListener("submit", function(event) {
    //         event.preventDefault();

    //         const formData = new FormData(this);

    //         fetch("process_insert.php", {
    //             method: "POST",
    //             body: formData
    //         })
    //         .then(response => response.text()) // Adjust as needed
    //         .then(data => {
    //             // Handle the server response here
    //             console.log(data);

    //             // Optionally, display a success message
    //             $.notify("Form submitted successfully!", "success");
    //         })
    //         .catch(error => {
    //             // Handle errors here
    //             console.error(error);
    //         });
    //     });
    // });
</script>
</html>