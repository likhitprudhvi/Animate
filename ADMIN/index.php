<?php 
session_start();

// Logout functionality
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: login.php'); // Fixed incorrect space in header location
    exit();
}

// Check if admin session is set
if (!isset($_SESSION['admin'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

$name = $_SESSION['admin'];

if ($name !== 'Likhit') {
    echo "<script type='text/javascript'>
        alert('You are not admin and you cannot access this page.');
        window.location.href = 'login.php';
    </script>";
    exit();
}
else { ?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'C:\xampp\htdocs\Animate\USER\database\db_connect.php'; ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="index.php" class="logo">
					Admin Dashboard
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					
					<form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<div class="input-group">
						
							<div class="input-group-append">
								
							</div>
						</div>
					</form>
					
						<li class="nav-item dropdown" style="list-style: none;">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="assets/img/profile.jpg" alt="user-img" width="36" class="img-circle"><span >XYZ</span></span> </a>
							<ul class="dropdown-menu dropdown-user" style="left: auto; right: 0; min-width: 220px;">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="assets/img/profile.jpg" alt="user"></div>
										<div class="u-text">
											<h4>XYZ</h4>
											<p class="text-muted">xyz@animate.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="index.php?logout=true"><i class="fa fa-power-off"></i> Logout</a>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="assets/img/profile.jpg">
						</div>
						<div class="info">
							<a class="" href="#collapseExample" aria-expanded="true">
								<span>
									XYZ
									<span class="">Administrator</span>
									<span class=""></span>
								</span>
							</a>
							<div class=""></div>

							
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item active">
							<a href="index.php"><i class="la la-dashboard"></i>Dashboard</a>
						</li>
						<li class="nav-item">
							<a href="forms-tables.php"><i class="la la-keyboard-o"></i>Forms & Tables</a>
						</li>
						<li class="nav-item">
							<a href="users.php"><i class="la la-users"></i>Users</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link" data-toggle="collapse" href="#collapseExample0"><i class="la la-home"></i>Index</a>
							<div class="clearfix"></div>
								<div class="collapse in" id="collapseExample0" aria-expanded="true">
									<ul>
										<li>
											<a href="index-form.php">
												<span class="link-collapse">index form</span>
											</a>
										</li>
										<li>
											<a href="index-table.php">
												<span class="link-collapse">index table</span>
											</a>
										</li>
									</ul>
								</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link" data-toggle="collapse" href="#collapseExample1"><i class="la la-book"></i>News</a>
							<div class="clearfix"></div>
								<div class="collapse in" id="collapseExample1" aria-expanded="true">
									<ul>
										<li>
											<a href="news-form.php">
												<span class="link-collapse">news form</span>
											</a>
										</li>
										<li>
											<a href="news-table.php">
												<span class="link-collapse">news table</span>
											</a>
										</li>
									</ul>
								</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link" data-toggle="collapse" href="#collapseExample2"><i class="la la-shopping-cart"></i>Shop</a>
	
								<div class="collapse in" id="collapseExample2" aria-expanded="true">
									<ul>
										<li>
											<a href="shop-form.php">
												<span class="link-collapse">shop form</span>
											</a>
										</li>
										<li>
											<a href="shop-table.php">
												<span class="link-collapse">shop table</span>
											</a>
										</li>
									</ul>
								</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<h4 class="page-title">Dashboard</h4>
						<div class="row">
							<div class="col-md-3">
								<div class="card card-stats card-warning">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-users"></i>
												</div>
											</div>
											<?php 
											$myusers = "SELECT COUNT(id) as total FROM userdata";
											$usercon = mysqli_query($conn,$myusers);
											$row = mysqli_fetch_assoc($usercon);
											$usercount = $row['total'] ?>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Visitors</p>
													<h4 class="card-title">100</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-stats card-success">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-bar-chart"></i>
												</div>
											</div>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Users</p>
													<h4 class="card-title"><?php echo $usercount ?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-stats card-danger">
									<div class="card-body">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-newspaper-o"></i>
												</div>
											</div>
											<?php 
											$news = "SELECT 
														(SELECT COUNT(id0) FROM shopform0) + 
														(SELECT COUNT(id1) FROM shopform1) + 
														(SELECT COUNT(id2) FROM shopform2) + 
														(SELECT COUNT(id3) FROM indexform3) + 
														(SELECT COUNT(id4) FROM indexform4) 
														AS totaln";
											$newscon = mysqli_query($conn,$news);
											$row = mysqli_fetch_assoc($newscon);
											$newscount = $row['totaln'] ?>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">News Items</p>
													<h4 class="card-title"><?php echo $newscount?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card card-stats card-primary">
									<div class="card-body ">
										<div class="row">
											<div class="col-5">
												<div class="icon-big text-center">
													<i class="la la-check-circle"></i>
												</div>
											</div>
											<?php 
											$shop = "SELECT  
														(SELECT COUNT(id) FROM newsform) + 
														(SELECT COUNT(id0) FROM indexform0) + 
														(SELECT COUNT(id1) FROM indexform1) + 
														(SELECT COUNT(id1) FROM indexform1) 
														AS totals";
											$shopcon = mysqli_query($conn,$shop);
											$row = mysqli_fetch_assoc($shopcon);
											$procount = $row['totals'] ?>
											<div class="col-7 d-flex align-items-center">
												<div class="numbers">
													<p class="card-category">Products</p>
													<h4 class="card-title"><?php echo $procount?></h4>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h6 class="modal-title"><i class="la la-frown-o"></i> Under Development</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/chartist/chartist.min.js"></script>
<script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>

<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
<script src="assets/js/demo.js"></script>
</html>
<?php }?>