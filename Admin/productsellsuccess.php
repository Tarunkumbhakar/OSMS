<?php 
    define('TITLE','Success');
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
<div class="col-sm-7 m-5">
<h3 class="text-center">Customer Bill</h3>
<?php
$sql="SELECT * FROM `customer_tb` WHERE custid = {$_SESSION['myid']}";
$result=$conn->query($sql);
if($result->num_rows == 1){
    $row=$result->fetch_assoc(); ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Customer ID :</th>
                <td><?php echo $row['custid']; ?></td>
            </tr>
            <tr>
                <th>Customer Name :</th>
                <td><?php echo $row['custname']; ?></td>
            </tr>
            <tr>
                <th>Address :</th>
                <td><?php echo $row['custadd']; ?></td>
            </tr>
            <tr>
                <th>Product :</th>
                <td><?php echo $row['cpname']; ?></td>
            </tr>
            <tr>
                <th>Quentity :</th>
                <td><?php echo $row['cpquentity']; ?></td>
            </tr>
            <tr>
                <th>Price Each :</th>
                <td><?php echo $row['cpeach']; ?></td>
            </tr>
            <tr>
                <th>Total Cost :</th>
                <td><?php echo $row['cptotal']; ?></td>
            </tr>
            <tr>
                <th>Date :</th>
                <td><?php echo $row['cpdate']; ?></td>
            </tr>

            <tr>
                <td>
                    <form class="d-print-none">
                        <input type="submit" class="btn btn-danger"
                        value="Print" onClick='window.print()'>
                    </form>
                </td>
                <td>
                <a href="assets.php" class="btn btn-secondary">Close</a>
                </td>
        </tr>
        </thead>
    </table>


 <?php
}
?>
</div>

<?php include("includes/footer.php");  ?>
