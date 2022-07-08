<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "lib";
$conn=mysqli_connect($servername,$username,$password,"$dbname");

if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}


function numRows($query) {
        $result  = mysqli_query($this->conn, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
    
?>