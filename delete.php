
<?php
include "connection.php";
$tid = $_GET["tid"];
$qry = "delete from bidtb where tendid=$tid";
$res = mysqli_query($con, $qry);

$qry = "delete from factortb where tendid=$tid";
$res = mysqli_query($con, $qry);

$qry = "delete from tendertb where tendid=$tid";
$res = mysqli_query($con, $qry);

header("location:gov.php");
?>