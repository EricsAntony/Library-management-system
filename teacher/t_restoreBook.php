<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="sweetalert.min.js"></script>
</head>
<body>

	<?php
	include_once 'db.php';	 

	$ubin = $_REQUEST['ubin'];
	$sql1 ="UPDATE book
	SET view = 0
	WHERE ubin = '$ubin'";		

	if (mysqli_query($conn, $sql1)) {
		?>

		<script type="text/javascript">
			swal({
				title: "Book Restored!",
				icon: "success",
			}).then(function() {
				window.location = "t_viewDelBook.php";

			});

		</script>
		<?php

	} else {
		?>
		<script type="text/javascript">
			swal({
				title: "Failed to restore book!",
				icon: "error",
			}).then(function() {
				window.location = "t_viewDelBook.php";

			});

		</script>
		<?php
	}
	?>

</body>
</html>