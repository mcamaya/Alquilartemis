<?php
require_once 'conectarInventario.php';
$data = new InventarioManager();
$allInventarios = $data->obtainAll();
require_once './agregar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alquilartemis</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="main-container container-fluid p-5">
        <div class="row g-0 h-100 justify-content-between">
          <div style="color:white;" class="col-xl-3 col-4 bg-dark p-4 rounded">
            <h2><strong>ALQUILARTEMIS</strong></h2>
            <ul class="indices list-group p-xl-4 p-1">
                <li class="my-2 fs-5"><a href="../empleados/empleados.php"><i class="bi bi-person-fill mx-3"></i>Empleados</a></li>
                <li class="my-2 fs-5"><a href="../clientes/clientes.php"><i class="bi bi-cone-striped mx-3"></i> Clientes</a></li>
                <li class="my-2 fs-5"><a href="../productos/productos.php"><i class="bi bi-hammer mx-3"></i>Productos</a></li>
                <li class="my-2 fs-5"><a href="../categorias/categorias.php"><i class="bi bi-bookmarks-fill mx-3"></i>Categorias</a></li>
                <li class="my-2 fs-5"><a href="../cotizaciones/cotizaciones.php"><i class="bi bi-receipt-cutoff mx-3"></i>Cotizaciones</a></li>
                <li class="my-2 fs-5"><a href="../devoluciones/devoluciones.php"><i class="bi bi-arrow-return-right"></i> Devoluciones</a></li>
                <li class="my-2 fs-5"><a href="../inventario/inventario.php"><i class="bi bi-arrow-return-right"></i> Inventario</a></li>
            </ul>
          </div>

            <div class="col-8 bg-light h-100 rounded px-5 py-4 d-flex flex-column">
              <div class="d-flex justify-content-between mb-2">
                <h2>Inventario</h2>
                <button type="button" class="btn btn-dark mb-4" data-bs-toggle="modal" data-bs-target="#registro">Añadir Nuevo Registro</button>
              </div>
              <table class="table table-striped">
                    <thead>
                        <tr>
                          <th scope="col">ID Inventario</th>
                          <th scope="col">ID Producto</th>
                          <th scope="col">Cantidad Inicial</th>
                          <th scope="col">Cantidad Final</th>
                          <th scope="col">Cantidad Salidas</th>
                          <th scope="col">Cantidad Entradas</th>
                          <th scope="col">Tipo Operación</th>
                          <th scope="col">Estado</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if (is_array($allInventarios)): ?>
    <?php foreach ($allInventarios as $inventario): ?>
        <tr>
            <td><?= $inventario['id_inventario'] ?></td>
            <td><?= $inventario['id_producto'] ?></td>
            <td><?= $inventario['cantidad_inicial'] ?></td>
            <td><?= $inventario['cantidad_final'] ?></td>
            <td><?= $inventario['cantidad_salidas'] ?></td>
            <td><?= $inventario['cantidad_entradas'] ?></td>
            <td><?= $inventario['tipo_operacion'] ?></td>
            <td><?= $inventario['estado'] ?></td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="8">No hay registros disponibles en el inventario.</td>
    </tr>
<?php endif; ?>


                      </tbody>
                </table>

                <div class="modal fade" id="registro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Registro</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                        <form method="POST" action="agregar.php">
                          <div class="mb-3">
                            <label for="idInventario" class="form-label">ID Inventario</label>
                            <input type="number" class="form-control" id="idInventario" name="idInventario" required>
                          </div>
                          <div class="mb-3">
                            <label for="idProducto" class="form-label">ID Producto</label>
                            <input type="number" class="form-control" id="idProducto" name="idProducto" required>
                          </div>
                          <div class="mb-3">
                            <label for="cantidadInicial" class="form-label">Cantidad Inicial</label>
                            <input type="number" class="form-control" id="cantidadInicial" name="cantidadInicial" required>
                          </div>
                          <div class="mb-3">
                            <label for="cantidadFinal" class="form-label">Cantidad Final</label>
                            <input type="number" class="form-control" id="cantidadFinal" name="cantidadFinal" required>
                          </div>
                          <div class="mb-3">
                            <label for="cantidadSalidas" class="form-label">Cantidad Salidas</label>
                            <input type="number" class="form-control" id="cantidadSalidas" name="cantidadSalidas" required>
                          </div>
                          <div class="mb-3">
                            <label for="cantidadEntradas" class="form-label">Cantidad Entradas</label>
                            <input type="number" class="form-control" id="cantidadEntradas" name="cantidadEntradas" required>
                          </div>
                          <div class="mb-3">
                            <label for="tipoOperacion" class="form-label">Tipo Operación</label>
                            <input type="text" class="form-control" id="tipoOperacion" name="tipoOperacion" required>
                          </div>
                          <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" required>
                          </div>
                          <button type="submit" class="btn btn-primary" name="registrar">Guardar</button>
                        </form>

                      </div>
                    </div>
                  </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
