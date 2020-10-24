<?php
require_once('connectFB.php');
require_once('dbhelp.php');
$facebook_output='';
$facebook_helper=$facebook->getRedirectLoginHelper();
if(isset($_GET['code'])){
	if(isset($_GET['access_token'])){
		$access_token=$_SESSION['access_token'];
	}
	else{
		$access_token=$facebook_helper->getAccessToken();
		 $_SESSION['access_token']=$access_token;
		 $facebook->setDefaultAccessToken($_SESSION['access_token']);
	}
	$graph_response=$facebook->get("/me?fields=name,email",$access_token);
	$facebook_user_info=$graph_response->getGraphUser();
	$sql="SELECT * FROM Sinhvien WHERE social_id=".$facebook_user_info["id"];
	$result=executeResult($sql);
	if(sizeof($result)>0){
		$_SESSION['id']= $result[0]['id'];
		$_SESSION['name']=$result[0]['name'];
		$_SESSION['chucvu']=$result[0]['chucvu'];
		header('location:fuctionforsv.php');
	}else{
		$s_socialid=$facebook_user_info["id"];
		$s_name=$facebook_user_info["name"];
		$s_chucvu="SV";
		$s_username=$s_name.$s_socialid;
		$sqlinsert="INSERT INTO sinhvien(username,name,chucvu,social_id) Values('$s_username','$s_name','$s_chucvu','$s_socialid')";
		execute($sqlinsert);
		$result1=executeResult($sql);
		$_SESSION['id']= $result1[0]['id'];
		$_SESSION['name']=$result1[0]['name'];
		$_SESSION['chucvu']=$result1[0]['chucvu'];
		header('location:fuctionforsv.php');			
		
	}

	
}
else{
	  $facebook_permissions=['email'];
	   $facebook_login_url=$facebook_helper->getLoginUrl(
		   'https://hoanghung.com/QL/QLSV/login.php',$facebook_permissions 
	   );

}
?>
<html>

<head>
	<title>login form</title>
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="login.css">
</head>

<body>
	<div class="center-block" align="center">
		<form method="post" action="checklogin.php">

			<div class="imgcontainer">
				<img src="user.jfif" class="rounded-circle" alt="Avatar" class="avatar" style="height:200px;width:200px;margin-top:60px">
			</div>

			<div class="container container_List">

				<div>
					<label for="uname"><b>Username:</b></label>
					<input type="text" placeholder="Enter Username" name="username" required>
				</div>
				<div style="margin-top: 10px;">
					<label for="psw"><b>Password:</b></label>
					<input type="password" placeholder="Enter Password" name="password" required>
				</div>

				<div style="margin-top: 10px;">
					<button type="submit">Login</button>
				</div><a href="<?= htmlspecialchars($facebook_login_url) ;?>" class="fb btn">
					<i class="fa fa-facebook fa-fw"></i> Login with Facebook
				</a>
			</div>
	</div>
	</div>

	</form>

	<script type="text/javascript">
		$.post('checklogin.php', {}, function(data) {
			alert(data);
			location.reload();
		});
	</script>
	</div>

	<body>