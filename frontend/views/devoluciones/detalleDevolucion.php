<?php
require_once ('../../../backend/config/conexion.php');

class DevolucionManager extends Conectar{
    // Resto del código de la clase
    
    public function obtenerDetalleDevolucion($idDevolucion) {
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM devoluciones WHERE id_devolucion = ?");
            $stm->execute([$idDevolucion]);
            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

// Código para obtener y mostrar el detalle de una devolución

if (isset($_GET['id'])) {
    $idDevolucion = $_GET['id'];

    // Crear una instancia de DevolucionManager
    $data = new DevolucionManager();
    var_dump($_GET);
    die();
    // Obtener el detalle de la devolución
    $detalleDevolucion = $data->obtenerDetalleDevolucion($idDevolucion);
}

?>

<!-- Resto del código HTML -->

<?php if (isset($detalleDevolucion)): ?>
    <div class="detalle-devolucion">
        <h2>Detalle de Devolución</h2>
        <p>ID Devolución: <?= $detalleDevolucion['id_devolucion'] ?></p>
        <p>ID Empleado: <?= $detalleDevolucion['id_empleado'] ?></p>
        <p>Fecha: <?= $detalleDevolucion['fecha'] ?></p>
        <p>Hora: <?= $detalleDevolucion['hora'] ?></p>
        <!-- Agrega más campos según tus necesidades -->
    </div>
<?php endif; ?>

<!-- Resto del código HTML -->
