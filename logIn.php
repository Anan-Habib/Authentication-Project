<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<link rel="stylesheet" href="style.css" />
<body>
<form action="task.php" method="post">
  <div class="main">
    <div class="logincontainer">
      <h1 class="heading"> Login</h1>
       <p><?php 
       $status = $_GET['status']??'';
       if($status){
        echo $status;
       }
       ?></p>
      <label for="email"><b>Email Adress</b></label>
      <input type="email" placeholder="Email:" name="email" id="email" class="inputfield" required>
      <br>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Password:" name="psw" id="psw" class="inputfield" required>
      <p>Don't have an account? <a href="register.php">Register</a></p>
      <input type="hidden" value="login" name="action">
      <input type="hidden" value="1" name="admin">
      <button type="submit" class="actionbtn">Login</button>
    </div>
  </div>  
</form>
</body>
</html>