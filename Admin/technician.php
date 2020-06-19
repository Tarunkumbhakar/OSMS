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
  <div class="col-sm-9 mt-5 text-center"><!--start 2nd column-->
    <p class="bg-dark text-white p-2">List of Technician</p>
    <?php 
        $sql="SELECT * FROM technician_tb";
        $result=$conn->query($sql);
        if($result->num_rows > 0){?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Technician ID</th>
                        <th>Technician Name</th>
                        <th>Technician City</th>
                        <th>Technician Mobile</th>
                        <th>Technician Email</th>
                        <th>Action</th>
                    </tr>
                    <tbody>
                    <?php 
                    while($row=$result->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $row['empid'] ?></td>
                            <td><?php echo $row['empName'] ?></td>
                            <td><?php echo $row['empCity'] ?></td>
                            <td><?php echo $row['empMobile'] ?></td>
                            <td><?php echo $row['empEmail'] ?></td>
                            <td>
                                <form action="edittechnician.php" method="post" class="d-inline">
                                   <input type="hidden" name="id" value="<?php echo $row['empid']; ?>"> 
                                   <button type="submit" name="emp_edit" class="btn btn-info"><i class="fas fa-pen"></i></button>
                                </form>
                                <form action="" method="post" class="d-inline">
                                   <input type="hidden" name="id" value="<?php echo $row['empid']; ?>"> 
                                   <button type="submit" name="emp_delete" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
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
    if(isset($_REQUEST['emp_delete'])){
    $sql="DELETE FROM technician_tb WHERE empid = {$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo '<meta http-equiv ="refresh" content="0;URL=?deleted" />';
    }
}
    ?>
    </div><!-- End row -->
        <div class="float-right mr-5">
            <a href="addtechnician.php" class="btn btn-danger">
                <i class="fas fa-plus fa-2x"></i>
            </a>
        </div>
</div><!-- end container -->

<?php include("includes/footer.php");  ?>