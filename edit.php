<?php
include "config.php";

$editId = $_GET['editId'];
$query = "SELECT * FROM user WHERE id='$editId' ";
$data = mysqli_query($connection, $query);
$editrow = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<link rel="stylesheet" href="style.css" />
<body>
    <?php if (mysqli_num_rows($data) > 0) { ?>
        <form action="task.php?editId=<?php echo $editId ?>" method="post">
            <label for="email"><b>New Email</b></label>
            <input type="text" value="<?php echo $editrow['email']?>" name="email" id="email" required>
            <input type="hidden" value="edit" name="action">
            <button type="submit" class="updatebtn">Update</button>
        </form>
    <?php } ?>
</body>
</html>