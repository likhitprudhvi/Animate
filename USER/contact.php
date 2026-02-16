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
                    <a href="shop.php" class="nav-item nav-link">Shopping</a>
                    <a href="contact.php" class="nav-item nav-link active">Contact</a>
                    

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


    <div class="container-fluid mt-5 pt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 text-dark">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Contact Us For Any Queries</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">
                        <div class="mb-4">
                            <h6 class="text-uppercase font-weight-bold">Contact Info</h6>
                            <p class="mb-4">The contact form is currently inactive. We will update you soon.</p>
							<div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa fa-map-marker-alt text-primary mr-2"></i>
                                    <h6 class="font-weight-bold mb-0">Our Office</h6>
                                </div>
                                <p class="m-0">123 Street, New York, USA</p>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa fa-envelope-open text-primary mr-2"></i>
                                    <h6 class="font-weight-bold mb-0">Email Us</h6>
                                </div>
                                <p class="m-0">xyz@animate.com</p>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fa fa-phone-alt text-primary mr-2"></i>
                                    <h6 class="font-weight-bold mb-0">Call Us</h6>
                                </div>
                                <p class="m-0">+012 345 6789</p>
                            </div>
                            
                            
                        </div>
                        
                       
                    </div>
                    
                </div>
                <div class="col-lg-4">
                    
                    <div class="mb-3">
                        <div class="section-title mb-0" style="border-left: 0px;">
                            <div class="m-0 text-uppercase font-weight-bold">
                        <img class="img-fluid w-100" src="img/qaz.png" style="height : 300px; width : 700px">
                    </div>
                       

                        </div>
                       
                    
                            
                    </div>
                    
                </div>
                <div class="col-lg-12 text-dark">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Contact Us</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4 mb-3">
                        <div class="mb-4">
                            <h6 class="text-uppercase font-weight-bold">Contact Info</h6>
                            
                            <form>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control p-4" placeholder="Your Name" required="required"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control p-4" placeholder="Your Email" required="required"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control p-4" placeholder="Subject" required="required"/>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="4" placeholder="Message" required="required"></textarea>
                                </div>
                                <div>
                                    <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                                        type="submit">Send Message</button>
                                </div>
                            </form>
                        </div>
                        
                        
                    </div>
                </div>
                
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