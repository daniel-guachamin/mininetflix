<?php
  session_start();//Iniciamos la sesion

  session_unset();//Quitar la sesion

  session_destroy();//Destruyo la sesion 

  header('Location: /Proyecto_Franklin');//vuelvo a mi pagina principal si cierro la sesion
?>