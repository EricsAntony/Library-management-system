<?php
session_start();
if(isset($_SESSION["sess_user1"])){
	include_once 'db.php';
	$ubin = $_REQUEST['ubin'];
	$result1 = mysqli_query($conn,"SELECT * FROM book where view=0 and ubin = '$ubin'");
	$row = mysqli_fetch_assoc($result1);
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<script src="sweetalert.min.js"></script>
	</head>
	<body>
	</body>
	<script type="text/javascript">
		swal({
			title: "<?php echo $row['title'];?> ",
			text: "Author: <?php echo $row['author'];?> \n Publisher: <?php echo $row['publisher'];?> \n Category: <?php echo $row['category'];?> \n Donated by: <?php echo $row['don_by'];?> \n Batch of donation: <?php echo $row['don_batch'];?> \n Price: <?php echo $row['price'];?> \n Status: <?php echo $row['status'];?>",
		}).then(function() {
			window.location = "t_allBook.php";

		});

	</script>

	</html>
	<?php
}
else{
	header("Location: ../login.php");

}
?>