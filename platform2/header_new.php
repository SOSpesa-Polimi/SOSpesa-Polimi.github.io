  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<div class="bg-light border-right" id="sidebar-wrapper">
		<div class="sidebar-heading"><img src="Siveq_sm.png"><br></div>
		<div class="list-group list-group-flush">
			<a href="dashboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
		  	<a href="dist.php" class="list-group-item list-group-item-action bg-light">Distributor</a>
		  	<a href="npo.php" class="list-group-item list-group-item-action bg-light">NPO</a>
		  	<a href="surplus.php" class="list-group-item list-group-item-action bg-light">Surplus</a>
        <a href="received.php" class="list-group-item list-group-item-action bg-light">Received</a>
		  	<a href="about.php" class="list-group-item list-group-item-action bg-light">About</a>
		</div>
	</div>

<div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle"><span class="fa fa-bars"></span></button></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        	  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
             <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['user']; ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="profile.php">Profile</a>
                <div class="dropdown-divider"></div>
                <a href="password.php" class="list-group-item list-group-item-action bg-light">Change Password</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>