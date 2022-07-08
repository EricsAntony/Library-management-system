<?php

    $key=$_GET['key'];
    $array = array();
    $con=mysqli_connect("localhost","root","","lib");
    $query=mysqli_query($con, "select * from book where ubin LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['title'];
    }
    echo json_encode($array);
    mysqli_close($con);
?>