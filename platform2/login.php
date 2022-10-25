<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="login.css">
</head>
<style type="text/css">
	body {
  font-family: "Lato", sans-serif;
}
</style>
<body>
<?php include('header.php'); ?>
<center>
	<br><br><br>
<h3>Login Here...</h3>

<form action="login.php" method="post">
<table border="0">
	<th colspan="2" align="center"><center>Login</center></th>
	<tr>
		<td><b>Email Id</b></td>
		<td><input type="email" name="email" id="email" required></td>
	</tr>
	<tr>
		<td><b>Password</b></td>
		<td><input type="password" name="password" id="password" required></td>
	</tr>
	<tr>
		<td colspan="2"><center><button type="submit" name="submit" onclick="myFunction()">Login</button></center></td>
		
	</tr>
	<tr>
		<td  id="demo" colspan="2">

<?php

// connect to mongodb
include('connection.php');
//echo "Connection to database successfully\n";
// select a database
/* Query for all the items in the collection */
	
	if(isset($_POST['submit']))
	{
	if(isset($_POST['email']) && isset($_POST['password']))
	{
		$email=$_POST['email'];
		$pass=$_POST['password'];	
		$existingUser=false;
		//echo $email;
		//e//cho $pass;
		//echo strtolower($email);
		//echo md5($pass);
		//Query to search
		//$query = new MongoDB\Driver\Query( ['emp_id'=>687458] );
		/* Query the "asteroids" collection of the "test" database */
		//$cursor = $manager->executeQuery("teamfund.users", $query);

		/* $cursor now contains an object that wraps around the result set. Use
		 * foreach() to iterate over all the result */
		/*
		foreach($cursor as $document) {
		    print_r($document);
		}
		*/
		$count=0;
		$query = new MongoDB\Driver\Query( ['email'=>strtolower($email),'password'=>md5($pass)] );
		$cursor = $manager->executeQuery("siveq.login", $query);

		foreach($cursor as $document) {
		$count+=1;
		}

		if($count > 0)
		{	
			session_start();
			//put all parameters of mongodb to session	
			$_SESSION['user']=$document->user;
			$_SESSION['telephone']=$document->telephone;
            $_SESSION['email']=$document->email;
            $_SESSION['address']=$document->address;
            $_SESSION['timestamp']=time();
            header("Location: dashboard.php");
		
			//add statement to move to new page
		}
		else
		{
			echo nl2br("Incorrect combination of email & password");

		}

                }             	
    	


}
?>
		</td>
	</tr>
</table>
</form>
</center>
</body>
</html>