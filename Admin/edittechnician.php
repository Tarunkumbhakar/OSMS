<?php 
    define('TITLE','Technician');
    define('PAGE','technician');
   include("../db_connection.php");
   include("includes/header.php");
   session_start();
   if(isset($_SESSION['is_adminlogin'])){
       $aEmail = $_SESSION['aEmail'];
   }else{
       header("location:login.php");
   }
?> 

<div class="col-sm-6 mt-5 ml-3 jumbotron"><!--statr 2nd column-->
        <h3 class="text-center">Update Technician Details</h3>
        <?php 
            if(isset($_REQUEST['emp_edit'])){
            $sql="SELECT * FROM technician_tb WHERE empid={$_REQUEST['id']}";
                $result=$conn->query($sql);
                $row=$result->fetch_assoc();
            }

            if(isset($_REQUEST['empupdate'])){
                if(($_REQUEST['emp_id'] == "") || ($_REQUEST['emp_name'] == "") ||
                ($_REQUEST['emp_city'] == "") || ($_REQUEST['emp_mobile'] == "") ||
                ($_REQUEST['emp_email'] == "")){
                    $msg = '<div class="alert alert-warning mt-3 p-2">All fileds are Require</div>';
                }else{ 
                $eid = $_REQUEST['emp_id'];
                $ename = $_REQUEST['emp_name'];
                $ecity = $_REQUEST['emp_city'];
                $emobile = $_REQUEST['emp_mobile'];
                $eEmail = $_REQUEST['emp_email'];

                $sql="UPDATE technician_tb SET empid ='$eid', empName ='$ename', empCity ='$ecity',
                empMobile ='$emobile', empEmail='$eEmail' WHERE empid ='$eid'";
                if($conn->query($sql) == TRUE){
                    $msg = '<div class="alert alert-success mt-3 p-2">Update Successfully</div>';
                }
            }
        }
        ?>

        <form action="" method="post" class="mt-4">
            <div class="form-group">
                <label for="TId">Technician ID</label>
                <input type="text" class="form-control" name="emp_id"
                 value="<?php  if(isset($row['empid'])) {echo $row['empid'];} ?>" readonly>
            </div>
            <div class="form-group">
                <label for="TName">Technician Name</label>
                <input type="text" class="form-control" name="emp_name"
                 value="<?php if(isset($row['empName'])) {echo $row['empName'];} ?>">
            </div>
            <div class="form-group">
                <label for="TCity">Technician City</label>
                <input type="text" class="form-control" name="emp_city"
                 value="<?php  if(isset($row['empCity'])) {echo $row['empCity'];} ?>">
            </div>
            <div class="form-group">
                <label for="TMobile">Techinician Mobile</label>
                <input type="text" class="form-control" name="emp_mobile"
                 value="<?php  if(isset($row['empMobile'])) {echo $row['empMobile'];} ?>">
            </div>
            <div class="form-group">
                <label for="TEmail">Techinican Email</label>
                <input type="text" class="form-control" name="emp_email"
                 value="<?php  if(isset($row['empEmail'])) {echo $row['empEmail'];} ?>">
            </div>
            <div class="text-center">
                <input type="submit" value="Update" name="empupdate" class="btn btn-warning mr-2">
                <a href="technician.php" class="btn btn-secondary">Close</a>
            </div>
    
        </form>
        <?php if(isset($msg)) { echo $msg ;} ?>
    </div><!--statr 2nd column-->
<?php include("includes/footer.php");  ?>