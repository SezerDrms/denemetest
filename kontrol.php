<?php
require_once "vt.php";
if($_POST){
    $my_name=$_POST["myname"];
    $password=sha1($_POST["mypassword"]);
    $my_password=$_POST["mypassword"];
    if(!$my_name && !$my_password){
        Header('Location: index.php?e=d');
    }
    elseif(!$my_name){
        Header('Location: index.php?e=n1');
    }
    elseif(!$my_password){
        Header('Location: index.php?e=p1');
    }else{
        $select_name=mysql_query("SELECT * FROM member WHERE member_mail='".$my_name."'");
        $sql_dizi_name=mysql_num_rows($select_name);
        if($sql_dizi_name==0&& strlen($my_name)>6){
            Header('Location: index.php?f=0');
        }elseif($password!=$mepas&& strlen($password)>8){
                Header('Location: index.php?f=0');
        }else{
            $select=mysql_query("SELECT * FROM member WHERE member_mail='".$my_name."'");
            $sql_dizi=mysql_num_rows($select);
            if($sql_dizi>0){
            session_start();
            $user_name=mysql_query("SELECT member_name FROM member WHERE member_mail='".$my_name."'");
            $_SESSION["userdata"]["mail"] = $user_name;
            Header('Location: index.php');
            }else{
                Header('Location: index.php?user=f');
            }
        }
    }
}
?>