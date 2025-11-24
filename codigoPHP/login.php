<?php

    if(isset($_REQUEST['cancelar'])){
        header('Location: ../indexLoginLogoffTema5.php');
        exit;
    }

    require_once '../conf/confDBPDOClase.php'; // Archivo de configuracion para conexion de la base de datos.
    require_once '../core/231018libreriaValidacion.php'; // Libreria de validación de formularios.
    $entradaOK=true;
    // Array que almacena los errores del formulario.
    $aErrores=[
        'usuario'=>'',
        'password'=>''
    ];
    // Array que almacena las respuestas correctas del formulario.
    $aRespuestas=[
        'usuario'=>'',
        'password'=>''
    ];
    //Para cada campo del formulario: Validar entrada y actuar en consecuencia
    if (isset($_REQUEST["entrar"])) {//Código que se ejecuta cuando se envía el formulario

        // Validamos los datos del formulario
        $aErrores['usuario']= validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'],100,0,1,);
        $aErrores['password'] = validacionFormularios::comprobarAlfabetico($_REQUEST['password'], 255, 1, 1);
        
        foreach($aErrores as $campo => $valor){
            if(!empty($valor)){ // Comprobar si el valor es válido
                $entradaOK = false;
            } 
        } 
    } else {//Código que se ejecuta antes de rellenar el formulario
        $entradaOK = false;
    }
    // Tratamiento del formulario
    if($entradaOK){
        if(isset($_REQUEST['entrar'])){
            header('Location: programa.php');
            exit;
        }
    }else{ 
?>
<!DOCTYPE html>
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
                <div id="formularioLogin">
                    <form name="formularioLogin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
                        <div id="entradasLogin">
                            <label for="usuario">Usuario</label>
                            <input type="text" name="usuario" value="<?php echo $_REQUEST['usuario']??''?>" class="entradaDatos" placeholder="Nombre de usuario"/>
                            <span class="error" id="erroresFormulario"><?php echo $aErrores['usuario']??'' ?></span>
                            <br>
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" value="<?php echo $_REQUEST['password']??''?>" class="entradaDatos" placeholder="Contraseña"/>
                            <span class="error" id="erroresFormulario"><?php echo $aErrores['password']??'' ?></span>
                        </div>
                        <div id="botonesLogin">
                            <div id="entrarCancelar">
                                <input type="submit" name="entrar" value="INICIAR SESIÓN"/>
                                <input type="submit" name="cancelar" value="CANCELAR"/>
                            </div>
                            <div id="o">O</div>
                            <p id="sincuenta">¿No tienes cuenta?</p>
                            <input type="submit" name="registrarse" value="CREAR CUENTA"/> 
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php
        }
        ?>
        <footer>
            <p class="nombre"><a href="https://alejandrohuefer.ieslossauces.es/">Alejandro De la Huerga Fernández</a><p>
            <p class="webImitada"><a href="https://www.faceit.com/es">Página Web imitada</a><p>
            <a href="https://github.com/alejandrohuerga/AHFDWESLoginLogoffTema5.git">
                <img src="../doc/images/icone-github-grise.png"> 
            </a>
        </footer>
    </body>
</html>

