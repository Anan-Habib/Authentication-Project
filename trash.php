<?php
include_once"config.php";


$query = "SELECT * FROM user WHERE del_status = 1";
$info = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body class="body">
        <?php if(mysqli_num_rows($info) == 0){ ?>
             <h4 class='tem_acc'>No Temporary Delete Account</h4>
        <?php }  ?>   
        <table class="datatable">
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Restore</th>
                <th>Delete</th>
            </tr>
            <?php while($input = mysqli_fetch_assoc($info)) { ?>
            <tr>
                <td><?php echo $input['id']?></td>
                <td><?php echo $input['email']?></td>
                <td><a href= "restore.php?restoreId= <?php echo $input['id']?>" class="edit-btn">Restore</a></td>
                <td><a href= "delete.php?deleteId= <?php echo $input['id']?>" class="delete-btn" onclick="return confirm('Are you sure?')">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
    </body>