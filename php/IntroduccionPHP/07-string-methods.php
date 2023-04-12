<?php include 'includes/header.php';

$nombreCliente = "Juan Pablo";

// Conocer longitud de un string
echo strlen($nombreCliente);
var_dump($nombreCliente);

// Eliminar espacios en blanco
$texto = trim($nombreCliente);
echo strlen($texto);

//Convertirlo a mayusculas
echo strtoupper($nombreCliente);

// Convertirlo en minusculas
echo strtolower($nombreCliente);

$mail1 = "correo@correo.com";
$mail2 = "Correo@correo.com";

var_dump(strtolower($mail1) === strtolower($mail2));
// reemplaza texto a partir de una cadena: str_replace(valor original, valor reemplazado, cadena afectada)
echo str_replace('Juan', 'J', $nombreCliente);

// Revisar si un string existe o no
echo strpos($nombreCliente, 'Pedro');

$tipoCliente = "Premium";

echo "<br>";

echo "El Cliente " . $nombreCliente . " es " . $tipoCliente;

echo "El Cliente {$nombreCliente} es ${tipoCliente} ";

include 'includes/footer.php';