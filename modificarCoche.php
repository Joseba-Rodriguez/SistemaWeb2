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
    
    $matriculaModificar =$_SESSION["matricula"];
    
    $marca =htmlspecialchars( $_POST["marca"]);
    $modelo =htmlspecialchars( $_POST["modelo"]);
    $caballos =htmlspecialchars( $_POST["caballos"]);
    $matricula =htmlspecialchars( $_POST["matricula"]);
    $telefono =htmlspecialchars( $_POST["telefono"]);
    $precio = htmlspecialchars($_POST["precio"]);
    $constante = 0;
    
    if(!empty($marca))
    {
        $marca_SQL= $connection->prepare("UPDATE tablacoches SET marca = ? WHERE matricula = '$matriculaModificar'");

        $marca_SQL->bind_param("s", $marca);

        $resultadomarca= $marca_SQL->execute();
        
        #$marca_SQL="UPDATE tablacoches SET marca = '$marca' WHERE matricula = '$matriculaModificar'";

        #$resultadomarca = mysqli_query($connection, $marca_SQL) or die (mysqli_error($connection));
        
        if(!$resultadomarca){
            echo"Hubo Algun Error";
        }
        $constante= $constante+1;
    }
    if(!empty($modelo))
    {
        $modelo_SQL= $connection->prepare("UPDATE tablacoches SET modelo = ? WHERE matricula = '$matriculaModificar'");

        $modelo_SQL->bind_param("s", $modelo);

        $resultadomodelo= $modelo_SQL->execute();
        
        #$modelo_SQL="UPDATE tablacoches SET modelo = '$modelo' WHERE matricula = '$matriculaModificar'";

        #$resultadomodelo = mysqli_query($connection, $modelo_SQL) or die (mysqli_error($connection));
        
        if(!$resultadomodelo){
            echo"Hubo Algun Error";
        }
        $constante= $constante+1;
    }
    if(!empty($caballos))
    {
        $caballos_SQL= $connection->prepare("UPDATE tablacoches SET caballos = ? WHERE matricula = '$matriculaModificar'");

        $caballos_SQL->bind_param("i", $caballos);

        $resultadocaballos= $caballos_SQL->execute();
        
        #$caballos_SQL="UPDATE tablacoches SET caballos = '$caballos' WHERE matricula = '$matriculaModificar'";

        #$resultadocaballos = mysqli_query($connection, $caballos_SQL) or die (mysqli_error($connection));
        
        if(!$resultadocaballos){
            echo"Hubo Algun Error";
        }
        $constante= $constante+1;
        
    }
    if(!empty($matricula))
    {
        $matricula_SQL= $connection->prepare("UPDATE tablacoches SET matricula = ? WHERE matricula = '$matriculaModificar'");

        $matricula_SQL->bind_param("s", $matricula);
        
        $matriculas_SQL="UPDATE tablacoches SET matricula = '$matricula' WHERE matricula = '$matriculaModificar'";

        if (!mysqli_query($connection, $matricula_SQL)) {
            echo"<script>alert('Comprueba lo que has escrito. Puede que te hayas confundido en la matricula.');window.location='modificarCoche.html'</script>";
        }

        $resultadomatricula= $matricula_SQL->execute();

        #$resultadomatricula = mysqli_query($connection, $matricula_SQL) or die (mysqli_error($connection));

        if(!$resultadomatricula){
            echo"Hubo Algun Error";
        }
        $constante= $constante+1;
    
    }
    if(!empty($telefono))
    {
        $telefono_SQL= $connection->prepare("UPDATE tablacoches SET telefono = ? WHERE matricula = '$matriculaModificar'");

        $telefono_SQL->bind_param("i", $telefono);

        $resultadoTelefono= $telefono_SQL->execute();
        
        #$telefono_SQL="UPDATE tablacoches SET telefono = '$telefono' WHERE matricula = '$matriculaModificar'";

        #$resultadoTelefono = mysqli_query($connection, $telefono_SQL) or die (mysqli_error($connection));
        
        if(!$resultadoTelefono){
            echo"Hubo Algun Error";
        }
        $constante= $constante+1;
        
    }
    if(!empty($precio))
    {
        $precio_SQL= $connection->prepare("UPDATE tablacoches SET precio = ? WHERE matricula = '$matriculaModificar'");

        $precio_SQL->bind_param("i", $precio);

        $resultadoPrecio= $precio_SQL->execute();
        
        #$precio_SQL="UPDATE tablacoches SET precio = '$precio' WHERE matricula = '$matriculaModificar'";

        #$resultadoprecio = mysqli_query($connection, $precio_SQL) or die (mysqli_error($connection));
        
        if(!$resultadoPrecio){
            echo"Hubo Algun Error";
        }
        $constante= $constante+1;
        
    }

    if($constante>0){
        echo"<script>alert('Se ha actualizado el coche con matricula $matriculaModificar correctamente'); window.location='mostrarCochesQueAlquilan.php'</script>";
    }else{
        echo"<script>window.location='mostrarCochesQueAlquilan.php'</script>";
    }
?>