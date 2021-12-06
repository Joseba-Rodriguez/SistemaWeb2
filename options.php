<?php 
    session_start();
    echo"<title>Cargando</title>";
    $user = "admin";
    $pass="test";
    $host="db";
    $dataBase="database";
    
    $connection = mysqli_connect($host,$user,$pass,$dataBase);
    if ($connection->connect_error) {
        die("Database connection failed: " . $connection->connect_error);
    }
    
    $correoUsuario = $_SESSION['correo'];
    
    $email = $_POST["email"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $password = $_POST["contraseña"];
    $telefono = $_POST["telefono"];
    $DNI = $_POST["dni"];
    $fecha = $_POST["FechaNacimiento"];
    $constante=0;
    
    if(!empty($email)&& $email!=$correoUsuario)
    {
        $email_SQL="UPDATE tabla SET email = '$email' WHERE email = '$correoUsuario'";

        if (!mysqli_query($connection, $email_SQL)) {
            echo"<script>alert('Comprueba lo que has escrito. Puede que te hayas confundido en el correo.');window.location='options.php'</script>";
        }

        $resultadoEmail = mysqli_query($connection, $email_SQL) or die (mysqli_error($connection));
        $constante= $constante+1;
    
    }
    if(!empty($nombre))
    {
        $nombre_SQL="UPDATE tabla SET nombre = '$nombre' WHERE email = '$correoUsuario'";

        $resultadoNombre = mysqli_query($connection, $nombre_SQL) or die (mysqli_error($connection));
        $constante= $constante+1;
    
    }
    if(!empty($apellidos))
    {
        $apellidos_SQL="UPDATE tabla SET apellidos = '$apellidos' WHERE email = '$correoUsuario'";

        $resultadoApellidos = mysqli_query($connection, $apellidos_SQL) or die (mysqli_error($connection));
        $constante= $constante+1;
    
    }
    if(!empty($password))
    {
        $contraseña_SQL="UPDATE tabla SET contraseña = '$password' WHERE email = '$correoUsuario'";

        $resultadoContraseña = mysqli_query($connection, $contraseña_SQL) or die (mysqli_error($connection));
        $constante= $constante+1;
    
    }
    if(!empty($telefono))
    {
        $telefono_SQL="UPDATE tabla SET telefono = '$telefono' WHERE email = '$correoUsuario'";

        $resultadoTelefono = mysqli_query($connection, $telefono_SQL) or die (mysqli_error($connection));
        $constante= $constante+1;
    
    }
    if(!empty($DNI))
    {
        $dni_SQL="UPDATE tabla SET dni = '$DNI' WHERE email = '$correoUsuario'";

        $resultadoDNI = mysqli_query($connection, $dni_SQL) or die (mysqli_error($connection));
        $constante= $constante+1;
    
    }
    if(!empty($fecha))
    {
        $fecha_SQL="UPDATE tabla SET fecha = '$fecha' WHERE email = '$correoUsuario'";

        $resultadoFecha = mysqli_query($connection, $fecha_SQL) or die (mysqli_error($connection));
        
    
    }

    if($constante>0){
        echo"<script>alert('Se ha actualizado la cuenta con correo: $correoUsuario correctamente'); window.location='login.html'</script>";
    }else{
        echo"<script>window.location='login.html'</script>";
    }
?>
