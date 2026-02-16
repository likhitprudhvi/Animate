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

// Restrict access if not 'Likhit'
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
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="assets/css/ready.css">
	<link rel="stylesheet" href="assets/css/demo.css">
	<style>
    /* Table Layout */
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table td, .table th {
        white-space: nowrap; /* Prevent text wrapping */
        overflow: hidden; /* Hide overflowing text */
        text-overflow: ellipsis; /* Add '...' */
        max-width: 150px; /* Set column width */
        position: relative;
    }

    /* Tooltip Effect */
    .table td:hover::after {
        content: attr(data-text); /* Show full text */
        position: absolute;
        left: 0;
        top: 100%;
        width: 200px; /* Adjust tooltip width */
        background-color: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 5px;
        font-size: 14px;
        white-space: normal;
        border-radius: 4px;
        z-index: 10;
        display: block;
    }
</style>
</head>

<body>
<?php include 'C:\xampp\htdocs\Animate\ADMIN\database\db_connect.php'; ?>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="index.html" class="logo">
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
									<a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
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
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									XYZ
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item">
							<a href="index.php"><i class="la la-dashboard"></i>Dashboard</a>
						</li>
						<li class="nav-item">
							<a href="forms-tables.php"><i class="la la-keyboard-o"></i>Forms & Tables</a>
						</li>
						<li class="nav-item active">
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
						<h4 class="page-title">Users Tables</h4>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									
									<div class="card-body">
										<div class="card-sub">
											Details of Users
										</div>
										
										<table class="table table-bordered">
											<thead>
												<tr>
													<th scope="col">S.No.</th>
													<th scope="col">Firstname</th>
													<th scope="col">Lastname</th>
													<th scope="col">Username</th>
													<th scope="col">Email</th>
													<th scope="col">Date of Birth</th>
													<th scope="col">Remove</th>
													
												</tr>
											</thead>
											<?php 
											if(isset($_POST['id'])) {
												$id = $_POST['id'];
											
												$deleteQuery = "DELETE FROM userdata WHERE id = ?";
												$stmt = mysqli_prepare($conn, $deleteQuery);
												mysqli_stmt_bind_param($stmt, "i", $id);
												
												if (mysqli_stmt_execute($stmt)) {
													// Rearrange the ID sequence
													mysqli_query($conn, "SET @count = 0");
													mysqli_query($conn, "UPDATE userdata SET id = @count:= @count + 1");
													mysqli_query($conn, "ALTER TABLE userdata AUTO_INCREMENT = 1");
												}
												
											} else {
												echo "Invalid request!";
											}
										$myusers = "SELECT * FROM userdata";
										$usercon = mysqli_query($conn,$myusers);
										while($userdata = mysqli_fetch_assoc($usercon)) 
										{ 
											?>

											<tbody>
												<tr>
													<td><?php echo $userdata['id'];?></td>
													<td><?php echo $userdata['firstname'];?></td>
													<td><?php echo $userdata['lastname'];?></td>
													<td><?php echo $userdata['username'];?></td>
													<td><?php echo $userdata['email'];?></td>
													<td><?php echo $userdata['dob'];?></td>
													<td>
														<form method="POST" onsubmit="return confirmDelete()">
															<input type="hidden" name="id" value="<?php echo $userdata['id']; ?>">
															<button type="submit" class="btn btn-danger">Remove</button>
														</form>
													</td>
													
												</tr>
											
											
											</tbody>
											<?php } ?>
										</table>
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
		</div>
	</div>
</div>
<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this news entry?");
}
</script>
</body>
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/chartist/chartist.min.js"></script>
<script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
<script>
	$('#displayNotif').on('click', function(){
		var placementFrom = $('#notify_placement_from option:selected').val();
		var placementAlign = $('#notify_placement_align option:selected').val();
		var state = $('#notify_state option:selected').val();
		var style = $('#notify_style option:selected').val();
		var content = {};

		content.message = 'Turning standard Bootstrap alerts into "notify" like notifications';
		content.title = 'Bootstrap notify';
		if (style == "withicon") {
			content.icon = 'la la-bell';
		} else {
			content.icon = 'none';
		}
		content.url = 'index.html';
		content.target = '_blank';

		$.notify(content,{
			type: state,
			placement: {
				from: placementFrom,
				align: placementAlign
			},
			time: 1000,
		});
	});
</script>
</html>
<?php } ?>