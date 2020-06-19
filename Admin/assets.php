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
<div class="col-sm-9 mt-5 text-center"><!--start 2nd column-->
    <p class="bg-dark text-white p-2">List of Product</p>
    <?php 
        $sql="SELECT * FROM assets_tb";
        $result=$conn->query($sql);
        if($result->num_rows > 0){?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>DOP</th>
                        <th>Available</th>
                        <th>Total</th>
                        <th>Oroginal Price Each</th>
                        <th>Selling Price Each</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                    <?php 
                    while($row=$result->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $row['pid'] ?></td>
                            <td><?php echo $row['pname'] ?></td>
                            <td><?php echo $row['pdop'] ?></td>
                            <td><?php echo $row['paval'] ?></td>
                            <td><?php echo $row['ptotal'] ?></td>
                            <td><?php echo $row['poriginalcost'] ?></td>
                            <td><?php echo $row['psellingcost'] ?></td>
                            <td>
                                <form action="editproduct.php" method="post" class="d-inline">
                                   <input type="hidden" name="id" value="<?php echo $row['pid']; ?>"> 
                                   <button type="submit" name="pruduct_edit" class="btn btn-info"><i class="fas fa-pen"></i></button>
                                </form>
                                <form action="" method="post" class="d-inline">
                                   <input type="hidden" name="id" value="<?php echo $row['pid']; ?>"> 
                                   <button type="submit" name="product_delete" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                </form>
                                <form action="sellproduct.php" method="post" class="d-inline">
                                   <input type="hidden" name="id" value="<?php echo $row['pid']; ?>"> 
                                   <button type="submit" name="sellproduct" class="btn btn-warning"><i class="fas fa-handshake"></i></button>
                                </form>
                            </td>
                        </tr>

                    <?php } ?>
                    </tbody>
                </thead>
            </table>
     <?php
        }else{
            echo "0 result";
        }
    ?>
    </div><!--start 2nd column-->

    <?php 
    if(isset($_REQUEST['product_delete'])){
    $sql="DELETE FROM assets_tb WHERE pid = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv ="refresh" content="0;URL=?deleted" />';
    }
}
    ?>
    </div><!-- End row -->
        <div class="float-right mr-5">
            <a href="addproduct.php" class="btn btn-danger">
                <i class="fas fa-plus fa-2x"></i>
            </a>
        </div>
</div><!-- end container -->

<?php include("includes/footer.php");  ?>