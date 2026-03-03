<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<link rel="stylesheet" href="style.css" />
<body>
<form action="task.php" method="post">
<div class="main">  
  <div class="registercontainer">
      <h1 class="heading">Admin Register</h1>


      <label for="email"><b>Email Adress</b></label>
      <input type="email" placeholder="Email:" name="email" id="email" class="inputfield" required>
      <br>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Password:" name="psw" id="psw" class="inputfield" required>
      <br>
      <p>Read our <a href="#" style="text-decoration:none">Terms & Privacy</a><br>Already have an account? <a href="login.php">Login</a></p>
      <input type="hidden" value="register" name="action">
      <input type="hidden" value="1" name="admin">
      <button type="submit" class="actionbtn">Register</button>
    </div>
  </div>
</form>
</body>
</html>