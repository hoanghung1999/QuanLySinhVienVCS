<?php
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	require_once ('dbhelp.php');
	$sql = 'delete from sinhvien where id = '.$id;
	$result=execute($sql);
	if($result==1){
	echo 'Xoá sinh viên thành công';
	}else{
		echo " xoa khong thanh cong do khi xoa se mat du lieu database nop bai";
	}
}