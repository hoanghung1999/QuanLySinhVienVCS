<?php
require_once('dbhelp.php');
session_start();
if (isset($_POST['submittask'])) {
    if ($_FILES['subtask']['error'] > 0) {
        echo "<br> co loi trong viec upload len server";
        header("refresh:2");
    } else {
    
        move_uploaded_file($_FILES['subtask']['tmp_name'], 'submittask/' . $_FILES['subtask']['name']);
        echo "<br> upload thanh công";
        $idsv = $idtask  = $link ='';
        if ( isset($_GET['id'])) {
           
            $idsv=$_SESSION['id'];
            $idtask=$_GET['id'];
            $link = 'submittask/' . $_FILES['subtask']['name'];
            $sql = "INSERT INTO subtask(idsv,idtask ,link,thoigian) value('$idsv','$idtask','$link',NOW())";
            echo $sql;
            execute($sql);
            header('location:fuctionforsv.php');
        }
    }
}
?>