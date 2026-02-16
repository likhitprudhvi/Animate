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
    <style>
        a:hover{
            text-decoration: none !important;
        }
        </style>
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
                    <a href="news.php" class="nav-item nav-link">News</a>
                    <a href="shop.php" class="nav-item nav-link active">Shopping</a>
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
            <a href="#" class="nav-item nav-link">
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
    <div class="row">
        <div class="owl-carousel main-carousel position-relative">
            <?php 
            $shopdata0 = "SELECT id0, price0, category0, imagepath0, heading0 FROM shopform0";
            $shopcon0 = $conn->query($shopdata0);
            $col_id = "id0";
            $table = "shopform0";

            if ($shopcon0->num_rows > 0) {
                while ($row0 = $shopcon0->fetch_assoc()) {
            ?>
                <div class="position-relative overflow-hidden" style="height: 500px;">
                    <img class="img-fluid h-100" src="<?php echo $row0['imagepath0']; ?>" style="object-fit: cover;">
                    <div class="overlay">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="category.php?id=<?php echo $row0['category0']; ?>"><?php echo $row0['category0']; ?></a>
                        <a class="h1 text-white font-weight-bold" href="product.php?id=<?php echo $row0['id0']; ?>&col=<?php echo $col_id; ?>&table=<?php echo $table; ?>">$<?php echo $row0["price0"]; ?></a>
                    </div>
                    <a class="h2 m-0 text-white text-uppercase font-weight-bold d-inline-block" 
                                style="max-width: 1200px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; 
                                        -webkit-box-orient: vertical; text-overflow: ellipsis; line-height: 1.4em; height: 2.8em;" 
                                href="info.php?id=<?php echo $row0['id0']; ?>&col=<?php echo $col_id; ?>&table=<?php echo $table; ?>">
                                <?php echo $row0['heading0']; ?>
                            </a>

                    </div>
            </div>
            <?php   
                }
            } else {
                echo "<p class='text-white'>0 results</p>";
            }
            ?>

            
        </div>
    </div>
</div>

    <!-- Main News Slider End -->


   <!-- Breaking News Start -->
    <!-- Breaking News End -->


    <!-- Featured News Slider Start -->
    <div class="six_box1">
    <div class="six_box">
        <div class="container-fluid">
           <div class="row">
              <div class="col-md-2 col-sm-4 pa_left">
                 <div class="six_probpx yellow_bg">
                    <i><img src="img/clothing.png" alt="#"/></i>
                    <span>Clothing</span>
                 </div>
              </div>
              <div class="col-md-2 col-sm-4 pa_left">
                 <div class="six_probpx bluedark_bg">
                    <i><img src="img/accessories.png" alt="#"/></i>
                    <span>Accessories</span>
                 </div>
              </div>
              <div class="col-md-2 col-sm-4 pa_left">
                 <div class="six_probpx yellow_bg">
                    <i><img src="img/manga.png" alt="#"/></i>
                    <span>Manga</span>
                 </div>
              </div>
              <div class="col-md-2 col-sm-4 pa_left">
                 <div class="six_probpx bluedark_bg">
                    <i><img src="img/sticker.png" alt="#"/></i>
                    <span>Stickers</span>
                 </div>
              </div>
              <div class="col-md-2 col-sm-4 pa_left">
                 <div class="six_probpx yellow_bg">
                    <i><img src="img/keychain.png" alt="#"/></i>
                    <span>Key chains</span>
                 </div>
              </div>
              <div class="col-md-2 col-sm-4 pa_left">
                 <div class="six_probpx bluedark_bg">
                    <i><img src="img/others.png" alt="#"/></i>
                    <span>&More</span>
                 </div>
              </div>
           </div>
        </div>
     </div>
    </div>


<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div id="project" class="project" style="padding-top: 40px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Featured Products</h2>
                        </div>
                    </div>
                </div>

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

                <div class="row">
                    <?php 
                    $shopdata1 = "SELECT id1, price1, category1, imagepath1, rating1, heading1 FROM shopform1";
                    $shopcon1 = $conn->query($shopdata1);
                    $col_id = "id1";
                    $table = "shopform1";

                    if ($shopcon1->num_rows > 0) {
                        while ($row1 = $shopcon1->fetch_assoc()) {
                    ?>
                            <div class="col-lg-3">
                                <div class="position-relative mb-3">
                                    <div class="imagez" style="width: 280px; height: 174px; overflow: hidden; position: relative;">
                                        <img class="img-fluid w-100 h-100" src="<?php echo $row1["imagepath1"]; ?>" style="object-fit: cover;">
                                    </div>
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="category.php?id=<?php echo $row1['category1']; ?>">
                                                <?php echo $row1["category1"]; ?>
                                            </a>
                                        </div>
                                        <?php echo displayStars($row1["rating1"]); ?>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="product.php?id=<?php echo $row1['id1']; ?>&col=<?php echo $col_id; ?>&table=<?php echo $table; ?>">
                                            $<?php echo $row1["price1"]; ?>
                                        </a>
                                        <div class="d-flex overflow-hidden" style="max-height: 3em;">
                                            <a href="product.php?id=<?php echo $row1['id1']; ?>&col=<?php echo $col_id; ?>&table=<?php echo $table; ?>" 
                                            class="text-secondary font-weight-bold text-decoration-none w-100 text-wrap text-break"
                                            title="<?php echo $row1['heading1']; ?>">
                                                <?php echo $row1["heading1"]; ?>
                                            </a>
                                        </div>



                                    </div>
                                </div>
                            </div>
                    <?php   
                        }
                    } else {
                        echo "<p class='text-white'>0 results</p>";
                    }
                    ?>
                </div>



                <!-- More Products Section -->
                <div class="container">
                            <div class="row">
                               <div class="col-md-12">
                                  <div class="titlepage">
                                     <h2>More</h2>
                                  </div>
                               </div>
                            </div>
                        </div>
                        <div class="row">
                        <?php 
                            $shopdata2 = "SELECT id2, price2, category2, imagepath2, heading2 FROM shopform2";
                            $shopcon2 = $conn->query($shopdata2);
                            $col_id = "id2";
                            $table = "shopform2";

                            if ($shopcon2->num_rows > 0) {
                                while ($row2 = $shopcon2->fetch_assoc()) {
                            ?>
                            <div class="col-lg-4">
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                    <img class="img-fluid h-100" src="<?php echo $row2["imagepath2"]; ?>" alt="" style = " width: 110px;">
                                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="category.php?id=<?php echo $row2['category2']; ?>"><?php echo $row2["category2"]; ?></a>
                                        </div>
                                        <a class="text-dark" href="product.php?id=<?php echo $row2['id2']; ?>&col=<?php echo $col_id; ?>&table=<?php echo $table; ?>"><small>$<?php echo $row2["price2"]; ?></small></a>
                                        <div class="d-flex overflow-hidden" style="max-width: 245px;">
                                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold d-block" 
                                    href="product.php?id=<?php echo $row2['id2']; ?>&col=<?php echo $col_id; ?>&table=<?php echo $table; ?>" 
                                    style="max-width: 100%; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; 
                                            -webkit-line-clamp: 2; -webkit-box-orient: vertical; line-height: 1.4em; height: 2.8em;">
                                    <?php echo $row2['heading2']; ?>
                                    </a>

                                        </div>
                                    </div>
                            </div>
                        </div>
                        <?php   
                        }
                    } else {
                        echo "<p class='text-white'>0 results</p>";
                    }
                    $conn->close();
                    ?>
                        
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5" >
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