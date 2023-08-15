<?php
require("../../src/query/ejecuta.php");
use MyApp\query\Ejecuta;

    require("../../vendor/autoload.php");

    session_start();

    extract($_POST);


    $tel_celular = $_SESSION["tel_celular"];

    $reg_det=$_POST["reg_det"];
    /* obtener id  */
    $queryEJE = new Ejecuta();
    $update = "DELETE FROM detalle_orden WHERE reg_det = '$reg_det' ";
    $miconsultaU = $queryEJE->ejecutar($update);
    header("Location: ../../Vista_Usuario/vistacarro.php");


?>