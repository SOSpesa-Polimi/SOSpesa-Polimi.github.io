<?php

	header('Content-Type: application/json');

	include('connection.php');
	include('isLogin.php');

		if(isset($_GET['_id'])){
		$bulk = new MongoDB\Driver\BulkWrite([]);
		$bulk->update(['_id' => new MongoDB\BSON\ObjectID($_GET['_id'])],
						['$set' => [
						'description'=>$_GET['description'],
						'gtin'=>$_GET['gtin'],
						'quantity'=>$_GET['quantity'],
						'expiry_date'=>$_GET['expiry_date'],
						'cat'=>$_GET['cat'],
						'TMC'=>$_GET['TMC'],
						'distributor_id'=>$_GET['distributor_id'],
						'onp'=>$_GET['onp']
						]]);

		$result = $manager->executeBulkWrite('siveq.surplus', $bulk);
		echo '{"result":"success"}';
	} else echo '{"result":"noID"}';
?>