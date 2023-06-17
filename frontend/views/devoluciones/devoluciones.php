<?php
require_once 'conectarDevoluciones.php';
$data = new DevolucionManager();
$allDevoluciones = $data->obtainAll();
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
                <li class="my-2 fs-5"><a href="../devoluciones/devoluciones.php"><i class="bi bi-arrow-return-right"></i>Devoluciones</a></li>
            </ul>
          </div>

            <div class="col-8 bg-light h-100 rounded px-5 py-4 d-flex flex-column">
              <div class="d-flex justify-content-between mb-2">
                <h2>Devoluciones</h2>
                <button type="button" class="btn btn-dark mb-4" data-bs-toggle="modal" data-bs-target="#registro">Añadir Nuevo Registro</button>
              </div>
              <table class="table table-striped">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">ID Devolución</th>
                          <th scope="col">ID Empleado</th>
                          <th scope="col">Fecha</th>
                          <th scope="col">Hora</th>
                          <th scope="col">Editar</th>
                          <th scope="col">Borrar</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($allDevoluciones as $dvl): ?>
                          <tr>
                            <td><?= $dvl['id']?></td>
                            <td><?= $dvl['id_dvl']?></td>
                            <td><?= $dvl['id_empleado']?></td>
                            <td><?= $dvl['fecha']?></td>
                            <td><?= $dvl['hora']?></td>
                            <td><button type="button" class="btn btn-warning"><a href="editar.php?id=<?= $devolucion['id'] ?>">Editar</a></button></td>
                            <td><button type="button" class="btn btn-danger"><a href="borrar.php?id=<?= $devolucion['id'] ?>&req=delete">Borrar</a></button></td>
                          </tr>
                        <?php endforeach; ?>

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

                        <form method="post" action="agregar.php">
                          <div class="mb-3">
                            <label for="idDevolucion" class="form-label">ID Devolución</label>
                            <input type="text" class="form-control" id="idDevolucion" name="idDevolucion" required>
                          </div>
                          <div class="mb-3">
                            <label for="idEmpleado" class="form-label">ID Empleado</label>
                            <input type="text" class="form-control" id="idEmpleado" name="idEmpleado" required>
                          </div>
                          <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required>
                          </div>
                          <div class="mb-3">
                            <label for="hora" class="form-label">Hora</label>
                            <input type="time" class="form-control" id="hora" name="hora" required>
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