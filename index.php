<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Website login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  </head>
  

  <body background="img/fondo.jpg"> 
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <h2 class="animated fadeInDownBig">Bienvenido <br> <?= $user['email']; ?>
      </h2>
      <p>  Has iniciado correctamente</p>
        <!-- Page Content -->
<div class="container">

<!-- Portfolio Item Row -->
<div class="row">

  <div class="col-md-8">
    <img class="img-fluid" src="img/imagen5.jpg" alt="">
  </div>

  <div class="col-md-4"
  style="border-left: inset;
    border-right: inset;
    border-top: inset;
    border-bottom: inset;
"
  
  >
    <h3 class="my-3">Descripcion del Proyecto</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
    <h3 class="my-3" style="border-top: inset;">Detalles Del Proyecto</h3>
    <ul>
      <li>Lorem Ipsum</li>
      <li>Dolor Sit Amet</li>
      <li>Consectetur</li>
      <li>Adipiscing Elit</li>
    </ul>
  </div>

</div>

<h3 class="my-4">Related Projects</h3>

<div class="row">

  <div class="col-md-3 col-sm-6 mb-4">
    <a href="#">
          <img class="img-fluid" src="img/imagen1.jpg" alt="">
        </a>
  </div>

  <div class="col-md-3 col-sm-6 mb-4">
    <a href="#">
          <img class="img-fluid" src="img/imagen2.jpg" alt="">
        </a>
  </div>

  <div class="col-md-3 col-sm-6 mb-4">
    <a href="#">
          <img class="img-fluid" src="img/imagen3.jpg" alt="">
        </a>
  </div>

  <div class="col-md-3 col-sm-6 mb-4">
    <a href="#">
          <img class="img-fluid" src="img/imagen1.jpg" alt="">
        </a>
  </div>

</div>

</div>

      <a href="logout.php" id="cerrar">
        Cerrar Session
      </a>
     



    <?php else: ?>
      

      <a href="login.php" class="ah1">
        <h1 class="th1 animated flipInX">
          Iniciar Session
        </h1>
      </a>
       
      <a href="signup.php" class="ah1">
        <h1 class="th1 animated flipInX">
          Registro
        </h1>
      </a>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>
