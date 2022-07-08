<?php
session_start();
if(isset($_SESSION["sess_user"])){
	include_once 'db.php';
	?>

	<?php
	$t_id = $_REQUEST['t_id'];
	$sql = "select * from teacher where t_id = '$t_id'";
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
				<a href="home.php"  style="text-decoration: none;
				color: #808080; float: right;" title="Home">
				<i class="fas fa-home"></i>
			</a>
			<h1>Edit Teacher Details</h1>
			<div class="input-data">
				<input type="hidden" required name="t_id"  value="<?php echo $fetchRow['t_id']?>" readonly>
				<div class="underline"></div>

			</div><br>
			<div class="input-data">
				<input type="text" required name="t_name"  value="<?php echo $fetchRow['t_name']?>" id="username" onkeydown="preventNumberInput(event)">
				<div class="underline"></div>
				<label>Name</label>
			</div><br>

			<div class="input-data">
				<input type="text" required name="t_email" value="<?php echo $fetchRow['t_email']?>">
				<div class="underline"></div>
				<label>Email</label>
			</div><br>
			<div class="input-data">
				<input type="num" required name="t_phn" value="<?php echo $fetchRow['t_phn']?>">
				<div class="underline"></div>
				<label>Mobile number</label>
			</div><br>
			<div class="input-data">
				<input type="text" required name="t_pass" value="<?php echo $fetchRow['t_pass']?>">
				<div class="underline"></div>
				<label>Password</label>
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
	header("Location: login.php");

}
?>



<?php


if(isset($_POST['save']))
{	 
	$t_id = $_POST['t_id'];
	$t_name = $_POST['t_name'];
	$t_email = $_POST['t_email'];
	$t_pass = $_POST['t_pass'];
	$t_phn = $_POST['t_phn'];


	$sql ="UPDATE teacher
	SET t_name = '$t_name',t_email= '$t_email', t_pass = '$t_pass', t_phn = '$t_phn'
	WHERE t_id = '$t_id'";

	if (mysqli_query($conn, $sql)) {

		?>
		<script type="text/javascript">
			swal({
				title: "Updated!",
				icon: "success",
			}).then(function() {
				window.location = "teacher.php";
			});
		</script>
		<?php

	} 
}
?>