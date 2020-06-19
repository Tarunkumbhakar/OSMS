<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--bootstrap css-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!--Fontawesome css-->
    <link rel="stylesheet" href="../css/all.min.css">

    <link rel="stylesheet" href="../css/custom.css">

    <title><?php echo TITLE   ?></title>
</head>
<body>
    <!----Top navbar---->
    <nav class="navbar navbar-dark bg-danger
     pl-5 fixed-top flex-md-nowrap p-0 shadow-">
        <a href="Requesterprofile.php" class="navbar-brand col-sm-3 col-md-2 mr-0">OSMS</a>
    </nav><!----End Top navbar---->

    <!-- start container -->
    <div class="container-fluid" style="margin-top:30px;">
        <div class="row"><!-- start row -->
            <nav class="col-sm-2 bg-light sidebar nav-pills py-5"><!-- start side Bar -->
                <div class="sidebar-sticky">
                    <ul class="nav flex-column d-print-none">
                        <li class="nav-item">
                        <a class="nav-link <?php if(PAGE == 'Requesterprofile'){ echo 'active' ;} ?>" href="Requesterprofile.php"><i class="fas fa-user"></i>Profile</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link <?php if(PAGE=='submitrequest'){ echo 'active' ;} ?>" href="submitrequest.php"><i class="fab fa-accessible-icon"></i>Submit Request</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link <?php if(PAGE=='checkstatus'){ echo 'active' ;} ?>" href="checkstatus.php"><i class="fas fa-align-center"></i>Service Status</a>
                        </li>

                        <li class="nav-item">
                        <a class="nav-link <?php if(PAGE=='requesterchangepass'){ echo 'active' ;} ?>" href="requesterchangepass.php"><i class="fas fa-key"></i>Change Password</a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </nav><!-- end side Bar -->
