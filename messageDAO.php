<?php
session_start();
require_once('dbhelp.php');
$idto=$_GET['id'];
$idfrom=$_SESSION['id'];
$message='';
if(isset($_POST['message'])){
    $message=$_POST['message'];
}
$sql="INSERT INTO message(idfrom,idto,message) Values('$idfrom','$idto','$message')";
execute($sql);
header('location:message.php')
?>