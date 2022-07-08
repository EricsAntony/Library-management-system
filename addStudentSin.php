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
		<title>Add Student</title>
		<link rel="stylesheet" type="text/css" href="regcss.css">
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="sweetalert.min.js"></script>
	</head>
	<body>
		<form action="" method="post" name="myForm" onsubmit="return checkInp()">
			<div class="wrapper">
				<a href="home.php"  style="text-decoration: none;
				color: #808080;  float: right;" title="Home">
				<i class="fas fa-home"></i>
			</a>
			<h1>Add Student</h1>
			<div class="input-data">
				<input type="num" required name="adm" maxlength="5">
				<div class="underline"></div>
				<label>Admission Number</label>
			</div><br>
			<div class="input-data">
				<input type="text" required name="name" id="text_field" onkeydown="preventNumberInput(event)">
				<div class="underline"></div>
				<label>Name</label>
			</div><br>

			<div class="input-data">
 Select Batch<select name="batch" id="year" class="box" style="
                   color: gray;
                   padding: 10px;
                   width: 250px;
                   height: 50px;
                  
                   font-size: 20px;
                   
                   -webkit-appearance: button;
                   outline: none;
                   float: right;"
                   >
                 </select>
			</div><br>

			<div class="input-data">
				<input type="email" required name="email">
				<div class="underline"></div>
				<label>email</label>
			</div><br>

			<div class="input-data">
				<input type="num" required name="phn" pattern="[0-9]{10}" maxlength="10">
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
<script>
	function checkInp()
	{
		var x=document.forms["myForm"]["adm"].value;
		if (isNaN(x)) 
		{
			alert("Admission number should be in numbers");
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

            <script>
              var year = 2020;
              var till = 2200;
              var options = "";
              for(var y=year; y<=till; y++){
                Y=y+3;
                options += "<option>"+ y+"</option>";
              }
              document.getElementById("year").innerHTML = options;
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

	$sql = "INSERT INTO student(adm,name,batch,email,phn)values('$adm','$name','$batch','$email','$phn')";
	
	if (mysqli_query($conn, $sql)) {
		?>
		<script type="text/javascript">
			swal({
				title: "Student Added!",
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
				title: "Error! Admission number already exists",
				icon: "error",
				}).then(function() {
			window.location = "home.php";
			});
		</script>
			<?php
		}



	}
	?>