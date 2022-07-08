

<?php 
include_once 'db.php';
$ubin = $_REQUEST['ubin'];

  $sql = "select * from issue where ubin = '$ubin' and `issue`.`status` = 'Not returned'";
  $rs = mysqli_query($conn, $sql);
  $fetchRow = mysqli_fetch_assoc($rs);
  if($fetchRow != ''){
  $fetchDate = $fetchRow['date'];
  $date = strtotime($fetchDate);
  $currentDate = time();
  $day = $currentDate - $date;
  $day1 = floor($day/(60*60*24));
  
 echo $day1." day(s) since the book has been issued. \n";
 if ($day1 >= 14) {
 	echo "\n".floor($day1*1)."/- is the fine amount";
 	//echo floor($day1*10)." is the fine amount";
 }
}
else{

  echo "";
}
?>