<?php

    session_start();
    
    if (!isset($_SESSION["usuario"])) {
        header("location: ../indexLoginLogoffTema5.php");
    exit;
    }

    if(isset($_REQUEST['cerrarSesion'])){
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
                if($_COOKIE["idioma"]==="es"){
                    echo "<h2>BIENVENIDO A TU AREA PRIVADA</h2>";
                }elseif($_COOKIE["idioma"]==="en"){
                    echo "<h2>WELCOME TO YOUR PRIVATE AREA </h2>";
                }elseif($_COOKIE["idioma"]==="pt"){
                    echo "<h2>BEM-VINDO A UMA RESIDÊNCIA PARTICULAR!</h2>";
                }?>
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