<?php 
    define('TITLE','Work Report');
    define('PAGE','workreport');
   include("../db_connection.php");
   include("includes/header.php");
   session_start();
   if(isset($_SESSION['is_adminlogin'])){
       $aEmail = $_SESSION['aEmail'];
   }else{
       header("location:login.php");
   }
?>
<!-- start 2nd column -->
<div class="col-sm-9 mt-5 text center">
   <form action="" method="post" class="d-print-none">
    <div class="row">
        <div class="form-group col-md-3">
            <input type="date" class="form-control" name="startdate" id="startdate">
        </div>
        <span>to</span>
        <div class="form-group col-md-3">
            <input type="date" class="form-control" name="enddate" id="enddate">
        </div>
        <div class="form-group">
            <input type="submit" value="search" class="btn btn-secondary" name="searchsubmit">
        </div>
    </div>
   </form>
   <?php
    if(isset($_REQUEST['searchsubmit'])){
        $startdate = $_REQUEST['startdate'];
        $enddate = $_REQUEST['enddate'];
        $sql="SELECT * FROM `assignwork_tb` WHERE assign_date BETWEEN '$startdate' AND '$enddate'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){ ?>
            <p class="bg-dark text-white text-center p-2">Details</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Requester ID</th>
                        <th>Request Info</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Mobile</th>
                        <th>Technician</th>
                        <th>Assign Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                while($row=$result->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $row['request_id'] ?></td>
                        <td><?php echo $row['request_info'] ?></td>
                        <td><?php echo $row['requester_name'] ?></td>
                        <td><?php echo $row['requester_add1'] ?></td>
                        <td><?php echo $row['requester_city'] ?></td>
                        <td><?php echo $row['requester_mobile'] ?></td>
                        <td><?php echo $row['assign_tech'] ?></td>
                        <td><?php echo $row['assign_date'] ?></td>
                    </tr>
                    <?php }  ?>
                </tbody>
            </table>
            <form action="" class="float-right">
            <input type="submit" value="Print" class="btn btn-danger d-print-none m-3"
                onclick="window.print()">
            <form>
            <?php
        }else{
            echo '<div class="alert alert-warning text-center" role ="alert" >No Records Found<div>';
        }
    }

?>
</div>
<?php include("includes/footer.php");  ?>