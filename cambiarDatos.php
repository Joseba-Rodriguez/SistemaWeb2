<?php
 session_start();
    echo"<title>AlquilaTuCoche</title>";
    $user = "admin";
    $pass="test";
    $host="db";
    $dataBase="database";

    $connection = mysqli_connect($host,$user,$pass,$dataBase);
    if ($connection->connect_error) {
        die("Database connection failed: " . $connection->connect_error);
    }

    $matricula =$_SESSION["matricula"];

    $instruccion_SQL="SELECT * FROM tablacoches WHERE matricula='$matricula'";

    $resultado = mysqli_query($connection, $instruccion_SQL) or die (mysqli_error($connection));
	
	$row= mysqli_fetch_array($resultado);


?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta  charset="utf-8">
    <title>AlquilaTuCoche</title>
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript" src="registroCoche.js"></script>
    <script type="text/javascript" src="seguro.js"></script>

</head>
<body>

    <header>
        <a href="index.html">Concesionario Gajo</a>
    </header> 

    <section>
        <div>
            
            </div class="ImagenAlquilarCoche">
                <img src="Imagenes/ImagenModificarCoche.jpg" width="1920" height="1080" ></img>
               
                    
                    
                    
                    
                <div class="formularioRegistro">
                 <div 	class="tablaMod"    
			    <tr>
			     <td> <?php echo "Marca: $row[0]"?> </td>
			     <td> <?php echo "Modelo: $row[1]"?> </td>
			     <td> <?php echo "Caballos: $row[2]"?> </td>
			     <td> <?php echo "Matrícula: $row[3]"?> </td>
			     <td> <?php echo "Teléfono: $row[4]"?> </td>
			     <td> <?php echo "Precio: $row[5]"?> </td>
			      </tr>  
                </div>
                    <div class="modificarCoche"><h6>Introduce los datos que quieres cambiar de tu coche</h6></div>
                        <form name="modificarCocheMatricula" action="modificarCoche.php" method="post">
                            <input type="text" name="marca" placeholder="Introduce La marca">
                            <input type="text" name="modelo" placeholder="Introduce el modelo del coche">
                            <input type="text" name="caballos" placeholder="Introduce el n&uacute;mero de caballos (0-1500)">
                            <input type="text" name="matricula" placeholder="Introduce la matr&iacute;cula con mayúsculas (1234ABC)">
                            <input type="text" name="telefono" placeholder="Introduce tel&eacute;fono (612345678)">
                            <input type="text" name="precio" placeholder="Introduce precio (0-99999)">
                            <input type="button" value="Enviar" onclick="validarModificacion()" href="index.html">
                        </form>

                        <form name="eliminarMatricula" action="eliminarCoche.php" method="post">
                            <input type="button"  value="Eliminar" onclick= "seguro()">
                            
                        </form>
            </div>
            
        <div>

    </section>
    
    <a class="identificate" href="index.html">Volver al menú</a> 

    <div class="footer-basic">
        <footer>
         <div class="social">
                <a href="https://www.instagram.com/"><i class="icon ion-social-instagram" ><img src="Imagenes/instagram.png" alt="" width="40" class="mb-3"></i>
            </a><a href="https://accounts.snapchat.com/accounts/login?continue=https%3A%2F%2Faccounts.snapchat.com%2Faccounts%2Fwelcome"><i class="icon ion-social-snapchat"><img src="Imagenes/snaptchat.png" alt="" width="40" class="mb-3"></i>
            </a><a href="https://twitter.com/?lang=es"><i class="icon ion-social-twitter"><img src="Imagenes/twitter.png" alt="" width="40" class="mb-3"></i>
            </a><a href="https://es-es.facebook.com/"><i class="icon ion-social-facebook"><img src="Imagenes/facebook.png" alt="" width="40" class="mb-3"></i></a>
        </div>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="index.html">Inicio</a></li>
            <li class="list-inline-item"><a href="index.html">Servicios</a></li>
            <li class="list-inline-item"><a href="index.html">Sobre nosotros</a></li>
            <li class="list-inline-item"><a href="index.html">Terminos</a></li>
            <li class="list-inline-item"><a href="index.html">Política de privacida</a></li>
        </ul>
            <p class="copyright">GaJo © 2021</p>
        </footer>
    </div>
</body>
</html> 
