<title>Cargando</title>

<?php 
    $user = "admin";
    $pass="test";
    $host="db";
    $dataBase="database";
    
    $connection = mysqli_connect($host,$user,$pass,$dataBase);
    if ($connection->connect_error) {
        die("Database connection failed: " . $connection->connect_error);
    }
    
    $email = $_POST["email"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $password = $_POST["contraseña"];
    $telefono = $_POST["telefono"];
    $DNI = $_POST["dni"];
    $fecha = $_POST["FechaNacimiento"];

    $comprobacion_SQL="SELECT email FROM tabla WHERE email='$email'";

    $resultadoComprobacion = mysqli_query($connection, $comprobacion_SQL) or die (mysqli_error($connection));

    if($resultadoComprobacion->num_rows== 0){
        
        $resultadoComprobacion->close();
        $instruccion_SQL="INSERT INTO tabla (email, nombre, apellidos, contraseña, telefono, DNI, fecha) VALUES ('$email','$nombre','$apellidos','$password','$telefono','$DNI','$fecha')";

        $resultado = mysqli_query($connection, $instruccion_SQL) or die (mysqli_error($connection));
        
        if(!$resultado){
            echo"Hubo Algun Error";
        }else{
            echo"<script>alert('Se ha registrado correctamente'); window.location='login.html'</script>";
        }
    } else {
        echo"<script>alert('Cuenta ya registrada en la web'); window.location='login.html'</script>";
    }
?>
