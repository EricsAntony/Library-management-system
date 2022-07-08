<?php
require 'db.php';

$ubin = $_REQUEST['ubin'];

if (isset($_POST['ubin'])== true && empty($_POST['ubin'])== false){

	$query = mysqli_query($conn,"
		SELECT DISTINCT `issue`.adm 
		FROM `issue`
		WHERE `issue`.`ubin` = '$ubin' and `issue`.`status` = 'pending'
		");
	while($row = mysqli_fetch_assoc($query)) {
   $title = $row['adm'];
   echo $title;
}
}
?>