<?php
require_once '../vendor/autoload.php';

$recibir_array = stripslashes($_GET['productos']);
$recibir_array = urldecode($recibir_array);
$matrizProductos = unserialize($recibir_array);
/* echo "<pre>";
var_dump($matrizProductos);
echo "</pre>";
die(); */

$table = "";
$precio_total = 0;

foreach ($matrizProductos as $prd) {
  $precio_total += $prd['precio_x_dia'];
  $table .= "<tr>";
  $table .= "<td style='text-align: center'>". $prd['fk_id_producto'] ."</td>";
  $table .= "<td>". $prd['nombre_producto'] ."</td>";
  $table .= "<td class='text-right'>$" . $prd['precio_x_dia'] ."</td>";
  $table .= "<td class='text-right'></td>";
  $table .= "</tr>";
}


$nomEmp = $_GET['nomEmp'];
$nomCtrc = $_GET['nomCtrc'];
$nitCtrc = $_GET['nitCtrc'];
$idCtz = $_GET['idCtz'];
$fechaCtz = $_GET['fechaCtz'];
$horaCtz = $_GET['horaCtz'];
$fechaAlq = $_GET['fechaAlq'];
$duracion = $_GET['duracion'];

$mpdf = new \Mpdf\Mpdf();

$html = "
<html>
<head>
    <meta charset='UTF-8' />
    <title>Document</title>
    <link
      href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'
      rel='stylesheet'
      integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM'
      crossorigin='anonymous'
    />
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
        font-family: 'Poppins', sans-serif;
    }

    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
      }

    </style>
  </head>
<body>
    <div class='container'>
      <div class='row g-0'>
        <div class='col-xs-6 d-flex my-3 align-items-center'>
            <h1>ALQUILARTEMIS S.A.S</h1>
        </div>
        <div class='col-xs-6 text-right mt-3'>
          <div class='panel panel-default'>
            <div class='panel-heading'>
              <h4><strong>NIT :</strong> 2564854165-8</h4>
              <h4><strong>Autorización :</strong> $nomEmp </h4>
            </div>
            <div class='panel-body'>
              <h4><strong># Cotización : </strong> $idCtz </h4>
            </div>
          </div>
        </div>

        <hr class='mt-5' />

        <h1 class='text-center mt-5'>Cotización</h1>

        <div class='row'>
          <div class='col-xs-12'>
            <div class='panel panel-default'>
              <div class='panel-heading'>
                <h4> Bucaramanga, Colombia</h4>
                <h4> $fechaCtz, $horaCtz</h4>
                <h4> Fecha del Alquiler:  $fechaAlq</h4>
                <h4> Duración: $duracion días</h4>
              </div>
              <div class='panel-body mt-4'>
                <h4> <strong>Comprador : </strong> $nomCtrc</h4>
                <h4> <strong>NIT : </strong> $nitCtrc</h4>
              </div>
            </div>
          </div>
        </div>
        <pre></pre>
        <table class='table table-bordered mt-5'>
          <thead>
            <tr>
              <th style='text-align: center'>
                <h4>ID</h4>
              </th>
              <th style='text-align: center'>
                <h4>Concepto</h4>
              </th>
              <th style='text-align: center'>
                <h4>Precio</h4>
              </th>
              <th style='text-align: center'>
                <h4><strong>TOTAL</strong></h4>
              </th>
            </tr>
          </thead>
          <tbody>
            $table
          </tbody>
          <tfoot>
            <tr>
              <th></th>
              <th></th>
              <th></th>
              <th style='text-align: center'>$$precio_total</th>
            </tr>
          </tfoot>
        </table>
        <pre></pre>

        <div class='row g-0'>
          <div class='col-xs-8 mt-5'>
            <div class='panel panel-info mt-5 text-center'>
              <h6>
                'LA ALTERACI&Oacute;N, FALSIFICACI&Oacute;N O
                COMERCIALIZACI&Oacute;N ILEGAL DE ESTE DOCUMENTO ESTA PENADO POR
                LA LEY'
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script
      src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'
      integrity='sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz'
      crossorigin='anonymous'
    ></script>
  </body>
  </html>
";

// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();