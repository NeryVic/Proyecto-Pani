<?php
$servidor= "localhost";
$BaseDeDatos= "app";
$usuario= "root";
$contrasenia="";


try{

    $conexion=new PDO("mysql:host=$servidor;dbname=$BaseDeDatos", $usuario, $contrasenia);
    echo "conexion realizada...";
}
catch(Exception $error){
    echo $error ->getMessage();
}

?>