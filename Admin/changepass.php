<?php 
    define('TITLE','Change Password');
    define('PAGE','changepass');
   include("../db_connection.php");
   include("includes/header.php");
   session_start();
   if(isset($_SESSION['is_adminlogin'])){
       $aEmail = $_SESSION['aEmail'];
   }else{
       header("location:login.php");
   }
?>
<?php
 $aEmail = $_SESSION['aEmail'];
if(isset($_REQUEST['adminpassupdate'])){
    if($_REQUEST['apassword']==""){
        $msg='<div class="alert-warning mt-2 p-2" role="alert">Please Enter Password</div>';
    }else{
        $aPass=$_REQUEST['apassword'];
        $sql="UPDATE `adminlogin_tb` SET a_password ='$aPass' WHERE a_email ='$aEmail'";
        if($conn->query($sql)==TRUE){
            $msg='<div class="alert-success mt-2 p-2" role="alert">Update successfully</div>';
        }
    }
}
?>

<div class="col-sm-6 mt-5"><!-- start changepassword Area 2nd column-->
    <form action="" method="post" class="mx-5">
        <div class="form-group">
            <label for="aEmail">Email</label>
            <input type="email" class="form-control" name="aEmail" id="aEmail"
                value="<?php  echo $aEmail ; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="NewPass">New Password</label>
            <input type="text" class="form-control" name="apassword" id="NewPass"
            placeholder="New Password" value="">
        </div>
        <button type="submit" name="adminpassupdate" class="btn btn-danger">Update</button>
        <button type="reset" name="passreset" class="btn btn-dark">reset</button>
        <?php if(isset($msg)) { echo $msg ; }  ?>
    </form>
</div><!-- end change password Area 2nd column-->
<?php include("includes/footer.php");  ?>