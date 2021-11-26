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
    <title>Registro Reciplas</title>
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
                    <li><a href="./login.php">Inicio Sesion</a></li>
                    <li><a href="./signup.php">Registrarse</a></li>  
                </ul>
            </nav>
        </header>
        <main>
            <div class="contenedor-centrador">
                <div class="contenedor-contacto" style="width: 800px;">
                    <form action="#" method="POST" class="form-serv-indiv" style="width: 70%;">
                        <h3 style="font-size:2rem; text-decoration:underline; margin:15px">Registro de usuario</h3>
                        <div class="description">Ingrese los datos solicitados para el registro</div>
                        <?php      
                            if(!empty($_POST['nombre'])){
                                $nombre = $_POST['nombre'];
                                $apellido = $_POST['apellido'];
                                $email = $_POST['email'];
                                $contrasena = $_POST['contrasena'];                                
                                $sexo = $_POST['sexo'];  

                                $array_errores = array();

                                empty($nombre)? array_push($array_errores, "El campo Nombre no pude estar vacío"):""; 
                                preg_match("/^[A-Z]*$/i",$nombre)==0? array_push($array_errores, "El campo Nombre solo puede contener letras"):"";
                                
                                empty($apellido)? array_push($array_errores, "El campo Apellido no pude estar vacío"):"";
                                preg_match("/^[A-Z]*$/i",$apellido)==0? array_push($array_errores, "El campo Apellido solo puede contener letras"):"";
         
                                empty($email)? array_push($array_errores, "El campo email no puede estar vacio"):"";
                                strpos($email, "@") === false? array_push($array_errores, "El email debe contener un @"):"";
                                strpos($email, ".") === false? array_push($array_errores, "El email debe contener un ."):"";                            

                                empty($contrasena)? array_push($array_errores, "El campo contraseña no puede estar vacío"):"";
                                strlen($contrasena) < 6? array_push($array_errores, "El campo contraseña no puede tener menos de 6 caracteres."):"";
                                
                                //empty($sexo)? array_push($array_errores, "Seleccione su 'sexo', este no puede estar vacio"):"";

                                if($array_errores){
                                    echo "<div class='lista-errores'>";
                                    foreach ($array_errores as $value) {
                                        print "<div class='error'>$value</div>";
                                    }
                                    echo"</div>";
                                }
                                else{                                          
                                    $contrasena= md5($contrasena);
                                    //$sexo= $sexo==true? true:false;
                                    $sql = "INSERT INTO usuarios (nombre, apellido, email, clave, sexos_id_sexo,mejor_tiempo) VALUES ('$nombre', '$apellido', '$email', '$contrasena', $sexo, '99:59:59')";
                                    //print var_dump($sql);
                                    mysqli_query($enlace,$sql) ?
                                        header('Location: mensaje.php?msj=4'):
                                        print"<div class='lista-errores'><div class='error'>Lo siento hubo algun problema en la creacion de usuario, contacte con el administrador</div></div>";                                
                                }
                            }
                        ?>
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Itroduzca su nombre">
                        
                        <label for="apellido">Apellido:</label>
                        <input type="text" name="apellido" id="apellido" placeholder="Itroduzca su Apellido">

                        <label for="email">e-mail:</label>
                        <input type="email" name="email" id="email" placeholder="Ingrese su e-mail">

                        <label for="contrasena">Contraseña:</label>
                        <input type="password" name="contrasena" id="contrasena" placeholder="Ingrese la contraseña deseada">

                        <div class="contenedor-sexos" style="margin: 10px 0 10px 0;">
                            <span style="text-decoration: underline;">Sexo*:</span>
                            <input type="radio" name="sexo" id="masculino" value="0" required> <label for="masculino">Hombre</label>
                            <input type="radio" name="sexo" id="femenino" value="1" required> <label for="femenino">Mujer</label>
                        </div>

                        <div class="contenedor-btn" >
                            <input id="enviar" type="submit" value="Enviar" name="enviar">
                            <input type="reset" value="Resetear">
                        </div>

                    </form>

                    <div class="redes">
                        Seguinos en
                        <a href="https://www.facebook.com/Team-Desarrollo" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://www.twitter.com/Team-Desarrollo" target="_blank"><i
                                class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/Team-Desarrollo" target="_blank"><i
                                class="fab fa-instagram"></i></a>                                
                    </div>
                </div>
            </div>            
        </main>
        
    </div>
    
</body>
</html>