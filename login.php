<?php
    require "database.php";
    session_start();
    if($_SESSION['activa']) header('Location: mensaje.php?msj=3');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reciplas - Login</title>
    <link rel="shortcut icon" href="./img/iconos/loto.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body class="fondo fondo-contacto" style="height: 100vh;">
    <div >
        <header>
            <nav>
                <ul>
                    <li><a href="./index.php">RECIPLAS</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="contenedor-centrador" style="margin-top: 150px;">
                <div class="contenedor-contacto" style="width: 800px;">
                    <form action="#" method="POST" class="form-serv-indiv" style="width: 70%;">
                        <h3 style="font-size:2rem; text-decoration:underline; margin:15px">Ingreso de usuario</h3>
                        <div class="description">Ingrese los datos de la cuenta</div>
                        <?php      
                            if(!empty($_POST['usuario'])){
                                $contrasena = $_POST['contrasena'];
                                $usuario = $_POST['usuario'];                               

                                //print "<p style='font-size:4rem'>SIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII<p>";
                                $array_errores = array();

                                empty($usuario)? array_push($array_errores, "El campo usuario no puede estar vacio"):"";
                                empty($contrasena)? array_push($array_errores, "El campo contraseña no puede estar vacío"):"";
                                strlen($contrasena) < 6? array_push($array_errores, "El campo contraseña no puede tener menos de 6 caracteres."):"";

                                if($array_errores){
                                    echo "<div class='lista-errores'>";
                                    foreach ($array_errores as $value) {
                                        print "<div class='error'>$value</div>";
                                    }
                                    echo"</div>";
                                }
                                else{   
                                    $contrasena= md5($contrasena);
                                    $sql = "SELECT * FROM Usuario WHERE Nom_usuario = '$usuario' AND Password= '$contrasena'";
                                    /*usar header('Location: '.$nuevaURL.php); para redireccionar y die(); */
                                    $query=mysqli_query($enlace,$sql) ;
                                    if(mysqli_num_rows($query)>0){
                                        $datos= mysqli_fetch_array($query);
                                        //session_start();
                                        $_SESSION['activa']=true;                                        
                                        $_SESSION['idUsuario']=$datos['idUsuario'];
                                        header('Location: index.php');
                                        die();
                                    }
                                    else{
                                        session_destroy();
                                        print"<div class='lista-errores'><div class='error'>usuario o contraseña invalido</div></div>"; 
                                    }
                                }
                            }
                        ?>
                        <label for="usuario">Usuario:</label>
                        <input type="text" name="usuario" id="usuario" placeholder="Ingrese su usuario">

                        <label for="contrasena">Contraseña:</label>
                        <input type="password" name="contrasena" id="contrasena" placeholder="Ingrese la contraseña">

                        <div class="contenedor-btn" style="margin-top: 30px;">
                            <input id="enviar" type="submit" value="Ingresar" name="enviar" style="width: 50%;">                           
                        </div>

                    </form>

                    <div class="redes">
                        Seguinos en
                        <a href="https://www.facebook.com/Reciplas" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://www.twitter.com/Reciplas" target="_blank"><i
                                class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/Reciplas" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
</body>
</html>