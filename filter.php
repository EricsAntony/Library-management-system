    <?php
    include_once 'db.php';
    if(isset($_POST['submit'])){
      $category=$_POST['category'];
      //$batch = $_POST['batch'];
      $i = 0;

      if($category != 'all'){
        $query=mysqli_query($conn, "SELECT `issue`.`name`, `issue`.`title`, `issue`.`date`, `issue`.`ubin`, `issue`.`adm`, `issue`.`status`, `issue`.`batch`, `issue`.`issue_by` FROM `issue`,`student` where `student`.`view`= 0  and `student`.`adm` = `issue`.`adm`and `issue`.`status` = '$category' order by `date` desc") or die(mysqli_error());
        while($fetch=mysqli_fetch_array($query)){
         echo"<tr><td>".$fetch['ubin']."</td><td>".$fetch['title']."</td><td>".$fetch['adm']."</td><td>".$fetch['name']."</td><td>".$fetch['batch']."</td><td>".$fetch['date']."</td><td>".$fetch['issue_by']."</td><td>".$fetch['status']."</td></tr>";
       }
     }
     else{
      $query=mysqli_query($conn, "SELECT `issue`.`name`, `issue`.`title`, `issue`.`date`, `issue`.`ubin`, `issue`.`adm`, `issue`.`status`, `issue`.`batch`, `issue`.`issue_by` FROM `issue`,`student` where `student`.`view`= 0  and `student`.`adm` = `issue`.`adm` order by `date` desc") or die(mysqli_error());
      while($fetch=mysqli_fetch_array($query)){
       echo"<tr><td>".$fetch['ubin']."</td><td>".$fetch['title']."</td><td>".$fetch['adm']."</td><td>".$fetch['name']."</td><td>".$fetch['batch']."</td><td>".$fetch['date']."</td><td>".$fetch['issue_by']."</td><td>".$fetch['status']."</td></tr>";
     }
   }
 }else if(isset($_POST['reset'])== true && empty($_POST['reset'])== false){
  $query=mysqli_query($conn, "SELECT `issue`.`name`, `issue`.`title`, `issue`.`date`, `issue`.`ubin`, `issue`.`adm`, `issue`.`status`, `issue`.`batch`, `issue`.`issue_by` FROM `issue`,`student` where `student`.`view`= 0  and `student`.`adm` = `issue`.`adm` order by `date` desc") or die(mysqli_error());
  while($fetch=mysqli_fetch_array($query)){
   echo"<tr><td>".$fetch['ubin']."</td><td>".$fetch['title']."</td><td>".$fetch['adm']."</td><td>".$fetch['name']."</td><td>".$fetch['batch']."</td><td>".$fetch['date']."</td><td>".$fetch['issue_by']."</td><td>".$fetch['status']."</td></tr>";
 }
}else{
  $query=mysqli_query($conn, "SELECT `issue`.`name`, `issue`.`title`, `issue`.`date`, `issue`.`ubin`, `issue`.`adm`, `issue`.`status`, `issue`.`batch`, `issue`.`issue_by` FROM `issue`,`student` where `student`.`view`= 0 and  `student`.`adm` = `issue`.`adm` order by `date` desc") or die(mysqli_error());
  while($fetch=mysqli_fetch_array($query)){
   echo"<tr><td>".$fetch['ubin']."</td><td>".$fetch['title']."</td><td>".$fetch['adm']."</td><td>".$fetch['name']."</td><td>".$fetch['batch']."</td><td>".$fetch['date']."</td><td>".$fetch['issue_by']."</td><td>".$fetch['status']."</td></tr>";
 }
}
?>