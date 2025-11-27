<?php
    //iniciamos la sesión
    session_start();
    
    if (!isset($_SESSION["usuario"])) {
        header("location: ../indexLoginLogoffTema5.php");
    exit;
    }
    
    //Comprobamos que hemos pulsado en salir borramos todo lo que hay en la sesion y la destruimos
    if(isset($_REQUEST['cerrarSesion'])){
        $_SESSION['userAHFDWESLoginLogoffTema5']=null;
        $_SESSION['ultimaConexionAnterior']=null;
        session_destroy(); // Destruye todos los datos de la sesión.
        header('Location: ../indexLoginLogoffTema5.php');
        exit;
    }
    
    //Comprobamos que hemos pulsado en detalle y dirigimos a detalle.php
    if(isset($_REQUEST['detalle'])){
        header('Location: detalle.php');
        exit;
    }
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../webroot/css/estilos.css"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bitcount+Grid+Double:wght@100..900&family=Play:wght@400;700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <p>LOGIN LOGOFF TEMA 5</p>
            <h2>INICIAR PRIVADO</h2>
            <form>
                <input type="submit" name="cerrarSesion" value="Cerrar Sesion"/>
            </form>
        </header>
        <main>
            <?php 
                if($_COOKIE["idioma"]==="es"){
                    //Creamos un objeto DateTime para poder utilizar la fecha y la hora de la ultima conexión.
                    $fechaHora=new DateTime($_SESSION['ultimaConexion'], new DateTimeZone('Europe/Madrid'));
                    $hora=$fechaHora->format('H:i');
                    //Como está instalada la extensión de internacionalización intl en el seridor y en plesk se va a utiliza IntlDAteFormater
                    //Utilizamos timestamp.
                    $timestamp = $fechaHora->getTimestamp();
                    $formatoFecha = new IntlDateFormatter('es_ES', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                    $fecha = $formatoFecha->format($timestamp);
                    echo "<h2>Bienvenido $_SESSION[descripcion]</h2>";
                    if($_SESSION['numConexiones']==0){
                        echo "<h2>¡Esta es tu primera conexión!</h2>";
                    }else{
                        echo "<h2>Esta es la $_SESSION[numConexiones] vez que se conecta</h2>";
                        echo "<h2>Usted se conectó por última vez el <br> </h2>";
                        echo $fecha . " a las " . $hora;
                    }  
                }elseif($_COOKIE["idioma"]==="en"){
                    //Creamos un objeto DateTime para poder utilizar la fecha y la hora de la ultima conexión.
                    $fechaHora=new DateTime($_SESSION['ultimaConexion'], new DateTimeZone('Europe/London'));
                    //Convertimos a fecha y hora de Londres.
                    $fechaHora->setTimezone(new DateTimeZone('Europe/London'));
                    $hora=$fechaHora->format('H:i');
                    $timestamp = $fechaHora->getTimestamp();
                    $formatoFecha = new IntlDateFormatter('en_GB', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                    $fecha = $formatoFecha->format($timestamp);
                    echo "<h2>Welcome $_SESSION[descripcion]! </h2>";
                    if($_SESSION['numConexiones']==0){
                        echo "<h2>¡This is your first conection!</h2>";
                    }else{
                        echo "<h2>This is the $_SESSION[numConexiones] time he has connected</h2>";
                        echo "<h2> You last connected on <br> </h2>";
                        echo $fecha . " at " . $hora;
                    }  
                }elseif($_COOKIE["idioma"]==="pt"){
                    //Creamos un objeto DateTime para poder utilizar la fecha y la hora de la ultima conexión.
                    $fechaHora=new DateTime($_SESSION['ultimaConexion'], new DateTimeZone('Europe/Lisbon'));
                    $fechaHora->setTimezone(new DateTimeZone('Europe/Lisbon'));
                    $hora=$fechaHora->format('H:i');
                    $timestamp = $fechaHora->getTimestamp();
                    $formatoFecha = new IntlDateFormatter('pt_PT', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                    $fecha = $formatoFecha->format($timestamp);
                    if($_SESSION['numConexiones']==0){
                        echo "<h2>Bem-vindo $_SESSION[descripcion]!</h2>";
                    }else{
                        echo "<h2>Esta é a $_SESSION[descripcion] que ele se conecta.</h2>";
                        echo "<h2>Você fez login pela última vez em <br> </h2>";
                        echo "<h2> $fecha  at   $hora </h2>";
                    }  
                }
            ?>
            <form>
                <input type="submit" name="detalle" value="Detalle"/>
            </form>
        </main>
        <footer>
            <p class="nombre"><a href="https://alejandrohuefer.ieslossauces.es/">Alejandro De la Huerga Fernández</a><p>
            <p class="webImitada"><a href="https://www.faceit.com/es">Página Web imitada</a><p>
            <a href="https://github.com/alejandrohuerga/AHFDWESLoginLogoffTema5.git">
                <img src="../doc/images/icone-github-grise.png"> 
            </a>
        </footer>
    </body>
</html>