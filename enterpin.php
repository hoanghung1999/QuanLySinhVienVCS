<?php
session_start();
$error="";
if(isset($_POST['pin'])){
    $pin=$_POST['pin'];
    if($pin!=$_SESSION['pin']){
        $error="wrong pin code";
    }
    else{
        if($_SESSION['chucvu']=="QL"){
            header('location:fuctionforql.php');
        }
        else{
            header('location:fuctionforsv.php');
        }
    }

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
        <form method="post" action="enterpin.php">

            <div class="imgcontainer">
                <img src="user.jfif" class="rounded-circle" alt="Avatar" class="avatar" style="height:200px;width:200px;margin-top:60px">
            </div>

            <div class="container container_List">

                <div>
                    <label><b>Code in your phone:</b></label>
                </div>
                <div style="margin-top: 20px;">
                    <input type="text" placeholder="Enter code" name="pin" required>
                </div>
                <?php echo $error ?>
                <div style="margin-top: 10px;">
                    <button>submit code</button>
                    <button onclick="window.open('deletesesstion.php', '_self')">log out</button>
                </div>
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