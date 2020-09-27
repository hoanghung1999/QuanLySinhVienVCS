<?php          
session_start();  
require_once ('dbhelp.php'); 
   
  $s_username=$_POST['username'];
  $s_password=$_POST['password']; 
 
 

      $sql= "select * from sinhvien where username='$s_username' and password='$s_password'";
      $user=executeResult($sql);
      $temp=count($user);
      if($temp==0){ 
        
       header('location:login.php');        
      }else{
        
      if($user[0]['chucvu']=='QL'){
         $_SESSION['id']= $user[0]['id'];
         $_SESSION['name']=$user[0]['name'];
         $_SESSION['chucvu']=$user[0]['chucvu'];
      header('location:fuctionforql.php');
      
         }
      elseif($user[0]['chucvu']=='SV'){
         $_SESSION['id']= $user[0]['id'];
         $_SESSION['name']=$user[0]['name'];
         $_SESSION['chucvu']=$user[0]['chucvu'];
         // echo $_SESSION['name'];
         header('location:fuctionforsv.php');
      }
      }
?>