<?php
session_start();
require_once('dbhelp.php');

$s_username = $s_password = $s_name = $s_email = $s_sdt = $s_chucvu = '';
$sql        = 'select * from sinhvien where id = ' . $_SESSION['id'];
// echo $sql;
$ret=executeResult($sql);

$std=$ret[0];
$id        = $std['id'];
$s_username = $std['username'];
$s_password      = $std['password'];
$s_name = $std['name'];
$s_email  = $std['email'];
$s_sdt  = $std['sdt'];
$s_chucvu  = $std['chucvu'];

?>

<!DOCTYPE html>
<html>

<head>
	<title>Sửa thông tin</title>
	<!-- Latest compiled and minified CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="givetask.css">
</head>

<body>
<div align="center">

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
      <li class="active"><a href="message.php" >Xem tin nhắn</a></li>
      <li><a href="inforuser.php">Xem thông tin người dùng</a></li>
      <li><a  href="updateprofile.php">Sửa thông tin cá nhân</a></li>
      <li><a href="deletesesstion.php">Thoát</a></li>
    </ul>
  </div>
</nav>';}
else{
	
	echo
	'<nav class="navbar navbar-inverse">
  <div class="container-fluid">
   
	<ul class="nav navbar-nav ">
	  <li><a href="fuctionforql.php">Home</a></li>
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
        <?php
        $sql="SELECT  DISTINCT idfrom, sv.name FROM message m JOIN sinhvien sv on m.idfrom=sv.id WHERE idto=".$_SESSION['id'];
        $listmess=array_reverse(executeResult($sql));
        foreach($listmess as $lm){
            echo 
            '<div class="container body">
            <img src="user.jfif" alt="Avatar" style="width:100%;">
            <p><b style="font-size:25px;color:red;">'.$lm['name'].'</b><br><a href="messagedetail.php?id='.$lm['idfrom'].'">Xem</a></p>   
        </div>';
        }
        ?>  
    </div>
</div>
</body>
</html>