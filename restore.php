<?php
include_once "config.php";

if(!$connection){
    throw new Exception("Not Connected<br>");
}

$restore = $_GET['restoreId']??'';
if($restore){
    $query = "UPDATE user SET del_status=0 WHERE id='$restore'";
    $insert = mysqli_query($connection, $query);
    $status = "Seccessfully Restored";
    header("location:data.php?status={$status}");
}
?>