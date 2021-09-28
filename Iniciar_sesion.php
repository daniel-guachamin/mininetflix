<?php

  session_start();//debo llamar siempre a este metodo para poder utilizar las variables $_SESSION

  if (isset($_SESSION['user_id'])) {//Si la sesion existe me enviara a mi index.php
    header('Location: /Proyecto_Franklin');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) { //si los campos email y contraseña no estan vacios vamos a poder hacer la consulta a la base de datos
    //seleccioname el id,email,password de mi tabla usuarios donde el email sea igual al email que le paso
    $records = $conexion->prepare('SELECT id, email, password FROM usuarios WHERE email = :email');//Hacer la consulta a traves del objeto de conexion que he creado en mi database.php
    $records->bindParam(':email', $_POST['email']);//:email lo vinculo con el email de mi formulario, le doy el mismo valor 
    $records->execute();//ejecuto la consulta
    $resultado = $records->fetch(PDO::FETCH_ASSOC);//De esta consulta a travez de su metodo fetch obtengo los datos del usuario y los meto en un array

    $message = '';
    //si el array no esta vacia y comparamos la contraseña del formulario con la contraseña de la base de datos
    if (count($resultado) > 0 ) {//si son iguales y el array no esta vacio se ejecuta la condicion
      $_SESSION['user_id'] = $resultado['id'];//_SESSION me permite ejecutar o almacenar el id del usuario
      header("Location: /Proyecto_Franklin");//lo redireccionamos a mi pagina principal
    } else {
      $message = 'Lo siento esas credenciales no existen en nuestra base de datos';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Iniciar sesión</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="Estilo/css/style.css">
  </head>
  <body>
    <?php require 'Portada/header.php' ?><!--Me permite volver a mi pagina principal(index.php)-->

    <?php if(!empty($message)): ?><!--Si la variable message no esta vacia lo muestra a travez de un parrafo-->
      <p> <?= $message ?></p>
    <?php endif; ?>

    <br><br><br><br><br><br>
    <h1>Iniciar sesión</h1>
    <span>o <a href="Registrate.php">registrarse</a></span>
    <!--Empieza mi formulario que me enviara los datos a esta misma pagina web-->
    <form action="Iniciar_sesion.php" method="POST">
      <input name="email" type="text" placeholder="Introduce tu email" required>
      <input name="password" type="password" placeholder="Introduce tu contraseña" required>
      <input type="submit" value="Enviar">
    </form>
    <!--Termina mi formulario-->
  </body>
</html>