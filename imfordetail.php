<?php
session_start();
require_once('dbhelp.php');
$id = '';
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql         = 'select * from sinhvien where id = ' . $id;
	$studentList = executeResult($sql);
	if ($studentList != null && count($studentList) > 0) {
		$std        = $studentList[0];
		$s_username = $std['username'];
		$s_password      = $std['password'];
		$s_name = $std['name'];
		$s_email  = $std['email'];
		$s_sdt  = $std['sdt'];
		$s_chucvu  = $std['chucvu'];
	} else {
		$id = '';
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Thông tin chi tiết </title>
	<!-- Latest compiled and minified CSS -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="updateprofile.css">
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
      <li><a onclick="window.open("recievetask.php", "_self")">Xem bài tập</a></li>
      <li><a href="message.php" >Xem tin nhắn</a></li>

      <li><a  href="updateprofile.php">Sửa thông tin cá nhân</a></li>
      <li class="active"><a href="inforuser.php">Xem thông tin người dùng</a></li>
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
	  <li><a href="message.php">Xem Tin Nhắn</a></li>
	  <li><a href="inforsv.php" >Thông Tin Sinh Viên</a></li>

	  <li  class="active" ><a href="inforuser.php">Thông Tin Người Dùng</a></li>
	  
	  <li><a href="updateprofile.php">Sửa Thông Tin Cá nhân</a></li>
	  <li><a href="deletesesstion.php">Thoát</a></li>
	</ul>
  </div>
</nav>';

}
?>



	<?php
	$idto=$_GET['id'];

	echo
		'<div class="card" style="width:45%;margin:0 auto;">
    <img class="" src="user.jfif" alt="Card image" style="width:46%">
    <div class="card-body">
      <h5 class="card-title"><b>Họ và Tên:</b> <i style="color:red">' . $s_name . '</i></h5>' .
			'<h5 class="card-text"><b>Chức Vụ:</b><i style="color:red">' . $s_chucvu . '</i></h5>' .
			'<h5 class="card-text"><b>Email:</b>&emsp;<i style="color:red">' . $s_email . '</i></h5>' .
			'<h5 class="card-text"><b>Sđt:</b>&emsp;<i style="color:red">' . $s_sdt . '</i></h5><b>Gửi tin nhắn :</b>
			<form method="post" action="messageDAO.php?id='.$idto.'">
			<input type="text" name="message" style="width:30%"><br>
			<input type="submit" name="submess" value="gửi"><br>
			</form>
			</div></div>';
	?>

</body>

</html>