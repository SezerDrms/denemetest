<?php

    include('function.php');

    session_start();

    if(@isLogin() == true){
        session_destroy();
        Header('Location: index.php');
    }else{
        Header('Location: index.php');
    }



?>