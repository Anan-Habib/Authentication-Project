<?php
session_start();
include_once"config.php";

$id= $_SESSION['id'];
if(!$id){
    header("location:login.php");
    return;
}
$querylog= "SELECT * FROM user WHERE id=$id";
$logedinfo = mysqli_query($connection, $querylog);
$userloged= mysqli_fetch_assoc($logedinfo);
if ($userloged) {
    $email= $userloged['email'];
} else {
    echo "No record found.";
}

$query= "SELECT * FROM user";
$info = mysqli_query($connection, $query);
$status = $_GET['status']??'';
echo $status;
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body class="body">
        <div class="log">
            <div class="userloged"><h4>User: <?php if($userloged){ echo $email; }else{echo 'No user loged in';}?></h4></div>
            <button><a href="logout.php">Logout</a></button>
        </div>
        <table class="datatable">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php while($input = mysqli_fetch_assoc($info)) { ?>
            <tr>
                <td><?php echo $input['id']?></td>
                <td><?php echo $input['email']?></td>
                <td><a href= "edit.php?editId= <?php echo $input['id']?>" class="edit-btn">Edit</a></td>
                <td><a href= "delete.php?deleteId= <?php echo $input['id']?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
    </body>