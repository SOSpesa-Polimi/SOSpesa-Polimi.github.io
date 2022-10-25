<!DOCTYPE html>
<html>
<head>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php   include('isLogin.php'); ?>

<div class="d-flex" id="wrapper">
  <?php include('header_new.php'); ?> 
  <div id="container-fluid" class="col-5">
	  <h2 style="color:black;">Change Password</h2>
    <div class="bg-light text-dark">

      <form class="form-inline" action="password.php" method="post">

  <div class="form-group mb-2">
    <label for="email" class="sr-only">Email</label>
    <input type="text" readonly name="email" class="form-control-plaintext" id="email" value="<?php echo $_SESSION['email']; ?>">
  </div>

  <div class="form-group mx-sm-3 mb-2">
    <label for="password" class="sr-only">New Password</label>
    <input type="password" class="form-control" name="password" id="password"  required placeholder="New Password">
  </div>
  <button type="submit" name="submit" class="btn btn-primary mb-2" onclick="myFunction()">Change Password</button>
</form>
</div>
<?php
include('connection.php');

  if(isset($_POST['submit']))
  {
    if(isset($_POST['password']))
    {
      $email=$_SESSION['email'];
      $pass=$_POST['password']; 
      $bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
      $bulk->update(['email'=>strtolower($email)],    ['$set' => ['password'=>md5($pass)]]);
      
      try {
      $result = $manager->executeBulkWrite('siveq.login', $bulk);
       echo "<br><div class='alert alert-success' role='alert'>Password Changed!</div>";  
        } 
      catch (MongoDB\Driver\Exception\BulkWriteException $e) {    echo "Password Change Error";}
    } else echo"Try Again";
}
?>

	</div>

</div>
</div>
<!--Body Area-->
</body>
</html>