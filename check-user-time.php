<?php
session_start();
$userlogintime=$_SESSION['correo_time'];

if(isset($userlogintime)) {
    $difference= time() - $userlogintime;
    if($difference>10)
    {
    echo 'Logout';
    }
}
?>