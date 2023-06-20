<?php
require_once '../clientes/conectarClientes.php';
require_once '../empleados/conectarEmpleados.php';
require_once 'conectarCotizaciones.php';

$clientes = new Cliente();
$allClientes = $clientes->obtainAll();

$empleados = new Empleado();
$allEmpleados = $empleados->obtainAll();

$cotizaciones = new Cotizacion();
$allCotizaciones = $cotizaciones->obtainAll_innerJoin();

$obtenerProductos = new Cotizacion();
/* $obtenerProductos->setId(1);
$registroPrd = $obtenerProductos->obtainProductos(); */
/* echo "<pre>";
var_dump($data);
die(); */




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
            </ul>
          </div>
    
            <div class="col-8 bg-light h-100 rounded px-5 py-4 d-flex flex-column">
              <div class="d-flex justify-content-between mb-2">
                <h2>Cotizaciones</h2>
                <button type="button" class="btn btn-dark mb-4" data-bs-toggle="modal" data-bs-target="#registro">Nueva Cotización</button>
                <button type="button" class="btn btn-primary mb-4"><a href="../prd_x_ctz/productosCotizaciones.php">Añadir productos</a></button>
              </div>
              <table class="table table-striped">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Cliente</th>
                          <th scope="col">Empleado</th>
                          <th scope="col">_____</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php foreach($allCotizaciones as $coti): ?>
                          <?php 
                          $obtenerProductos->setId($coti['id_cotizacion']);
                          $registroPrd = $obtenerProductos->obtainProductos(); 

                          /* mPDF */
                          $enviar_productos = serialize($registroPrd);
                          $enviar_productos = urlencode($enviar_productos);
                          ?>

                        <tr>
                          <td colspan="6">
                            <div class="accordion" id="accordionExample">
                              <div class="accordion-item">
                                <h2 class="accordion-header">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo<?=$coti['id_cotizacion']?>" aria-expanded="false" aria-controls="collapseTwo">
                                    [ <?=$coti['id_cotizacion']?> ]---[ <?=$coti['nombre_constructora']?> ]---[ <?=$coti['nombre_empleado']?> ] 
                                  </button>
                                </h2>
                                <div id="collapseTwo<?=$coti['id_cotizacion']?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                  <div class="accordion-body d-flex justify-content-between">
                                    <div>
                                      <strong>Fecha: </strong> <?=$coti['fecha_cotizacion']?> <br>
                                      <strong>Hora: </strong> <?=$coti['hora_cotizacion']?> <br>
                                      <strong>Día alquiler: </strong> <?=$coti['dia_alquiler']?> <br>
                                      <strong>Duración: </strong> <?=$coti['duracion_alquiler']?> <br>
                                      <button type="button" class="btn btn-danger mt-5 ms-1"><a href="borrar.php?id=<?=$coti['id_cotizacion']?>&req=delete">Borrar</a></button>
                                      <button type="button" class="btn btn-warning mt-5 ms-1"><a href="../../mpdf/cotizacion.php?idCtz=<?=$coti['id_cotizacion']?>&nomEmp=<?=$coti['nombre_empleado']?>&nomCtrc=<?=$coti['nombre_constructora']?>&nitCtrc=<?=$coti['nit_constructora']?>&fechaCtz=<?=$coti['fecha_cotizacion']?>&horaCtz=<?=$coti['hora_cotizacion']?>&fechaAlq=<?=$coti['dia_alquiler']?>&duracion=<?=$coti['duracion_alquiler']?>&productos=<?=$enviar_productos?>">Generar PDF</a></button>
                                    </div>
                                    <div class="me-4">
                                      <table class="table">
                                        <thead>
                                            <th scope="col">#</th>
                                            <th scope="col">NOMBRE</th>
                                            <th scope="col">PRECIO</th>
                                        </thead>
                                        <tbody>

                                        <?php
                                          $sumaTotal = 0;
                                          foreach($registroPrd as $prd): 
                                          $sumaTotal += $prd['precio_x_dia'];
                                          ?>

                                          <tr>
                                            <td><?=$prd['fk_id_producto']?></td>
                                            <td><?=$prd['nombre_producto']?></td>
                                            <td>$<?=$prd['precio_x_dia']?></td>
                                          </tr>

                                          <?php endforeach; ?>
                                          
                                        </tbody>
                                        <tr>
                                          <td></td>
                                          <th>TOTAL</th>
                                          <th>$<?=$sumaTotal?></th>
                                        </tr>
                                      </table>

                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>
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
                          <!-- constructora -->
                          <div class="mb-3">
                            <label for="cliente" class="form-label">Empresa Cliente</label>
                            <select class="form-control" name="constructora" id="cliente" required>
                              
                            <?php foreach($allClientes as $clt):?>
                                <option name="constructora" value="<?=$clt['id_constructora'];?>"><?=$clt['nombre_constructora']?></option>
                              <?php endforeach; ?>
                            
                            </select>
                          </div>

                          <!-- empleado que realizó la cotización -->
                          <div class="mb-3">
                            <label for="empleado" class="form-label">Empleado</label>
                            <select class="form-control" name="empleado" id="empleado" required>
                              
                            <?php foreach($allEmpleados as $emp):?>
                                <option name="empleado" value="<?=$emp['id_empleado'];?>"><?=$emp['nombre_empleado']?></option>
                              <?php endforeach; ?>
                            
                            </select>
                          </div>
                          
                          <div class="mb-3">
                            <label for="fechaCoti" class="form-label mt-3">Fecha Cotización</label>
                            <input type="date" class="form-control" id="fechaCoti" name="fechaCoti">
                          </div>

                          <div class="mb-3">
                            <label for="hora" class="form-label mt-3">Hora Cotización</label>
                            <input type="time" class="form-control" id="hora" name="hora">
                          </div>

                          <div class="mb-3">
                            <label for="fechaAlquiler" class="form-label mt-3">Día del Alquiler</label>
                            <input type="date" class="form-control" id="fechaAlquiler" name="fechaAlquiler">
                          </div>
                          
                          <div class="mb-3">
                            <label for="duracion" class="form-label mt-3">Duración en días</label>
                            <input type="number" class="form-control" id="duracion" name="duracion">
                          </div>

                          <button type="submit" name="registrar" class="btn btn-primary">Guardar</button>
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