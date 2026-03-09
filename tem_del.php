<?php
include_once"config.php";

$tempId = $_GET['tempId']?? '';
if($tempId){
    $query = "UPDATE user SET del_status=1 WHERE id='$tempId'";
    mysqli_query($connection, $query);
    $status = 'Account Deleted'; 
}
header("location:data.php?status={$status}");
?>