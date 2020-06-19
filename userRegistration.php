<?php
    include("db_connection.php");
    if(isset($_REQUEST['rSingup'])){
    //checking for empty fields
    if(($_REQUEST['rName']=="") || ($_REQUEST['rEmail']=="") || ($_REQUEST['rPassword']=="")){
        $regmsg='<div class="alert-warning mt-2 p-2" role="alert"> All Fields are Require </div>';
    }else{
        //checking email register
        $sql="SELECT r_email FROM requesterlogin_tb WHERE r_email='".$_REQUEST['rEmail']."'";
        $result=$conn->query($sql);
        if($result->num_rows == 1){
            $regmsg='<div class="alert-warning mt-2 p-2" role="alert"> Email ID Already Registered </div>'; 
        }else{
        //assigning Users values to variable
        $rName=$_REQUEST['rName'];
        $rEmail=$_REQUEST['rEmail'];
        $rPassword=$_REQUEST['rPassword'];
        $sql="INSERT INTO requesterlogin_tb(r_name,r_email,r_password) VALUES('$rName', '$rEmail', '$rPassword')";
        if($conn->query($sql)==TRUE){
            $regmsg='<div class="alert-success mt-2 p-2" role="alert"> Registration Successfully </div>';
        }else{
            $regmsg='<div class="alert-danger mt-2 p-2" role="alert"> Unable to create Account </div>';
            }
        }
    }
}

?>

<!--start registration form-->
<div class="container pt-5" id="registration">
    <h2 class="text-center">Create an Account</h2>
    <div class="row mt-4 mb-4">
        <div class="col-md-6 offset-md-3">
            <form action="" class="shadow-lg p-4" method="post">
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2">Name</label>
                    <input type="text" class="form-control" name="rName" placeholder="Name">
                </div>
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label>
                    <input type="email" class="form-control" name="rEmail" placeholder="Email">
                    <small class="form-text">We'll never share your email with anyone else</small>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">New Password</label>
                    <input type="password" class="form-control" name="rPassword" placeholder="Password">
                </div>
                <button type="submit" name="rSingup" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold">Sing up</button>
                <em style="font-size:10px">Note-By clicking Sign up, you agree to our Teams, Data Policy and Cookie Policy</em>
                <?php if(isset($regmsg)) {echo $regmsg; }?>
            </form>
        </div>
    </div>
</div> <!--End registration form container-->