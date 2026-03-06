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
    $id=$userloged['id'];
    $admin=$userloged['status'];
} else {
    echo "No record found.";
}

$query = "SELECT * FROM user WHERE id != $id";
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
            <div class="userloged">
                <h4 <?php if($admin==1){ ?> style= "color: red" <?php } ?>><?php echo (($admin == 1) ? 'Admin: ' : 'User: '). $email;?></h4>
            </div>
            <div class="databtn">
                <button class="btn"><a href= "edit.php?editId= <?php if($userloged){echo $userloged['id'];}?>">Edit</a></button>
                <button class="btn"><a href="logout.php">Logout</a></button>
            </div>
        </div>
        <table class="datatable">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <?php if($admin == 1){?>
                <th>Edit</th>
                <th>Delete</th>
                <?php } ?>
            </tr>
            <?php while($input = mysqli_fetch_assoc($info)) { ?>
            <tr>
                <td><?php echo $input['id']?></td>
                <td><?php echo $input['email']?></td>
                <?php if($admin == 1){?>
                <td><a href= "edit.php?editId= <?php echo $input['id']?>" class="edit-btn">Edit</a></td>
                <td><a href= "delete.php?deleteId= <?php echo $input['id']?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a></td>
                <?php } ?>
            </tr>
            <?php } ?>
        </table>
    </body>