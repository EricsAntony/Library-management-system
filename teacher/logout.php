<?php
session_start();
unset($_SESSION['sess_user1']);
session_destroy();
header("Location: ../main.php");
?>

