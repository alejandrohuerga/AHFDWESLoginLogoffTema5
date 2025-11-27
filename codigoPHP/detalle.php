<?php
    session_start();
    
    if (!isset($_SESSION["usuarioDAW202AppLoginLogoffTema5"])) {
        header("location: ../indexLoginLogoffTema5.php");  
        exit;
    }
    
    if(isset($_REQUEST['cerrarSesion'])){
        // Destruye la sesión
        session_destroy();
        header('Location: ../indexLoginLogoffTema5.php');
        exit;
    }
    
    if(isset($_REQUEST['volver'])){
        header('Location: programa.php');
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
            <h2>DETALLE</h2>
            <form>
                <input type="submit" name="cerrarSesion" value="Cerrar Sesion"/>
            </form>
        </header>
        <main class="detalle">
            <form>
                <input type="submit" name="volver" value="Volver"/>
            </form>
            <?php
                //Contenido de la variable $_SESSION-------------------------------------------------------
                echo '<br><br><h3>Contenido de la variable $_SESSION</h3><br>';
                echo' <article class="articleSG">';
                echo '<table class="tableSG" >';
                echo '<tr><th>Variable</th><th>Valor</th></tr>';
                if (!empty($_SESSION)) {
                    foreach ($_SESSION as $variable => $resultado) {
                        echo "<tr>";
                        echo '<td>$_SESSION[' . $variable . ']</td>';
                        echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'><em>La variable \$_SESSION está vacía.</em></td></tr>";
                }
                echo "</table>";
                echo' </article>';
                
                //Contenido de la variable $_COOKIE---------------------------------------------------
                echo '<br><br><h3>Contenido de la variable $_COOKIE</h3><br>';
                echo' <article class="articleSG">';
                echo '<table class="tableSG" >';
                echo '<tr><th>Variable</th><th>Valor</th></tr>';
                if (!empty($_COOKIE)) {
                    foreach ($_COOKIE as $variable => $resultado) {
                        echo "<tr>";
                        echo '<td>$_COOKIE[' . $variable . ']</td>';
                        echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'><em>La variable \$_COOKIE está vacía.</em></td></tr>";
                }
                echo '</table>';
                echo' </article>';
                
                echo '<h3>Contenido de la variable $_SERVER</h3><br>';
                echo' <article class="articleSG">';
                echo '<table class="tableSG" >';
                echo '<tr><th>Variable</th><th>Valor</th></tr>';
                if (!empty($_SERVER)) {
                    foreach ($_SERVER as $variable => $resultado) {
                        echo "<tr>";
                        echo '<td>$_SERVER[' . $variable . ']</td>';
                        echo "<td><pre>" . print_r($resultado, true) . "</pre></td>";
                        //pre permite que se quede el texto talcual
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'><em>La variable \$_SERVER está vacía.</em></td></tr>";
                }
                echo "</table>";
                echo' </article>';
            ?>
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