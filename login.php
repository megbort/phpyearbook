<?php  
  //Start the Session
  session_start();
  require('db.php');

  // Checks if form is submitted
  if (isset($_POST['username']) and isset($_POST['password'])) {

    // get the username and password 
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']); // omitting hashing for this example

      // SQL query
      $query = "SELECT * FROM `users` WHERE ";
      $query .= "username='$username'";
      $query .= " AND password='$password'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
      $count = mysqli_num_rows($result);

    // if username and password are correct
    if($count == 1) {
      // log them in
      $_SESSION['username'] = $username;
      header('location: edit.php');
    }else{
      // warning flag for invalid credentials
      $fmsg = "Invalid Login Credentials.";
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Yearbook Login Page - Megan Krenbrink</title>
  <link rel="stylesheet" href="styles/reset.css">
  <link rel="stylesheet" href="styles/main.css">
</head>
  <body>
    <div class="container">
      <form class="form-login" method="POST">
        <h2>Yearbook Login Page</h2>
        <div class="input-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required>  
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <?php if(isset($fmsg)){ ?><div class="alert" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
            <button class="btn btn-lg btn-info btn-block" type="submit">Login</button>
            <a href="index.php" style="padding-left:10px;">back to yearbook</a>
        </div>
      </form>
    </div>
  </body>
</html>