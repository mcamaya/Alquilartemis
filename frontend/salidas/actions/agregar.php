<?php

if($_POST){
    $url = "http://localhost/xampp/Alquilartemis/backend/controllers/salidas.php?op=InsertData";
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $_POST);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($curl);
    curl_close($curl);
}