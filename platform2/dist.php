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

  <h2 style="color:black;">NPO Page</h2>
<div class="bg-light text-dark">
  <table class="table table-bordered table-striped table-hover" border="1">
  <thead class="thead-light">
  <tr>
    <th>Name</th>
    <th>Company</th> 
    <th>Address</th>
    <th>Telphone</th>
  </tr>
</thead>
  <?php 
    
    include('connection.php');
        $query = new MongoDB\Driver\Query([]);

        $cursor = $manager->executeQuery("siveq.distributor", $query);

        foreach($cursor as $document) 
          {?>
  <tr>
    <td><?php echo $document->name; ?></td>
    <td><?php echo $document->company; ?></td>
    <td><?php echo $document->address; ?></td>
    <td><?php echo $document->telephone; ?></td>
    </tr>

  <?php } ?>
  
</table>
</div>
</div>
</div>
</div>
</body>
</html>