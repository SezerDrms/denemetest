<html>
<?php
    require_once ("vt.php");
    require_once("kontrol.php");
    include('function.php');
    session_start();
?>
<head>
    <title><?php echo $_SESSION["userdata"]["name"]; ?></title>
<meta charset="utf-8">
    <Link href = 'http://fonts.googleapis.com/css?family = Tutku + Bir: 700 'rel =' stil 'type =' text / css '>
    <link rel="stylesheet" type="text/css" href="layout.css">
    <link rel="icon" type="image/png" sizes="16x16" href="image/call_of_duty_black_ops_desktop_1920x1080_hd-wallpaper-912990.jpg">
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

    <?php }else{ ?>
            <div class="logindivtasiyici">
            <font color=#fff ><div class='username'>Hoşgeldin <?php echo $_SESSION["userdata"]["name"]?></div></font>
      <?php  ?>
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
                </div>
                <div class="text_area">
                <?php
                    $text_select= mysql_query("SELECT * FROM member_text where text_member_mail='".$_SESSION["userdata"]["mail"].
                        "'ORDER BY text_id DESC");
                    if(isLogin()==true){
                        date_default_timezone_set('Europe/Istanbul');

                        while($text_array=mysql_fetch_array($text_select)){
                            //$text_array["text_id"];

                            echo "<div class='user_text_div'>
                                <b> Yazan : <span style='text-transform: uppercase;'>".
                                $text_array["text_member_name"]."</span></b>
                                \t"."<div style='float:right;padding-right:5px'>".date("H.i:s",$text_array["text_date"])."</div>
                                <p style='width:730px'>".$text_array["member_text"]."</p>
                                \t <hr><span style='font-size:12px; float:left;margin-top: 2px'>".date("d / F / Y",$text_array["text_date"])."</span>
                                <span class='delete_update'>
                                <a href='text_add/update.php?id=".$text_array['text_id']."'>Düzelt</a>
                                <a href='text_add/delete.php?id=".$text_array['text_id']."'>Sil</a>
                                </span>
                                </div>";
                        }
                    }
                    ?>
                </div>
    <?php } ?>

</div>
</body>
</html>