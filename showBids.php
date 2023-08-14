<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Bids</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<div>
    <h1 style="text-align: center;
    padding-top: 10px;">Bids</h1>

    <div class="closeten">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Organization</th>
                    <th scope="col">Type</th>
                    <th scope="col">Tender</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Bid Price</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Allocated</th>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                include "connection.php";
                $tid = $_GET["tid"];

                $qry = "select orgName, orgType, tendName, category, description, bidPrice, b.duration, isAllocate from organizationtb o, tendertb t, bidtb b where b.orgid = o.orgid and t.tendid=$tid and b.tendid=$tid";
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
        
      <a class="btn btn-primary" href="gov.php">Home</a>
    </div>