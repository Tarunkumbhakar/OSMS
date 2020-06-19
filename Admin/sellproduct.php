<?php 
    define('TITLE','Sellproduct');
    define('PAGE','assets');
   include("../db_connection.php");
   include("includes/header.php");
   session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else{
    header("location:login.php");
}

    if(isset($_REQUEST['psubmit'])){
        if(($_REQUEST['p_name'] == "") || ($_REQUEST['customer_name'] == "") || 
        ($_REQUEST['customer_address'] == "") || ($_REQUEST['quentity'] == "") 
        || ($_REQUEST['totalprice'] == "") || ($_REQUEST['sellingprice'] == "") 
        || ($_REQUEST['sellingdate'] == "")){
            $msg = '<div class="alert alert-warning mt-3 p-2">All fileds are Require</div>';
        }else{ 
            $pid=$_REQUEST['p_id'];
            $paval = ($_REQUEST['p_aval'] - $_REQUEST['quentity']);
        $pname = $_REQUEST['p_name'];
        $cname = $_REQUEST['customer_name'];
        $caddress = $_REQUEST['customer_address'];
        $quentity = $_REQUEST['quentity'];
        $totalprice = $_REQUEST['totalprice'];
        $sellingprice = $_REQUEST['sellingprice'];
        $sellingdate = $_REQUEST['sellingdate'];
        $sql="INSERT INTO `customer_tb`(`custname`, `custadd`, `cpname`, `cpquentity`, `cpeach`, `cptotal`, `cpdate`) 
        VALUES ('$cname','$caddress','$pname','$quentity','$sellingprice','$totalprice',' $sellingdate')";
        if($conn->query($sql)==TRUE){
            $genid = mysqli_insert_id($conn);
            session_start();
            $_SESSION['myid'] = $genid;
            header("location:productsellsuccess.php");
        }
        $sqlup="UPDATE assets_tb SET paval = '$paval' WHERE pid ='$pid'";
        $conn->query($sqlup);
    }
}
?>
<div class="col-sm-6 mt-5 ml-3 jumbotron"><!--statr 2nd column-->
<h4 class="text-center">Customer Bill</h4>
        <?php 
            if(isset($_REQUEST['sellproduct'])){
            $sql="SELECT * FROM assets_tb WHERE pid={$_REQUEST['id']}";
                $result=$conn->query($sql);
                $row=$result->fetch_assoc();
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
                 value="<?php if(isset($row['pname'])) {echo $row['pname'];} ?>" readonly>
            </div>
            <div class="form-group">
                <label for="CName">Customer Name</label>
                <input type="text" class="form-control" name="customer_name">
            </div>
            <div class="form-group">
                <label for="CAddress">Customer Address</label>
                <input type="text" class="form-control" name="customer_address">
            </div>
            <div class="form-group">
                <label for="Avalable">Available</label>
                <input type="text" class="form-control" name="p_aval"
                 value="<?php  if(isset($row['paval'])) {echo $row['paval'];} ?>" readonly>
            </div>
            <div class="form-group">
                <label for="PName">Quentity</label>
                <input type="text" class="form-control" name="quentity" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="Sprice">Price Each</label>
                <input type="text" class="form-control" name="sellingprice"
                 value="<?php  if(isset($row['psellingcost'])) {echo $row['psellingcost'];} ?>"
                 onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="Sprice">Total Price</label>
                <input type="text" class="form-control" name="totalprice" onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group">
                <label for="Date">Date</label>
                <input type="date" class="form-control" name="sellingdate">
            </div> 
            <div class="text-center">
                <input type="submit" value="submit" name="psubmit" class="btn btn-danger mr-2">
                <a href="assets.php" class="btn btn-secondary">Close</a>
            </div>
        </form>
        <?php if(isset($msg)) { echo $msg ;} ?>
    </div><!--statr 2nd column-->

    <script>
         function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!(/[0-9]/).test(ch)){
            evt.preventDefault();
        }
    }
    </script>
<?php include("includes/footer.php");  ?>