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
    
    $matricula =$_GET["id"];
    
    if(empty($matricula)){
    $matricula=$_POST["matricula"];
    }
    
    $_SESSION['matricula'] = $matricula;
    
    $instruccion_SQL= $connection->prepare("SELECT * FROM tablacoches WHERE matricula = ?");

    $instruccion_SQL->bind_param("s",$matricula);

    $instruccion_SQL->execute();

    $resultado = $instruccion_SQL->get_result();
    
    #$instruccion_SQL="SELECT * FROM tablacoches WHERE matricula='$matricula'";
    #$resultado = mysqli_query($connection, $instruccion_SQL) or die (mysqli_error($connection));
    
    if(!$resultado){
        echo"Hubo Algun Error";
    }else{
        if($resultado->num_rows== 1){
                echo"<script>window.location='cambiarDatos.php'</script>";
        } else {
            echo"<script>alert('La matricula no existe'); window.location='mostrarCochesQueAlquilan.php'</script>";
        }
    }
    
?>
