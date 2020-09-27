<?php
session_start();
require_once('dbhelp.php');
 if(!empty($_POST)) {
    $s_username = $s_password = $s_name = $s_email = $s_sdt = $s_chucvu = '';
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
		$sql = "update sinhvien set username = '$s_username', password = '$s_password', name = '$s_name',
		email='$s_email' ,sdt='$s_sdt' ,chucvu='$s_chucvu' where id = " . $s_id;
		echo $sql;
    $ret=execute($sql);
        if($ret==0){
            echo "bug";
        }
        else{
			if($_SESSION['chucvu']=='SV'){
            header('location:fuctionforsv.php');
			}else{
				header('location:fuctionforql.php');
			}

	}
}
?>