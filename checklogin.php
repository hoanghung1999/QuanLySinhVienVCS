<?php          
session_start();  
require_once ('dbhelp.php'); 
require_once "vendor/autoload.php";
use Twilio\Rest\Client;
  $s_username=$_POST['username'];
  $s_password=$_POST['password']; 
  $sid = "AC612272cdada97eb2e04137bf84c2d0ff";
  $token = "4cf53ade81f1a39e049f711dbfc4ff78";
 

      $sql= "select * from sinhvien where username='$s_username' and password='$s_password'";
      $user=executeResult($sql);
      $temp=count($user);
      if($temp==0){ 
        
         header('location:login.php');        
      }else{
         $pin = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
         $_SESSION['id']= $user[0]['id'];
         $_SESSION['name']=$user[0]['name'];
         $_SESSION['chucvu']=$user[0]['chucvu'];
         $_SESSION['pin']=$pin;
         $client = new Client($sid, $token);
         $client->messages->create(
             $user[0]['sdt'], array(
                 "from" => "+13135645363",
                 "body" => "Your adnan-tech.com 2-factor authentication code is: ". $pin
             )
         );
         $sqlupcode="Update sinhvien SET pin='$pin' Where id=".$_SESSION['id'];
         header('location:enterpin.php');
      }
?>