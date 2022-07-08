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
	$sql = "SELECT * FROM issue where ubin = '$ubin' and status = 'pending'";
	$fetch = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($fetch);

	if($row == ''){
		$sql1 ="UPDATE book
		SET view = 1
		WHERE ubin = '$ubin'";		
		if (mysqli_query($conn, $sql1)) {
			?>

			<script type="text/javascript">
				swal({
					title: "Book Removed!",
					icon: "success",
				}).then(function() {
					window.location = "t_allBook.php";

				});

			</script>
			<?php
		} else {

			echo "Error: " . $sql1 . "
			" . mysqli_error($conn);
		}
	}
	else{
		?>

		<script type="text/javascript">
			swal({
				title: "The book is currently issued and cannot be deleted!",
				icon: "error",
			}).then(function() {
				window.location = "t_allBook.php";

			});

		</script>
		<?php
	}
	?>
</body>
</html>