<?php 
    session_start();
    echo"<title>Cargando</title>";
    $user = "admin";
    $pass="test";
    $host="localhost" ; #db
    $dataBase="database";
    
    $connection = mysqli_connect($host,$user,$pass,$dataBase);
    if ($connection->connect_error) {
        die("Database connection failed: " . $connection->connect_error);
    }
    
    $correoUsuario = $_SESSION['correo'];
    
    $email = htmlspecialchars( $_POST["email"]);
    $nombre = htmlspecialchars ($_POST["nombre"]);
    $apellidos = htmlspecialchars ($_POST["apellidos"]);
    $password = htmlspecialchars ($_POST["contraseña"]);
    $telefono = htmlspecialchars ($_POST["telefono"]);
    $DNI =htmlspecialchars ($_POST["dni"]);
    $fecha = htmlspecialchars ($_POST["FechaNacimiento"]);
    $constante=0;
    
    if(!empty($email)&& $email!=$correoUsuario)
    {
        $email_SQL= $connection->prepare("UPDATE tabla SET email = ? WHERE email = '$correoUsuario'");

        $email_SQL->bind_param("s", $email);

        $resultadoEmail= $email_SQL->execute();
        
        #$email_SQL="UPDATE tabla SET email = '$email' WHERE email = '$correoUsuario'";

        if (!$resultadoEmail) {
            echo"<script>alert('Comprueba lo que has escrito. Puede que te hayas confundido en el correo.');window.location='options.php'</script>";
        }
        #mysqli_query($connection, $email_SQL)
        #$resultadoEmail = mysqli_query($connection, $email_SQL) or die (mysqli_error($connection));
        $constante= $constante+1;
    
    }
    if(!empty($nombre))
    {
        $nombre_SQL= $connection->prepare("UPDATE tabla SET nombre = ? WHERE email = '$correoUsuario'");

        $nombre_SQL->bind_param("s", $nombre);

        $resultadoNombre= $nombre_SQL->execute();
        
        #$nombre_SQL="UPDATE tabla SET nombre = '$nombre' WHERE email = '$correoUsuario'";

        #$resultadoNombre = mysqli_query($connection, $nombre_SQL) or die (mysqli_error($connection));
        $constante= $constante+1;
    
    }
    if(!empty($apellidos))
    {
        $apellidos_SQL= $connection->prepare("UPDATE tabla SET apellidos = ? WHERE email = '$correoUsuario'");

        $apellidos_SQL->bind_param("s", $apellidos);

        $resultadoApellidos= $apellidos_SQL->execute();
        
        #$apellidos_SQL="UPDATE tabla SET apellidos = '$apellidos' WHERE email = '$correoUsuario'";

        #$resultadoApellidos = mysqli_query($connection, $apellidos_SQL) or die (mysqli_error($connection));
        $constante= $constante+1;
    
    }
    if(!empty($password))
    {
        $contraseña_SQL= $connection->prepare("UPDATE tabla SET contraseña = ? WHERE email = '$correoUsuario'");

        $contraseña_SQL->bind_param("s", $password);

        $resultadoContraseña= $contraseña_SQL->execute();
        
        #$contraseña_SQL="UPDATE tabla SET contraseña = '$password' WHERE email = '$correoUsuario'";

        #$resultadoContraseña = mysqli_query($connection, $contraseña_SQL) or die (mysqli_error($connection));
        $constante= $constante+1;
    
    }
    if(!empty($telefono))
    {
        $telefono_SQL= $connection->prepare("UPDATE tabla SET telefono = ? WHERE email = '$correoUsuario'");

        $telefono_SQL->bind_param("i", $telefono);

        $resultadoTelefono= $telefono_SQL->execute();
        
        #$telefono_SQL="UPDATE tabla SET telefono = '$telefono' WHERE email = '$correoUsuario'";

        #$resultadoTelefono = mysqli_query($connection, $telefono_SQL) or die (mysqli_error($connection));
        $constante= $constante+1;
    
    }
    if(!empty($DNI))
    {
        $dni_SQL= $connection->prepare("UPDATE tabla SET dni = ? WHERE email = '$correoUsuario'");

        $dni_SQL->bind_param("s", $DNI);

        $resultadoDNI= $dni_SQL->execute();
        
        #$dni_SQL="UPDATE tabla SET dni = '$DNI' WHERE email = '$correoUsuario'";

        #$resultadoDNI = mysqli_query($connection, $dni_SQL) or die (mysqli_error($connection));
        $constante= $constante+1;
    
    }
    if(!empty($fecha))
    {
        $fecha_SQL= $connection->prepare("UPDATE tabla SET fecha = ? WHERE email = '$correoUsuario'");

        $fecha_SQL->bind_param("s", $fecha);

        $resultadoFecha= $fecha_SQL->execute();
        
        #$fecha_SQL="UPDATE tabla SET fecha = '$fecha' WHERE email = '$correoUsuario'";

        #$resultadoFecha = mysqli_query($connection, $fecha_SQL) or die (mysqli_error($connection));
        $constante= $constante+1;
    
    }
    if($constante>0){
        echo"<script>alert('Se ha actualizado la cuenta con correo: $correoUsuario correctamente'); window.location='login.html'</script>";
    }else{
        echo"<script>window.location='login.html'</script>";
    }
?>
<html>
    
</html>