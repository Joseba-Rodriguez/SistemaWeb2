<?php 
    echo "<link rel=stylesheet href=css/styles.css>";
    $user = "admin";
    $pass="test";
    $host="db";
    $dataBase="database";
    
    $connection = mysqli_connect($host,$user,$pass,$dataBase);
    if ($connection->connect_error) {
        die("Database connection failed: " . $connection->connect_error);
    }

    $query= mysqli_query($connection, "SELECT * FROM tablacoches") or die(mysqli_error($connection));
?>

<html>
<body>

        <table class="tabla">
  		
		    <tr class="tablaMostrarCoches">
			    <th>Marca</th>
			    <th>Modelo</th>
			    <th>Caballos</th>
			    <th>Matrícula</th>
			    <th>Teléfono</th>
                <th>Precio</th>
                <th>Editar</th>
	        </tr>



            <?php

    while($row = mysqli_fetch_array($query)){
    ?>
       
        <tr>
             <td> <?php echo $row["marca"]?> </td>
             <td> <?php echo $row["modelo"]?> </td>
             <td> <?php echo $row["caballos"]?> </td>
             <td> <?php echo $row["matricula"]?> </td>
             <td> <?php echo $row["telefono"]?> </td>
             <td> <?php echo $row["precio"]?> </td>
             <td> <a href="comprobarCoche.php?id=<?php echo $row["matricula"]?>">Modificar</a> </td>
             </tr>
    
<?php
    }
    
?>
</table>

<a href="index.html"><input type="submit" value="Volver al menú"></a><br>
<a href="elegirCocheParaEditar.html"><input type="submit" value="Modificar coche"></a>

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
            <li class="list-inline-item"><a href="index.html">Términos</a></li>
            <li class="list-inline-item"><a href="index.html">Política de privacida</a></li>
        </ul>
            <p class="copyright">GaJo © 2021</p>
        </footer>
    </div>
</body>
</html>






