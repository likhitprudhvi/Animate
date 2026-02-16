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
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> 
	<style>a {
    text-decoration: none !important;
	}
	</style>
</head>
<body>
<?php
include 'C:\xampp\htdocs\Animate\USER\database\db_connect.php';

function handleFileUpload($fileInputName, $targetDir) {
    if (!isset($_FILES[$fileInputName])) {
        return ["error" => "No file uploaded."];
    }

    $targetFile = $targetDir . basename($_FILES[$fileInputName]["name"]);

    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    if (move_uploaded_file($_FILES[$fileInputName]["tmp_name"], $targetFile)) {
        return ["path" => $targetFile];
    } else {
        return ["error" => "Error uploading file."];
    }
}

$message0 = $message1 = $message2 = "";
$toastClass0 = $toastClass1 = $toastClass2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit_0']) && isset($_FILES["shopimage0"])) {
		// Sanitize input data
		$category0 = htmlspecialchars($_POST['category0'] ?? '');
		$price0 = htmlspecialchars($_POST['price0'] ?? '');
		$rating0 = htmlspecialchars($_POST['rating0'] ?? '');
		$heading0 = htmlspecialchars($_POST['heading0'] ?? '');
		$description0 = htmlspecialchars($_POST['description0'] ?? '');
	
	
		// Handle file upload
		$uploadResult = handleFileUpload("shopimage0", "../uploads/shop0/");
		if (isset($uploadResult["error"])) {
			$message0 = $uploadResult["error"];
			$toastClass0 = "#dc3545";
		} else {
			$imagepath0 = $uploadResult["path"];
	
			// Check if the table is empty
			$checkTableStmt = $conn->prepare("SELECT COUNT(*) as total FROM shopform0");
			$checkTableStmt->execute();
			$result = $checkTableStmt->get_result();
			$row = $result->fetch_assoc();
			$totalRows = $row['total'];
	
			// If the table is empty, insert the first value without checking for duplicates
			if ($totalRows == 0) {
				$stmt = $conn->prepare("INSERT INTO shopform0 (category0, price0, rating0, heading0, description0, imagepath0) VALUES (?, ?, ?, ?, ?, ?)");
				$stmt->bind_param("ssssss", $category0, $price0, $rating0, $heading0, $description0, $imagepath0);
	
				if ($stmt->execute()) {
					$message0 = "Item added successfully";
					$toastClass0 = "#28a745";
				} else {
					error_log("SQL Error: " . $stmt->error); // Log the error
					$message0 = "Error: " . $stmt->error;
					$toastClass0 = "#dc3545";
				}
	
				$stmt->close();
			} else {
				// If the table is not empty, check for duplicates
				$checkNewsStmt = $conn->prepare("SELECT heading0 FROM shopform0 WHERE heading0 = ?");
				$checkNewsStmt->bind_param("s", $heading0);
				$checkNewsStmt->execute();
				$checkNewsStmt->store_result();
	
				if ($checkNewsStmt->num_rows > 0) {
					$message0 = "Item already exists";
					$toastClass0 = "#007bff";
				} else {
					// Insert new record
					$stmt = $conn->prepare("INSERT INTO shopform0 (category0, price0, rating0, heading0, description0, imagepath0) VALUES (?, ?, ?, ?, ?, ?)");
					$stmt->bind_param("ssssss", $category0, $price0, $rating0, $heading0, $description0, $imagepath0);
	
					if ($stmt->execute()) {
						$message0 = "Item added successfully";
						$toastClass0 = "#28a745";
					} else {
						error_log("SQL Error: " . $stmt->error); // Log the error
						$message0 = "Error: " . $stmt->error;
						$toastClass0 = "#dc3545";
					}
	
					$stmt->close();
				}
	
				$checkNewsStmt->close();
			}
	
			$checkTableStmt->close();
		}
	}
    if (isset($_POST['submit_1']) && isset($_FILES["shopimage1"])) {
		// Sanitize input data
		$category1 = htmlspecialchars($_POST['category1'] ?? '');
		$price1 = htmlspecialchars($_POST['price1'] ?? '');
		$rating1 = htmlspecialchars($_POST['rating1'] ?? '');
		$heading1 = htmlspecialchars($_POST['heading1'] ?? '');
		$description1 = htmlspecialchars($_POST['description1'] ?? '');
	
	
		// Handle file upload
		$uploadResult = handleFileUpload("shopimage1", "../uploads/shop1/");
		if (isset($uploadResult["error"])) {
			$message1 = $uploadResult["error"];
			$toastClass1 = "#dc3545";
		} else {
			$imagepath1 = $uploadResult["path"];
	
			// Check if the table is empty
			$checkTableStmt = $conn->prepare("SELECT COUNT(*) as total FROM shopform1");
			$checkTableStmt->execute();
			$result = $checkTableStmt->get_result();
			$row = $result->fetch_assoc();
			$totalRows = $row['total'];
	
			// If the table is empty, insert the first value without checking for duplicates
			if ($totalRows == 0) {
				$stmt = $conn->prepare("INSERT INTO shopform1 (category1, price1, rating1, heading1, description1, imagepath1) VALUES (?, ?, ?, ?, ?, ?)");
				$stmt->bind_param("ssssss", $category1, $price1, $rating1, $heading1, $description1, $imagepath1);
	
				if ($stmt->execute()) {
					$message1 = "First item added successfully";
					$toastClass1 = "#28a745";
				} else {
					error_log("SQL Error: " . $stmt->error); // Log the error
					$message1 = "Error: " . $stmt->error;
					$toastClass1 = "#dc3545";
				}
	
				$stmt->close();
			} else {
				// If the table is not empty, check for duplicates
				$checkNewsStmt = $conn->prepare("SELECT heading1 FROM shopform1 WHERE heading1 = ?");
				$checkNewsStmt->bind_param("s", $heading1);
				$checkNewsStmt->execute();
				$checkNewsStmt->store_result();
	
				if ($checkNewsStmt->num_rows > 0) {
					$message1 = "Item already exists";
					$toastClass1 = "#007bff";
				} else {
					// Insert new record
					$stmt = $conn->prepare("INSERT INTO shopform1 (category1, price1, rating1, heading1, description1, imagepath1) VALUES (?, ?, ?, ?, ?, ?)");
					$stmt->bind_param("ssssss", $category1, $price1, $rating1, $heading1, $description1, $imagepath1);
	
					if ($stmt->execute()) {
						$message1 = "Item added successfully";
						$toastClass1 = "#28a745";
					} else {
						error_log("SQL Error: " . $stmt->error); // Log the error
						$message1 = "Error: " . $stmt->error;
						$toastClass1 = "#dc3545";
					}
	
					$stmt->close();
				}
	
				$checkNewsStmt->close();
			}
	
			$checkTableStmt->close();
		}
	}

    if (isset($_POST['submit_2']) && isset($_FILES["shopimage2"])) {
		// Sanitize input data
		$category2 = htmlspecialchars($_POST['category2'] ?? '');
		$price2 = htmlspecialchars($_POST['price2'] ?? '');
		$rating2 = htmlspecialchars($_POST['rating2'] ?? '');
		$heading2 = htmlspecialchars($_POST['heading2'] ?? '');
		$description2 = htmlspecialchars($_POST['description2'] ?? '');
	
		// Handle file upload
		$uploadResult = handleFileUpload("shopimage2", "../uploads/shop2/");
		if (isset($uploadResult["error"])) {
			$message2 = $uploadResult["error"];
			$toastClass2 = "#dc3545";
		} else {
			$imagepath2 = $uploadResult["path"];
	
			// Check if the table is empty
			$checkTableStmt = $conn->prepare("SELECT COUNT(*) as total FROM shopform2");
			$checkTableStmt->execute();
			$result = $checkTableStmt->get_result();
			$row = $result->fetch_assoc();
			$totalRows = $row['total'];
	
			// Debugging: Print total rows in the table
			echo "Total rows in table: " . $totalRows . "\n";
	
			// If the table is empty, insert the first value without checking for duplicates
			if ($totalRows == 0) {
				$stmt = $conn->prepare("INSERT INTO shopform2 (category2, price2, rating2, heading2, description2, imagepath2) VALUES (?, ?, ?, ?, ?, ?)");
				$stmt->bind_param("ssssss", $category2, $price2, $rating2, $heading2, $description2, $imagepath2);
	
				if ($stmt->execute()) {
					$message2 = "First item added successfully";
					$toastClass2 = "#28a745";
				} else {
					error_log("SQL Error: " . $stmt->error); // Log the error
					$message2 = "Error: " . $stmt->error;
					$toastClass2 = "#dc3545";
				}
	
				$stmt->close();
			} else {
				// If the table is not empty, check for duplicates
				$checkNewsStmt = $conn->prepare("SELECT heading2 FROM shopform2 WHERE heading2 = ?");
				$checkNewsStmt->bind_param("s", $heading2);
				$checkNewsStmt->execute();
				$checkNewsStmt->store_result();
	
				if ($checkNewsStmt->num_rows > 0) {
					$message2 = "Item already exists";
					$toastClass2 = "#007bff";
				} else {
					// Insert new record
					$stmt = $conn->prepare("INSERT INTO shopform2 (category2, price2, rating2, heading2, description2, imagepath2) VALUES (?, ?, ?, ?, ?, ?)");
					$stmt->bind_param("ssssss", $category2, $price2, $rating2, $heading2, $description2, $imagepath2);
	
					if ($stmt->execute()) {
						$message2 = "Item added successfully";
						$toastClass2 = "#28a745";
					} else {
						error_log("SQL Error: " . $stmt->error); // Log the error
						$message2 = "Error: " . $stmt->error;
						$toastClass2 = "#dc3545";
					}
	
					$stmt->close();
				}
	
				$checkNewsStmt->close();
			}
	
			$checkTableStmt->close();
		}
	}

    $conn->close();
}
?>

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
						<li class="nav-item active dropdown">
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
						<h4 class="page-title">Shop forms</h4>
						
						<div class="row">
						
						
							<div class="col-md-12">
								<div class="card">
								<div style = "margin : 2% 30%;">
        					<?php if ($message0): ?>
            					<div class="toast0 toast-message align-items-center text-white border-0" 
         								 role="alert" aria-live="assertive" aria-atomic="true"
                							style="background-color: <?php echo $toastClass0; ?>;">
                					<div class="d-flex">
                    					<div class="toast-body">
                        					<?php echo $message0; ?>
                    					</div>
                    
               						</div>
            					</div>
        					<?php endif; ?>
						</div>
								<form id="form_0" method="post" enctype="multipart/form-data">
							
									<div class="card-header">
										<div class="card-title">Fill the main slider details below</div>
									</div>
									<div class="card-body">
										<div class="form-group">
											<label for="category0">Category</label>
											<input type="text" class="form-control" name="category0" id="category0" placeholder="Enter Category">
										</div>
										<div class="form-group">
												<label for="price0">Price</label>
												<input type="number" class="form-control" name="price0" id="price0" placeholder="Enter price">
											</div>
											<div class="form-group">
												<label for="rating0">Rating</label>
												<input type="number" class="form-control" name="rating0" id="rating0" placeholder="Enter rating">
											</div>
										<div class="form-group">
												<label for="exampleFormControlFile0">image input</label>
												<input type="file" class="form-control-file" name="shopimage0" id="shopimage0">
											</div>
											<div class="form-group">
												<label for="heading0">heading</label>
												<input type="text" class="form-control" name="heading0" id="heading0" placeholder="Enter heading">
											</div>
											<div class="form-group">
												<label for="description0">Description</label>
												<textarea class="form-control" id="description0" name="description0" rows="10">

												</textarea>
											</div>
											<small id="emailHelp" class="form-text text-muted">Write max 10 characters</small>
										</div>
										<div class="form-check">
												<label class="form-check-label">
													<input class="form-check-input" type="checkbox" value="">
													<span class="form-check-sign">Agree with terms and conditions</span>
												</label>
											</div>
										<div class="card-action">
											<button name="submit_0" id="submit_0" class="btn btn-success">Submit</button>
											<button class="btn btn-danger">Cancel</button>
										</div>
									</div>
								</form>
								</div>
								<div class="card">
								<form id="form_1" method="post" enctype="multipart/form-data">
								<div style = "margin : 2% 30%;">
        					<?php if ($message1): ?>
            					<div class="toast1 toast-message align-items-center text-white border-0" 
         								 role="alert" aria-live="assertive" aria-atomic="true"
                							style="background-color: <?php echo $toastClass1; ?>;">
                					<div class="d-flex">
                    					<div class="toast-body">
                        					<?php echo $message1; ?>
                    					</div>
                    
               						</div>
            					</div>
        					<?php endif; ?>
						</div>
									<div class="card-header">
										<div class="card-title">Fill the Item details below</div>
									</div>
									<div class="card-body">
										<div class="form-group">
											<label for="category1">Category</label>
											<input type="text" class="form-control" name="category1" id="category1" placeholder="Enter Category">
										</div>
										<div class="form-group">
												<label for="price1">Price</label>
												<input type="number" class="form-control" name="price1" id="price1" placeholder="Enter price">
											</div>
											<div class="form-group">
												<label for="rating1">Rating</label>
												<input type="number" class="form-control" name="rating1" id="rating1" placeholder="Enter rating">
											</div>
										<div class="form-group">
												<label for="exampleFormControlFile1">image input</label>
												<input type="file" class="form-control-file" name="shopimage1" id="shopimage1">
											</div>
											<div class="form-group">
												<label for="heading1">heading</label>
												<input type="text" class="form-control" name="heading1" id="heading1" placeholder="Enter heading">
											</div>
											<div class="form-group">
												<label for="description1">Description</label>
												<textarea class="form-control" id="description1" name="description1" rows="10">

												</textarea>
											</div>
											<small id="emailHelp" class="form-text text-muted">Write max 10 characters</small>
										</div>
										<div class="form-check">
												<label class="form-check-label">
													<input class="form-check-input" type="checkbox" value="">
													<span class="form-check-sign">Agree with terms and conditions</span>
												</label>
											</div>
										<div class="card-action">
											<button name="submit_1" id="submit_1" class="btn btn-success">Submit</button>
											<button class="btn btn-danger">Cancel</button>
										</div>
									</div>
								</form>
								</div>
								<div class="card">
								<form id="form_2" method="post" enctype="multipart/form-data">
								<div style = "margin : 2% 30%;">
        					<?php if ($message2): ?>
            					<div class="toast2 toast-message align-items-center text-white border-0" 
         								 role="alert" aria-live="assertive" aria-atomic="true"
                							style="background-color: <?php echo $toastClass2; ?>;">
                					<div class="d-flex">
                    					<div class="toast-body">
                        					<?php echo $message2; ?>
                    					</div>
                    
               						</div>
            					</div>
        					<?php endif; ?>
						</div>
									<div class="card-header">
										<div class="card-title">Fill the more details below</div>
									</div>
									<div class="card-body">
										<div class="form-group">
											<label for="category2">Category</label>
											<input type="text" class="form-control" name="category2" id="category2" placeholder="Enter Category">
										</div>
										<div class="form-group">
												<label for="price2">Price</label>
												<input type="number" class="form-control" name="price2" id="price2" placeholder="Enter price">
											</div>
											<div class="form-group">
												<label for="rating2">Rating</label>
												<input type="number" class="form-control" name="rating2" id="rating2" placeholder="Enter rating">
											</div>
										<div class="form-group">
												<label for="exampleFormControlFile2">image input</label>
												<input type="file" class="form-control-file" name="shopimage2" id="shopimage2">
											</div>
											<div class="form-group">
												<label for="heading2">heading</label>
												<input type="text" class="form-control" name="heading2" id="heading2" placeholder="Enter heading">
											</div>
											<div class="form-group">
												<label for="description2">Description</label>
												<textarea class="form-control" id="description2" name="description2" rows="10">

												</textarea>
											</div>
											<small id="emailHelp" class="form-text text-muted">Write max 10 characters</small>
										</div>
										<div class="form-check">
												<label class="form-check-label">
													<input class="form-check-input" type="checkbox" value="">
													<span class="form-check-sign">Agree with terms and conditions</span>
												</label>
											</div>
										<div class="card-action">
											<button name="submit_2" id="submit_2" class="btn btn-success">Submit</button>
											<button class="btn btn-danger">Cancel</button>
										</div>
									</div>
								</form>
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
    document.addEventListener('DOMContentLoaded', function () {
        // Find the toast element
        let toastEl = document.querySelector('.toast-message');

        if (toastEl) {
            // Use setTimeout to remove the toast after 3 seconds
            setTimeout(function () {
                toastEl.remove(); // Forcefully remove the toast from the DOM
            }, 5000); // 3 seconds delay
        }
    });
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
</html>	
<?php }?>