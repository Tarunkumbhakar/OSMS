<?php 
    define('TITLE','Update product');
    define('PAGE','assets');
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
        <h3 class="text-center">Update Product Details</h3>
        <?php 
            if(isset($_REQUEST['pruduct_edit'])){
            $sql="SELECT * FROM assets_tb WHERE pid={$_REQUEST['id']}";
                $result=$conn->query($sql);
                $row=$result->fetch_assoc();
            }

            if(isset($_REQUEST['pupdate'])){
                if(($_REQUEST['p_id'] == "") || ($_REQUEST['p_name'] == "") ||
                ($_REQUEST['p_dop'] == "") || ($_REQUEST['p_aval'] == "") ||
                ($_REQUEST['p_total'] == "") || ($_REQUEST['originalprice'] == "") || 
                ($_REQUEST['sellingprice'] == "")){
                    $msg = '<div class="alert alert-warning mt-3 p-2">All fileds are Require</div>';
                }else{ 
                $pid = $_REQUEST['p_id'];
                $pname = $_REQUEST['p_name'];
                $pdop = $_REQUEST['p_dop'];
                $paval = $_REQUEST['p_aval'];
                $ptotal = $_REQUEST['p_total'];
                $originalprice = $_REQUEST['originalprice'];
                $sellingprice = $_REQUEST['sellingprice'];

                $sql="UPDATE assets_tb SET pid ='$pid', pname ='$pname', pdop ='$pdop',
                paval ='$paval', ptotal='$ptotal', poriginalcost ='$originalprice', psellingcost ='$sellingprice' WHERE pid ='$pid'";
                if($conn->query($sql) == TRUE){
                    $msg = '<div class="alert alert-success mt-3 p-2">Update Successfully</div>';
                }
            }
        }
        ?>

        <form action="" method="post" class="mt-4">
            <div class="form-group">
                <label for="PId">Product ID</label>
                <input type="text" class="form-control" name="p_id"
                 value="<?php  if(isset($row['pid'])) {echo $row['pid'];} ?>" readonly>
            </div>
            <div class="form-group">
                <label for="PName">Name</label>
                <input type="text" class="form-control" name="p_name"
                 value="<?php if(isset($row['pname'])) {echo $row['pname'];} ?>">
            </div>
            <div class="form-group">
                <label for="DOP">DOP</label>
                <input type="date" class="form-control" name="p_dop"
                 value="<?php  if(isset($row['pdop'])) {echo $row['pdop'];} ?>">
            </div>
            <div class="form-group">
                <label for="Avalable">Available</label>
                <input type="text" class="form-control" name="p_aval"
                 value="<?php  if(isset($row['paval'])) {echo $row['paval'];} ?>">
            </div>
            <div class="form-group">
                <label for="Total">Total</label>
                <input type="text" class="form-control" name="p_total"
                 value="<?php  if(isset($row['ptotal'])) {echo $row['ptotal'];} ?>">
            </div>
            <div class="form-group">
                <label for="Oprice">Original Price Each</label>
                <input type="text" class="form-control" name="originalprice"
                 value="<?php  if(isset($row['poriginalcost'])) {echo $row['poriginalcost'];} ?>">
            </div>
            <div class="form-group">
                <label for="Sprice">Selling Price Each</label>
                <input type="text" class="form-control" name="sellingprice"
                 value="<?php  if(isset($row['psellingcost'])) {echo $row['psellingcost'];} ?>">
            </div>
            <div class="text-center">
                <input type="submit" value="Update" name="pupdate" class="btn btn-warning mr-2">
                <a href="assets.php" class="btn btn-secondary">Close</a>
            </div>
    
        </form>
        <?php if(isset($msg)) { echo $msg ;} ?>
    </div><!--statr 2nd column-->

<?php include("includes/footer.php");  ?>