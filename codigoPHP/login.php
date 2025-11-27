<?php
    // Cancelar: volver al index
    if(isset($_REQUEST['cancelar'])){
        header('Location: ../indexLoginLogoffTema5.php');
        exit;
    }
    
    session_start(); // Iniciamos la sesión desde el inicio
    require_once '../conf/confDBPDOClase.php'; // Configuración de la DB
    require_once '../core/231018libreriaValidacion.php'; // Librería de validación

    $entradaOK = true;
    $aErrores = ['usuario'=>'','password'=>''];

    // Validación al enviar el formulario
    if (isset($_REQUEST["entrar"])) {
        // Validamos los datos del formulario
        $aErrores['usuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'],100,0,1);
        $aErrores['password'] = validacionFormularios::comprobarAlfabetico($_REQUEST['password'],255,1,1);

        foreach($aErrores as $valor){
            if(!empty($valor)){
                $entradaOK = false;
            }
        }
    } else {
        $entradaOK = false;
    }
    // Tratamiento del formulario
    if($entradaOK){
        try {
            $miDB = new PDO(DNS, USUARIODB, PSWD);
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Consulta para comprobar usuario y contraseña
            $sql = "SELECT T01_CodUsuario, T01_Password, T01_DescUsuario, T01_FechaHoraUltimaConexion, T01_NumConexiones
                    FROM T_01Usuario 
                    WHERE T01_CodUsuario = :usuario AND T01_Password = sha2(:passwd,256)";
            $consulta = $miDB->prepare($sql);
            $consulta->execute([
                ':usuario' => $_REQUEST['usuario'],
                ':passwd' => $_REQUEST['usuario'].$_REQUEST['password'] 
            ]);

            $usuarioBD = $consulta->fetch(PDO::FETCH_ASSOC);

            if(!$usuarioBD){
                $aErrores['usuario'] = "Usuario o contraseña incorrectos";
                $entradaOK = false;
            } else {
                
                $oFechaActual=new DateTime();
                session_start();
                //Se recogen estos datos de la sesión en un array $aDatosSession
                $aDatosSesion = [
                    'usuario' => $usuarioBD['T01_CodUsuario'],
                    'descripcion' => $usuarioBD['T01_DescUsuario'],
                    'FechaHoraUltimaConexionAnterior'=>$usuarioBD['T01_FechaHoraUltimaConexion'],
                    'ultimaConexion' => $oFechaActual,
                    'numConexiones' => $usuarioBD['T01_NumConexiones']
                ];
                
                
                /*
                $_SESSION['usuario'] = $usuarioBD['T01_CodUsuario'];
                $_SESSION['descripcion'] = $usuarioBD['T01_DescUsuario'];
                $_SESSION['ultimaConexion'] = $usuarioBD['T01_FechaHoraUltimaConexion'];
                $_SESSION['numConexiones'] = $usuarioBD['T01_NumConexiones']; 
                */
                // Actualizamos último acceso y contador
                $sqlUpdate = "UPDATE T_01Usuario SET 
                                T01_FechaHoraUltimaConexion = NOW(),
                                T01_NumConexiones = T01_NumConexiones + 1
                                WHERE T01_CodUsuario = :usuario";
                $consulta2 = $miDB->prepare($sqlUpdate);
                $consulta2->execute([':usuario' => $_REQUEST['usuario']]);
                // Redirigir a programa.php
                header("Location: programa.php");
                exit;
            }
        } catch (PDOException $ex){
            echo "Error: ".$ex->getMessage();
            exit;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
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
        <footer>
            <p class="nombre"><a href="https://alejandrohuefer.ieslossauces.es/">Alejandro De la Huerga Fernández</a><p>
            <p class="webImitada"><a href="https://www.faceit.com/es">Página Web imitada</a><p>
            <a href="https://github.com/alejandrohuerga/AHFDWESLoginLogoffTema5.git">
                <img src="../doc/images/icone-github-grise.png"> 
            </a>
        </footer>
    </body>
</html>


