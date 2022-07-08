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
$sql = mysqli_query($conn,"SELECT * FROM issue WHERE adm = '$adm' and status = 'pending'");
if(mysqli_num_rows($sql) <= 0){

$sql1 ="UPDATE student
SET view = 1
WHERE adm = '$adm'";		
if (mysqli_query($conn, $sql1)) {
?>
		<script type="text/javascript">
			swal({
				title: "Student removed!",
				icon: "success",
			}).then(function() {
				window.location = "t_selectbatch.php";

			});

		</script>
		<?php

	}
}else {
		?>
		<script type="text/javascript">
			swal({
				title: "Failed to remove student! Book is issued to this student and not yet returned",
				icon: "error",
			}).then(function() {
				window.location = "t_selectbatch.php";

			});

		</script>
		<?php
	}
	?>

</body>
</html>