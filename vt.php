<?php
    $host="localhost";
    $host_name="root";
    $host_password="";
    $active=mysql_connect($host,$host_name,$host_password);
    mysql_select_db("uyekayit",$active);
    mysql_query("SET CHARACTER SET 'utf-8'");
    mysql_query("SET NAMES 'utf-8'");
    $text_date=mysql_query("SELECT * FROM member_text");
    $select=mysql_query("SELECT * FROM member");
    while($sql_rows=mysql_fetch_array($select)){
        $sql_dizi=$sql_rows;
    }
    $mena=$sql_dizi["member_name"];
    $mepas=$sql_dizi["member_password"];

?>