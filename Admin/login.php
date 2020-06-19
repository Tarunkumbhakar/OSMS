<?php 
    include("../db_connection.php");
    session_start();
    if(!isset($_SESSION['is_adminlogin'])){
    if(isset($_REQUEST['aEmail'])){
        
    //get two input fileds 
    $aEmail = mysqli_real_escape_string($conn, trim($_REQUEST['aEmail']));
    $aPassword = mysqli_real_escape_string($conn, trim($_REQUEST['aPassword']));

    //write query
    $sql="SELECT a_email,a_Password FROM adminlogin_tb WHERE a_email='$aEmail'
    AND a_password='$aPassword' limit 1";
    $result=$conn->query($sql);
    if($result->num_rows==1){
        $_SESSION['is_adminlogin'] = true;
        $_SESSION['aEmail'] = $aEmail;
        echo "<script>location.href='dashboard.php';</script>";
        exit();
    }else{
        $adminmsg='<div class="alert-danger mt-2 p-2" role="alert">Enter valid Email and Password</div>';
    }
} 
}else{
    echo "<script>location.href='dashboard.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--Fontawesome css-->
    <link rel="stylesheet" href="../css/all.min.css">
    <!--Custom css-->
    <link rel="stylesheet" href="../css/custom.css">
</head>
<body>
    <div class="mb-3 mt-5 text-center" style="font-size:30px">
        <i class="fas fa-stethoscope"></i>
        <span>Online Services Management System</span>
    </div>
    <p class="text-center" style="font-size:20px;">
    <i class="fas fa-user-secret text-danger"></i>Admin Area</p>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-sm-6 col-md-4">
                <form method="post" class="shadow-lg p-4">
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="Email" class="font-weight-bold pl-2">Email</label>
                    <input type="text" class="form-control" name="aEmail" placeholder="Email">
                    <small class="form-text">We'll never share your email with anyone else</small>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">New Password</label>
                    <input type="password" class="form-control" name="aPassword" placeholder="Password">
                </div>
                <input type="submit" name="rLogin" class="btn btn-outline-danger btn-block mt-4 shadow-sm" value="Login">
                <?php if(isset($adminmsg)) {echo $adminmsg;} ?>
                </form>
                <div class="text-center">
                <a href="../index.php" class="btn btn-info text-center mt-3 shadow-sm font-weight-bold">Back To Home</a>
                </div>
            </div>
        </div>
    </div>
     <!--javascript-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>
</html>