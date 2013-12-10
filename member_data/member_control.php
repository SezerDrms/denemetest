<?php
    require_once "../function.php";
    $mem_name=p("mem_name");
    $mem_pass=sha1(p("mem_pass"));
    $mem_pass_again=sha1(p("mem_pass_again"));
    $mem_mail=p("mem_mail");
    if($_POST){
        if(!$mem_name&&!$mem_pass&&!$mem_pass_again&&!$mem_mail){
            header('Location: ../member_save.php?all=0');
        }
        elseif(!$mem_name){
            header('Location: ../member_save.php?n=0');}
        elseif(!$mem_pass){
            header('Location: ../member_save.php?p=0');
            }
        elseif(!$mem_pass_again){
            header('Location: ../member_save.php?pg=0');
        }elseif(!$mem_mail){
            header('Location: ../member_save.php?m=0');
        }
        elseif(strlen($mem_name)>6){
            header('Location: ../member_save.php?n=len');
        }
        elseif(strlen($mem_pass)>8){
            header('Location: ../member_save.php?p=len');
        }
        elseif(strlen($mem_pass_again)>8){
            header('Location: ../member_save.php?pg=len');
        }else{
        $tmail=explode("@",$mem_mail);
        $mailler = array('hotmail.com','gmail.com');
        if(!in_array($tmail[1],$mailler)){
           header('Location: ../member_save.php?t=0');
        }
        else{
            $select=mysql_query("SELECT * FROM member WHERE member_mail='".$mem_mail."'");
            $sql_dizi=mysql_num_rows($select);
            if($sql_dizi==0){
                if($mem_pass!=$mem_pass_again)
                {
                    header('Location: ../member_save.php?p=f');
                }
                else{

                    mysql_query("INSERT INTO member (member_name, member_password,member_mail)
                VALUES ('".$mem_name."','".$mem_pass."','".$mem_mail."')");
                    header('Location: ../member_save.php?t=1');
                }
            }else{
                header('Location: ../member_save.php?t=0');
            }

        }
        }

    }

?>