<?php
require "database.php";
session_start();
$query = $enlace->query("SELECT idArt, Descripcion, Nombre, Precio_Venta, Unidad_Medida_idUnidad_Medida FROM Articulo where Precio_Venta is not null");
$articulos = array();
while ($row = $query->fetch_assoc()) {
    $articulos[array_shift($row)] = $row;
}
//if(!$_SESSION['activa']) header('Location: login.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reciplas carga pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style3bd.css">
</head>

<body class="fondo fondo-contacto">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Inicio</a>
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
                                </li>
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

                </div>
            </div>
        </nav>

    </header>
    <main>
        <div class="centrar">
            <!---ACA-->
            <form action="./cargarpedido_proceso.php" method="POST" class="form-serv-indiv" style="width: 70%;">
                <h3>Crear Pedido</h3>
                <label for="Fecha_entrega">Fecha entrega:</label>
                <?php
                $hoy = date("Y-m-d");
                echo '<input type="date" class="form-control" id="Fecha_entrega" name="fecha_entrega" value="" min=' . $hoy . ' max="2022-11-26"><br>';
                ?>
                <label for="descripcion">Lugar de entrega del pedido:</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Lugar de entrega del Pedido"><br>


                <label for="cliente">Seleccione Cliente:</label>

                <select name="cliente" id="cliente" class="form-control">
                    <?php
                    $query = $enlace->query("SELECT id_persona, Nombre FROM Persona order by Nombre;");
                    while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="' . $valores['id_persona'] . '">' . $valores['Nombre'] . '</option>';
                    }
                    ?>
                </select><br>


                <table class='table table-bordered table-dark' id="articulosTable">
                    <thead>
                        <th>ID</th>
                        <th>Descripción Articulo</th>
                        <th>Nombre Artículo</th>
                        <th>Precio de Venta</th>
                        <th>Unidad</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </thead>
                    <tbody></tbody>
                </table>

                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Agregar Artículo</button><br><br>
                <button type="button" class="btn btn-danger">Cancelar</button>
                <button type="submit" class="btn btn-success">Crear Pedido</button>

            </form>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Seleccionar Producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="dropdown">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Artículo</label>
                                        <select class="form-control" id="articuloSelect">
                                            <?php
                                            foreach ($articulos as $key => $articulo) {
                                                echo '<option value=' . $key . '>' . $articulo['Nombre'] . " PU: $" . $articulo['Precio_Venta'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad"></input>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="agregarButton">Agregar</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </main>
</body>

</html>

<script type="text/javascript">
    var articulos = <?php echo json_encode($articulos); ?>

    $('#agregarButton').on('click', function() {
        let id = $('#articuloSelect').val();
        let cant = $('#cantidad').val();
        let articulo = articulos[id];
        let sub = cant * articulo.Precio_Venta;
        var markup = "<tr><td><input type='hidden' name='articulos[" + id + "][id]' value='" + id + "' />" + id + "</td><td>" + articulo.Descripcion + "</td>" +
            "<td>" + articulo.Nombre + "</td>" +
            "<td><input type='hidden' name='articulos[" + id + "][precio_venta]' value='" + articulo.Precio_Venta + "' />" + articulo.Precio_Venta + "</td>" +
            "<td>" + articulo.Unidad_Medida_idUnidad_Medida + "</td>" +
            "<td><input type='hidden' name='articulos[" + id + "][cantidad]' value='" + cant + "' />" + cant + "</td>" +
            "<td>" + sub + "</td>" +
            "</tr>";
            
        $("#articulosTable tbody").append(markup);
        $('#exampleModal').modal('hide');
    })
</script>