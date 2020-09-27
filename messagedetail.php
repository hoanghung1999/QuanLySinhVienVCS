<?php
session_start();
require_once('dbhelp.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="givetask.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<?php
if($_SESSION['chucvu']=='SV'){
echo '
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <ul class="nav navbar-nav">	
      <li ><a href="fuctionforsv.php">Home</a></li>
      <li><a href="recievetask.php">Xem bài tập</a></li>
      <li class="active"><a onclick="window.open("message.php", "_self")" >Xem tin nhắn</a></li>
      <li ><a href="inforuser.php">Xem thông tin người dùng</a></li>
	  <li ><a  href="updateprofile.php">Sửa thông tin cá nhân</a></li>
	  <li><a href="deletesesstion.php">Thoát</a></li>
    </ul>
  </div>
</nav>';}
else{
	
		echo
		'<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	   
		<ul class="nav navbar-nav ">
		  <li ><a href="fuctionforql.php">Home</a></li>
		  <li><a href="givetask.php">Giao Bài Tập</a></li>
		  <li class="active"><a href="message.php">Xem Tin Nhắn</a></li>
		  <li><a href="inforsv.php" >Thông Tin Sinh Viên</a></li>
	
		  <li ><a href="inforuser.php">Thông Tin Người Dùng</a></li>
		  
		  <li><a href="updateprofile.php">Sửa Thông Tin Cá nhân</a></li>
		  <li><a href="deletesesstion.php">Thoát</a></li>
		</ul>
	  </div>
	</nav>';
	
}
?>

    <div class="container">
     
    <h2>Chat Messages</h2>
<?php
    $idfrom=$_GET['id'];
    $idto=$_SESSION['id'];

    $sql='SELECT ms.idfrom,sv1.name as n1,ms.idto,sv2.name as n2,ms.message 
    FROM message ms JOIN sinhvien sv1 ON ms.idfrom=sv1.id 
    JOIN sinhvien sv2 ON ms.idto=sv2.id 
    WHERE (ms.idfrom='.$idfrom.' AND ms.idto='.$idto.') OR( ms.idfrom='.$idto.' AND ms.idto='.$idfrom.')';
    $listmess=executeResult($sql);
    foreach($listmess as $mess){
if($mess['idfrom']==$_SESSION['id']){
    echo
    '<div class="container darker body">
        <p>'.'YOU'.'</p>
        <img src="user.jfif" alt="Avatar" style="width:100%;">
        <p>'.$mess['message'].'</p>
    </div>';
}else{
echo'
<div class="container  body"> 
    <p style="margin-left: 93%;">'.$mess['n1'].'</p>
  <img src="user.jfif" alt="Avatar" class="right" style="width:100%;">
  <p style="margin-left:50%;">'.$mess['message'].'</p>
</div>';
    }
}
echo '<div class="container  body">
<form method="post">
<input type="text" style="min-width:700px;" name="valuemess">
<input type="submit" name="messdetail">
</div>'
?>
<?php
if(isset($_POST['messdetail'])){
  
    $idto=$_GET['id'];
    $idfrom=$_SESSION['id'];
    $message='';
    if(isset($_POST['valuemess'])){
        $message=$_POST['valuemess'];
    }
    $sql="INSERT INTO message(idfrom,idto,message) Values('$idfrom','$idto','$message')";
    execute($sql);
    header('refresh:1');

}
?>

      
    </div>
   
</body>

</html>