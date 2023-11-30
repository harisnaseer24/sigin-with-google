<?php 
include("../2301b2 php/essentials/header.php");
include("dbconfig.php");
session_start();
$email=$_SESSION['user_email_address'];
$fname=$_SESSION['user_first_name'];
$lname=$_SESSION['user_last_name'];
$userpic=$_SESSION['user_image'];




if(isset($_POST['secure'])){
    $pass= mysqli_real_escape_string($con,$_POST['password']);
     $cpass= mysqli_real_escape_string($con,$_POST['cpassword']);//string
     $encpass=password_hash($pass, PASSWORD_BCRYPT);
     if($pass ="" && $cpass =""){
        echo '<script>alert("Please fill all fields")</script>';
     }
    //  elseif(!$pass == $cpass ){
    //     echo '<script>alert("Passwords must match")</script>';
    //  }
     
     else{
        $sql="INSERT INTO `users`( `firstname`, `lstname`, `email`, `profilepic`, `password`) VALUES ('$fname','$lname','$email','$userpic','$encpass')";
        $result=mysqli_query($con, $sql) or die('failed to execute query');
    if($result){
        echo '<script>alert("Account is secured")</script>';
    }else{
        echo '<script>alert("Failed to ecure")</script>';
    }
    
    }

     }
    
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
<div class="container my-4">
    <form action="" method="post" class="form-group">
<h2 class="text-center">Add your password</h2>
   
    
    <input type="password" name="password" id="" class="form-control my-2" placeholder="Enter password">
    <input type="password" name="cpassword" id="" class="form-control my-2" placeholder="Confirm password">
    <input type="submit" name="secure" id="" class="form-control btn btn-dark my-2">
    </form>
</div>    
<?php 

?>

</body>
</html>