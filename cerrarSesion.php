<?php
session_start();


if(isset($_SESSION['correo'])){
    echo "existe sesión";
    session_destroy();
    header("Location:index.html");
}else{
echo"no existe sesion";
header("Location: index.html");
}
?>