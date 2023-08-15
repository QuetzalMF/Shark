<?php
require("../../src/query/ejecuta.php");

use MyApp\query\Ejecuta;
require("../../vendor/autoload.php");

extract($_POST);
$id = $_GET["id"];
$query = new Ejecuta();
$consulta = "UPDATE productos SET existencia = 0 WHERE cve_prod = $id";
$query->ejecutar($consulta);
header("Location: ../../Administrador/index.php");

?>