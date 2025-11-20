<?php
    /*
     * @author Alejandro De la Huerga
     * @version V 1.0.0
     * @since 20/11/2025
     */

    if(isset($_REQUEST['entrar'])){
        header('Location: programa.php');
        exit;
    }
    
    if(isset($_REQUEST['cancelar'])){
        header('Location: ../indexLoginLogoffTema5.php');
        exit;
    }
    
    if(isset($_REQUEST['registrarse'])){
        header('Location: vRegistro.php');
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
            <h2 id="login">LOGIN</h2>
        </header>
        <main id="mainLogin">
            <div id="divLogin">
                <h1>Iniciar Sesión</h1>
                <form>
                    <input type="submit" name="entrar" value="INICIAR SESIÓN"/>
                    <input type="submit" name="cancelar" value="CANCELAR"/>
                    <input type="submit" name="registrarse" value="CREAR CUENTA"/>
                </form>
            </div>
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
