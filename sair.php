<?php
  require 'classes/usuarios.class.php';
  $u = new Usuarios();

  if ($u->sair()) {
      header("Location: ./login.php");
  }
?>
