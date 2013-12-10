<html>
<?php
    require_once("kontrol.php");
    include('function.php');
    session_start();
?>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="layout.css">
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
        $.ortala('.fo_di');
    });
</script>
</head>
<body>
<?php if(@isLogin() == false){ ?>
<div class="fo_di">
    <div class="member_div">
        <a href="member_save.php">Kayıt Ol</a>
    </div>
    <div class="false-name-pass">
        <?php
        if(@$_GET["f"]=="0"){
        echo "<font color=red>Adınızı veya Şifrenizi Yanlış Girdiniz!</font>";
        }
        ?>
    </div>
        <form action="kontrol.php" method="POST">
    <table cellpadding="5" cellspacing="5" border="0">
    <tr>
        <td><h2>Kullanıcı;</h2></td>
    </tr>
    <tr>
        <td></td>
        <td>Adınız : </td>
        <td><span data-tooltip="ADINIZ" data-rigth><input type="text" name="myname"
            <?php   if(@$_GET["e"]=="n1" || @$_GET["e"]=="d" || @$_GET["f"]=="0"){?>
                style="box-shadow: 0px 0px 0px 5px rgba(200,0,0,0.5)"<?php } ?>/></span></td>
        <td><?php if(@$_GET["e"]=="n1"||@$_GET["e"]=="d"){
                echo "<font color=red>Adınızı Boş Girdiniz.</font>";
            }
            ?></td>
    </tr>
    <tr>
        <td></td>
        <td>Şifreniz: </td>
        <td><span data-tooltip="ŞİFRENİZ" data-rigth><input type="password" name="mypassword"
            <?php   if(@$_GET["e"]=="p1" || @$_GET["e"]=="d" || @$_GET["f"]=="0"){?>
                style="box-shadow: 0px 0px 0px 5px rgba(200,0,0,0.5)"<?php } ?>/></span></td>
        <td><?php if(@$_GET["e"]=="p1"||@$_GET["e"]=="d"){
                echo "<font color=red>Şifrenizi Boş Girdiniz.</font>";
            }
            ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php if(@$_GET["user"]=="f"){ ?>
                <font color=#8b0000>Bu Kullanıcı Bulunamadı</font> <?php } ?></td>
        <td><input type="submit" id="mysubmit" value="Giriş" > </td>
    </tr>
    </table>
    <?php }else{
            echo "<font color=white>hoşgeldin {$_SESSION["userdata"]["name"]}</font>";
        ?>
        <div class="logindiv">
            <li>
                <ul><a href="b-degistir.php">bilgileri değiştir</a></ul>
                <ul><a href="yaziekle.php"> yazı ekle</a></ul>
                <ul><a href="sifre-degistir.php">şifre değiştir</a></ul>
                <ul><a href="logout.php">çıkış</a></ul>
            </li>
        </div>

    <?php } ?>

</div>
</body>
</html>