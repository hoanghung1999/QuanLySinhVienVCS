<!DOCTYPE html>
<html lang="en">

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
                <li onclick="window.open('fuctionforql.php','_self')"><a>Home</a></li>
                <li class="active"><a onclick="window.open('givetask.php', '_self')">Giao Bài Tập</a></li>
                <li><a onclick="window.open('', '_self')">Xem Tin Nhắn</a></li>
                <li><a onclick="window.open('inforsv.php', '_self')">Thông Tin Sinh Viên</a></li>

                <li><a onclick="window.open('inforuser.php', '_self')">Thông Tin Người Dùng</a></li>

                <li><a onclick="window.open('updateprofile.php', '_self')">Sửa Thông Tin Cá nhân</a></li>
                <li><a onclick="window.open('deletesesstion.php', '_self')">Thoát</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center"><?php echo $_GET['title'] ?></h2>
            </div>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ Và Tên</th>
                        <th>Email</th>
                        <th>Thời gian Nộp</th>
                        <th>Download</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('dbhelp.php');
                    $sql = 'SELECT sv.name,sv.email,st.link,st.thoigian 
                    FROM subtask st JOIN task t ON st.idtask=t.id JOIN sinhvien sv ON st.idsv=sv.id
                    WHERE t.id='.$_GET['id'];

                    $ListSVsub = executeResult($sql);

                    $index = 1;
                    foreach ($ListSVsub as $sv) {
                        echo '<tr>
			<td>' . ($index++) . '</td>
			<td>' . $sv['name'] . '</td>
			<td>' . $sv['email'] . '</td>
            <td>' . $sv['thoigian'] . '</td>
			<td><button class="btn btn-success" ><a href="'.$sv['link'].'" a>FILE</button></td>
		</tr>';
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>



</body>

</html>