<title>Cargando</title>

<?php 
    $user = "admin";
    $pass="test";
    $host="localhost"; #db
    $dataBase="database";
    
    include 'encriptarYdesencriptar.php';

    $connection = mysqli_connect($host,$user,$pass,$dataBase);
    if ($connection->connect_error) {
        die("Database connection failed: " . $connection->connect_error);
    }
    
    $email = $connection-> real_escape_string(htmlspecialchars($_POST["email"]));
    $nombre = $connection-> real_escape_string(htmlspecialchars($_POST["nombre"]));
    $apellidos = $connection-> real_escape_string(htmlspecialchars($_POST["apellidos"]));
    $password = $connection-> real_escape_string(htmlspecialchars($_POST["contraseña"]));
    $telefono = htmlspecialchars($_POST["telefono"]);
    $DNI = $connection-> real_escape_string(htmlspecialchars($_POST["dni"]));
    $fecha = htmlspecialchars($_POST["FechaNacimiento"]);
    $cuenta = htmlspecialchars($_POST["cuenta"]);
    
    $salt = md5($password);
    $pasword_encriptado = crypt($password, $salt);
     
    #encriptamos la cuenta con la funcion creada en encriptarYdesencriptar.php
    
    $cuentaEnc= base64_encode($cuenta);

    $comprobacion_SQL= $connection->prepare("SELECT email FROM tabla WHERE email=?");
    
    #$comprobacion_SQL="SELECT email FROM tabla WHERE email='$email'";
    
    #$resultadoComprobacion = mysqli_query($connection, $comprobacion_SQL) or die (mysqli_error($connection));
    
    $comprobacion_SQL->bind_param("s",$email);

    $comprobacion_SQL->execute();

    $resultadoComprobacion = $comprobacion_SQL->get_result();

    if($resultadoComprobacion->num_rows== 0){
        
        $resultadoComprobacion->close();

        $instruccion_SQL= $connection->prepare("INSERT INTO tabla (email, nombre, apellidos, contraseña, telefono, DNI, fecha, cuenta ) VALUES (?,?,?,?,?,?,?,?)");

        $instruccion_SQL->bind_param("ssssisss", $email, $nombre, $apellidos,$pasword_encriptado ,$telefono ,$DNI , $fecha, $cuentaEnc);

        $resultado = $instruccion_SQL->execute();

        #$instruccion_SQL="INSERT INTO tabla (email, nombre, apellidos, contraseña, telefono, DNI, fecha) VALUES ('$email','$nombre','$apellidos','$password','$telefono','$DNI','$fecha')";

        #$resultado = mysqli_query($connection, $instruccion_SQL) or die (mysqli_error($connection));
        
        if(!$resultado){
            echo"Hubo Algun Error";
        }else{
            echo"<script>alert('Se ha registrado correctamente'); window.location='login.html'</script>";
        }
    } else {
        echo"<script>alert('Cuenta ya registrada en la web'); window.location='login.html'</script>";
    }
?>
