<?php 
 session_start(); 
    include "connection.php"  
?> 
<!DOCTYPE html> 
 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Tender Generate</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    <link rel="stylesheet" href="style.css"> 
</head> 
<body> 
    <div class="formtender"> 
    <form class="w-auto" method="post"> 
        <div class="mb-3"> 
          <label for="inputname" class="form-label" >Tender Name</label> 
          <input type="text" class="form-control" name="name"> 
        </div> 
 
        <label for="category" class="form-label" >Category</label> 
        <select class="form-select" name="cat"> 
          <option selected>Select Category</option> 
          <option value="1">Electronics</option> 
          <option value="2">Construction</option> 
          <option value="3">Other</option> 
        </select> 
 
        <div class="mb-3"> 
          <label for="inputprice" class="form-label pl"> Price</label> 
          <input type="number" class="form-control" name="price"> 
        </div> 
 
        <div class="mb-3"> 
          <label for="inputduration" class="form-label" >Duration (In Month)</label> 
          <input type="number" class="form-control" name="dur"> 
        </div> 
 
        <div class="mb-3"> 
          <label for="inputdesc" class="form-label" >Description</label> 
          <textarea class="form-control" rows="3" name="des"></textarea> 
        </div> 
 
        <div class="mb-3"> 
          <label for="inputsdate" class="form-label" >Start Date</label> 
          <input type="date" class="form-control" name="sdate"> 
        </div> 
         
        <div class="mb-3"> 
          <label for="inputedate" class="form-label" >End Date</label> 
          <input type="date" class="form-control" name="edate"> 
        </div> 
 
        <button type="submit" class="btn btn-primary" name="submit">Submit</button> 
        <a class="btn btn-primary" href="gov.php">Home</a>
      </form> 
    </div> 
    <?php  
  if(isset($_POST['submit'])) 
   { 
     
    $name = $_POST['name']; 
    $category = $_POST['cat']; 
    $price =  $_POST['price']; 
    $duration = $_POST['dur']; 
    $description = $_POST['des']; 
    $sdate=$_POST['sdate']; 
    $edate=$_POST['edate']; 
    
    $query="INSERT INTO TENDERTB(tendName,category,price,duration,description,s_date,e_date) VALUES('$name','$category','$price','$duration','$description','$sdate','$edate')"; 
    $res=mysqli_query($con, $query); 
     
    }  
     
       
     
     
     
 ?> 
</body> 
</html>