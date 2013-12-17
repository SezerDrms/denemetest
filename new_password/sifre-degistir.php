<?php session_start(); ?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../layout.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $.ortala=function(elem){
                var w = $(elem).width();
                var h = $(elem).height();
                $(elem).css({
                    position: "absolute",
                    top:"50%",
                    left:"50%",
                    marginTop:"-" + h / 2 + "px",
                    marginLeft: "-" + w / 2 + "px"
                });
            }
            $.ortala('.new_password');
        });
    </script>
</head>
<body>
<?php
include('../function.php');



if(isLogin() == true){
?>
    <div class="new_password">
        <form action="new_password_control.php" method="post">
<table  cellpadding="5" cellspacing="5" border="0">
    <tr>
        <td>Kullandığınız Şifre</td>
        <td><input type="password" name="currentpass"></td>
    </tr>
    <tr>
        <td>Yeni Şifre</td>
        <td><input type="password" name="newpass"></td>
    </tr>
    <tr>
        <td>Yeni Şifre Tekrarı</td>
        <td><input type="password" name="newpass_again"></td>
    </tr>
    <tr>
        <td><?php
            if(@$_GET["p"]=="n"){
                echo "<div style='margin-left: -10px'><font color=#8b0000><center>Boş Giriş Yaptınız!</center></font></div>";
            }elseif(@$_GET["p"]=="f") {
                echo "<div style='margin-left: -10px'><font color=#8b0000><center>Şifreler Aynı Değil!</center></font></div>";
            }elseif(@$_GET["n"]=="p_s"){
                echo "<div style='margin-left: -10px;'><font color=#006400><center>Şifre Değiştirildi.</center></font></div>";
            }elseif(@$_GET["c"]=="f"){
                echo "<div style='margin-left: -10px;
                margin-top: -15px'><font color=#8b0000><center>Kullanıcı Şifresi <br /> Yanlış!</center></font></div>";
            }
            ?></td>
        <td><div class="index_submit"><a href="../index.php">AnaSayfa</a></div><input type="submit" value="Değiştir" id="newpass_submit"></td>
    </tr>
</table>
        </form>
    </div>
<?php }else{
    Header('Location: ../index.php');
    }
?>
</body>
</html>
