<?php
    $host="localhost";
    $host_name="root";
    $host_password="";
    $active=mysql_connect($host,$host_name,$host_password);
    mysql_select_db("uyekayit",$active);
    mysql_query("SET CHARACTER SET 'utf-8'");
    mysql_query("SET NAMES 'utf-8'");
    $select=mysql_query("SELECT * FROM member");
    $sql_dizi=mysql_fetch_array($select);
    $mena=$sql_dizi["member_name"];
    $mepas=$sql_dizi["member_password"];
?>