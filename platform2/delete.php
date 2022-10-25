<html>
<?php
	include('connection.php');
	include('isLogin.php');

	if(isset($_GET['_id'])){

			//read and insert old record in 'received' collection
			$query = new MongoDB\Driver\Query( ["_id" => new MongoDB\BSON\ObjectID($_GET['_id'])] );
			$cursor = $manager->executeQuery("siveq.surplus", $query);
			foreach($cursor as $document){

				echo "Starting select...<br>";

			if($document->onp == $_SESSION['user']
		  	|| $_SESSION['user']=="admin"){
		  		
					$bulkC = new MongoDB\Driver\BulkWrite(['ordered' => false]);
					$bulkC->insert([
						'description'=>$document->description,
						'gtin'=>$document->gtin,
						'quantity'=>$document->quantity,
						'expiry_date'=>$document->expiry_date,
						'cat'=>$document->cat,
						'TMC'=>$document->TMC,
						'distributor_id'=>$document->distributor_id,
						'onp'=>$document->onp,
						'receive_date'=>date("Y-m-d H:i:s")
						]);

					echo "Executing write...<br>";

					$result = $manager->executeBulkWrite('siveq.collected', $bulkC, $writeConcern);

					echo "Executing delete...<br>";

					$bulk = new MongoDB\Driver\BulkWrite;
					$bulk->delete(['_id' => new MongoDB\BSON\ObjectID($_GET['_id'])], ['limit' => 1]);
					$cursor = $manager->executeBulkWrite("siveq.surplus", $bulk);
					echo "Moved succesfully<br>";

				} else echo "Permission Denied";	
			}
	} else echo "Parameters not initialized2";
?>
</html>