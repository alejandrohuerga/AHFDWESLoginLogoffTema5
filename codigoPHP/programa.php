<?php

    session_start();
    
    if (!isset($_SESSION['usuarioDAW202AppLoginLogoffTema5'])) {
        header("location: ../indexLoginLogoffTema5.php");
        exit;
    }

    if(isset($_REQUEST['cerrarSesion'])){
        //Destruye la sesión
        session_destroy();
        header('Location: ../indexLoginLogoffTema5.php');
        exit;
    }
    
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
                $usuarioEnCurso = $_SESSION['usuarioDAW202AppLoginLogoffTema5'];
                $fechaUltimaConexion = new DateTime($usuarioEnCurso['FechaHoraUltimaConexionAnterior']);
                if($_COOKIE["idioma"]==="es"){
                    //Creamos un objeto DateTime para poder utilizar la fecha y la hora de la ultima conexión.
                    $fechaHora=new DateTime($_SESSION['usuarioDAW202AppLoginLogoffTema5']['FechaHoraUltimaConexionAnterior'], new DateTimeZone('Europe/Madrid'));
                    $hora=$fechaHora->format('H:i');
                    //Como está instalada la extensión de internacionalización intl en el seridor y en plesk se va a utiliza IntlDAteFormater
                    //Utilizamos timestamp.
                    $timestamp = $fechaHora->getTimestamp();
                    $formatoFecha = new IntlDateFormatter('es_ES', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                    $fecha = $formatoFecha->format($timestamp);
                    echo "<h2>Bienvenido" .$_SESSION['usuarioDAW202AppLoginLogoffTema5']['DescUsuario']."</h2>";
                    if($_SESSION['usuarioDAW202AppLoginLogoffTema5']['NumConexiones']==0){
                        echo "<h2>¡Esta es tu primera conexión!</h2>";
                    }else{
                        echo "<h2>Esta es la ". $_SESSION['usuarioDAW202AppLoginLogoffTema5']['NumConexiones'] ." vez que se conecta</h2>";
                        echo "<h2>Usted se conectó por última vez el <br> </h2>";
                        echo $fecha . " a las " . $hora;
                    }  
                }
                if($_COOKIE["idioma"]==="en"){
                    //Creamos un objeto DateTime para poder utilizar la fecha y la hora de la ultima conexión.
                    $fechaHora=new DateTime($_SESSION['usuarioDAW202AppLoginLogoffTema5']['FechaHoraUltimaConexionAnterior'], new DateTimeZone('Europe/London'));
                    //Convertimos a fecha y hora de Londres.
                    $fechaHora->setTimezone(new DateTimeZone('Europe/London'));
                    $hora=$fechaHora->format('H:i');
                    $timestamp = $fechaHora->getTimestamp();
                    $formatoFecha = new IntlDateFormatter('en_GB', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                    $fecha = $formatoFecha->format($timestamp);
                    echo "<h2>Welcome " .$_SESSION['usuarioDAW202AppLoginLogoffTema5']['DescUsuario']."!</h2>";
                    if($_SESSION['usuarioDAW202AppLoginLogoffTema5']['NumConexiones']==0){
                        echo "<h2>¡This is your first conection!</h2>";
                    }else{
                        echo "<h2>This is the ". $_SESSION['usuarioDAW202AppLoginLogoffTema5']['NumConexiones'] ." time he has connected</h2>";
                        echo "<h2> You last connected on <br> </h2>";
                        echo $fecha . " at " . $hora;
                    }  
                }
                if($_COOKIE["idioma"]==="pt"){
                    //Creamos un objeto DateTime para poder utilizar la fecha y la hora de la ultima conexión.
                    $fechaHora=new DateTime($_SESSION['usuarioDAW202AppLoginLogoffTema5']['FechaHoraUltimaConexionAnterior'], new DateTimeZone('Europe/Lisbon'));
                    $fechaHora->setTimezone(new DateTimeZone('Europe/Lisbon'));
                    $hora=$fechaHora->format('H:i');
                    $timestamp = $fechaHora->getTimestamp();
                    $formatoFecha = new IntlDateFormatter('pt_PT', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
                    $fecha = $formatoFecha->format($timestamp);
                    if($_SESSION['usuarioDAW202AppLoginLogoffTema5']['NumConexiones']==0){
                        echo "<h2>Bem-vindo ".$_SESSION['usuarioDAW202AppLoginLogoffTema5']['DescUsuario']." !</h2>";
                    }else{
                        echo "<h2>Esta é a ". $_SESSION['usuarioDAW202AppLoginLogoffTema5']['NumConexiones'] ." que ele se conecta.</h2>";
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