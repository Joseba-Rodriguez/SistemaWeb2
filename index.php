

<!DOCTYPE html>
<html lang="en">

<script type="text/javascript" src="contador.js"></script>

<head>
    <title>ConcesionarioGajo</title>
    <link href="https://fonts.googleapis.com/css2?family=Signika+Negative:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <script>
        function Escribir(){
            let marca = localStorage.getItem('marca');
            let marca = localStorage.getItem('modelo');
            document.write("Marca: "+ Marca());
            document.write("Modelo: " + Modelo());
            localStorage.clear();
        }
    </script>
    
</head>

<?php
    session_start();
    if(isset($_SESSION['correo'])){
        echo" <body onload='ini()' onkeypress='parar()' onclick='parar()'>";
       
    }else{
        echo"<body>";
       
    }
?>
    <header>
        <a href="index.php">Concesionario Gajo</a>
    </header>
    
        
    </div>
   <section>
       <h2 id="text"><span>Concesionario</span><br>GaJo</h2>
       <div>
           <image class="imagenPrincilal" src="Imagenes/principa.jpg" width="1920" height="1080"></image>
           <div>                    
           <div class="IdReg">
                    <?php  
                    
                       if(isset($_SESSION['correo'])){
                           echo" <a class='identificate' href='cerrarSesion.php'>Cerrar sesión</a> o
                           <a class='identificate' href='modificar.php'>Modificar Datos</a>";
                          
                       }else{
                           echo"<a class='identificate' href='login.html'>Identif&iacute;cate</a> o
                           <a class='identificate' href='singup.html'>Reg&iacute;strate</a>";
                          
                       }
                    
                    ?>  
           
                 </div>
           </div>
       </div>
       
   
    </section>

    <h2>Alquila el coche de tus sue&ntilde;os</h2>
    <h6>Pulsando en los coches podr&aacute;s consultar las fechas disponibles: </h6>
   
        <div class="container" >

            <div class="image-container" > 
                <div class="image"><img src="Imagenes/1.jpg" ></div>
                <div class="image"><img src="Imagenes/2.jpg" ></div>
                <div class="image"><img src="Imagenes/3.jpg" ></div>
                <div class="image"><img src="Imagenes/4.jpg" ></div>
                <div class="image"><img src="Imagenes/5.jpg" ></div>
                <div class="image"><img src="Imagenes/6.jpg" ></div>
                <div class="image"><img src="Imagenes/7.jpg" ></div>
                <div class="image"><img src="Imagenes/8.jpg" ></div>

               
            <div class="popup-image">
                <span>&times;</span>
                <img src="Imagenes/Lamborghini-Huracan.jpg" alt="">
               
                <div class="formularioCoches">
                   
                   Fecha de inicio: <input type="date" name="FechaInicio">
                   Fecha de fin: <input type="date" name="FechaInicio">
                    
                </div> 
                
            </div>

         <div>

    </div>

</div>

<script>
    document.querySelectorAll('.image-container img').forEach(image =>{
        image.onclick = () =>{
            document.querySelector('.popup-image').style.display = 'block';
            document.querySelector('.popup-image img').src = image.getAttribute('src');
        }

    });
    document.querySelector('.popup-image span').onclick = () =>{
        document.querySelector('.popup-image').style.display = 'none';
    }
</script>

<div class='referencias'>
<?php 
        if(isset($_SESSION['correo'])){
            echo"<h3>Haz <a href='registraTuCoche.html'>click aqu&iacute;</a> para alquilar tu propio coche</h3> 
                <br> </br>           
                <h3>Haz <a href='mostrarCochesQueAlquilan.php'>click aqu&iacute;</a> para mostrar los coches alquilados</h3>";
        }
?>
</div>

<div class="footer-basic">
    <footer>
     <div class="social">
            <a href="https://www.instagram.com/"><i class="icon ion-social-instagram" ><img src="Imagenes/instagram.png" alt="" width="40" class="mb-3"></i>
        </a><a href="https://accounts.snapchat.com/accounts/login?continue=https%3A%2F%2Faccounts.snapchat.com%2Faccounts%2Fwelcome"><i class="icon ion-social-snapchat"><img src="Imagenes/snaptchat.png" alt="" width="40" class="mb-3"></i>
        </a><a href="https://twitter.com/?lang=es"><i class="icon ion-social-twitter"><img src="Imagenes/twitter.png" alt="" width="40" class="mb-3"></i>
        </a><a href="https://es-es.facebook.com/"><i class="icon ion-social-facebook"><img src="Imagenes/facebook.png" alt="" width="40" class="mb-3"></i></a>
    </div>
    <ul class="list-inline">
        <li class="list-inline-item"><a href="index.php">Inicio</a></li>
        <li class="list-inline-item"><a href="index.php">Servicios</a></li>
        <li class="list-inline-item"><a href="index.php">Sobre nosotros</a></li>
        <li class="list-inline-item"><a href="index.php">T&eacute;rminos</a></li>
        <li class="list-inline-item"><a href="index.php">Pol&iacute;tica de privacida</a></li>
    </ul>
        <p class="copyright">GaJo © 2021</p>
    </footer>
</div>

</body>

    
</body>
</html>

