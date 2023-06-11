<?php

require_once 'conectarClientes.php';
$id = $_GET['id'];
$data = new Cliente();
$data->setId($id);

$record = $data->obtainOne();
$val = $record[0];


if(isset($_POST['editar'])){
    $data->setNombre($_POST['nombre']);
    $data->setNIT($_POST['nit']);
    $data->setRepresentante($_POST['representante']);
    $data->setEmail($_POST['email']);
    $data->setTelefono($_POST['celular']);

		$data->update();
		echo "<script>alert('Datos actualizados con éxito'); document.location='clientes.php'</script>";
}

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
                    <li class="my-2 fs-5"><a href="#"><i class="bi bi-person-fill mx-3"></i>Empleados</a></li>
                    <li class="my-2 fs-5"><a href="#"><i class="bi bi-cone-striped mx-3"></i> Clientes</a></li>
                    <li class="my-2 fs-5"><a href="#"><i class="bi bi-hammer mx-3"></i>Productos</a></li>
                    <li class="my-2 fs-5"><a href="#"><i class="bi bi-receipt-cutoff mx-3"></i>Cotizaciones</a></li>
                </ul>
            </div>
    
            <div class="col-8 bg-light h-100 rounded px-5 py-4 d-flex flex-column">
              <h2 class="mb-4">Editar Registro</h2>

              <form method="post">
              	<div class="mb-3">
									<label for="nombre" class="form-label">Nombre</label>
									<input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" value="<?=$val['nombre_constructora']?>" required>
                </div>
                <div class="mb-3">
									<label for="nit" class="form-label">NIT</label>
									<input type="number" class="form-control" id="nit" name="nit" aria-describedby="emailHelp" value="<?=$val['nit_constructora']?>" required>
                </div>
                <div class="mb-3">
									<label for="representante" class="form-label">Representante</label>
									<input type="text" class="form-control" id="representante" name="representante" aria-describedby="emailHelp" value="<?=$val['nombre_representante']?>" required>
                </div>
                <div class="mb-3">
									<label for="email" class="form-label">Email</label>
									<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?=$val['email_contacto']?>" required>
                </div>
                <div class="mb-3">
									<label for="celular" class="form-label">Celular</label>
									<input type="number" class="form-control" id="celular" name="celular" value="<?=$val['telefono_contacto']?>" required>
                </div>
                <button type="submit" class="btn btn-primary" name="editar">Actualizar</button>
              </form>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>