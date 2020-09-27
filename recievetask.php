<?php
require_once('dbhelp.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="givetask.css">
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
      <li  onclick="window.open('fuctionforsv.php','_self')"><a>Home</a></li>
      <li class="active"><a onclick="window.open('recievetask.php', '_self')">Xem bài tập</a></li>
      <li><a onclick="window.open('message.php', '_self')" >Xem tin nhắn</a></li>

      <li><a onclick="window.open('updateprofile.php', '_self')">Sửa thông tin cá nhân</a></li>
      <li><a onclick="window.open('inforuser.php', '_self')">Xem thông tin người dùng</a></li>
      <li><a onclick="window.open('deletesesstion.php', '_self')">Thoát</a></li>
    </ul>
  </div>
</nav>
<div class="container">
    <h2 style="text-align: center; color: blue;">Bài tập</h2>
<?php
        $sql="SELECT * FROM task";
        $listtask=array_reverse(executeResult($sql));
        foreach($listtask as $lt){
            echo 
            '<div class="container body">
            <img src="task.webp" alt="Avatar" style="width:100%;">
            <p ><b style="color:red">'.$lt['tieude'].'</b><br><br><a href="'.$lt['link'] .'">tải đề xuống</a>
            <form action="submittaskDAO.php?id='.$lt['id'].'" method="post" align="right" enctype="multipart/form-data">
            <input type="file" name="subtask" style="display:inline-block">
             <input type="submit" name="submittask" value="Nộp Bài">
             </form>
             </p>
            <span class="time-right" style="color:red;"> từ '.$lt['ngaybatdau']." đến ".$lt['ngayketthuc'].'</span>
        </div>';
        } 
        ?>
</div>
  
</div>

</body>
</html>