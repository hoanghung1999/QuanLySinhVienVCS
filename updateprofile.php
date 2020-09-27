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
      <li><a href="recievetask.php">Xem bài tập</a></li>
	  <li><a href="message.php" >Xem tin nhắn</a></li>
	  <li><a href="inforuser.php">Xem thông tin người dùng</a></li>
	  <li class="active"><a  href="updateprofile.php">Sửa thông tin cá nhân</a></li>
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
	  <li><a href="message.php">Xem Tin Nhắn</a></li>
	  <li><a href="inforsv.php" >Thông Tin Sinh Viên</a></li>

	  <li ><a href="inforuser.php">Thông Tin Người Dùng</a></li>
	  
	  <li class="active"><a href="updateprofile.php">Sửa Thông Tin Cá nhân</a></li>
	  <li><a href="deletesesstion.php">Thoát</a></li>
	</ul>
  </div>
</nav>';
}
?>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
			
			<h2 class="text-center">Sửa thông tin cá nhân </h2>
			</div>
			<div class="panel-body center__update">
				<form method="post" action="updateprofileex.php">
					<div class="trungtam">
						<label><b>Tên Tài Khoản:</b></label>
						<input type="number" name="id" value="<?= $id ?>" style="display: none;">
						<input readonly="readonly" required="true" type="text" class="" id="username" name="username" value="<?= $s_username ?>">
					</div>

					<div class="trungtam">
						<label ><b>Mật Khẩu:</b></label>
						<input type="password" class="" id="password" name="password" value="<?= $s_password ?>" required>
					</div>

					<div class="trungtam">
						<label><b>Họ Tên:</b></label>
						<input type="text" class="" id="name" name="name" value="<?= $s_name ?>" readonly="readonly">
					</div>

					<div class="trungtam">
						<label><b>Email:</b></label>
						<input type="text" class="" id="email" name="email" value="<?= $s_email ?>"required>
					</div>
					<div class="trungtam">
						<label><b>SĐT:</b></label>
						<input type="number" class="" id="sdt" name="sdt" value="<?= $s_sdt ?>"required>
					</div>

					<div class="trungtam">
						<label><b>Chức Vụ:</b></label>
						<input readonly="readonly" type="text" class="" id="chucvu" name="chucvu" value="<?= $s_chucvu ?>"required>
						
					</div>

					<button class="btn btn-success">Save</button>
				</form>	
			</div>
		</div>
	</div>
</body>
</html>