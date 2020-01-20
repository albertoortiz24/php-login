<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Nuevo usuario creado con éxito';
    } else {
      $message = 'Lo sentimos, debe haber habido un problema al crear su cuenta';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>

  
  <body background="img/fondo.jpg">

    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Registro</h1>
    <span>o <a href="login.php">Iniciar Session</a></span>

    <form action="signup.php" name="form1" method="POST">
      <input name="email" type="text" placeholder="Coloque su Correo">
      <input name="password" type="password" id="pass1" placeholder="Coloque su contraseña">
      <input name="confirm_password" type="password" id="pass2" placeholder="Confirmar Contraseña">
      <input type="submit" value="Registrarse" >
      
    </form>

  </body>
</html>
