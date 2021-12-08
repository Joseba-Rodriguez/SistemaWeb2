<title>Cargando</title>

<?php 
    $user = "admin";
    $pass="test";
    $host="localhost"; #db
    $dataBase="database";
    
    $connection = mysqli_connect($host,$user,$pass,$dataBase);
    if ($connection->connect_error) {
        die("Database connection failed: " . $connection->connect_error);
    }
    
    $email = $connection-> real_escape_string($_POST["email"]);
    $nombre = $connection-> real_escape_string($_POST["nombre"]);
    $apellidos = $connection-> real_escape_string($_POST["apellidos"]);
    $password = $connection-> real_escape_string($_POST["contraseña"]);
    $telefono = $_POST["telefono"];
    $DNI = $connection-> real_escape_string($_POST["dni"]);
    $fecha = $_POST["FechaNacimiento"];

    $comprobacion_SQL= $connection->prepare("SELECT email FROM tabla WHERE email=?");
    
    #$comprobacion_SQL="SELECT email FROM tabla WHERE email='$email'";
    
    #$resultadoComprobacion = mysqli_query($connection, $comprobacion_SQL) or die (mysqli_error($connection));
    
    $comprobacion_SQL->bind_param("s",$email);

    $comprobacion_SQL->execute();

    $resultadoComprobacion = $comprobacion_SQL->get_result();

    if($resultadoComprobacion->num_rows== 0){
        
        $resultadoComprobacion->close();

        $instruccion_SQL= $connection->prepare("INSERT INTO tabla (email, nombre, apellidos, contraseña, telefono, DNI, fecha) VALUES (?,?,?,?,?,?,?)");

        $instruccion_SQL->bind_param("ssssiss", $email, $nombre, $apellidos,$password ,$telefono ,$DNI , $fecha);

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
