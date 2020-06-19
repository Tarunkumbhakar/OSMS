<?php 
define("TITLE","success");
define('PAGE','submitrequest');
include("includes/header.php");
include("../db_connection.php");
session_start();
if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];
}else{
    echo "<script>location.href='Requesterlogin.php';</script>";
}

$sql="SELECT * FROM submitrequest_tb WHERE request_id = {$_SESSION['myid']}";
$result=$conn->query($sql);
if($result->num_rows == 1){
    $row= $result->fetch_assoc();?>
    <div class="col-sm-6 mt-5">
    <table class="table table-bordered" cellpadding="16">
        <tr style="border-bottom:1px solid #F0aab1">
            <th>Request ID</th>
            <td><?php echo $row['request_id']  ?></td>
        </tr>
        <tr style="border-bottom:1px solid #F0aab1">
            <th>Name</th>
            <td><?php echo $row['requester_name']  ?></td>
        </tr>
        <tr style="border-bottom:1px solid #F0aab1">
            <th>Request Info</th>
            <td><?php echo $row['request_info']  ?></td>
        </tr>
        <tr style="border-bottom:1px solid #F0aab1">
            <th>Requester Description</th>
            <td><?php echo $row['request_desc'] ?></td>
        </tr>
    </table>
    <form class="d-print-none">
        <input type="submit" class="btn btn-danger"
        value="Print" onClick='window.print()'>
    </form>
</div>

    <?php
    }
    include("includes/footer.php");
    ?>