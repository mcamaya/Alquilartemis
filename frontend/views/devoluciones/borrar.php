<?php

require_once 'conectarDevoluciones.php';

$data = new DevolucionManager();

if(isset($_GET['id']) && isset($_GET['req'])){
    if($_GET['req'] == 'delete'){

        $data->setId($_GET['id']);
        $data->delete();

        echo "<script>alert('El registro fue eliminado exitosamente');document.location='clientes.php';</script>";
    }
}
