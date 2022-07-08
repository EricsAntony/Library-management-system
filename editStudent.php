<?php
session_start();
if(isset($_SESSION["sess_user"])){
 include_once 'db.php';
  ?>

<?php
$adm = $_REQUEST['adm'] ;
$sql = "select * from student where adm = '$adm'";
$rs = mysqli_query($conn, $sql);
  //get row
$fetchRow = mysqli_fetch_assoc($rs);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Edit</title>
	<link rel="stylesheet" type="text/css" href="regcss.css">
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<script src="sweetalert.min.js"></script>
</head>
<body>
	<form action="" method="post">
		<div class="wrapper">
			<a href="home.php"  style="text-decoration: none;
			color: #808080; float: right;" title="Home">
			<i class="fas fa-home"></i>
		</a>
			<h1>Edit Details</h1>
			<div class="input-data">
				<input type="hidden" required name="adm"  value="<?php echo $fetchRow['adm']?>" placeholder="Admission number" pattern="[0-9]{5}" maxlength="5">
				<div class="underline"></div>
			</div><br>
			<div class="input-data">
				<input type="text" required name="name"  value="<?php echo $fetchRow['name']?>" id="text_field" onkeydown="preventNumberInput(event)">
				<div class="underline"></div>
				<label>Student Name</label>
			</div><br>
			<div class="input-data">
				<input type="num" required name="batch" value="<?php echo $fetchRow['batch']?>" id="username" maxlength="4" onkeypress='return restrictAlphabets(event)'>
				<label>Year of admission</label>
				<div class="underline"></div>
			</div><br>

			<div class="input-data">
				<input type="text" required name="email" value="<?php echo $fetchRow['email']?>">
				<div class="underline"></div>
				<label>email</label>
			</div><br>

			<div class="input-data">
				<input type="num" required name="phn" value="<?php echo $fetchRow['phn']?>" pattern="[0-9]{10}" maxlength="10">
				<div class="underline"></div>
				<label>Mobile number</label>
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
if(isset($_POST['save']))
{	 
	 $name = $_POST['name'];
	 $adm = $_POST['adm'];
	 $email = $_POST['email'];
     $batch = $_POST['batch'];
     $phn = $_POST['phn'];

	 $sql = "UPDATE student
SET name = '$name',email= '$email', batch = '$batch', phn = '$phn'
WHERE adm = '$adm'";
	
 if (mysqli_query($conn, $sql)) {

 		?>
			<script type="text/javascript">
				swal({
					title: "Updated!",
					icon: "success",
					}).then(function() {
			window.location = "selectbatch.php";
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
			window.location = "home.php";
				});
			</script>
			<?php
	 }
}
?>