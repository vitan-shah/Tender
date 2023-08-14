<?php 
include "connection.php";
$tid = $_GET["tid"];
$orgname = $_GET["orgname"];
echo $orgname ;
echo $tid;
$qry = "update bidtb set isAllocate=1 where tendid=$tid and orgid=(select orgid from organizationtb where orgname='$orgname')";
$res = mysqli_query($con, $qry);

if($res) {
    header("Location:gov.php");
} else {
    echo "Tender not Allocated";
}


?>
<a class="btn btn-primary" href="gov.php">Home</a>