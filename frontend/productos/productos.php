<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Alquilartemis</title>
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
                <li class="my-2 fs-5"><a href="../cotizaciones/cotizaciones.php"><i class="bi bi-receipt-cutoff mx-3"></i>Cotizaciones</a></li>
            </ul>
          </div>
    
            <div class="col-8 bg-light h-100 rounded px-5 py-4 d-flex flex-column">
              <div class="d-flex justify-content-between mb-2">
                <h2>Productos</h2>
                <button type="button" class="btn btn-dark mb-4" data-bs-toggle="modal" data-bs-target="#registro">Añadir Nuevo Registro</button>
              </div>
              <table class="table table-striped">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Precio</th>
                          <th scope="col">Categoría</th>
                          <th scope="col">Garantía</th>
                          <th scope="col">Editar</th>
                          <th scope="col">Borrar</th>
                        </tr>
                      </thead>
                      <tbody>
                        
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

                        <form method="post" action="guardar.php">
                          <div class="mb-3">
                            <label for="nombre-producto" class="form-label">Nombre Producto</label>
                            <input type="text" class="form-control" id="nombre-producto" aria-describedby="emailHelp" name="nombre">
                          </div>
                          <div class="mb-3">
                            <label for="precio" class="form-label">Precio por día</label>
                            <input type="number" class="form-control" id="precio" name="precio">
                          </div>
                          <div class="mb-3">
                            <label for="categoria" class="form-label">Categoría</label>
                            <input type="text" class="form-control" id="categoria" name="categoria">
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