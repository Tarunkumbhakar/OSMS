<?php 
    include("../db_connection.php");
    session_start();
    if(!isset($_SESSION['is_login'])){
    if(isset($_REQUEST['rEmail'])){
    //get two input fileds 
    $rEmail = mysqli_real_escape_string($conn, trim($_REQUEST['rEmail']));
    $rPassword = mysqli_real_escape_string($conn, trim($_REQUEST['rPassword']));
    $sql="SELECT r_email,r_Password FROM requesterlogin_tb WHERE r_email='$rEmail'
    AND r_password='$rPassword' limit 1";
    $result=$conn->query($sql);
    if($result->num_rows==1){
        $_SESSION['is_login'] = true;
        $_SESSION['rEmail'] = $rEmail;
        echo "<script>location.href='Requesterprofile.php';</script>";
        exit();
    }else{
        $logmsg='<div class="alert-danger mt-2 p-2" role="alert">Enter valid Email and Password</div>';
    }
} 
}else{
    echo "<script>location.href='Requesterprofile.php';</script>";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <i class="fas fa-user-secret text-danger"></i>Requester Area</p>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-sm-6 col-md-4">
                <form method="post" class="shadow-lg p-4">
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="Email" class="font-weight-bold pl-2">Email</label>
                    <input type="text" class="form-control" name="rEmail" placeholder="Email">
                    <small class="form-text">We'll never share your email with anyone else</small>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">New Password</label>
                    <input type="password" class="form-control" name="rPassword" placeholder="Password">
                </div>
                <input type="submit" name="rLogin" class="btn btn-outline-danger btn-block mt-4 shadow-sm" value="Login">
                <?php if(isset($logmsg)) {echo $logmsg;} ?>
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