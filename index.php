<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--bootstrap css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--Fontawesome css-->
    <link rel="stylesheet" href="css/all.min.css">
    
    <!--Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    
    <!--Custom css-->
    <link rel="stylesheet" href="css/custom.css">

    <title>OSMS</title>
</head>
<body>
    <!--start navigation-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-danger pl-5 fixed-top">
        <a href="index.php" class="navbar-brand">OSMS</a>
        <span class="navbar-text">Customer's Happines is our Aim</span>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mymenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mymenu">
            <ul class="navbar-nav pl-5 custom_nav">
                <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="#registration" class="nav-link">Registration</a></li>
                <li class="nav-item"><a href="Requester/Requesterlogin.php" class="nav-link">login</a></li>
                <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav><!--end navigation-->

    <!--start Header Jumbotron-->
    <header class="jumbotron back-image" style="background-image:url(image/banner.jpg);">
    <div class="myclass mainheading">
        <h1 class="text-uppercase text-danger font-weight-bold">Welcome to OSMS</h1>
        <p class="font-italic ptxt">Customer's Happines is our Aim</p>
        <a href="Requester/Requesterlogin.php" class="btn btn-success mr-4">Login</a>
        <a href="#registration" class="btn btn-danger mr-4">Sign up</a>
        

    </div>
    </header><!--end Header Jumbotron-->

    <!--introduction section-->
    <div class="container">
        <div class="jumbotron">
            <h3 class="text-center">OSMS Services</h3>
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Dolorum quis et suscipit error perferendis aut delectusreiciendis
                eligendivitae ipsa unde, omnis deserunt? 
                Sunt fuga mollitia similique!At, iste pariatur.
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Dolorum quis et suscipit error perferendis aut delectusreiciendis
                eligendivitae ipsa unde, omnis deserunt? 
                Sunt fuga mollitia similique!At, iste pariatur.</p>

              <p>  Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Dolorum quis et suscipit error perferendis aut delectusreiciendis
                eligendivitae ipsa unde, omnis deserunt? 
                Sunt fuga mollitia similique!At, iste pariatur.
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Dolorum quis et suscipit error perferendis aut delectusreiciendis
                eligendivitae ipsa unde, omnis deserunt? 
                Sunt fuga mollitia similique!At, iste pariatur.
            </p>
        </div>
    </div><!--end introduction section container-->

    <!--Start services-->
    <div class="container text-center border-bottom" id="Services">
        <h2>Our Services</h2>
        <div class="row">
            <div class="col-sm-4 mb-4">
                <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
                <h4 class="mt-4">Electronic Application</h4>
            </div>
            <div class="col-sm-4 mb-4">
                <a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
                <h4 class="mt-4">Preventive Maintenance</h4>
            </div>
            <div class="col-sm-4 mb-4">
                <a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
                <h4 class="mt-4">Fault Repair</h4>
            </div>
        </div>
    </div> <!--End services-->

    <!--start registration form-->
    <?php include('userRegistration.php');  ?>
    <!--End registration form container-->

    <!-----Start Happy Customer----->
    <div class="jumbotron bg-danger">
        <div class="container">
            <h2 class="text-center text-white">Happy customer</h2>
            <div class="row mt-5">
                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lg mb-2 p-3">
                        <div class="body text-center">
                            <img src="image/avtar1.jpeg" alt="" style="border-radius:100px">
                            <h4 class="card-title">Rahul Kumar</h4>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, unde.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, unde
                            </p>
                        </div>
                    </div>
                </div><!--end 1st column-->
                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lg mb-2 p-3">
                        <div class="body text-center">
                            <img src="image/avtar2.jpeg" alt="" style="border-radius:100px">
                            <h4 class="card-title">Rahul Kumar</h4>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, unde.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, unde
                            </p>
                        </div>
                    </div>
                </div><!--end 2nd column-->
                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lg mb-2 p-3">
                        <div class="body text-center">
                            <img src="image/avtar3.jpeg" alt="" style="border-radius:100px">
                            <h4 class="card-title">Rahul Kumar</h4>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, unde.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, unde
                            </p>
                        </div>
                    </div>
                </div><!--end 3rd column-->
                <div class="col-lg-3 col-sm-6">
                    <div class="card shadow-lg mb-2 p-3">
                        <div class="body text-center">
                            <img src="image/avtar4.jpeg" alt="" style="border-radius:100px">
                            <h4 class="card-title">Rahul Kumar</h4>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, unde.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, unde
                            </p>
                        </div>
                    </div>
                </div><!--end 4th column-->
            </div>
        </div>
     </div><!-----end Happy Customer from container & jumbotron----->

    <!--start Contact-->
    <div class="container" id="contact">
        <h2 class="text-center">Contact Us</h2>
        <div class="row mt-3">
            <!-- start 1st column-->
            <?php include('contactForm.php');  ?>
            <!--end 1st column-->

            <div class="col-md-4 text-center"><!-- start 2nd column-->
               <strong>Headquarter:</strong><br>
               OSMS pvt Ltd,<br>
               Chhatna ,Bankura<br>
               Chhatna-722132<br>
               Phone:8207063977<br>
               <a href="#" target="_blank">www.OSMS.com</a><br>
               <br> <br>
               <strong>Branch:</strong><br>
               OSMS pvt Ltd,<br>
               Chhatna ,Bankura<br>
               Chhatna-722132<br>
               Phone:8207063977<br>
               <a href="#" target="_blank">www.OSMS.com</a><br>
            </div><!--end 2nd column-->
        </div>
    </div><!--End Contact from container-->
    

    <!--start Footer-->
    <footer class="container-fluid bg-dark text-white mt-5">
        <div class="container">
        <div class="row py-3">
            <div class="col-md-6"><!--start 1st column-->
                <span class="pr-2">Follows Us:</span>
                <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
                <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
                <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
            </div><!--end 1st column-->
            <div class="col-md-6 text-right"><!--start 2nd column-->
            <small>Design by Tarun &copy; 2020</small>
            <small class="ml-2"><a href="Admin/login.php">Admin Login</a></small>
            </div><!--end 2nd column-->
        </div>
        </div>
    </footer>
    <!-- <a id="back2Top" title="Back to top" href="#">&#10148;</a> -->

 

    <!--javascript-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.min.js"></script>
</body>
</html>