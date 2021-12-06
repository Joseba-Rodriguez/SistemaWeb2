<?php
session_start();


if(isset($_SESSION['correo'])){
    echo "existe sesión";
    session_destroy();
    header("Location:login.html");
}else{
echo"no existe sesion";
header("Location: login.html");
}
?>