<?php
include_once"config.php";

$deleteId = $_GET['deleteId']?? '';
if($deleteId){
    $query = "DELETE FROM user WHERE id='$deleteId'";
    mysqli_query($connection, $query);
    $status = 'Account Deleted'; 
}
header("location:tem_acc.php?status={$status}");
?>