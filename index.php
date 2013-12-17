<html>
<?php
    require_once("kontrol.php");
    include('function.php');
    session_start();
?>
<head>
<meta charset="utf-8">
    <Link href = 'http://fonts.googleapis.com/css?family = Tutku + Bir: 700 'rel =' stil 'type =' text / css '>
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
        <td><div style='margin-left: -8px'>Mail'iniz: </div></td>
        <td><span data-tooltip="E-mail" data-rigth><input type="text" name="mymail"
            <?php   if(@$_GET["e"]=="m1" || @$_GET["e"]=="d" || @$_GET["f"]=="0"){?>
                style="box-shadow: 0px 0px 0px 5px rgba(200,0,0,0.5)"<?php } ?>/></span></td>
        <td><?php if(@$_GET["e"]=="m1"||@$_GET["e"]=="d"){
                echo "<font color=red>E-mail'inizi Boş Girdiniz.</font>";
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
            echo "<font color=#fff ><div class='username'>Hoşgeldin {$_SESSION["userdata"]["name"]}</div></font>";
        ?>
                <div class="text_add">
                    <form action="text_add/text_add.php" method="post">
                        <table cellspacing="5" cellpadding="5">
                         <tr>
                             <td> <textarea cols="35" rows="2" name="member_text" id="text_box"></textarea></td>
                             <td><input type="submit" value="yazı ekle" class="text_add_submit"> </td>
                         </tr>
                        </table>
                    </form>
                </div>

                <div class="text_null_input"><?php
                    if(@$_GET["text"]=="null"){
                        echo "Boş Giriş Yapmayınız!";
                    }
                    ?></div>
            <div class="logindiv">
            <ul>
                <li><a href="b-degistir.php">bilgileri değiştir</a></li>
                <li><a href="new_password/sifre-degistir.php">şifre değiştir</a></li>
                <li><a href="logout.php">çıkış</a></li>
            </ul>
        </div>
                <div class="text_area">



                </div>
    <?php } ?>

</div>
</body>
</html>