<?php

require_once '../productos/conectarProductos.php';
require_once '../cotizaciones/conectarCotizaciones.php';

$coti = new Cotizacion();
$allCotizaciones = $coti->obtainAll();

$prd = new Producto();
$allProductos = $prd->obtainAll();

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
              <div class="d-flex">
                <button class="btn btn-dark h-75 me-3"><a href="../cotizaciones/cotizaciones.php"><i class="bi bi-arrow-90deg-left me-2"></i>Regresar</a></button>
                <h2 class="mb-4">Añadir productos a una Cotización</h2>
              </div>

              <form method="post" action="agregar.php">
                <div class="row g-0">
                  <div class="col-6 p-2 mt-3 mb-3">
                    <label for="prd" class="form-label">Producto</label>
                    <select class="form-control"  name="producto_id" id="prd">
                      <?php foreach ($allProductos as $prd):?>
                        <option value="<?=$prd['id_producto']?>"><?=$prd['nombre_producto']?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-6 p-2 mt-3 mb-3">
                  <label for="ctz" class="form-label"># Cotización</label>
                    <select class="form-control"  name="cotizacion_id" id="ctz">
                      <?php foreach ($allCotizaciones as $ctz):?>
                        <option value="<?=$ctz['id_cotizacion']?>"><?=$ctz['id_cotizacion']?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary mt-4" name="registrar">Registrar</button>
              </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>