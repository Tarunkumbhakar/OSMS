<?php 
    define('TITLE','Sell Report');
    define('PAGE','sellreport');
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
        $sql="SELECT * FROM `customer_tb` WHERE cpdate BETWEEN '$startdate' AND '$enddate'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){ ?>
            <p class="bg-dark text-white text-center p-2">Details</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>Product Name</th>
                        <th>Quentity</th>
                        <th>Price Each</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                while($row=$result->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $row['custid'] ?></td>
                        <td><?php echo $row['custname'] ?></td>
                        <td><?php echo $row['custadd'] ?></td>
                        <td><?php echo $row['cpname'] ?></td>
                        <td><?php echo $row['cpquentity'] ?></td>
                        <td><?php echo $row['cpeach'] ?></td>
                        <td><?php echo $row['cptotal'] ?></td>
                        <td><?php echo $row['cpdate'] ?></td>
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