<?php
define("TITLE","Change Password");
define('PAGE','requesterchangepass');
include("includes/header.php"); 
include("../db_connection.php");
session_start();
if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];
}else{
    echo "<script>location.href='Requesterlogin.php';</script>";
}

if(isset($_REQUEST['passupdate'])){
    if($_REQUEST['rpassword']==""){
        $msg='<div class="alert-warning mt-2 p-2" role="alert">Please Enter Password</div>';
    }else{
        $rPass=$_REQUEST['rpassword'];
        $sql="UPDATE requesterlogin_tb SET r_password ='$rPass' WHERE r_email='$rEmail'";
        if($conn->query($sql)==TRUE){
            $msg='<div class="alert-success mt-2 p-2" role="alert">Update successfully</div>';
        }
    }
}
?>

<div class="col-sm-6 mt-5"><!-- start changepassword Area 2nd column-->
    <form action="" method="post" class="mx-5">
        <div class="form-group">
            <label for="rEmail">Email</label>
            <input type="email" class="form-control" name="rEmail" id="rEmail"
                value="<?php echo $rEmail ; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="NewPass">New Password</label>
            <input type="text" class="form-control" name="rpassword" id="NewPass"
            placeholder="New Password" value="">
        </div>
        <button type="submit" name="passupdate" class="btn btn-danger">Update</button>
        <button type="reset" name="passreset" class="btn btn-dark">reset</button>
        <?php if(isset($msg)) { echo $msg ; }  ?>
    </form>
</div><!-- end change password Area 2nd column-->

<?php include("includes/footer.php");  ?>