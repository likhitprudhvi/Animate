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
<?php include 'C:\xampp\htdocs\Animate\USER\database\db_connect.php'; ?>
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
            <a href="index.php" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">Ani<span class="text-white font-weight-normal">Mate</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="news.php" class="nav-item nav-link active">News</a>
                    <a href="shop.php" class="nav-item nav-link">Shopping</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    

                    </div>
                    
                </div>
                <?php
session_start();

// Handle logout when "Logout" is clicked
if (isset($_GET['logout'])) {
    session_unset();  // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: index.php"); // Redirect to index.php
    exit();
}
?>

<div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse" style="margin-left: 500px;">
    <div class="navbar-nav mr-auto py-0">
        <?php if (isset($_SESSION['username'])): ?>
            <a href="info.php" class="nav-item nav-link">
                <?php echo htmlspecialchars($_SESSION['username']); ?>
            </a>
            <a href="index.php?logout=true" class="nav-item nav-link">Logout</a>
        <?php else: ?>
            <a href="login.php" class="nav-item nav-link">Login</a>
            <a href="register.php" class="nav-item nav-link">Register</a>
        <?php endif; ?>
    </div>
</div>

                
                
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
    


    <!-- Main News Slider Start -->



    <div class="container-fluid">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title" style="border-left: 0px;margin-top: 2%;">
                                <h4 class="m-0 text-uppercase font-weight-bold">All News</h4>
                            </div>
                        </div>
                        <?php $newsdata = "SELECT  id, date, imagepath, heading FROM newsform";
                            $newscon = $conn->query($newsdata);
                            $col_id = "id";
                            $table = "newsform";
                            if ($newscon->num_rows > 0) {
                                while($row = $newscon->fetch_assoc()) {
                        ?>
                        <div class="col-lg-3 news-card">
                            <div class="position-relative mb-3">
                                <img class="img-fluid w-100" src="<?php echo $row["imagepath"]?>" style="object-fit: cover;">
                                <div class="bg-white border border-top-0 p-4">
                                    <div class="mb-2">
                                        
                                        <a class="text-body" href=""><small><?php echo $row["date"]?></small></a>
                                    </div>
                                    
                                    <a class="text-secondary font-weight-bold d-block" 
                                        href="info.php?id=<?php echo $row['id']; ?>&col=<?php echo $col_id; ?>&table=<?php echo $table; ?>" 
                                        style="max-width: 100%; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; 
                                                -webkit-line-clamp: 2; -webkit-box-orient: vertical; line-height: 1.4em; height: 2.8em;">
                                        <?php echo $row['heading']; ?>
                                    </a>

                                </div>
                                
                            </div>
                        </div>
                 <?php   }
                } else {
                    echo "0 results";
                }
                
                $conn->close();
                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    



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



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>