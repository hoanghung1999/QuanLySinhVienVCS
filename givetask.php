<?php
session_start();
require_once('dbhelp.php');
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
                <li onclick="window.open('fuctionforql.php','_self')"><a>Home</a></li>
                <li class="active"><a onclick="window.open('', '_self')">Giao Bài Tập</a></li>
                <li><a onclick="window.open('message.php', '_self')">Xem Tin Nhắn</a></li>
                <li><a onclick="window.open('inforsv.php', '_self')">Thông Tin Sinh Viên</a></li>

                <li><a onclick="window.open('inforuser.php', '_self')">Thông Tin Người Dùng</a></li>
                
                <li><a onclick="window.open('updateprofile.php', '_self')">Sửa Thông Tin Cá nhân</a></li>
                <li><a onclick="window.open('deletesesstion.php', '_self')">Thoát</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <p>
            <a href="#" class="btn btn-info btn-lg" onclick="addtask()">
                <span class="glyphicon glyphicon-plus"></span> Thêm Bài Tập
            </a>
        </p>
        <div id="addtask"></div>

        <?php
        
        if (isset($_POST['submit'])) {
            if ($_FILES['task']['error'] > 0) {
                echo "<br> co loi trong viec upload len server";
                header("refresh:2");
            } else {
                move_uploaded_file($_FILES['task']['tmp_name'], 'upload/' . $_FILES['task']['name']);
                echo "<br> upload thanh công";
                $title = $sdate = $edate = $link = '';
                if (isset($_POST['title']) && isset($_POST['sdate']) && isset($_POST['edate'])) {

                    $title = $_POST['title'];
                    $sdate = $_POST['sdate'];
                    $edate = $_POST['edate'];
                    $link = 'upload/' . $_FILES['task']['name'];
                    $sql = "INSERT INTO task(tieude,ngaybatdau,ngayketthuc,link) value('$title','$sdate','$edate','$link')";
                    execute($sql);
                    header("Refresh:3");
                }
            }
        }
        ?>

        <?php
        $sql="SELECT * FROM task";
        $listtask=array_reverse(executeResult($sql));
        foreach($listtask as $lt){
            echo 
            '<div class="container body">
            <img src="task.webp" alt="Avatar" style="width:100%;">
            <p>'.$lt['tieude'].'<br><a href="'.$lt['link'] .'">tải xuống</a><br><a href="listSubmitTask.php?id='.$lt['id'].'
            &title='.$lt['tieude'].'"> Xem Danh Sách Nộp Bài</a></p>
            <span class="time-right" style="color:red;"> từ '.$lt['ngaybatdau']." đến ".$lt['ngayketthuc'].'</span>
        </div>';
        }
        ?>

      
    </div>
    <script>
        function addtask() {
            document.getElementById("addtask").innerHTML = '<form align="center" enctype="multipart/form-data" method="post">' +
                '<label for="fname" style="min-width:120px;">Tiêu Đề:</label><input type="text" id="title" name="title" style="display:inline-block"><br><br>' +
                '<label for="sdate">Ngày bắt đầu:</label><input type="date" id="sdate" name="sdate" style="display:inline-block"><br><br>' +
                '<label for="edate">Ngày kết thúc:</label><input type="date" id="edate" name="edate" style="display:inline-block"><br><br>' +
                '<input type="file" name="task" style="display:inline-block"><br><br> ' +
                '<input type="submit" value="Thêm" name="submit">&ensp;<input type="submit" value="Hủy" name="cancel"></form>';
        }
    </script>
</body>

</html>