<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bidding Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="formbidding">
    <form class="w-auto" method="post">

      <!-- <div class="mb-3">
              <label for="inputgst" class="form-label">GST NO</label>
              <input type="number" class="form-control">
            </div> -->

      <div class="mb-3">
        <label for="inputbidprice" class="form-label">Bid Price</label>
        <input type="number" name="bidprice" class="form-control">
      </div>

      <div class="mb-3">
        <label for="inputduration" class="form-label">Duration (In Month)</label>
        <input type="number" name="duration" class="form-control">
      </div>

      <div class="mb-3">
        <label for="inputwar" class="form-label">Warranty(In Month)</label>
        <input type="text" name="warnt" class="form-control">
      </div>

      <div class="mb-3">
        <label for="inputgur" class="form-label">Guarantee(In Month)</label>
        <input type="text" name="grnt" class="form-control">
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Add Bid</button>
      <a class="btn btn-primary" href="userhomepage.php">Home</a>
    </form>
  </div>

  <?php

  if (isset($_POST['submit'])) {
    $tenderId = $_GET["tid"];
    $orgId = $_SESSION["orgid"];
    $bidPrc = $_POST['bidprice'];
    $duration = $_POST['duration'];

    $warantee = $_POST['warnt'];
    $gaurantee = $_POST['grnt'];

    $gfactor = $gaurantee / $bidPrc;
    $wfactor = $warantee / $bidPrc;

    $factor = $gfactor * (0.7) + $wfactor * (0.3);

    include 'connection.php';

    // Changing the bid table for new bids as well as updated bids
    $sql = "select * from bidtb where orgId=$orgId and tendId=$tenderId";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) > 0) {
      $sql = "update bidtb set bidPrice=$bidPrc, duration=$duration where orgId=$orgId and tendId=$tenderId";
      $res = mysqli_query($con, $sql);
      if ($res) {
        echo "Tender bid updated successfully";
      } else {
        echo "Some problem in updating bids";
      }
      $sql = "select * from factortb where orgId=$orgId and tendId=$tenderId";
      $res = mysqli_query($con, $sql);
      if (mysqli_num_rows($res) > 0) {
        $sql = "update factortb set warranty=$warantee, guarantee=$gaurantee, price=$bidPrc, gfactor=$gfactor,  wfactor=$wfactor, factor=$factor where orgId=$orgId and tendId=$tenderId";
        $res = mysqli_query($con, $sql);
        if ($res) {
          echo "FactorTb updated successfully";
        } else {
          echo "Some problem in updating FactorTB";
        }
      }
    } else {
      $sql = "insert into bidtb values($tenderId, $orgId, $bidPrc, $duration, NULL)";
      $sql = "INSERT INTO `bidtb`( `tendId`, `orgId`, `bidPrice`, `duration`, `isAllocate`) VALUES ('$tenderId','$orgId','$bidPrc','$duration','NULL')";
      $res = mysqli_query($con, $sql);
      if ($res) {
        echo "Tender bid inserted successfully";
        $sql = "select bidId from bidtb where orgId=$orgId and tendId=$tenderId";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_row($res);
        $sql = "insert into factortb values($tenderId, $orgId, $warantee, $gaurantee, $bidPrc, $gfactor, $wfactor, $factor,$row[0])";
        $res = mysqli_query($con, $sql);
      } else {
        echo "Some problem in inserting bids";
      }
    }


    // Changing the factor table for updation and insertion of the updated bids
    // $sql = "select * from factortb where orgId=$orgId and tendId=$tenderId";
    // $res = mysqli_query($con, $sql);
    // if (mysqli_num_rows($res) > 0) {
    //   $sql = "update bidtb set warant=$warantee, guarantee=$gaurantee, price=$bidPrc, gfactor=$gfactor,  wfactor=$wfactor, factor=$factor where orgId=$orgId and tendId=$tenderId";
    //   $res = mysqli_query($con, $sql);
    //   if ($res) {
    //     echo "bidTB updated successfully";
    //   } else {
    //     echo "Some problem in updating bidTB";
    //   }
    // } else {
    //   $sql = "select bidId from bidtb where orgId=$orgId and tendId=$tenderId";
    //   $res = mysqli_query($con, $sql);
    //   $row = mysqli_fetch_row($res);
    //   $sql = "insert into factortb values($tenderId, $orgId, $warantee, $gaurantee, $bidPrc, $gfactor, $wfactor, $factor,$row[0])";
    //   if ($res) {
    //     echo "inserted in FactorTB successfully";
    //   } else {
    //     echo "Some problem in inserting bids";
    //   }
    // }
  }


  ?>
  
</body>

</html>