<?php
session_start();
if(isset($_SESSION["sess_user"])){
 include_once 'db.php';
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Add Book</title>
	<link rel="stylesheet" type="text/css" href="regcss.css">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<script src="sweetalert.min.js"></script>
</head>
<body>
	<form action="" method="post" name="myForm" onsubmit="return checkInp()">
		<div class="wrapper">
			<a href="home.php"  style="text-decoration: none;
			color: #808080;float: right;" title="Home">
			<i class="fas fa-home"></i>
		</a>
		<h1>A D D</h1>
		<div class="input-data">
			<input type="num" name="ubin" required>
			<div class="underline"></div>
			<label>UBIN</label>
		</div><br>
		<div class="input-data">
			<input type="text" required name="title">
			<div class="underline"></div>
			<label>Title</label>
		</div><br>

		<div class="input-data">
			<input type="text" required name="author" id="text_field" onkeydown="preventNumberInput(event)">
			<div class="underline"></div>
			<label>Author</label>
		</div><br>

		<div class="input-data">
			<input type="text" required name="publisher">
			<div class="underline"></div>
			<label>Publisher</label>
		</div><br>

		<div class="input-data">
			<input type="text" required name="category">
			<div class="underline"></div>
			<label>Category</label>
		</div><br>

		<div class="input-data">
			<input type="num" required name="price" onkeypress='return restrictAlphabets(event)'>
			<div class="underline"></div>
			<label>Price</label>
		</div><br>

		<div class="input-data">
			<input type="text" required name="don_by" onkeydown="preventNumberInput(event)" id="text_field">
			<div class="underline"></div>
			<label>Donated by</label>
		</div><br>


		<div class="input-data">
			<input type="text" required name="don_batch">
			<div class="underline"></div>
			<label>Donated Batch</label>
		</div><br>


		<div class="input-data">
			<input type="date" required name="don_on" required>
			<div class="underline"></div>
			<label>Donated On</label>
		</div><br>


		<div class="inputfield">
			<input type="submit" name="save" value="submit" class="btn">	<input type="reset" name="cancel" value="cancel" class="btn" >
		</div>
	</div>
</div>
</form>
</body>
<script>
	function checkInp()
	{
		var x=document.forms["myForm"]["price"].value;
		if (isNaN(x)) 
		{
			alert("Price must be in numbers");
			return false;
		}
	}
</script>
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
  header("Location: login.php");

}
?>



<?php
include_once 'db.php';

if(isset($_POST["save"]))
	 {
	 $ubin = $_POST['ubin'];
	 $title = $_POST['title'];
	 $author = $_POST['author'];
     $publisher = $_POST['publisher'];
     $category = $_POST['category'];
     $price = $_POST['price'];
     $don_by = $_POST['don_by'];
     $don_batch = $_POST['don_batch'];
     $don_on = $_POST['don_on'];

if ($ubin != '' && $title !='' && $author !='' && $publisher !='' && $category !='' && $price !='' && $don_by !='' && $don_batch != '') {
	# code...
	 $sql = "INSERT INTO book(ubin,title,author,publisher,category,price,date,don_by,don_batch,don_on)values('$ubin','$title','$author','$publisher','$category','$price',NOW(),'$don_by','$don_batch','$don_on')";
	
 if (mysqli_query($conn, $sql)) {
?>

	<script type="text/javascript">
				swal({
					title: "Book Added!",
					icon: "success",
					}).then(function() {
			window.location = "allBook.php";
				});
			</script>
 		<?php

	 }
	 else{
	 	?>
	 	<script type="text/javascript">
				swal({
					title: "Failed to add book! UBIN already exist",
					icon: "error",
					}).then(function() {
			window.location = "addBook.php";
				});
			</script>

			<?php
	 }
	 }
	  else {
	  	?>
	
<script type="text/javascript">
				swal({
					title: "Failed to add book! Check the details before submitting. Duplication not allowed",
					icon: "error",
					}).then(function() {
			window.location = "home.php";
				});
			</script>


<?php
	 }
}
?>