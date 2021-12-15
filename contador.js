var tiempo;

function ini() {
    tiempo = setTimeout('location="cerrarSesion.php"',60000); // 60 segundos
}

function parar() {
    clearTimeout(tiempo);
    tiempo = setTimeout('location="cerrarSesion.php"',60000); // 60 segundos
}