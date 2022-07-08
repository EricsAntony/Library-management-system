
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
		echo "<script type='text/javascript'>alert('Invalid Login')</script>";
		header("Refresh:0; url=login.php");
	}
}
	?>