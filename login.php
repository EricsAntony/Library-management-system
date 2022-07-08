
<!DOCTYPE html>
<head>
  <title>L I B R A R Y</title> 
  <link rel="stylesheet" type="text/css" href="styles.css">
  <script src="sweetalert.min.js"></script>
</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="#" rel="dofollow">DEPARTMENT LIBRARY</a></h1>
        </div>
        <div class="box-root padding-top--2 padding-bottom--5 flex-flex flex-justifyContent--center">
          <h4><a href="#" rel="dofollow">Dept. Of Computer Application</a></h4>
        </div>
        
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15 flex-flex flex-justifyContent--center">L O G I N</span>
              <form id="stripe-login" method="post" action="">
                <div class="field padding-bottom--24">
                  <label>Username</label>
                  <input type="text" name="username">
                </div>
                <div class="field padding-bottom--24">
                  <div class="grid--50-50">
                    <label for="password">Password</label>
                  </div>
                  <input type="password" name="password">
                </div>
                
                <div class="field padding-bottom--24">
                  <input type="submit" name="submit" value="Continue">

                </div>
                <a href="main.php" style="float: left;">Continue to Main menu </a>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</body>


</html>





<?php  
$servername='localhost';
$username='root';
$password='';
$dbname = "lib";
$conn=mysqli_connect($servername,$username,$password,"$dbname");

$user = "admin";
$pass = "1234";

$dbusername=$_POST['username'];
$dbpassword=$_POST['password'];

if($user == $dbusername && $pass == $dbpassword)
{
  session_start();
  $_SESSION['sess_user']=$user;
  header("Location:home.php");
}

else if (isset($_POST['username']) and isset($_POST['password'])){

  $query = "SELECT * FROM `teacher` WHERE t_email='$dbusername' and t_pass='$dbpassword' and view = 0";

  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  $fetchRow = mysqli_fetch_assoc($result);
  if($fetchRow != false){
    $status=$fetchRow['t_email'];
    $status2=$fetchRow['t_name'];
    $status1=$fetchRow['t_pass'];
    $count = mysqli_num_rows($result);

    if ($status == $dbusername and $status1 == $dbpassword){
      session_start();
      $_SESSION['sess_user1']=$status2;
      header("Location:teacher/t_home.php");

    }

  }
  else{
    ?>
    <script type="text/javascript">
      swal({
        title: "Access denied! Mismatch in login credentials",
        icon: "error",
      }).then(function() {
        window.location = "login.php";
      });
    </script>
    <?php
  }
}
?>