<?php
session_start();
if(isset($_SESSION["sess_user1"])){
	include_once 'db.php';
	?>

	<?php 
	$sql = "select * from book where ubin = '$ubin'";
	$rs = mysqli_query($conn, $sql);
  //get row
	$fetchRow = mysqli_fetch_assoc($rs);
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Edit</title>
		<link rel="stylesheet" type="text/css" href="regcss.css">
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<script src="sweetalert.min.js"></script>
	</head>
	<body>
		<form action="" method="post" name="myForm" onsubmit="return checkInp()">
			<div class="wrapper">
				<a href="t_home.php"  style="text-decoration: none;
				color: #808080; float: right;" title="Home">
				<i class="fas fa-home"></i>
			</a>
			<h1>Edit Book Details</h1>
			<div class="input-data">
				<input type="hidden" required name="ubin"  value="<?php echo $fetchRow['ubin']?>" >
				<div class="underline"></div>

			</div><br>
			<div class="input-data">
				<input type="text" required name="title"  value="<?php echo $fetchRow['title']?>" id="username">
				<div class="underline"></div>
				<label>Title</label>
			</div><br>
			<div class="input-data">
				<input type="text" required name="author" value="<?php echo $fetchRow['author']?>" id="text_field" onkeydown="preventNumberInput(event)" >
				<div class="underline"></div>
				<label>Author</label>
			</div><br>

			<div class="input-data">
				<input type="text" required name="publisher" value="<?php echo $fetchRow['publisher']?>">
				<div class="underline"></div>
				<label>Publisher</label>
			</div><br>

			<div class="input-data">
				<input type="text" required name="category" value="<?php echo $fetchRow['category']?>">
				<div class="underline"></div>
				<label>Category</label>
			</div><br>

			<div class="input-data">
				<input type="num" required name="price" value="<?php echo $fetchRow['price']?>" onkeypress='return restrictAlphabets(event)'>
				<div class="underline"></div>
				<label>Price</label>
			</div><br>

			<div class="input-data">
				<input type="text" required name="don_by" value="<?php echo $fetchRow['don_by']?>" id="text_field" onkeydown="preventNumberInput(event)">
				<div class="underline"></div>
				<label>Donated by</label>
			</div><br>


			<div class="input-data">
				<input type="text" required name="don_batch" value="<?php echo $fetchRow['don_batch']?>">
				<div class="underline"></div>
				<label>Donated batch</label>
			</div><br>

			<div class="input-data">
				<input type="date" required name="don_on" value="<?php echo $fetchRow['don_on']?>">
				<div class="underline"></div>
				<label>Donated on</label>
			</div><br>

			
			<div class="inputfield">
				<input type="submit" name="save" value="submit" class="btn">	<input type="reset" name="cancel" value="cancel" class="btn" >
			</div>
		</div>
	</div>
</form>
</body>
<script type="text/javascript">
	/*code: 48-57 Numbers*/
	function restrictAlphabets(e){
		var x = e.which || e.keycode;
		if((x>=48 && x<=57))
			return true;
		else
			return false;
	}
</script>
<script type="text/javascript">
	/*code: 48-57 Numbers*/
	function preventNumberInput(e){
		var keyCode = (e.keyCode ? e.keyCode : e.which);
		if (keyCode > 47 && keyCode < 58 || keyCode > 95 && keyCode < 107 ){
			e.preventDefault();
		}
	}

	$(document).ready(function(){
		$('#text_field').keypress(function(e) {
			preventNumberInput(e);
		});
	})
</script>
</html>

<?php
}
else{
	header("Location: ../login.php");

}
?>


<?php
include_once 'db.php';

if(isset($_POST['save']))
{
	$ubin = $_POST['ubin'];	 
	$title = $_POST['title'];
	$author = $_POST['author'];
	$category = $_POST['category'];
	$publisher = $_POST['publisher'];
	$price = $_POST['price'];
	$don_by = $_POST['don_by'];
	$don_batch = $_POST['don_batch'];


	$sql ="UPDATE book
	SET title = '$title', author = '$author',publisher= '$publisher',category= '$category',price = '$price',don_by = '$don_by', don_batch = '$don_batch'
	WHERE ubin = '$ubin'";

	if (mysqli_query($conn, $sql)) {


		?>
		<script type="text/javascript">
			swal({
				title: "Updated!",
				icon: "success",
			}).then(function() {
				window.location = "allBook.php";
			});
		</script>
		<?php



	} else {
		?>
		<script type="text/javascript">
			swal({
				title: "Error in updating!",
				icon: "error",
			}).then(function() {
				window.location = "allBook.php";
			});
		</script>
		<?php

	}
}


?>