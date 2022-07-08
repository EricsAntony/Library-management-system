<?php
session_start();
if(isset($_SESSION["sess_user"])){
 include_once 'db.php';
 ?>



 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Add Book</title>
   <link rel="stylesheet" type="text/css" href="regcss.css">
   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <script src="sweetalert.min.js"></script>
 </head>
 <body>
   <form enctype="multipart/form-data" method="post" role="form">
     <div class="wrapper">
       <a href="home.php"  style="text-decoration: none;
       color: #808080; float: right;" title="Home">
       <i class="fas fa-home"></i>
     </a>
     <h1>Add Book</h1><br>
     <label for="exampleInputFile">File Upload</label><br><br>
     <input type="file" name="file" id="file" size="150"><br><br>
     <p class="help-block">Only Excel/CSV File Import.</p><br><br><br><br>
     <h5 class="help-block">**Upload data in the following order(ubin,title,author,publisher,category,price,donated person,donated batch,donated on(yyyy-mm-dd)) without column headings</h5><br><br>

     <div class="inputfield">
      <input type="submit" name="submit" value="Upload" class="btn">	<input type="reset" name="cancel" value="cancel" class="btn" >
    </div><br><br>
  </form>

</script>

</html>

<?php
}
else{
  header("Location: login.php");

}
?>


<?php
if(isset($_POST["submit"]))
{

  $file = $_FILES['file']['tmp_name'];

  if ($file != '') {
   $handle = fopen($file, "r");
   $c = 0;
   while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
   {
    $ubin = $filesop[0];
    $title = $filesop[1];
    $author = $filesop[2];
    $publisher = $filesop[3];
    $price = $filesop[5];
    $category = $filesop[4];
    $don_by = $filesop[6];
    $don_batch = $filesop[7];
    $don_on = $filesop[8];
    $sql = "insert into book(ubin,title,author,publisher,category,price,date,don_by,don_batch,don_on) values ('$ubin','$title','$author','$publisher','$category','$price',NOW(),'$don_by','$don_batch','$don_on')";
    if(mysqli_query($conn,$sql)){
      $stmt = mysqli_prepare($conn,$sql);
      mysqli_stmt_execute($stmt);
      $c = $c + 1;
    }
  }
  if($sql){
   
    ?>
    <script type="text/javascript">
      swal({
        title: "Book added!",
        icon: "success",
      }).then(function() {
        window.location = "allBook.php";
      });
    </script>
    <?php
    
  } 
  else
  {
   
    ?>
    <script type="text/javascript">
      swal({
        title: "Failed to add book!",
        icon: "error",
      }).then(function() {
        window.location = "addBookE.php";
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
      window.location = "addBookE.php";
    });
  </script>
  <?php
}

}
?>