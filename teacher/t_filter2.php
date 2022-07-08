    <?php
    include_once 'db.php';
    if(isset($_POST['submit'])){
      $category=$_POST['category'];
     // $batch = $_POST['batch'];
      $fdate = $_POST['fdate1'];
$ldate = $_POST['ldate1'];

      $i = 0;

      if($category != 'all'){
      $query=mysqli_query($conn, "SELECT `issue`.`name`, `issue`.`title`, `issue`.`date`, `issue`.`ubin`, `issue`.`adm`, `issue`.`status`, `issue`.`batch`, `issue`.`issue_by` FROM `issue`,`student` where `student`.`view`= 0 and `student`.`adm` = `issue`.`adm`and `issue`.`status` = '$category' ,`issue`.`date` between '$fdate' and '$ldate'") or die(mysqli_error());
      while($fetch=mysqli_fetch_array($query)){
         echo"<tr><td>".$fetch['ubin']."</td><td>".$fetch['adm']."</td><td>".$fetch['name']."</td><td>".$fetch['batch']."</td><td>".$fetch['title']."</td><td>".$fetch['date']."</td><td>".$fetch['issue_by']."</td><td>".$fetch['status']."</td></tr>";
     }
 }
 else{
  $query=mysqli_query($conn, "SELECT `issue`.`name`, `issue`.`title`, `issue`.`date`, `issue`.`ubin`, `issue`.`adm`, `issue`.`status`, `issue`.`batch`,`issue`.`issue_by` FROM `issue`,`student` where `student`.`view`= 0 and `student`.`adm` = `issue`.`adm` ,`issue`.`date` between '$fdate' and '$ldate'") or die(mysqli_error());
      while($fetch=mysqli_fetch_array($query)){
         echo"<tr><td>".$fetch['ubin']."</td><td>".$fetch['adm']."</td><td>".$fetch['name']."</td><td>".$fetch['batch']."</td><td>".$fetch['title']."</td><td>".$fetch['date']."</td><td>".$fetch['issue_by']."</td><td>".$fetch['status']."</td></tr>";
     }
 }
}else if(isset($_POST['reset'])== true && empty($_POST['reset'])== false){
  $query=mysqli_query($conn, "SELECT `issue`.`name`, `issue`.`title`, `issue`.`date`, `issue`.`ubin`, `issue`.`adm`, `issue`.`status`, `issue`.`batch`,`issue`.`issue_by` FROM `issue`,`student` where `student`.`view`= 0 and `student`.`adm` = `issue`.`adm`  ,`issue`.`date` between '$fdate' and '$ldate'") or die(mysqli_error());
  while($fetch=mysqli_fetch_array($query)){
     echo"<tr><td>".$fetch['ubin']."</td><td>".$fetch['adm']."</td><td>".$fetch['name']."</td><td>".$fetch['batch']."</td><td>".$fetch['title']."</td><td>".$fetch['date']."</td><td>".$fetch['issue_by']."</td><td>".$fetch['status']."</td></tr>";
 }
}else{
  $query=mysqli_query($conn, "SELECT `issue`.`name`, `issue`.`title`, `issue`.`date`, `issue`.`ubin`, `issue`.`adm`, `issue`.`status`, `issue`.`batch`,`issue`.`issue_by` FROM `issue`.`student` where `student`.`view`= 0 and `student`.`adm` = `issue`.`adm`  ,`issue`.`date` between '$fdate' and '$ldate'") or die(mysqli_error());
  while($fetch=mysqli_fetch_array($query)){
     echo"<tr><td>".$fetch['ubin']."</td><td>".$fetch['adm']."</td><td>".$fetch['name']."</td><td>".$fetch['batch']."</td><td>".$fetch['title']."</td><td>".$fetch['date']."</td><td>".$fetch['issue_by']."</td><td>".$fetch['status']."</td></tr>";
 }
}
?>