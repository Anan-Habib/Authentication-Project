<?php
session_start();
unset($SESSION['id']);
session_destroy();
header("location:login.php");
?>