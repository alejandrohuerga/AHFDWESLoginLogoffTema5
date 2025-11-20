<?php
    if(isset($_REQUEST['entrar'])){
        header('Location: programa.php');
        exit;
    }
    
    if(isset($_REQUEST['cancelar'])){
        header('Location: ../indexLoginLogoffTema5.php');
        exit;
    }
    
    if(isset($_REQUEST['registrase'])){
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
    </head>
    <body>
        <header>
            <h1>LOGIN LOGOFF TEMA 5</h1>
            <h2>LOGIN</h2>
            <form>
                <input type="submit" name="entrar" value="Login"/>
            </form>
        </header>
        <main>
            <form>
                <input type="submit" name="cancelar" value="Cancelar"/>
                <input type="submit" name="registrase" value="registrase"/>
            </form>
        </main>
        <footer>
            <a href="https://alejandrohuefer.ieslossauces.es/">Alejandro De la Huerga Fernández</a>
            <a href="https://github.com/alejandrohuerga/AHFDWESLoginLogoffTema5.git">
                <img src="../doc/images/github-logo.png"> 
            </a>
        </footer>
    </body>
</html>
