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
<h3>Register Here...</h3>

<form action="register.php" method="post">
<table border="0">
	<th colspan="2" align="center"><center>Register</center></th>
	<tr>
		<td><b>Username<I/b></td>
		<td><input type="text" name="username" id="username" required></td>
	</tr>
	<tr>
		<td><b>Email Id</b></td>
		<td><input type="email" name="email" id="email" required></td>
	</tr>
	
	<tr>
		<td><b>Password</b></td>
		<td><input type="password" name="password" id="password"  required></td>
	</tr>

	<tr>
		<td><b>Confirm Password</b></td>
		<td><input type="password" name="cnfpassword" id="cnfpassword"  required></td>
	</tr>
	
	<tr>
		<td><b>Telephone</b></td>
		<td><input type="tel" name="telephone" id="telephone"  required></td>
	</tr>
	
	<tr>
		<td><b>Address</b></td>
		<td><input type="text" name="address" id="address"  required></td>
	</tr>
	

	<tr>
		<td colspan="2"><center><button type="submit" name="submit" onclick="myFunction()">Login</button></center></td>
		
	</tr>
	<tr>
		<td  id="demo" colspan="2">

<?php
include('connection.php');
// connect to mongodb
//echo "Connection to database successfully\n";
// select a database
/* Query for all the items in the collection */
	
	if(isset($_POST['submit']))
	{
	if($_POST['cnfpassword'] == $_POST['password']){	
	if(isset($_POST['email']) && isset($_POST['password']))
	{
		$email=$_POST['email'];
		$pass=$_POST['password'];	
		$username=$_POST['username'];
		$address=$_POST['address'];	

		if(!isset($_POST['telephone'])){$telephone=null;}
		else{$telephone=$_POST['telephone'];}	
		$existingUser=false;
		//echo $email;
		//echo $pass;
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
		$query = new MongoDB\Driver\Query( ['email'=>$email] );
		$cursor = $manager->executeQuery("siveq.login", $query);
		foreach($cursor as $document) {
		$count=1;
		}

		if($count > 0)
		{	echo "User Exists in System\n";
			$existingUser=true;
			//add statement to move to new page
		}
		else
		{
			echo nl2br("User Not exist in System\nCreating new User.\nTry Login");

		}

		if(!$existingUser)
		{

		$bulk = new MongoDB\Driver\BulkWrite(['ordered' => false]);
		$bulk->insert([
			'user'=>$username,
			'address'=>$address,
			'telephone'=>$telephone,
			'email'=>strtolower($email),
			'password'=>md5($pass)
		]);
		$writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);

		try {

		    $result = $manager->executeBulkWrite('siveq.login', $bulk, $writeConcern);
			} 
		catch (MongoDB\Driver\Exception\BulkWriteException $e) {
		    $result = $e->getWriteResult();

		    // Check if the write concern could not be fulfilled
		    if ($writeConcernError = $result->getWriteConcernError()) {
		        printf("%s (%d): %s\n",
		            $writeConcernError->getMessage(),
		            $writeConcernError->getCode(),
		            var_export($writeConcernError->getInfo(), true)
		        );
		    }
		}

		}


                }             	
            }else
            {
            	echo"Please type same password";
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