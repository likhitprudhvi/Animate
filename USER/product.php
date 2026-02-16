<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AniMate</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php 
include 'C:\xampp\htdocs\Animate\USER\database\db_connect.php';
session_start();

// Handle logout when "Logout" is clicked
if (isset($_GET['logout'])) {
    session_unset();  // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: index.php"); // Redirect to index.php
    exit();
}
?>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        
        <div class="row align-items-center bg-white py-3 px-lg-5">
        <img src="img/am.png" style="heigth : 70px; width : 70px;  background-color : #FFCC00; padding: 10px 10px 15px; border-radius : 100%">
            <div class="col-lg-4">
            <a href="index.php" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-uppercase text-secondary ">Ani<span class="text-primary font-weight-normal">Mate</span></h1>
                </a>
            </div>
            
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="index.html" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">Ani<span class="text-white font-weight-normal">Mate</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="news.php" class="nav-item nav-link">News</a>
                    <a href="shop.php" class="nav-item nav-link active">Shopping</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    

                    </div>
                    
                </div>
                <div class="navbar-nav ml-auto py-0">
                    <?php if (isset($_SESSION['username'])): ?>
                        <a href="#" class="nav-item nav-link"><?php echo htmlspecialchars($_SESSION['username']); ?></a>
                        <a href="index.php?logout=true" class="nav-item nav-link">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="nav-item nav-link">Login</a>
                        <a href="register.php" class="nav-item nav-link">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->



    <!-- Contact Start -->
    
    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
            <?php
                // Function to display star ratings
                function displayStars($num) {
                    $maxStars = 5;
                    $output = "";

                    for ($i = 1; $i <= $maxStars; $i++) {
                        $output .= ($i <= $num) 
                            ? '<span class="fa fa-star checked"></span>' 
                            : '<span class="fa fa-star"></span>';
                    }
                    return $output;
                }
                ?>
            <?php
                if (isset($_GET['id']) && isset($_GET['col']) && isset($_GET['table'])) {
                    $hid = $_GET['id'];
                    $col = $_GET['col'];
                    $table = $_GET['table'];

                    // Fetch column names dynamically
                    $columns_query = "SHOW COLUMNS FROM `$table`";
                    $columns_result = $conn->query($columns_query);

                    $col1 = $col2 = $col3 = $col4 = $col5 = $col6 = null;
                    $count = 1;

                    if ($columns_result->num_rows > 0) {
                        while ($column = $columns_result->fetch_assoc()) {
                            if ($count == 1) $col1 = $column['Field'];
                            if ($count == 2) $col2 = $column['Field'];
                            if ($count == 3) $col3 = $column['Field'];
                            if ($count == 4) $col4 = $column['Field'];
                            if ($count == 5) $col5 = $column['Field'];
                            if ($count == 6) $col6 = $column['Field'];
                            if ($count == 7) $col7 = $column['Field'];
                            $count++;
                            if ($count > 7) break;
                        }
                    }
                    

                    // Fetch news data
                    $newsdata = "SELECT * FROM `$table` WHERE `$col` = ?";
                    $stmt = $conn->prepare($newsdata);
                    $stmt->bind_param("s", $hid);
                    $stmt->execute();
                    $newscon = $stmt->get_result();

                    if ($newscon->num_rows > 0) {
                        while ($row = $newscon->fetch_assoc()) {
                ?>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <div class="section-title mb-0" style="border-left: 0px;">
                            <div class="m-0 text-uppercase font-weight-bold" style="padding: 20px;">
                        <img class="img-fluid w-100" src="<?php echo nl2br(htmlspecialchars($row[$col6])); ?>" style="height : 435px; width  : 700px;">
                    </div>
                       

                        </div>
                       
                    
                            <div class="mb-3">
                                <div class="section-title mb-0" style="border-left: 0px;">
                                    
                                        <div class="button-container" >
                                            <!-- Quantity Selector at the Top -->
                                            <div class="quantity-container col-lg-12" style="margin-left: 55%;">
                                                <p>Select  quantity</p>
                                                <button  id="decrease" style="padding-left: 10px;padding-right: 10px;">-</button>
                                                <input type="text" id="quantity" class="quantity" value="1" style="width: 40px;text-align: center;" readonly>
                                                <button  id="increase" style="padding-left: 10px;padding-right: 10px;">+</button>
                                            </div>
                                            <br>  
                                            <div>
                                                <button style="display: block; background-color: yellow;width:100%;margin-left: 20%;padding:10px 150px;">Buy Now</button>
                                                <br>
                                                <button style="display: block; background-color: yellow;width:100%;margin-left: 20%;padding:10px 150px;">Add to Cart</button>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                    
                                    
                               
        
                                </div>
                            </div>
                    </div>
                    
                </div>
                <div class="col-lg-6">
                    <!-- Social Follow Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0" style="border-left: 0px;">
                            <div class="m-0 text-uppercase font-weight-bold" style="padding: 20px;">
                                <h2><?php echo nl2br(html_entity_decode($row[$col5], ENT_QUOTES, 'UTF-8')); ?></h2><br>
                                <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2">
                                            <?php echo nl2br(html_entity_decode($row[$col2], ENT_QUOTES, 'UTF-8')); ?>
                                            </a>
                                        </div>
                                <h6 style="font-size: 10px;">Customer review</h6>
                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

                                <?php echo displayStars($row[$col4]); ?>
                                <h6 style="font-size: 10px;">Overall rating: <?php echo nl2br(htmlspecialchars($row[$col4])); ?></h6>
                                <h2 style="display:inline;"> $<?php echo nl2br(htmlspecialchars($row[$col3])); ?></h2>
                                <h4><br>Description</h4><br>
                                <div>
                                <p class = "text-dark" style="font-size: 12px;"><?php echo nl2br(html_entity_decode($row[$col7], ENT_QUOTES, 'UTF-8')); ?></p>
                                </div>
                            </div>
                            
                            
                        </div>
                        
                        
                    
                    <!-- Social Follow End -->

                    <!-- Newsletter Start -->
                    
                    <!-- Newsletter End -->
                </div>
                <?php   
                        }
                    } else {
                        echo "<p class='text-white'>0 results</p>";
                    }
                    $stmt->close();
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Contact End -->

 
    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5" >
        <div class="row py-4">
            <div class="col-lg-3 col-md-6 mb-5" style="margin-left: 15%;">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5" style="margin-left: 15%;">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Photos</h5>
                <div class="row">
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-2.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-3.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-4.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-5.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-1.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">&copy; <a href="#">AniMate</a>. All Rights Reserved. 
		</a></p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>