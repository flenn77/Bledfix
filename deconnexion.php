<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>BLEDFIX</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <style>
    body {
      background: linear-gradient(-45deg, #d19684, #e7a3bd, #96cadd, #a2e9d8);
      background-size: 10000% 10000%;
      animation: gradient 15s ease infinite;
    }

    @keyframes gradient {
      0% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0% 50%;
      }
    }
  </style>

</head>

<body>




  <!-- DEBUT NAVBAR -->
  <font size="4">
    <div class="bs-example">
      <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a href="accueil.php" class="navbar-brand">
          <img src="image/accueil/bledfix.png" height="48" alt="CoolBrand">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav">
            <a href="accueil.php" class="nav-item nav-link active">Accueil</a>
            <a href="series.php" class="nav-item nav-link">Séries</a>
            <a href="films.php" class="nav-item nav-link">Films</a>
            <a href="connexion.php" class="nav-item nav-link">connexion</a>
            <a href="inscription.php" class="nav-item nav-link">inscription</a>


          </div>

        </div>
      </nav>
    </div>
  </font>
  <!-- FIN DE NAVBAR -->
<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: connexion.php");
?>

   </body>
</html>
