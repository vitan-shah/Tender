<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Bids</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <h1 style="text-align: center;
    padding-top: 10px;">ALL BIDS</h1>

    <h3 style="text-align: center;
    padding-top: 10px;">Sort on the basis of</h3>


<a class="btn btn-primary" href="gov.php">Home</a>
    <form action="" method="post">
        <div class="sort">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="price" value="option1">
                <label class="form-check-label" for="inlineCheckbox1">Price</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="warantee" value="option2">
                <label class="form-check-label" for="inlineCheckbox2">Warranty</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="gaurantee" value="option3">
                <label class="form-check-label" for="inlineCheckbox3">Gaurantee</label>
            </div>
        </div>

        <button class="btn btn-outline-dark" type="submit" name="sort" style="margin: 1%  0 0 47%;">Sort</button>
    </form>


    
    <?php
    if (isset($_POST['sort'])) {
?>

<div class="closeten">

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">TenderName</th>
                    <th scope="col">OrganizationName</th>
                    <th scope="col">Price</th>
                    <th scope="col">Warranty</th>
                    <th scope="col">Gaurantee</th>
                    <th scope="col">Duration</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Larry the Bird</td>
                <td>Hello</td>
                <td>@twitter</td>
                </tr> -->
                <?php
                include('connection.php');
                session_start();
                $sql;
                $tid = $_GET['tid'];
                // $sql = "select projectExp from organizationtb where orgId=$orgid";
                if (isset($_POST['price']) && isset($_POST['warantee']) && isset($_POST['gaurantee'])) {
                    $sql = "select t.tendName,o.orgName,b.bidPrice,f.warranty,f.guarantee,b.duration from tendertb t,organizationtb o,factortb f,bidtb b where f.tendId=$tid and t.tendId=$tid and f.orgId=o.orgId and f.bid=b.bidId order by f.factor";
                      $res = mysqli_query($con, $sql);
                } elseif (isset($_POST['price'])) {
                    $sql = "select t.tendName,o.orgName,b.bidPrice,f.warranty,f.guarantee,b.duration from tendertb t,organizationtb o,factortb f,bidtb b where f.tendId=$tid and t.tendId=$tid and f.orgId=o.orgId and f.bid=b.bidId order by f.price";
                     $res = mysqli_query($con, $sql);
                } elseif (isset($_POST['warantee'])) {
                    $sql = "select t.tendName,o.orgName,b.bidPrice,f.warranty,f.guarantee,b.duration from tendertb t,organizationtb o,factortb f,bidtb b where f.tendId=$tid and t.tendId=$tid and f.orgId=o.orgId and f.bid=b.bidId order by f.warranty desc";
                    $res = mysqli_query($con, $sql);
                } elseif (isset($_POST['gaurantee'])) {
                    $sql = "select t.tendName,o.orgName,b.bidPrice,f.warranty,f.guarantee,b.duration from tendertb t,organizationtb o,factortb f,bidtb b where f.tendId=$tid and t.tendId=$tid and f.orgId=o.orgId and f.bid=b.bidId order by f.guarantee desc";
                     $res = mysqli_query($con, $sql);
                } else {
                    $sql = "select t.tendName,o.orgName,b.bidPrice,f.warranty,f.guarantee,b.duration from tendertb t,organizationtb o,factortb f,bidtb b where f.tendId=$tid and t.tendId=$tid and f.orgId=o.orgId and f.bid=b.bidId order by f.price";
                    $res = mysqli_query($con, $sql);
                }

                while ($row = mysqli_fetch_array($res)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row[0]; ?></th>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                        <td><?php echo $row[5]; ?></td>
                        <td><a href="allocate.php?tid=<?php echo $tid; ?>&orgname=<?php echo $row[1]; ?>">Allocate</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
        
    }
    ?>
</body>

</html>