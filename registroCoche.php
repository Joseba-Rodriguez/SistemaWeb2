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
    
    $marca = htmlspecialchars($_POST["marca"]);
    $modelo = htmlspecialchars($_POST["modelo"]);
    $caballos =htmlspecialchars( $_POST["caballos"]);
    $matricula =htmlspecialchars( $_POST["matricula"]);
    $telefono = htmlspecialchars($_POST["telefono"]);
    $precio = htmlspecialchars($_POST["precio"]);

    $comprobacion_SQL= $connection->prepare("SELECT matricula FROM tablacoches WHERE matricula=?");

    #$comprobacion_SQL="SELECT matricula FROM tablacoches WHERE matricula='$matricula'";

    #$resultadoComprobacion = mysqli_query($connection, $comprobacion_SQL) or die (mysqli_error($connection));

    $comprobacion_SQL->bind_param("s",$matricula);

    $comprobacion_SQL->execute();

    $resultadoComprobacion = $comprobacion_SQL->get_result();
    
    if($resultadoComprobacion->num_rows== 0){
        
        $resultadoComprobacion->close();

        $instruccion_SQL= $connection->prepare("INSERT INTO tablacoches (marca, modelo, caballos, matricula, telefono, precio) VALUES (?,?,?,?,?,?)");

        $instruccion_SQL->bind_param("ssisii", $marca ,$modelo ,$caballos ,$matricula ,$telefono ,$precio);

        $resultado = $instruccion_SQL->execute();
        
        #$instruccion_SQL="INSERT INTO tablacoches (marca, modelo, caballos, matricula, telefono, precio) VALUES ('$marca','$modelo','$caballos','$matricula','$telefono','$precio')";

        #$resultado = mysqli_query($connection, $instruccion_SQL) or die (mysqli_error($connection));
        
        if(!$resultado or mysqli_error($connection)){
            echo"Hubo Algun Error";
        }else{
            echo"<script>alert('Se ha registrado correctamente'); window.location='mostrarCochesQueAlquilan.php'</script>";
        }
    } else {
        echo"<script>alert('Coche con esa matricula ya registrada en la web'); window.location='mostrarCochesQueAlquilan.php'</script>";
    }
   
?>