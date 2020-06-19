<?php 
    define('TITLE','Assets');
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
   <?php 
if(isset($_REQUEST['submitproduct'])){
    //checking for empty fields
    if(($_REQUEST['p_name'] == "") ||
        ($_REQUEST['p_dop'] == "") || ($_REQUEST['p_aval'] == "") ||
        ($_REQUEST['p_total'] == "") || ($_REQUEST['originalprice'] == "") || 
        ($_REQUEST['sellingprice'] == "")){
            $msg = '<div class="alert alert-warning mt-3 p-2">All fileds are Require</div>';
        }else{ 
        $pname = $_REQUEST['p_name'];
        $pdop = $_REQUEST['p_dop'];
        $paval = $_REQUEST['p_aval'];
        $ptotal = $_REQUEST['p_total'];
        $originalprice = $_REQUEST['originalprice'];
        $sellingprice = $_REQUEST['sellingprice'];
        $sql="INSERT INTO `assets_tb`(`pname`, `pdop`, `paval`, `ptotal`, `poriginalcost`, `psellingcost`) 
        VALUES ('$pname','$pdop','$paval','$ptotal','$originalprice','$sellingprice')";
        if($conn->query($sql)==TRUE){
            $msg='<div class="alert-success mt-2 p-2" role="alert"> Added Successfully </div>';
        }else{
            $msg='<div class="alert-danger mt-2 p-2" role="alert"> Unable to Add </div>';
            }
        }
    }
?>
    <div class="col-sm-6 mt-5 jumbotron">
    <h4 class="text-center">Add New Product</h4>
    <form action="" method="post" class="mt-4">
            <div class="form-group">
                <label for="PName">Name</label>
                <input type="text" class="form-control" name="p_name">
            </div>
            <div class="form-group">
                <label for="DOP">DOP</label>
                <input type="date" class="form-control" name="p_dop">
            </div>
            <div class="form-group">
                <label for="Avalable">Available</label>
                <input type="text" class="form-control" name="p_aval" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="Total">Total</label>
                <input type="text" class="form-control" name="p_total" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="Oprice">Original Price Each</label>
                <input type="text" class="form-control" name="originalprice" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="Sprice">Selling Price Each</label>
                <input type="text" class="form-control" name="sellingprice" onkeypress="isInputNumber(event)">
            </div>
            <div class="text-center">
                <input type="submit" name="submitproduct" class="btn btn-warning mr-2">
                <a href="assets.php" class="btn btn-secondary">Close</a>
            </div>
        </form>
        <?php if(isset($msg)) {echo $msg; }?>

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