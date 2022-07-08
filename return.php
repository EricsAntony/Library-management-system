<?php
session_start();
if(isset($_SESSION["sess_user"])){
	include_once 'db.php';
	$who = $_SESSION['sess_user'];
	?>


	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Return Book</title>
		<link rel="stylesheet" type="text/css" href="regcss.css">
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
		<script src="sweetalert.min.js"></script>
	</head>
	<body>
		<form action="" method="post">
			<div class="wrapper">
				<a href="home.php"  style="text-decoration: none;
				color: #808080; float: right;" title="Home">
				<i class="fas fa-home"></i>
			</a>
			<h1>R E T U R N</h1>
			<input type="hidden" required name="who" value="<?php echo $who; ?>" >
			<div class="input-data">
				<input type="text" required name="ubin" id="ubin" placeholder="UBIN" >

			</div><br>

			<div class="input-data">
				<input type="text" required name="title" id="ubin-data" readonly placeholder="Book Title">
			</div><br>

			<div class="input-data">
				<input type="text" required name="name" readonly placeholder="Student Name" id="name-data">
			</div><br>

			<div class="input-data">
				<input type="text" required name="" readonly placeholder="Date of issue" id="date-data">
			</div><br>

			<div class="input-data" id="day">

			</div><br>


			<input type="hidden" required name="adm" readonly id="adm-data">

			<div class="inputfield">
				<input type="submit" name="save" value="submit" class="btn">	<input type="reset" name="cancel" value="cancel" class="btn" >
			</div><br><br>
		</div>
	</div>

</form>
</body>
<script >
	$('input#ubin').on('focusout', function(){
		var ubin = $('input#ubin').val();
		if ($.trim(ubin) != ''){
			$.post('loadReturn.php', {ubin: ubin}, function(data){
				$('#ubin-data').val(data);

			});

		}
	});
</script>

<script >
	$('input#ubin').on('focusout', function(){
		var ubin = $('input#ubin').val();
		if ($.trim(ubin) != ''){
			$.post('loadReturnName.php', {ubin: ubin}, function(data){
				$('#name-data').val(data);

			});

		}
	});
</script>

<script >
	$('input#ubin').on('focusout', function(){
		var ubin = $('input#ubin').val();
		if ($.trim(ubin) != ''){
			$.post('loadReturnAdm.php', {ubin: ubin}, function(data){
				$('#adm-data').val(data);

			});

		}
	});
</script>

<script >
	$('input#ubin').on('focusout', function(){
		var ubin = $('input#ubin').val();
		if ($.trim(ubin) != ''){
			$.post('loadReturnDate.php', {ubin: ubin}, function(data){
				$('#date-data').val(data);

			});

		}
	});
</script>
<script >
	$('input#ubin').on('focusout', function(){
		var ubin = $('input#ubin').val();
		if ($.trim(ubin) != ''){
			$.post('fetchDate.php', {ubin: ubin}, function(data){
				$('#day').text(data);

			});

		}
	});
</script>



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
	$ubin = $_POST['ubin'];
	$title = $_POST['title'];
	$adm = $_POST['adm'];
	$name = $_POST['name'];
	$who = $_POST['who'];

	if($title != '' && $adm != '' && $name !='' && $ubin !='') {

		$sql = "INSERT INTO `return` (ubin,title,name,adm,ret_date,ret_by)values('$ubin','$title','$name','$adm',NOW(),'$who')";

		$sql1 = "UPDATE book SET status='Available' WHERE ubin='$ubin'";

		$sql2 = "UPDATE issue SET status='Returned' WHERE ubin='$ubin'";

		if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {


			?>
			<script type="text/javascript">

				swal({
					title: "Book Returned!",
					icon: "success",
				}).then(function() {
					window.location = "home.php";
				});
			</script>
			<?php

			

		}
		else{
			?>

			<script type="text/javascript">

				swal({
					title: "Return Failed!",
					icon: "Error",
				}).then(function() {
					window.location = "return.php";
				});
			</script>
			<?php
			
		}
	}
	else{
		?>

		<script type="text/javascript">

			swal({
				title: "Failed to return! Details missing.",
				icon: "Error",
			}).then(function() {
				window.location = "return.php";
			});
		</script>
		<?php
		
	}	



}
?>