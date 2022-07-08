<?php
require 'db.php';

$adm = $_REQUEST['admi'];

if (isset($_POST['admi'])== true && empty($_POST['admi'])== false){

	if ($adm != '') {
		$query = mysqli_query($conn,"
			SELECT *
			FROM `issue`
			WHERE `issue`.`adm` = '$adm' and status = 'pending'
			");
		$row = mysqli_num_rows($query);
		if ($row >= 1) {
			echo '**WARNING! Already taken '.$row. ' book(s)'."\r\n";


			while($row = mysqli_fetch_array($query)) 
			{

				echo ("___");
				echo ($row['title']."\r\n"." on ");
				echo ($row['date']."\r\n");
				echo ("___");
				
				
			}

		}
	}
	else{
		echo "Enter the admission number";
	}
}

?>