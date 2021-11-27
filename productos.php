<?php
require "database.php";
/*
    session_start();
    if(!$_SESSION['activa']) header('Location: login.php');*/
?>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reciplas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style3bd.css">
</head>

<body class="fondo fondo-contacto">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="./index.php">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <!---Inventario-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Inventario
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./articulos.php">Articulos</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Categotias</a></li>
                            </ul>
                        </li>
                        <!---Compras-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Compras
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                    </hr>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <!---ventas-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Ventas
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="./cargarpedido.php">Cargar Pedido</a></li>
                                <li><a class="dropdown-item" href="./pedidos.php">Pedidos</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <!---Reportes-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reportes
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <!---Produccion-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Produccion
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <!---Administracion-->
                        <li class="nav-item">
                            <a class="nav-link" href="#">Administracion</a>
                        </li>
                        <!---Configuracion-->
                        <li class="nav-item">
                            <a class="nav-link" href="#">Configuracion</a>
                        </li>
                        <!---Cerrar sesion-->
                        <li class="nav-item">
                            <a class="nav-link" href="./logout.php">Cerrar Sesion</a>
                        </li>

                </div>
            </div>
        </nav>

    </header>
    <main>
        <div class="centrar">
            <!---boton cambiar articulo-->
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Todos
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./articulos.php">Todos</a></li>
                    <li><a class="dropdown-item" href="./matprima.php">Materia prima</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                + Agregar Articulo
                            </button>
                        </a></li>
                </ul>
            </div>

            <!---Tabla con articulos-->
            <table class="table table-dark bordeado">
                <thead>
                    <tr>
                        <th scope="col" class="table-dark">Codigo</th>
                        <th scope="col" class="table-dark">Nombre</th>
                        <th scope="col" class="table-dark">Descripcion</th>
                        <th scope="col" class="table-dark">Categoria</th>
                        <th scope="col" class="table-dark">Stock</th>
                        <th scope="col" class="table-dark">Unidad de medida</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT idArt as codigo , a.Nombre nombre_articulo, a.descripcion descripcion_articulo,
                    c.Nombre categoria, a.stock stock, um.Nombre unidad_medida 
                    FROM `Articulo` a inner JOIN Unidad_Medida um on a.Unidad_Medida_idUnidad_Medida = um.idUnidad_Medida 
                    inner JOIN Sector_Deposito se on a.Sector_Deposito_idSector_Deposito = se.idSector_Deposito 
                    inner JOIN Tipo t on a.Tipo_idTipo= t.idTipo 
                    inner JOIN Categoria c on a.Categoria_idCategoria = c.idCategoria
                    where Tipo_idTipo=2";

                    $query = mysqli_query($enlace, $sql);
                    $resultado = $enlace->query($sql);

                    if ($resultado->num_rows > 0) {

                        for ($i = 0; $i < $resultado->num_rows; $i++) {
                            $fila = $resultado->fetch_assoc();

                            $codigo_articulo = $fila['codigo'];
                            $nombre_articulo = $fila['nombre_articulo'];
                            $descripcion_articulo = $fila['descripcion_articulo'];
                            $categoria_articulo = $fila['categoria'];
                            $stock_articulo = $fila['stock'];
                            $unidad_medida = $fila['unidad_medida'];

                            print " <tr>
                        <th scope='row' class='table-dark'>$codigo_articulo</th>
                        <td class='table-dark'>$nombre_articulo</td>
                        <td class='table-dark'>$descripcion_articulo</td>
                        <td class='table-dark'>$categoria_articulo</td>
                        <td class='table-dark'>$stock_articulo</td>
                        <td class='table-dark'>$unidad_medida</td>
                      </tr>";
                        }
                    } else {
                        print "ERROR CRITICO";
                    }
                    ?>
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar Articulo Nuevo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="ingresararticulo.php" method="post">
                            <div class="modal-body">
                                <p>Tipo de articulo:</p>
                                 <input class="form-check-input mt-0" type="radio" id="mat_prima" name="tipo_art" value="1" required>
                                 <label for="html">Materia prima</label><br>

                                 <input class="form-check-input mt-0" type="radio" id="producto" name="tipo_art" value="2" required>
                                 <label for="css">Producto</label><br>

                                Nombre:
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nombre_art" id="nombre_art" placeholder="Nombre del articulo" required>
                                </div>
                                Descripcion:
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="desciripcion_art" id="desciripcion_art" placeholder="Nombre del articulo" required>
                                </div>

                                Cantidad en Stock:
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="stock_art" id="stock_art" placeholder="Nombre del articulo" required>
                                </div>

                                Precio (venta/compra segun corresponda):
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="precio_art" id="precio_art" placeholder="Nombre del articulo" required>
                                </div>

                                Categoria:
                                <div class="input-group mb-3">
                                    <select class="form-select" id="inputGroupSelect01" name="categoria_art" required >
                                        <option selected>Choose...</option>
                                        <option value="1">Pellets-R</option>
                                        <option value="2">Muebles</option>                                         
                                        <option value="3">Envases</option>                                                                                 
                                        <option value="4">Reciclables</option>                                   
                                    </select>
                                </div>

                                Unidad_Medida:
                                <div class="input-group mb-3">
                                    <select class="form-select" id="inputGroupSelect01" name="um_art" required>
                                        <option selected>Choose...</option>
                                        <option value="1">Kilogramos</option>
                                        <option value="2">Unidades</option>
                                        <option value="3">Tonelada</option>
                                        <option value="4">Gramos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button class="btn btn-primary" type="submit">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>