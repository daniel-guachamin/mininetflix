<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) { //Si estos campos no estan vacios se ejecutara el if y podre agregar mis datos en la base de datos
    $sql = "INSERT INTO usuarios (email, password) VALUES (:email, :password)";//ingresa mis datos a mi tabla usuarios
    $Consulta = $conexion->prepare($sql); //prepare ejecuta una consulta de sql en mi caso de la tabla de mi base de datos
    $Consulta->bindParam(':email', $_POST['email']);//bindParam vincula parametros
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);//password_hash cifra mi contraseña para que no puedan ver mi contraseña en mi base de datos
    $Consulta->bindParam(':password', $password);//aqui ya no meto mi dato del formulario sino mi variable password que hemos cifrado

    if ($Consulta->execute()) { //si se ejecuta bien la consulta se ejecutara mi condicion if
      $message = 'Nuevo usuario creado con exito';
    } else {
      $message = 'Lo siento, ha habido un problema al crear su cuenta';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrate</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="Estilo/css/style.css"> 
  </head>
  <body>

    <?php require 'Portada/header.php' ?><!--Me permite volver a mi pagina principal(index.php)-->

    <?php if(!empty($message)): ?><!--Si no esta vacio el mensaje me imprimira su valor-->
      <p> <?= $message ?></p> <!--Se ejecuta el mensaje-->
    <?php endif; ?>

    <br><br><br><br><br><br>
    <h1>Registrarse</h1>
    <span>o <a href="Iniciar_sesion.php">Inciciar sesión</a></span>
    <!--Empieza mi formulario que me enviara los datos a esta misma pagina web-->
    <form action="Registrate.php" method="POST">
      <input name="email" type="text" placeholder="Introduce tu email" required>
      <input name="password" type="password" placeholder="Introduce tu contraseña" required>
      <input name="confirm_password" type="password" placeholder="Vuelve a introducir tu contraseña" required>
      <input type="submit" value="Enviar">
    </form>
    <!--Termina mi formulario-->
  </body>
</html>
