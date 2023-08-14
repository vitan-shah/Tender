<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Tenders</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div>
    <a class="btn btn-primary" href="logout.php">Logout</a>
        <h1 style="text-align: center;
    padding-top: 10px;">Live Tenders</h1>

        <div class="closeten">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Tender ID</th>
                        <th scope="col">Tender Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Description</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "connection.php";

                    $qry = "select * from tendertb";
                    $res = mysqli_query($con, $qry);
                    while ($row = mysqli_fetch_array($res)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $row[0]; ?></th>
                            <th scope="row"><?php echo $row[1]; ?></th>
                            <th scope="row"><?php echo $row[2]; ?></th>
                            <th scope="row"><?php echo $row[3]; ?></th>
                            <th scope="row"><?php echo $row[4]; ?></th>
                            <th scope="row"><?php echo $row[5]; ?></th>
                            <th scope="row"><?php echo $row[6]; ?></th>
                            <th scope="row"><?php echo $row[7]; ?></th>
                            <td><a href="bidding.php?tid=<?php echo $row[0]?>" class="link-info">Apply</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div>
        <h1 style="text-align: center;
    padding-top: 10px;">Alloted Tenders</h1>

        <div class="closeten">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Tender ID</th>
                        <th scope="col">Tender Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Description</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                   
                    error_reporting(E_ERROR | E_PARSE);
                    $orgId = $_SESSION["orgid"];
                    include "connection.php";


$qry = "select * from tendertb where tendId in(select tendId from bidTb where orgId=$orgId and isallocate=1)";
                    $res = mysqli_query($con, $qry);
                    while ($row = mysqli_fetch_array($res)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $row[0]; ?></th>
                            <th scope="row"><?php echo $row[1]; ?></th>
                            <th scope="row"><?php echo $row[2]; ?></th>
                            <th scope="row"><?php echo $row[3]; ?></th>
                            <th scope="row"><?php echo $row[4]; ?></th>
                            <th scope="row"><?php echo $row[5]; ?></th>
                            <th scope="row"><?php echo $row[6]; ?></th>
                            <th scope="row"><?php echo $row[7]; ?></th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>