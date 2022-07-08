<?php
session_start();
if(isset($_SESSION["sess_user1"])){
	include_once 'db.php';
	$who = $_SESSION['sess_user1'];
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Issue Book</title>
		<link rel="stylesheet" type="text/css" href="regcss.css">
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"> </script>
		<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
		<script src="sweetalert.min.js"></script>
	</head>
	<body>
		<form action="" method="post" name="myForm" onfocusout="return checkInp()">
			<div class="wrapper">
				<a href="t_home.php"  style="text-decoration: none;
				color: #808080; float: right;" title="Home">
				<i class="fas fa-home"></i>
			</a>
			<h1>I S S U E</h1>
			<div id="check-data"> </div>
			<input type="hidden" required name="who" value="<?php echo $who; ?>">
			<div class="input-data">
				<input type="text" required name="ubin" id="ubin" placeholder="UBIN">
				<div class="underline"></div>

			</div><br>
			<div class="input-data">
				<input type="num" required name="adm"  id="admi" placeholder="Student admission number" onkeypress='return restrictAlphabets(event)' maxlength="5">
				<div class="underline"></div>
			</div><br>

			<div class="input-data">
				<input type="text" name="title" id="ubin-data" readonly placeholder="Title" required>

			</div><br>

			<div class="input-data">
				<input type="text" required name="name" readonly placeholder="Student name" id="admi-data">

			</div><br>

			<div class="input-data">
				<input type="text" required name="batch" readonly placeholder="Batch" id="batch-data">

			</div><br>

			<div class="inputfield">
				<input type="submit" name="save" value="submit" class="btn">	<input type="reset" name="cancel" value="cancel" class="btn" >
			</div><br><br>
		</div>

	</form>
</body>

<script>
	document.getElementById('loading').style.display = 'none';
	document.getElementById('admnoerror').style.display = 'none';
	document.getElementById('ubinerror').style.display = 'none';
</script>
<script >
	$('input#ubin').on('focusout', function(){
		var ubin = $('input#ubin').val();
		if ($.trim(ubin) != ''){
			$.post('t_loadIssue.php', {ubin: ubin}, function(data){

				if (data) {
					$('#ubin-data').val(data);
				}
				else{
					alert('Invalid UBIN or book already issued!');
				}
			});

		}
	});
</script>


<script>
	function checkInp()
	{
		var x=document.forms["myForm"]["adm"].value;
		if (isNaN(x)) 
		{
			alert("Admission number should be in numbers");
		}
		else{
			$('input#admi').on('focusout', function(){
				var admi = $('input#admi').val();
				if ($.trim(admi) != ''){
					$.post('t_loadIssueCheck.php', {admi: admi}, function(data){
						$('div#check-data').text(data);
					});

				}
			});

			$('input#admi').on('focusout', function(){
				var admi = $('input#admi').val();
				if ($.trim(admi) != ''){
					$.post('t_loadIssueAdm.php', {admi: admi}, function(data){

						$('input#admi-data').val(data);

					});

				}
			});


			$('input#admi').on('focusout', function(){
				var admi = $('input#admi').val();
				if ($.trim(admi) != ''){
					$.post('t_loadIssueBatch.php', {admi: admi}, function(data){

						$('input#batch-data').val(data);

					});

				}
			});

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
	$adm = $_POST['adm'];
	$name = $_POST['name'];
	$batch = $_POST['batch'];
	$who = $_POST['who'];

	if ($ubin != '' && $title != '' && $adm != '' && $name != '') {

		$sql = "INSERT INTO issue(ubin,title,name,adm,date,batch,issue_by)values('$ubin','$title','$name','$adm',NOW(),'$batch','$who')";

		$sql1 = "UPDATE book SET status='Unavailable' WHERE ubin='$ubin'";

		if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)) {

			?>
			<script type="text/javascript">
				swal({
					title: "Book Issued!",
					icon: "success",
					}).then(function() {
			window.location = "t_home.php";
				});
			</script>
			<?php
 		

		}
	}
	else {

		?>
		<script type="text/javascript">
			swal({
				title: "Failed to issue book!",
				icon: "error",
				}).then(function() {
			window.location = "t_home.php";
			});
		</script>
		<?php
	}
}
?>