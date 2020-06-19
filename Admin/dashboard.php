<?php 
define("TITLE",'Dashboard');
define('PAGE','dashboard');
include("../db_connection.php");
include("includes/header.php");
session_start();
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
}else{
    header("location:login.php");
}

    //retrieve data 
    $sql="SELECT MAX(request_id) FROM submitrequest_tb";
    $result=$conn->query($sql);
    $row = $result->fetch_row();
    $submitrequest = $row[0];

    $sql="SELECT MAX(rno) FROM assignwork_tb";
    $result=$conn->query($sql);
    $row = $result->fetch_row();
    $assignwork = $row[0];

    $sql="SELECT * FROM technician_tb";
    $result=$conn->query($sql);
    $totaltechnician = $result->num_rows;
?>
<div class="col-sm-9 col-md-10"> <!--start dashboard 2nd column -->
    <div class="row text-center m-5"><!-- start 2nd column 1st row-->
        <div class="col-sm-4">
            <div class="card text-white bg-danger mb-3" style="max-width:18em;">
                <div class="card-header">Request Receive</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $submitrequest; ?></h4>
                    <a class="btn text-white" href="request.php">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-white bg-success mb-3" style="max-width:18em;">
                <div class="card-header">Assigned Work</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $assignwork; ?></h4>
                    <a class="btn text-white" href="work.php">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-white bg-info mb-3" style="max-width:18em;">
                <div class="card-header">No of Technician</div>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $totaltechnician; ?></h4>
                    <a class="btn text-white" href="technician.php">View</a>
                </div>
            </div>
        </div>
    </div><!-- End 2nd column 1st row-->

    <div class="row"><!-- start 2nd column 2nd row-->
        <div class="col-sm-12">
            <div class="m-5 text-center">
                <p class="bg-dark text-white p-2">list of Requesters</p>
                    <?php
                    $sql="SELECT * FROM requesterlogin_tb";
                    $result=$conn->query($sql);
                    if($result->num_rows > 0){
                        echo '
                        <table class="table table-hover text-center">
                            <thead>
                            <tr>
                                <th>Requester Id</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                        <tbody>';
                        while($row=$result->fetch_assoc()){
                        echo '<tr>';
                            echo '<td>'.$row["r_login_id"].'</td>';
                            echo '<td>'.$row["r_name"].'</td>';
                            echo '<td>'.$row["r_email"].'</td>';
                        echo '</tr>';
                        }
                        '</tbody> 
                        </table>

                        ';
                    }else{
                        echo '0 Result';
                    }

                    ?>
            </div>
        </div>
    </div><!-- End 2nd column 2nd row-->
    
</div><!--end dashboard 2nd column -->

<?php include("includes/footer.php");  ?>