<html>
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="layout.css">
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
            $.ortala('.member_save_center');
        });
    </script>
</head>
<body>
<div class="member_save_center">
<form action="member_data/member_control.php" method="POST">
    <table cellspacing="5" cellpadding="5">
        <tr>
            <td colspan="2">ÜYELİK İÇİN BİLGİLERİNİZİ GİRİNİZ;</td>
        </tr>
        <tr>
            <td>Kullanacağınız Ad </td>
            <td><input type="text" name="mem_name"
                    <?php   if(@$_GET["n"]=="0" || @$_GET["n"]=="len"||@$_GET["all"]="0"){?>
                    style="box-shadow: 0px 0px 0px 5px rgba(200,0,0,0.5)"<?php } ?>></td>
        </tr>
        <tr>
            <td>Kullanacağınız Şifre</td>
            <td><input type="password" name="mem_pass"
                    <?php   if(@$_GET["p"]=="0" || @$_GET["p"]=="len"||@$_GET["all"]="0"){?>
                    style="box-shadow: 0px 0px 0px 5px rgba(200,0,0,0.5)"<?php } ?>></td>
        </tr>
        <tr>
            <td>Şifre Tekrarı</td>
            <td><input type="password" name="mem_pass_again"
                    <?php   if(@$_GET["pg"]=="0" || @$_GET["pg"]=="len"||@$_GET["all"]="0"){?>
                    style="box-shadow: 0px 0px 0px 5px rgba(200,0,0,0.5)"<?php } ?>></td>
        </tr>
        <tr>
            <td>E-mail Adresiniz</td>
            <td><input type="text" name="mem_mail"
                    <?php   if(@$_GET["m"]=="0"||@$_GET["all"]="0"){?>
                    style="box-shadow: 0px 0px 0px 5px rgba(200,0,0,0.5)"<?php } ?>></td>
        </tr>
        <tr>
            <td>
                <?php if(@$_GET["t"]=="1"){
                echo "<font color=#006400><center>Üye Oldunuz</center></font>";

                }
                elseif(@$_GET["p"]=="f") {
                    echo "<font color=#8b0000><center>Şifreler Aynı Değil!</center></font>";

                }elseif(@$_GET["t"]=="0") {
                    echo "<font color=#8b0000><center>Hata!</center></font>";
                    Header("Refresh: 2; url=member_save.php");
                }elseif(@$_GET["n"]=="0"||@$_GET["p"]=="0"||@$_GET["m"]=="0"){
                    echo "<font color=#8b0000><center>Boş Giriş Yaptınız!</center></font>";
                }elseif( @$_GET["n"]=="len"||@$_GET["p"]=="len"||@$_GET["pg"]=="len"){
                    echo "<font color=#8b0000><center>Uzun Giriş Yaptınız!</center></font>";
                }
                ?></td>
            <td><div class="giris-yap">
                    <a href="index.php">GirişYap</a> </div><input type="submit" value="Kayıt" id="mem_sav_sub"></td>
        </tr>
    </table>
</form>
</div>
</body>
</html>