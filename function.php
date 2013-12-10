<?php
require_once "vt.php";
function p($pos){
    return $_POST[$pos];
}


function aver_acco($valu){
    $valu=($valu/2);
    return "-".$valu."px";
}


function isLogin(){
    if(is_array($_SESSION["userdata"])){
        return true;
    }else{
        return false;
    }
}