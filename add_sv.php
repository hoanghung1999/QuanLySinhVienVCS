<?php
require_once('dbhelp.php');

$s_username = $s_password = $s_name = $s_email = $s_sdt = $s_chucvu = '';

if (!empty($_POST)) {
	$s_id = '';

	if (isset($_POST['username'])) {
		$s_username = $_POST['username'];
	}

	if (isset($_POST['password'])) {
		$s_password = $_POST['password'];
	}

	if (isset($_POST['name'])) {
		$s_name = $_POST['name'];
	}
	if (isset($_POST['email'])) {
		$s_email = $_POST['email'];
	}

	if (isset($_POST['sdt'])) {
		$s_sdt = $_POST['sdt'];
	}
	if (isset($_POST['chucvu'])) {
		$s_chucvu = $_POST['chucvu'];
	}
	if (isset($_POST['id'])) {
		$s_id = $_POST['id'];
	}
	$s_username = str_replace('\'', '\\\'', $s_username);
	$s_password      = str_replace('\'', '\\\'', $s_password);
	$s_name  = str_replace('\'', '\\\'', $s_name);
	$s_email       = str_replace('\'', '\\\'', $s_email);
	$s_sdt       = str_replace('\'', '\\\'', $s_sdt);
	$s_chucvu       = str_replace('\'', '\\\'', $s_chucvu);
	if ($s_id != '') {
		//update
		$sql = "update sinhvien set username = '$s_username', password = '$s_password', name = '$s_name',
		email='$s_email' ,sdt='$s_sdt' ,chucvu='$s_chucvu' where id = " . $s_id;
	} else {
		//insert
		$sql = "insert into sinhvien(username,password,name,email,sdt,chucvu) value ('$s_username', 
		'$s_password', '$s_name','$s_email','$s_sdt','$s_chucvu')";
	}
	echo $sql;
	$ret = execute($sql);

	if ($ret == 0) {
		echo "<script type='text/javascript'>alert('that bai');</script>";
	} else {
		header('location:inforsv.php');
	}
}

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
	<title>Registation Form * Form Tutorial</title>
	<!-- Latest compiled and minified CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<!-- <link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="addCss.css"> -->
	<link rel="stylesheet" href="updateprofile.css">
</head>

<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">

			<ul class="nav navbar-nav ">
				<li class="active" onclick="window.open('fuctionforql.php','_self')"><a>Home</a></li>
				<li><a onclick="window.open('givetask.php', '_self')">Giao Bài Tập</a></li>
				<li><a onclick="window.open('inforsv.php', '_self')">Thông Tin Sinh Viên</a></li>

				<li><a onclick="window.open('inforuser.php', '_self')">Thông Tin Người Dùng</a></li>
				<li><a onclick="window.open('message.php', '_self')">Xem Tin Nhắn</a></li>
				<li><a onclick="window.open('updateprofile.php', '_self')">Sửa Thông Tin Cá nhân</a></li>
				<li><a onclick="window.open('deletesesstion.php', '_self')">Thoát</a></li>
			</ul>
		</div>
	</nav>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<?php
				if ($id == '') {
					echo '<h2 class="text-center">Add Student</h2>';
				} else {
					echo '<h2 class="text-center">Update Student</h2>';
				}

				?>
			</div>
			<div class="panel-body center__update">
				<form method="post">
					<div class="trungtam">
						<label><b>Tên Tài Khoản:</b></label>
						<input type="number" name="id" value="<?= $id ?>" style="display: none;">
						<input required="true" type="text" class="" id="username" name="username" value="<?= $s_username ?>">
					</div>

					<div class="trungtam">
						<label><b>Mật Khẩu:</b></label>
						<input type="password" class="" id="password" name="password" value="<?= $s_password ?>" required>
					</div>

					<div class="trungtam">
						<label><b>Họ Tên:</b></label>
						<input type="text" class="" id="name" name="name" value="<?= $s_name ?>">
					</div>

					<div class="trungtam">
						<label><b>Email:</b></label>
						<input type="text" class="" id="email" name="email" value="<?= $s_email ?>" required>
					</div>
					<div class="trungtam">
						<label><b>SĐT:</b></label>
						<input type="number" class="" id="sdt" name="sdt" value="<?= $s_sdt ?>" required>
					</div>

					<div class="trungtam">
						<label><b>Chức Vụ:</b></label>
						<select name="chucvu">
							<option value="SV" selected >SV</option>
							<option value="QL">QL</option>
						</select>
					</div>

					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>