<?php
//$servidor= "localhost";
//$BaseDeDatos= "maderas-pani";
//$usuario= "root";
//$contrasenia="";

$servidor= "localhost";
$BaseDeDatos= "u704677074_maderaspani";
$usuario= "u704677074_PANI";
$contrasenia="eVf5:>2;M";

try{

    $conexion=new PDO("mysql:host=$servidor;dbname=$BaseDeDatos", $usuario, $contrasenia);
    } 
catch(Exception $error){
    echo $error ->getMessage();
}

?>