<?php

$servidor = 'localhost';//nombre de mi servidor importante para poder hacer funcionar mi aplicacion
$nombre_usuario = 'root';//nombre de mi usuario
$contraseña = '';//sin contraseña
$database = 'usuarios_database';//nombre de mi base de datos que he creado
//Mi try se ejecutara solo si el servidor, la base de datos, el nombre_usuario y el contraseña son correctos 
try {
  $conexion = new PDO("mysql:host=$servidor;dbname=$database;", $nombre_usuario, $contraseña);//me guarda la conexion en un objeto si consigue conectarse
} catch (PDOException $e) {//En caso de que no se ejecute el try me enjecutara el catch si hay algun error acabara con el proceso y me mostrara el error que ha obtenido
  die('Conexión fallida: ' . $e->getMessage());
}

?>