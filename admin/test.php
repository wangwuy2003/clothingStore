<html>
<head>
<title>Untitled</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="notify.js"></script>
</head>

<body>
<input id="box" name="notif" type="button" value="Shoow notif" onclick="$('.elem-demo').notify('Hello Box', 'success');"/>
<button id="add">Thêm</button>
<div class="elem-demo">a Box</div>
</body>
<script type="text/javascript">
	$(document).ready(function() {

		$('#add').click(function() {
			$.notify("Thành công", "success");
		});
	});
</script>

</html>