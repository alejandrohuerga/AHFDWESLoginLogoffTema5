<?php
    $idiomaSeleccionado="ES";
    
    if(isset($_REQUEST['iniciarSesion'])){
        header('Location: codigoPHP/login.php');
        exit;
    }
    
    if (isset($_REQUEST['es'])) {
        $idiomaSeleccionado="ES";
        setcookie('idioma', $idiomaSeleccionado);
        header("Location: ./indexLoginLogoffTema5.php");
        exit;
    }elseif (isset($_REQUEST['en'])) {
        $idiomaSeleccionado="EN";
        setcookie('idioma', $idiomaSeleccionado);
        header("Location: ./indexLoginLogoffTema5.php");
        exit;
    }elseif (isset($_REQUEST['pr'])) {
        $idiomaSeleccionado="PR";
        setcookie('idioma', $idiomaSeleccionado);
        header("Location: ./indexLoginLogoffTema5.php");
        exit;
    }
    
    
    if(!isset($_COOKIE["idioma"])) {
        setcookie('idioma', $idiomaSeleccionado);
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
                <button type="submit" name="en" value="Ingles">
                    <img src="doc/images/reino-unido.png" alt="Ingles">
                </button>
                <button type="submit" name="es" value="Español">
                    <img src="doc/images/spain.png" alt="Español">
                </button>
                <button type="submit" name="pr" value="Portugues">
                    <img src="doc/images/portugal.png" alt="Portugues">
                </button>
                
            </form> 
        </header>
        <main>
            <?php
                if($_COOKIE["idioma"]=="EN"){
                    echo '<h4 id="h4InicioPublico">Welcome to the public launch!</h4>';
                    echo'<p id="pInicioPublico">From this page you can log in at the top right.</p>';
                }elseif ($_COOKIE["idioma"]=="PR"){
                    echo '<h4 id="h4InicioPublico">Bem-vindo à área pública.</h4>';
                    echo '<p id="pInicioPublico">Nesta página, pode fazer login no canto superior direito.</p>';
                }else{
                    echo '<h4 id="h4InicioPublico">!Bienvenido al inicio público¡</h4>';
                    echo '<p id="pInicioPublico">Desde esta página puedes iniciar sesión arriba a la derecha.</p>';
                }
            ?>
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
