
<?php
include_once 'db.php';

if(isset($_POST['save']))
{	 
	 $ubin = $_POST['ubin'];
	 $title = $_POST['title'];
	 $adm = $_POST['adm'];
     $name = $_POST['name'];

     if($title != '' && $adm != '' && $name !='' && $ubin !='') {

	 $sql = "INSERT INTO `return` (ubin,title,name,adm,ret_date)values('$ubin','$title','$name','$adm',NOW())";

	 $sql1 = "UPDATE book SET status='Available' WHERE ubin='$ubin'";

	  $sql2 = "UPDATE issue SET status='Returned' WHERE ubin='$ubin'";
	
 if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {

		
 		echo "<script type='text/javascript'>alert('Book Returned!')</script>";

header( "refresh:0;url=t_home.php" );

	 }
	 else{
	 	echo "<script type='text/javascript'>alert('Returning failed!')</script>";

header( "refresh:0;url=t_home.php" );
	 }
	 }
	 else{
	 	echo "<script type='text/javascript'>alert('Failed to return! Not enough details available.')</script>";

header( "refresh:0;url=t_home.php" );
	 }	



}
?>