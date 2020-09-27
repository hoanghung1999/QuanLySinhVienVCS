<?php
require_once('dbhelp.php');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="fuctionforQL.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
   
    <ul class="nav navbar-nav ">
      <li  onclick="window.open('fuctionforql.php','_self')"><a>Home</a></li>
	  <li><a onclick="window.open('givetask.php', '_self')">Giao Bài Tập</a></li>
	  <li><a onclick="window.open('message.php', '_self')">Xem Tin Nhắn</a></li>
      <li class="active"><a onclick="window.open('inforsv.php', '_self')" >Thông Tin Sinh Viên</a></li>

      <li><a onclick="window.open('inforuser.php', '_self')">Thông Tin Người Dùng</a></li>
      
      <li><a onclick="window.open('updateprofile.php', '_self')">Sửa Thông Tin Cá nhân</a></li>
      <li><a onclick="window.open('deletesesstion.php', '_self')">Thoát</a></li>
    </ul>
  </div>
</nav>
	<div class="container">
		<h2 class="text-center pannel pannel-heading">Quản lý thông tin sinh viên </h2>

		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>STT</th>
					<th>user name</th>
					<th>password</th>
					<th>Họ & tên</th>
					<th>email</th>
					<th>SDT</th>
					<th>Chức vụ</th>
					<th width="60px"></th>
					<th width="60px"></th>
				</tr>
			</thead>
			<tbody>
				<?php

				$sql = 'select * from sinhvien where chucvu="SV"';

				$studentList = executeResult($sql);

				$index = 1;
				foreach ($studentList as $std) {
					echo '<tr>
			<td>' . ($index++) . '</td>
			<td>' . $std['username'] . '</td>
			<td>' . $std['password'] . '</td>
            <td>' . $std['name'] . '</td>
			<td>' . $std['email'] . '</td>
			<td>' . $std['sdt'] . '</td>
			<td>' . $std['chucvu'] . '</td>
            
			<td><button class="btn btn-warning" onclick=\'window.open("add_sv.php?id=' . $std['id'] . '","_self")\'>Edit</button></td>
			<td><button class="btn btn-danger" onclick="deleteStudent(' . $std['id'] . ')">Delete</button></td>
		</tr>';
				}
				?>
			</tbody>
		</table>
		<div class="">
			<!-- <button class="btn btn-success des__btn element_center" onclick="window.open('add_sv.php', '_self')">Add Student</button> -->
			<button type="button" class="btn btn-primary" onclick="window.open('add_sv.php', '_self')">Thêm Người dùng</button>
		</div>
	</div>

	<script type="text/javascript">
		function deleteStudent(id) {
			console.log(1)
			option = confirm('Bạn có muốn xoá sinh viên này không ?')

			if (!option) {
				return;
			}

			console.log(id);
			$.post('delete_sv.php', {
				'id': id,
			}, function(data) {
				alert(data);
				location.reload();
			});
		}
	</script>
</body>

</html>