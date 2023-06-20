<?php
require_once 'conectarClientes.php';
$clientes = new Cliente();
$allClientes = $clientes->obtainAll();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Alquilartemis</title>
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
                </ul>
            </div>
    
            <div class="col-8 bg-light h-100 rounded px-5 py-4 d-flex flex-column">
                <div class="d-flex justify-content-between mb-2">
                    <h2>Clientes</h2>
                    <button type="button" class="btn btn-dark mb-4" data-bs-toggle="modal" data-bs-target="#registro">Añadir Nuevo Registro</button>
                  </div>                
                  <table class="table table-striped">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">NIT</th>
                          <th scope="col">Representante</th>
                          <th scope="col">Email</th>
                          <th scope="col">Teléfono</th>
                          <th scope="col">Editar</th>
                          <th scope="col">Borrar</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($allClientes as $cliente): ?>

                          <tr>
                            <td><?=$cliente['id_constructora']?></td>
                            <td><?=$cliente['nombre_constructora']?></td>
                            <td><?=$cliente['nit_constructora']?></td>
                            <td><?=$cliente['nombre_representante']?></td>
                            <td><?=$cliente['email_contacto']?></td>
                            <td><?=$cliente['telefono_contacto']?></td>
                            <td><button type="button" class="btn btn-warning"><a href="editar.php?id=<?=$cliente['id_constructora']?>">Editar</a></button></td>
                            <td><button type="button" class="btn btn-danger"><a href="borrar.php?id=<?=$cliente['id_constructora']?>&req=delete">Borrar</a></button></td>
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
                              <label for="nombre" class="form-label">Nombre</label>
                              <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" required>
                          </div>
                          <div class="mb-3">
                              <label for="nit" class="form-label">NIT</label>
                              <input type="number" class="form-control" id="nit" name="nit" aria-describedby="emailHelp" required>
                          </div>
                          <div class="mb-3">
                              <label for="representante" class="form-label">Representante</label>
                              <input type="text" class="form-control" id="representante" name="representante" aria-describedby="emailHelp" required>
                          </div>
                          <div class="mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                          </div>
                          <div class="mb-3">
                              <label for="celular" class="form-label">Celular</label>
                              <input type="number" class="form-control" id="celular" name="celular" required>
                          </div>
                          <button type="submit" name="registrar" class="btn btn-primary">Save changes</button>
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