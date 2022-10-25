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
    <link href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css" rel="stylesheet">
  <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
  <div id="container-fluid" class="col-10">

    <div class="bg-light text-dark">
      <table id="about" class="table table-bordered table-striped table-hover" border="1">
        <th colspan="2">About</th>
        <tr><td>Developers</td><td>Sachit & Astolfi</td></tr>
        <tr><td>Software</td><td>PHP7 & HTML5 & BOOTSTRAP4</td></tr>
        <tr><td>Version</td><td>ver 0.6.9</td></tr>
        <tr><td>Database</td><td>MongoDB</td></tr>-
      </table>
    </div>

  </div>
</div>
</div>
</body>
</html>