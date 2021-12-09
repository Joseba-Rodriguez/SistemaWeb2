<?php 
    session_start(); 
    $user = "admin";
    $pass="test";
    $host="localhost" ; #db
    $dataBase="database";
    
    $connection = new mysqli($host,$user,$pass,$dataBase);
    
    $email = $connection-> real_escape_string($_POST["email"]);
    $_SESSION['correo'] = $email;

    $password = $connection-> real_escape_string($_POST["password"]);
    
    $salt = md5($password);
    $pasword_encriptado = crypt($password, $salt);


    $instruccion_SQL= $connection->prepare("SELECT * FROM tabla WHERE email=?");

    $instruccion_SQL->bind_param("s",$email);

    $instruccion_SQL->execute();
    
    #$instruccion_SQL="SELECT * FROM tabla WHERE email='$email'";
    
    #$resultado = mysqli_query($connection, $instruccion_SQL) or die (mysqli_error($connection));
    
    $resultado = $instruccion_SQL->get_result();

    if(!$resultado){
        echo"Hubo Algun Error";
    }else{
        $row= $resultado->fetch_assoc();

        if($resultado->num_rows == 1){
            $fecha = date("y-m-d");
            $hora = date("H");
            $minuto = date("i");
            $segundo = date("s");

            $monitor_SQL= $connection->prepare("INSERT INTO logueo (email, fecha, hora, minuto, segundo, acceso) VALUES (?,?,?,?,?,?)");

            if($row['contraseña']==$pasword_encriptado){
                $acceso = 1;

                $monitor_SQL->bind_param("ssiiii",$email, $fecha, $hora, $minuto, $segundo, $acceso);

                $monitor_SQL->execute();

                echo"<script>alert('Bienvenido $row[nombre]')</script>";
            } else{
                $acceso = 0;

                $monitor_SQL->bind_param("ssiiii",$email, $fecha, $hora, $minuto, $segundo, $acceso);

                $monitor_SQL->execute();

                echo"<script>alert('Ha introducido una contraseña incorrecta'); window.location='login.html'</script>";
            }
        } else {
            echo"<script>alert('La cuenta no existe o hay problemas con su cuenta'); window.location='singup.html'</script>";
        }
    }
    $monitor_SQL->close();
    $instruccion_SQL->close();
    
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta  charset="utf-8">
    <title>Opciones</title>
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <script type="text/javascript" src="options.js"></script>

</head>
<body>
    
    <header>
        <a href="index.html">Concesionario Gajo</a>
    </header> 

    <?php 
    

    echo"<h3>Bienvenido: $email</h3>";
    
    
    ?>

    <section>
        <div>
            
        </div class="ImagenAlquilarCoche">
            <img src="Imagenes/options.jpg" width="1920" height="1080" ></img>      
            <div class="formularioRegistro">    
                <div class="modificarUsuario"><h2>Modifica los datos</h2></div>
                     <form name="opciones" action="options.php" method="post">
                     <input type="text" name="email" placeholder="Introduce nuevo email (ejemplo@ejemplo.com)">
                        <input type="text" name="nombre" placeholder="Introduce el nombre">
                        <input type="text" name="apellidos" placeholder="Introduce apellidos">
                        <input type="password" name="contraseña" placeholder="Introduce la nueva contraseña ">
                        <input type="text" name="telefono" placeholder="Introduce el nuevo tel&eacute;fono (612345678)">
                        <input type="text" name="dni" placeholder="Introduce DNI (12345678A)">
                        <h7>Fecha de nacimiento:</h7> <input type="date" name="FechaNacimiento">
                        
                        <br></br>


                       <input type="button" value="Enviar" onclick="validarOpciones()">
                     
                       
                    </form>   
                       
                       
                    <?php   
                       if(isset($_SESSION['correo'])){
                           echo"<br></br> <a href='cerrarSesion.php'>cerrarSesion</a>";

                       }else{
                           echo"No hay sesion";
                           header('Location: login.html');
                       }
                     
                    ?>
                    
            </div>
        <div>
</section>
<span><a class="identificate" href="login.html">Cerrar sesion</a></span>

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

<meta http-equiv="refresh" content="60;url=index.html" />

</body>
</html> 
<?php
#
?>
