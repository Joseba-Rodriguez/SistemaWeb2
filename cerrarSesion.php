<?php
session_start();
unset($_SESSION["correo"]);
session_destroy();
header('Location:index.html');
?>