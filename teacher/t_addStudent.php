
<?php
session_start();
if(isset($_SESSION["sess_user1"])){
 include_once 'db.php';
 ?>


 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Add Student</title>
   <link rel="stylesheet" type="text/css" href="regcss.css">
   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <script src="sweetalert.min.js"></script>
 </head>
 <body>
   <form enctype="multipart/form-data" method="post" role="form">
     <div class="wrapper">
      <a href="t_home.php"  style="text-decoration: none;
      color: #808080; float: right;" title="Home">
      <i class="fas fa-home"></i>
    </a>
    <h1>Add Student</h1><br>
    <label for="exampleInputFile">File Upload</label><br><br>
    <input type="file" name="file" id="file" size="150"><br><br>
    <p class="help-block">Only Excel/CSV File Import.</p><br><br><br><br>
    <h5 class="help-block">**Upload data in the following order(admission number,student name,batch,email,mobile number) without headings</h5><br><br>

    <div class="inputfield">
      <input type="submit" name="submit" value="Upload" class="btn">	<input type="reset" name="cancel" value="cancel" class="btn" >
    </div><br><br>
  </form>
</script>

</html>

<?php
}
else{
  header("Location: ../login.php");

}
?>



<?php
if(isset($_POST["submit"]))
{

  $url='localhost';
  $username='root';
  $password='';
  $conn=mysqli_connect($url,$username,$password,"lib");
  if(!$conn){
    die('Could not Connect My Sql:' .mysqli_error());
  }
  $file = $_FILES['file']['tmp_name'];

  if ($file != '') {
   $handle = fopen($file, "r");
   $c = 0;
   while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
   {
    $adm = $filesop[0];
    $name = $filesop[1];
    $batch = $filesop[2];
    $email = $filesop[3];
    $phn = $filesop[4];

    $sql = "INSERT INTO student(adm,name,batch,email,phn) values ('$adm','$name','$batch','$email','$phn')";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_execute($stmt);
    $c = $c + 1;
  }
  if($sql){
   
      ?>
      <script type="text/javascript">
        swal({
          title: "Student added!",
          icon: "success",
          }).then(function() {
      window.location = "t_home.php";
        });
      </script>
      <?php
 } 
 else
 {
   
      ?>
      <script type="text/javascript">
        swal({
          title: "Failed to add student!",
          icon: "error",
          }).then(function() {
      window.location = "t_home.php";
        });
      </script>
      <?php
 }
}
else{
  
      ?>
      <script type="text/javascript">
        swal({
          title: "Please select file to upload!",
          icon: "error",
          }).then(function() {
      window.location = "t_addStudent.php";
        });
      </script>
      <?php
}

}
?>