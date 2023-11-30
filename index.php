<?php
include('config.php');


if(isset($_GET["code"])){
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

    if(!isset($token['error'])){
        $google_client->setAccessToken($token['access_token']);
        $_SESSION['access_token']=$token['access_token'];

        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();
        $_SESSION['user_email_address'] =$data['email'];
        $_SESSION['user_first_name'] =$data['given_name'];
        $_SESSION['user_last_name'] =$data['family_name'];
        $_SESSION['user_image'] =$data['picture'];
        $_SESSION['login_button'] =false;


    }
}
if(isset($_SESSION['login_button'])){
    $login_button=$_SESSION['login_button'];

}else{
    $login_button = true;
}

?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>PHP Login using Google Account</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  
 </head>
 <body>
  <div class="container">
   <br />
   <h2 align="center">PHP Login using Google Account</h2>
   <br />
   <?php
if($login_button){
    ?>
 <center><a href="<?=$google_client->createAuthUrl()?>"><img src='google.png'></a></center>
    <?php
}else{
    ?>
 <div class="panel panel-default">
   <div class="panel-heading">Welcome <?=$_SESSION['user_first_name']?></div><div class="panel-body">
   <img src="<?php echo$_SESSION['user_image']?>" class="img-responsive img-circle img-thumbnail" />
   <h3><b>Name :</b><?=$_SESSION['user_first_name']?> <?=$_SESSION['user_last_name']?></h3>
   <h3><b>Email :</b> <?=$_SESSION['user_email_address']?> </h3>
   <a href="storepass.php">Secure your account</a>
   <h3><a href="logout.php">Logout</h3></div>
   <div align="center"></div>
   </div>
    <?php
}
   ?>
  
  
  </div>
 </body>
</html>
