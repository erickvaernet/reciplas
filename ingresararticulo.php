<?php
require "database.php";
/*
    session_start();
    if(!$_SESSION['activa']) header('Location: login.php');*/
?>

<?php     
    if(!empty($_POST['nombre_art'])){
        $tipo_art= intval($_POST['tipo_art']);
        $nombre_art = $_POST['nombre_art'];
        $descripcion_art = $_POST['desciripcion_art'];
        $stock_art = intval($_POST['stock_art']);
        $precio_art = intval($_POST['precio_art']); 
        $categoria_art = intval($_POST['categoria_art']);
        $um_art = intval($_POST['um_art']); 

        //$sexo= $sexo==true? true:false;
        if($tipo_art==1){
            $sql= "insert into Articulo 
            (Descripcion, Nombre, precio_venta, precio_compra, stock, stock_minimo, Activo, Unidad_Medida_idUnidad_Medida, Sector_Deposito_idSector_Deposito, tipo_idtipo, categoria_idCategoria) 
            values('$descripcion_art', '$nombre_art',NULL, $precio_art,$stock_art,NULL,true,$um_art,$tipo_art,$tipo_art,$categoria_art)";
            
        }else{
            $sql= "insert into Articulo 
            (Descripcion, Nombre, precio_venta, precio_compra, stock, stock_minimo, Activo, Unidad_Medida_idUnidad_Medida, Sector_Deposito_idSector_Deposito, tipo_idtipo, categoria_idCategoria) 
            values('$descripcion_art', '$nombre_art',$precio_art,NULL,$stock_art,NULL,true,$um_art,$tipo_art,$tipo_art,$categoria_art)";
            
        }
        //$sql = "INSERT INTO usuarios (nombre, apellido, email, clave, sexos_id_sexo,mejor_tiempo) VALUES ('$nombre', '$apellido', '$email', '$contrasena', $sexo, '99:59:59')";
        //print var_dump($sql);
        mysqli_query($enlace,$sql) ?
            header('Location: a.php'):
            print"<div>Lo siento hubo algun problema en la creacion de usuario, contacte con el administrador</div>";                                
        
    }
    else{
        print "ERROR CRITICO";
    }
?>