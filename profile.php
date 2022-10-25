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
  <div id="container-fluid" class="col-10">
	  
    <h2 style="color:black;">Profile Page</h2>
			  <div class="bg-light text-dark">
        <table class="table table-bordered table-striped table-hover" border="1">
		 		<th colspan="2">Profile</th>
		 		<tr><td>Name</td><td><?php echo $_SESSION['user']; ?></td></tr>
			 	<tr><td>Telephone</td><td><?php echo $_SESSION['telephone']; ?></td></tr>
		 		<tr><td>Email</td><td><?php echo $_SESSION['email']; ?></td></tr>
				<tr><td>Address</td><td><?php echo $_SESSION['address']; ?></td></tr>
			</table>
    </div>
    </div>
	</div>

</div>
</div>

<!--Body Area-->
</body>
</html>