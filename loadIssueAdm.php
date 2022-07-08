<?php
require 'db.php';

$admi = $_REQUEST['admi'];


if (isset($_POST['admi'])== true && empty($_POST['admi'])== false){

	$query = mysqli_query($conn,"
		SELECT `student`.name 
		FROM `student`
		WHERE `student`.`adm` = '$admi' and view = 0 
		");
		while($row = mysqli_fetch_assoc($query)) {
   $title = $row['name'];
  echo $title;
}
}
?>