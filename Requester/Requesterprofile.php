<?php
    define("TITLE","Requester Profile");
    define('PAGE','Requesterprofile');
    include("includes/header.php");
    include("../db_connection.php");
    session_start();
    if($_SESSION['is_login']){
        $rEmail=$_SESSION['rEmail'];
    }else{
        echo "<script>location.href='Requesterlogin.php';</script>";
    }

    $sql="SELECT r_name, r_email FROM requesterlogin_tb WHERE r_email='$rEmail'";
    $result=$conn->query($sql);
    if($result->num_rows == 1){
        $row=$result->fetch_assoc();
        $rName=$row['r_name'];
    }
    //update 
    if(isset($_REQUEST['nameupdate'])){
        if($_REQUEST['rName'] ==""){
            $updmsg='<div class="alert-warning mt-2 p-2" role="alert">Fill all the fileds</div>';
        }else{
            $rName=$_REQUEST['rName'];  
            $sql="UPDATE requesterlogin_tb SET r_name='$rName' WHERE r_email='$rEmail'";
            $result=$conn->query($sql);
            if($result){
                $updmsg='<div class="alert-success mt-2 p-2" role="alert">Update successfully</div>'; 
            }else{
                $updmsg='<div class="alert-warning mt-2 p-2" role="alert">Unable to update</div>';
            }
        }
    }
?>

<div class="col-sm-6 mt-5"><!-- start Profile Area 2nd column-->
    <form action="" method="post" class="mx-5">
        <div class="form-group">
            <label for="rEmail">Email</label>
            <input type="email" class="form-control" name="rEmail" id="rEmail"
                value="<?php echo $rEmail ; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="rName">Name</label>
            <input type="text" class="form-control" name="rName" id="rName"
            value="<?php echo $rName; ?>">
        </div>
        <button type="submit" name="nameupdate" class="btn btn-danger">Update</button>
        <?php if(isset($updmsg)) { echo $updmsg ; }  ?>
    </form>
</div><!-- end Profile Area 2nd column-->


<?php
   include("includes/footer.php");  
?>