<?php
    if(isset($_REQUEST['iniciarSesion'])){
        header('Location: codigoPHP/login.php');
        exit;
    }
    
    if(empty($_COOKIE['idioma'])){
        setcookie("idioma","ES",time()+3600);
    }
    
    if(isset($REQUEST['idioma'])){
        setcookie("idioma",$_REQUEST['idioma'],time()+3600); // Fecha de caducidad 1 hora.
        header("Location: indexLoginLogoffTema5.php");
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
        <title>Login Logoff Tema 5</title>
        <link rel="stylesheet" href="webroot/css/estilos.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bitcount+Grid+Double:wght@100..900&family=Play:wght@400;700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <p>LOGIN LOGOFF TEMA 5</p>
            <h2 id="inicioPublico">INICIO PÚBLICO</h2>
            <form>
                <input type="submit" name="iniciarSesion" value="INICIAR SESIÓN"/>
                <button type="submit" name="idioma" value="ES">
                    <img src="doc/images/reino-unido.png" alt="Ingles">
                </button>
                <button type="submit" name="idioma" value="EN">
                    <img src="doc/images/spain.png" alt="Español">
                </button>
            </form> 
        </header>
        <main>
            <h4 id="h4InicioPublico">!Bienvenido al inicio público¡</h4>
            <p id="pInicioPublico">Desde esta página puedes iniciar sesión arriba a la derecha.</p>
        </main>
        <footer>
            <p class="nombre"><a href="https://alejandrohuefer.ieslossauces.es/">Alejandro De la Huerga Fernández</a><p>
            <p class="webImitada"><a href="https://www.faceit.com/es">Página Web imitada</a><p>
            <a href="https://github.com/alejandrohuerga/AHFDWESLoginLogoffTema5.git">
                <img src="doc/images/icone-github-grise.png"> 
            </a>
        </footer>
    </body>
</html>
