<?php
include_once 'db.php';
$t_id = $_REQUEST['t_id'];

$sql1 ="UPDATE teacher
SET view = 1
WHERE t_id = '$t_id'";		
if (mysqli_query($conn, $sql1)) {
	echo "<script type='text/javascript'>alert('Teacher removed!')</script>";
	header( "refresh:0;url=teacher.php" );


}
} 
else{
	echo "<script type='text/javascript'>alert('Failed to remove teacher!')</script>";
	header( "refresh:0;url=teacher.php" );
}

?>