<?php
$servidor= "localhost";
$BaseDeDatos= "maderas-pani";
$usuario= "root";
$contrasenia="";

try{

    $conexion=new PDO("mysql:host=$servidor;dbname=$BaseDeDatos", $usuario, $contrasenia);
    echo "ESTAS CONECTADO A LA BASE DE DATOS.";} 
catch(Exception $error){
    echo $error ->getMessage();
}

?>