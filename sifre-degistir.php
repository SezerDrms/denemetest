<?php
include('function.php');

session_start();

if(isLogin() == true){
?>
<table>
    <tr>
        <td>yeni şifre</td>
        <td><input type="password" name="newpass"></td>
    </tr>
</table>
<?php }else{

    Header('Location: index.php');


    }
?>


