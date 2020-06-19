<?php
define("TITLE","Requester submit");
define('PAGE','submitrequest');
include("includes/header.php");
include("../db_connection.php");
session_start();
if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];
}else{
    echo "<script>location.href='Requesterlogin.php';</script>";
}

    if(isset($_REQUEST['submitrequest'])){
       //checking for empty fileds
       if(($_REQUEST['requestinfo']=="") || ($_REQUEST['requesterdesc']=="") || ($_REQUEST['requestername']=="") ||
       ($_REQUEST['requesteradd1']=="") || ($_REQUEST['requesteradd2']=="") || ($_REQUEST['requestercity']=="") ||
       ($_REQUEST['requesterstate']=="") || ($_REQUEST['requesterzip']=="") || ($_REQUEST['requesteremail']=="") ||
       ($_REQUEST['requestermobile']=="") || ($_REQUEST['requesterdate']=="")){
        $reqmsg='<div class="alert-warning mt-2 p-2" role="alert">All Fileds are Require</div>';
       }else{
        //getting input from form
        $rinfo = $_REQUEST['requestinfo'];
        $rdesc = $_REQUEST['requesterdesc'];
        $rname = $_REQUEST['requestername'];
        $radd1 = $_REQUEST['requesteradd1'];
        $radd2 = $_REQUEST['requesteradd2'];
        $rcity = $_REQUEST['requestercity'];
        $rstate = $_REQUEST['requesterstate'];
        $rzip = $_REQUEST['requesterzip'];
        $remail= $_REQUEST['requesteremail'];
        $rmobile = $_REQUEST['requestermobile'];
        $rdate = $_REQUEST['requesterdate'];

        $sql="INSERT INTO `submitrequest_tb`(`request_info`, `request_desc`, `requester_name`, 
        `requester_add1`, `requester_add2`, `requester_city`,`requester_state`,`requester_zip`, 
        `requester_email`, `requester_mobile`, `request_date`) 
        VALUES ('$rinfo', '$rdesc', '$rname', '$radd1', '$radd2', '$rcity',
        '$rstate', '$rzip', '$remail', '$rmobile', '$rdate')";

        if($conn->query($sql)==TRUE){
            $genid = mysqli_insert_id($conn);
            $reqmsg='<div class="alert-success mt-2 p-2" role="alert">Request Successfully</div>';
            $_SESSION['myid'] = $genid;
            echo "<script>location.href='submitrequestsuccess.php';</script>";
        }
    }
}
?>
 <div class="col-sm-9 mt-5"><!-- start services request from 2nd column -->
    <form action="" class="mx-5" method="post">
        <div class="from-group">
            <label for="inputRequestInfo">Request Info</label>
            <input type="text" class="form-control" id="inputRequestInfo"
             placeholder="Request Info" name="requestinfo">
        </div>
        <div class="from-group mt-2">
            <label for="inputRequestdesc">Description</label>
            <input type="text" class="form-control" id="inputRequestdesc"
            placeholder="description" name="requesterdesc">
        </div>
        <div class="from-group mt-2">
            <label for="inputRequestName">Name</label>
            <input type="text" class="form-control" id="inputRequestName"
            placeholder="Request Info" name="requestername">
        </div>

        <div class="row mt-2">
            <div class="form-group col-md-6">
                <label for="inputAddressLine1">Address Line 1</label>
                <input type="text" class="form-control" name="requesteradd1" id="inputAddressLine1" 
                placeholder="House No.123">
            </div>
            <div class="form-group col-md-6">
            <label for="inputAddressLine2">Address Line 2</label>
                <input type="text" class="form-control" name="requesteradd2" id="inputAddressLine2" 
                placeholder="Railway Colony">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="RequesterCity">City</label>
                <input type="text" class="form-control" name="requestercity" id="RequesterCity">
            </div>
            <div class="form-group col-md-4">
                <label for="RequesterState">State</label>
                <input type="text" class="form-control" name="requesterstate" id="RequesterState" >
            </div>
            <div class="form-group col-md-2">
                <label for="RequesterZip">Zip</label>
                <input type="text" class="form-control" name="requesterzip" id="RequesterZip"
                onkeypress="isInputNumber(event)">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="RequesterEmail">Email</label>
                <input type="email" class="form-control" name="requesteremail" id="RequesterEmail">
            </div>
            <div class="form-group col-md-3">
                <label for="RequesterMobile">Mobile</label>
                <input type="text" class="form-control" name="requestermobile" id="RequesterMobile" 
                onkeypress="isInputNumber(event)">
            </div>
            <div class="form-group col-md-3">
                <label for="Requesterdate">Date</label>
                <input type="date" class="form-control" name="requesterdate" id="Requesterdate">
            </div>
        </div>
        <input type="submit" name="submitrequest" class="btn btn-danger">
        <input type="reset" value="reset" name="resetrequest" class="btn btn-dark">
        <?php if(isset($reqmsg)) { echo $reqmsg ; }  ?>
    </form> 
 </div><!--end services request from 2nd column  -->

<!-- only number for Input fileds -->
    <script>
        function isInputNumber(evt){
            var ch=String.fromCharCode(evt.which);
            if(!(/[0-9]/.test(ch))){
                evt.preventDefault();
            }
        }
    </script>
<?php
   include("includes/footer.php");  
?>