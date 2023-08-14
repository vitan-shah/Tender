<!DOCTYPE html> 
<html lang="en"> 
  <head> 
    <meta charset="UTF-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
    <title>Tender</title> 
    <link rel="stylesheet" href="style.css" /> 
    <script src="index.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
  </head> 
  <body> 
    <div class="container"> 
         
        <div class="box-1"> 
            <div class="content-holder"> 
                <h2>Welcome User!</h2> 
                <button class="button-1" onclick="signup()">Sign up</button> 
                <button class="button-2" onclick="login()">Login</button> 
            </div> 
        </div> 
   
         
 
         
        <div class="box-2"> 
            <div class="login-form-container"> 
                <h1>Login Form</h1> 
                <form action="" method="post"> 
                    <input type="email" placeholder="Email" class="input-field" name="email"> 
                    <br><br> 
                    <input type="password" placeholder="Password" class="input-field" name="pass"> 
                    <br><br> 
                    <button class="login-button" type="submit" id="login" name="login">Login</button> 
                </form> 
            </div> 
   
   
   
        <div class="signup-form-container"> 
            <h1>Sign Up Form</h1> 
            <form action="" method="post"> 
                <input type="text" placeholder="GST NO" class="input-field"  name="gstnum"> 
                <br><br> 
                <input type="text" placeholder="Organization Name" class="input-field" name="orgname"> 
                <br><br> 
                <input type="email" placeholder="Email" class="input-field" name="email"> 
                <br><br> 
                <select class="form-select input-field" name="type"> 
                    <option selected>Select Type</option> 
                    <option value="1">MNC</option> 
                    <option value="2">Private</option> 
                    <option value="3">Other</option> 
                </select> 
                <br><br> 
                <input type="number" placeholder="No of projects done" class="input-field" name="exp"> 
                <br><br> 
                
                <input type="password" placeholder="Password" class="input-field" name="pass"> 
                <br><br> 
                <button class="signup-button" type="submit" name="submit">Sign Up</button> 
            </form> 
        </div> 
        </div> 
 
  </body> 
</html> 
 
 
<?php 
include 'connection.php'; 
 
if(isset($_POST['login'])){ 
 $mail=$_POST['email']; 
 $pass=$_POST['pass']; 

 if($mail=="admin1@gmail.com"&&$pass=="admin1"){
    header("Location:gov.php");

 }else{
    $sql="select * from organizationtb where orgEmail='$mail' and password='$pass'";
    $res=mysqli_query($con,$sql);
    if(mysqli_num_rows($res) > 0){
        $row=mysqli_fetch_array($res);
        session_start();
        $_SESSION['orgid']=$row[0];
        header("Location:userhomepage.php");
    }

 }
    
    
    
 } 
 
 
?> 
 
<?php 
include 'connection.php'; 
 
if(isset($_POST['submit'])) 
   { 
    $gnum = $_POST['gstnum']; 
    $orgname = $_POST['orgname']; 
    $email = $_POST['email']; 
    $type = $_POST['type']; 
    $exp=$_POST['exp']; 
                $pass=$_POST['pass']; 
    
    $query="INSERT INTO ORGANIZATIONTB(gstno,orgName,orgEmail,orgType,projectExp,password) VALUES('$gnum','$orgname','$email','$type','$exp','$pass')"; 
    $res=mysqli_query($con, $query); 
     
    }  
?>