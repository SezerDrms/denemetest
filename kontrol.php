<?php
require_once "vt.php";
if($_POST){
    $my_mail=$_POST["mymail"];
    $password=sha1($_POST["mypassword"]);
    $my_password=$_POST["mypassword"];
    if(!$my_mail && !$my_password){
        Header('Location: index.php?e=d');
    }
    elseif(!$my_mail){
        Header('Location: index.php?e=m1');
    }
    elseif(!$my_password){
        Header('Location: index.php?e=p1');
    }else{
        $select_mail=mysql_query("SELECT * FROM member WHERE member_mail='".$my_mail."'");
        $sql_dizi_mail=mysql_num_rows($select_mail);
        if($sql_dizi_mail==0&& strlen($my_mail)>6){
            Header('Location: index.php?f=0');
        }elseif($password!=$mepas&& strlen($password)>8){
                Header('Location: index.php?f=0');
        }else{
            $select=mysql_query("SELECT * FROM member WHERE member_mail='".$my_mail."'");
            $sql_dizi=mysql_num_rows($select);
            $sql_row = mysql_fetch_array($select);
            if($sql_dizi>0){
            session_start();
            $_SESSION["userdata"]["name"] =  $sql_row["member_name"];
            Header('Location: index.php');
            }else{
                Header('Location: index.php?user=f');
            }
        }
    }
}
?>