<?php
  session_start();//Con esto puedo ver si la sesion existe

  require 'database.php';

  if (isset($_SESSION['user_id'])) {//Si existe la variable user_id dentro de nuestra sesion
    $records = $conexion->prepare('SELECT id, email, password FROM usuarios WHERE id = :id');//Hacemos una consulta para obtener el id de nuestra base de datos
    $records->bindParam(':id', $_SESSION['user_id']);//:id lo vinculo con el user_id de mi sesion, le doy el mismo valor
    $records->execute();//ejecutamos esta consulta
    $resultados = $records->fetch(PDO::FETCH_ASSOC);

    $datos = null;//la inicializo en null porque no tiene datos cuando empiezo la aplicacion

    if (count($resultados) > 0) {//si mi array resultados no esta vacio 
      $datos = $resultados;//guardo mis datos de usuario en datos si resultados no esta vacio
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido a mi pagina web</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> <!--Le doy una fuente de internet para el estilo de mi pagina web -->
    <link rel="stylesheet" href="Estilo/css/style.css"> <!-- LLamo a mi style.css -->
  </head>
  <body class="estilo_portada">
    <?php if(!empty($datos)): ?><!--Si el usuario existe en la base de datos se ejecutara este if-->
      <br> <p class="color_blanco">Bienvenido. <?= $datos['email']; ?>
      <br>Has iniciado sesión correctamente</p>
      <br><br>
      <br><br><br>
      <a href="Cerrar_sesion.php" title="Has click para cerrar tu sesión">
        <p class="color_blanco">Cerrar sesión</p>
      </a>
      <a href="anime/portada.html">
      <br><img src="img/foto.jpg" alt="imagen de mi perfil" title="Has click para ver tus peliculas y series">
      </a>
    <?php else: ?><!--Si el usuario no existe en la base de datos se ejecutara este if-->
      <br><br><br><br><br><br><br><br><br>
      <h1 class="color_blanco">Iniciar sesión o registrarse</h1>
      <!--Enlaces que me enviaran a mis otras paginas web-->
      <a class="color_blanco" href="Iniciar_sesion.php">Iniciar sesión</a> o
      <a class="color_blanco" href="Registrate.php">registrarse</a>
    <?php endif; ?>
  </body>
</html>