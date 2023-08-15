<?php

require("../../src/query/ejecuta.php");
require("../../src/query/select.php");

use MyApp\query\Select;
use MyApp\query\Ejecuta;

require("../../vendor/autoload.php");

/*$select = new Select();
$consulta = "SELECT * FROM orden";
$query = $select->seleccionar($consulta);
foreach($query as $dato)
{
    $fecha = $dato->fecha_orden;
    echo "<p> Fechas: $fecha</p>";
    $objetivo = date('Y-m-d', strtotime($fecha . ' +15 days'));
    echo "<p>Fechas límite: $objetivo </p> <br>";

    $fecha_limite = false; 
    if ($fecha_actual = $objetivo) {
        
        $fecha_limite = true; 
        echo "hola";
    }

}*/

/* $select = new Select();
$consulta = "SELECT * FROM orden";
$query = $select->seleccionar($consulta);

$fecha_actual = date('Y-m-d'); // Obtén la fecha actual

$fechas_generadas = array(); // Para almacenar las fechas límite ya procesadas

foreach ($query as $dato) {
    $fecha = $dato->fecha_orden;
    echo "<p>Fechas: $fecha</p>";
    $objetivo = date('Y-m-d', strtotime($fecha . ' +15 days'));
    echo "<p>Fechas límite: $objetivo</p><br>";

    // Compara la fecha límite con la fecha actual
    if ($objetivo == $fecha_actual && !in_array($objetivo, $fechas_generadas)) {
        // Si la fecha límite es igual a la fecha actual y aún no ha sido procesada
        echo "¡Hola! Esta es la fecha límite y es única: $objetivo<br>";

        // Genera y almacena el nuevo valor
        $nuevo_valor = "Nuevo valor único para esta fecha límite";
        echo "Nuevo valor: $nuevo_valor<br>";

        $fechas_generadas[] = $objetivo; // Agrega la fecha al array de fechas procesadas
    } elseif ($objetivo < $fecha_actual && !in_array($objetivo, $fechas_generadas)) {
        // Si la fecha límite ya pasó y aún no ha sido procesada
        echo "¡Hola! Esta fecha límite ya pasó y es única: $objetivo<br>";

        // Genera y almacena el nuevo valor para fechas pasadas
        $nuevo_valor = "Nuevo valor único para esta fecha pasada";
        echo "Nuevo valor: $nuevo_valor<br>";

        $fechas_generadas[] = $objetivo; // Agrega la fecha al array de fechas procesadas
    }
} */

$select = new Select();
$consulta = "SELECT fecha_orden, reg FROM orden";
$query = $select->seleccionar($consulta);

$fecha_actual = date('Y-m-d'); // Obtén la fecha actual

$fechas_generadas = array(); // Para almacenar las fechas límite ya procesadas

foreach ($query as $dato) {
    $fecha = $dato->fecha_orden;
    $reg = $dato->reg;
    //echo "<p>Fechas: $fecha , $reg </p>";
    $objetivo = date('Y-m-d', strtotime($fecha . ' +15 days'));
    //echo "<p>Fechas límite: $objetivo</p><br>";

    // Compara la fecha límite con la fecha actual
    if (($objetivo == $fecha_actual || $objetivo < $fecha_actual) && !in_array($objetivo, $fechas_generadas)) {

        $queryM = new Ejecuta();
        $updateM = "UPDATE orden SET Estado_v = 2 WHERE reg = $reg";
        $queryM->ejecutar($updateM); 
        $fechas_generadas[] = $objetivo; // Agrega la fecha al array de fechas procesadas
    }
}







?>