<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="sweetalert.min.js"></script>
</head>
<body>



<?php
include_once 'db.php';	 
	
	 $adm = $_REQUEST['adm'];
$sql1 ="UPDATE student
SET view = 0
WHERE adm = '$adm'";		

	  if (mysqli_query($conn, $sql1)) {
	  	?>
		<script type="text/javascript">
			swal({
				title: "Student Restored!",
				icon: "success",
			}).then(function() {
				window.location = "t_viewDelStudents.php";

			});

		</script>
		<?php

	} else {
		?>
		<script type="text/javascript">
			swal({
				title: "Failed to restore student!",
				icon: "error",
			}).then(function() {
				window.location = "t_viewDelStudent.php";

			});

		</script>
		<?php
	}
	?>

</body>
</html>