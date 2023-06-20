<?php
require_once 'conectarCategorias.php';

if(isset($_POST['registrar'])){
    $data = new Categoria();
    $data->setNombre($_POST['nombre']);
    $data->setDescripcion($_POST['descripcion']);

    /* $data->setImg($_POST['imagen']); */
    
    $imgBasename = $_FILES['imagen']['name'];
    $imgUrlTemp = $_FILES['imagen']['tmp_name'];
    
    
    $rutaASubir = "ctg_images/$imgBasename";
    
    move_uploaded_file($imgUrlTemp, $rutaASubir);

 /*    echo "<pre>";
    var_dump($rutaASubir);
    die(); */

    $data->setImg($rutaASubir);

    $data->insertData();
    echo "<script>alert('Datos guardados con éxito'); document.location='categorias.php'</script>";
}