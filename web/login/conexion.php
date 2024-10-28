<?php
//Conexion a bd centro
$dsn='mysql:dbname=centro;host=localhost';
$user='gestor';
$pwd='secreto';

try{
    $conexion = new PDO($dsn, $user, $pwd);
    
}catch(PDOException $e){
    echo 'Error de conexión... ' . $e->getMessage();
}


