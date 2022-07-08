<?php
require 'db.php';

$ubin = $_REQUEST['ubin'];
if (isset($_POST['ubin'])== true && empty($_POST['ubin'])== false){

	$query = mysqli_query($conn,"
		SELECT `book`.title 
		FROM `book`
		WHERE `book`.`ubin` = '$ubin' and `book`.`status` = 'Available' and `book`.`view` = 0
		");
	while($row = mysqli_fetch_assoc($query)) {
   $title = $row['title'];
   echo $title;
}
}
?>