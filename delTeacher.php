<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="sweetalert.min.js"></script>
</head>
<body>


<?php
include_once 'db.php';
$t_id = $_REQUEST['t_id'];
$sql1 ="UPDATE teacher
SET view = 1
WHERE t_id = '$t_id'";		
if (mysqli_query($conn, $sql1)) {
?>
		<script type="text/javascript">
			swal({
				title: "Teacher removed!",
				icon: "success",
			}).then(function() {
				window.location = "teacher.php";

			});

		</script>
		<?php

	}
else {
		?>
		<script type="text/javascript">
			swal({
				title: "Failed to remove teacher!",
				icon: "error",
			}).then(function() {
				window.location = "teacher.php";

			});

		</script>
		<?php
	}
	?>

</body>
</html>