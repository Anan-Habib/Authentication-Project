<?php
session_start();

include_once "config.php";

if(!$connection){
    throw new Exception("Not Connected<br>");
}
$action=$_POST["action"];
if($action == "register"){
    $email = $_POST['email'];
    $password = $_POST['psw'];
    if($email != "" && $password != ""){
        $query = "insert into user(email, password) values('$email', '$password')";
        $insert = mysqli_query($connection, $query);
        $status = "Seccessfully Inserted";
        header("location:data.php?status={$status}");
    }
}
else if($action == "edit"){
    $email = $_POST['email'];
    $editId = $_GET['editId'];
    if($email != "" && $editId != ""){
        $query = "UPDATE user SET email = '$email' WHERE id = $editId";
        $insert = mysqli_query($connection, $query);
        $status = "Seccessfully Updated";
        header("location:data.php?status={$status}");
    }
}
else if($action == 'login'){
    $email = $_POST['email'];
    $formpassword = $_POST['psw'];
    $query = "SELECT * FROM user WHERE email='$email'";
    $outcome = mysqli_query($connection, $query);
    if (mysqli_num_rows($outcome) > 0){
        $data = mysqli_fetch_assoc($outcome);
        $dbpassword = $data['password'];
        $userid= $data['id'];
        if($dbpassword === $formpassword){
            $_SESSION['id']=$userid;
            $status='Loged In Successfully';
            header("location:data.php?status={$status}");
        }
        else{
            $status='Given password or e-mail didnt match';
            header("location:login.php?status={$status}");
            }
    }else{
        $status='This e-mail is not registered';
        header("location:login.php?status={$status}");
    }
}
?>