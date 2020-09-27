<?php
session_start();

require_once('dbhelp.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Student Management</title>
	<meta charset="UTF-8">
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
      <li class="active"><a href="inforuser.php">Xem thông tin người dùng</a></li>
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
		  <li><a href="message.php">Xem Tin Nhắn</a></li>
		  <li><a href="inforsv.php" >Thông Tin Sinh Viên</a></li>
	
		  <li class="active"><a href="inforuser.php">Thông Tin Người Dùng</a></li>
		  
		  <li><a href="updateprofile.php">Sửa Thông Tin Cá nhân</a></li>
		  <li><a href="deletesesstion.php">Thoát</a></li>
		</ul>
	  </div>
	</nav>';
	
}
?>
	<div class="container">
        <h2 class="text-center">Thông Tin Người Dùng Hệ Thống </h2>
        <div class="row">
          <div class="col-sm-2"></div>
        <div class="col-sm-8">
        <table class="table table-bordered text-center">
			<thead>
				<tr>
					<th>STT</th>
					<th>Họ & tên</th>
					<th>Chức vụ</th>
					<th width="60px"></th>
				</tr>
			</thead>
			<tbody>
				<?php

				$sql = 'select * from sinhvien';

				$studentList = executeResult($sql);

				$index = 1;
				foreach ($studentList as $std) {
					echo '<tr>
			<td>' . ($index++) . '</td>
            <td>' . $std['name'] . '</td>
			<td>' . $std['chucvu'] . '</td>
            
			<td><button class="btn btn-warning" onclick=\'window.open("imfordetail.php?id=' . $std['id'] . '","_self")\'>chi tiết</button></td>
		</tr>';
				}
				?>
			</tbody>
		</table>		
        </div>
        <div class="col-sm-2"></div>  
        </div>

        
		
	</div>
</body>

</html>