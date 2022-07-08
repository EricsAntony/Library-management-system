<?php
session_start();
if(isset($_SESSION["sess_user"])){
	include_once 'db.php';
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>L I B R A R Y</title>
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
			<h1>R E G I S T E R</h1>
			<div class="input-data">
				<input type="num" name="t_id" required>
				<div class="underline"></div>
				<label>Teacher ID</label>
			</div><br>
			<div class="input-data">
				<input type="text" required name="t_name" onkeydown="preventNumberInput(event)">
				<div class="underline"></div>
				<label>Name</label>
			</div><br>


			<div class="input-data">
				<input type="email" required name="t_email">
				<div class="underline"></div>
				<label>Email</label>
			</div><br>

			<div class="input-data">
				<input type="num" required name="t_phn" pattern="[0-9]{10}" maxlength="10">
				<div class="underline"></div>
				<label>Mobile number</label>
			</div><br>

			<div class="input-data">
				<input type="Password" required name="t_pass">
				<div class="underline"></div>
				<label>Password</label>
			</div><br>
			<div class="input-data">
				<input type="Password" required name="t_passConfirm">
				<div class="underline"></div>
				<label>Confirm Password</label>
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

if(isset($_POST["save"]))
{
	$t_id = $_POST['t_id'];
	$t_name = $_POST['t_name'];
	$t_email = $_POST['t_email'];
	$t_pass = $_POST['t_pass'];
	$t_passConfirm = $_POST['t_passConfirm'];
	$t_phn = $_POST['t_phn'];

	if($t_pass == $t_passConfirm){
	# code...
		$sql = "INSERT INTO teacher(t_id, t_name, t_email, t_pass, t_date, t_phn)values('$t_id','$t_name','$t_email','$t_pass',NOW(), '$t_phn')";

		if (mysqli_query($conn, $sql)) {

			?>
			<script type="text/javascript">
				swal({
					title: "Teacher Registered!",
					icon: "success",
					}).then(function() {
			window.location = "teacher.php";
				});
			</script>
			<?php
			

		}
		else{
			?>
			<script type="text/javascript">
				swal({
					title: "Failed to register teacher!",
					icon: "error",
					}).then(function() {
			window.location = "regTeacher.php";
				});
			</script>
			<?php
		}
	}
	else{
		?>
		<script type="text/javascript">
			swal({
				title: "Password Mismatch!",
				icon: "error",
				button: "OK",
			});
		</script>
		<?php
	}
}
?>