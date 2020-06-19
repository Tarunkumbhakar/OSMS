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
    <?php 
if(isset($_REQUEST['techniciansubmit'])){
    //checking for empty fields
    if(($_REQUEST['emp_name']=="") || ($_REQUEST['emp_city']=="") || 
     ($_REQUEST['emp_mobile']=="") || ($_REQUEST['emp_email']=="")){
        $regmsg='<div class="alert-warning mt-2 p-2" role="alert"> All Fields are Require </div>';
    }else{
        //assigning Users values to variable
        $empname = $_REQUEST['emp_name'];
        $empcity = $_REQUEST['emp_city'];
        $empmobile = $_REQUEST['emp_mobile'];
        $empemail = $_REQUEST['emp_email'];
        $sql="INSERT INTO technician_tb(empName, empCity, empMobile, empEmail) VALUES('$empname', '$empcity', '$empmobile', '$empemail')";
        if($conn->query($sql)==TRUE){
            $regmsg='<div class="alert-success mt-2 p-2" role="alert"> Added Successfully </div>';
        }else{
            $regmsg='<div class="alert-danger mt-2 p-2" role="alert"> Unable to Add </div>';
            }
        }
    }
?>
<!-- Start 2nd column -->
<div class="col-sm-6 mt-5 ml-3 jumbotron">
    <h4 class="text-center">Add New Technician</h4>
<form action="" class="shadow-sm p-4" method="post">
    <div class="form-group">
        <label for="Tname" class="font-weight-bold pl-2">Technician Name</label>
        <input type="text" class="form-control" name="emp_name" placeholder="Name">
    </div>
    <div class="form-group">
        <label for="Tcity" class="font-weight-bold pl-2">Technician City</label>
        <input type="text" class="form-control" name="emp_city" placeholder="City">
    </div>
    <div class="form-group">
        <label for="TMobile" class="font-weight-bold pl-2">Technician Mobile</label>
        <input type="text" class="form-control" name="emp_mobile" placeholder="Mobile"
        onkeypress="isInputNumber(event)">
    </div>
    <div class="form-group">
        <label for="Temail" class="font-weight-bold pl-2">Technician Email</label>
        <input type="email" class="form-control" name="emp_email" placeholder="Email">
    </div>
    <div class="text-center">
    <button type="submit" name="techniciansubmit" class="btn btn-danger mt-2 mr-2">Submit</button>
    <a href="technician.php" class="btn btn-secondary mt-2">Close</a>
    </div>
    <?php if(isset($regmsg)) {echo $regmsg; }?>
</form>
</div>




<script>
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!/[0-9]/.test(ch)){
            evt.preventDefault();
        }
    }
</script>
<?php include("includes/footer.php");  ?>