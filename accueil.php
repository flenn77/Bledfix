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
  <font size="3">
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
            <div align="right"> <a href="deconnexion.php" class="nav-item nav-link">Deconnexion</a></div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

          </div>

        </div>
      </nav>
    </div>
  </font>
  <!-- FIN DE NAVBAR -->





  <!-- debut annimation de bienvenu -->
  <center>
    <div id="bienvenu">
      <p>
        <br>
        <font size="6"><strong> BIENVENU DANS BLEDFIX !!!</strong> </font>
      </p>
    </div>

    <!-- fin annimation de bienvenu -->






  </center>
  <center>


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <?php
          try {
            // On se connecte à MySQL
            $bdd = new PDO('mysql:host=localhost;dbname=Bledfix;charset=utf8', 'root', '');
          } catch (Exception $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
          }

          $reponse = $bdd->query('SELECT distinct * FROM films where id_film=1');

          // On affiche chaque entrée une à une
          while ($donnees = $reponse->fetch()) {
            echo '<img src="data:Image/jpeg;base64,' . base64_encode($donnees['image']) . '" style="width:25%;" height="50%" >';
          }

          $reponse->closeCursor(); // Termine le traitement de la requête

          ?>


        </div>
        <div class="carousel-item">

          <?php
          try {
            // On se connecte à MySQL
            $bdd = new PDO('mysql:host=localhost;dbname=Bledfix;charset=utf8', 'root', '');
          } catch (Exception $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
          }

          $reponse = $bdd->query('SELECT distinct * FROM films where id_film=2');

          // On affiche chaque entrée une à une
          while ($donnees = $reponse->fetch()) {
            echo '<img src="data:Image/jpeg;base64,' . base64_encode($donnees['image']) . '" style="width:25%;" height="50%" >';;
          }

          $reponse->closeCursor(); // Termine le traitement de la requête

          ?>

        </div>
        <div class="carousel-item">


          <?php
          try {
            // On se connecte à MySQL
            $bdd = new PDO('mysql:host=localhost;dbname=Bledfix;charset=utf8', 'root', '');
          } catch (Exception $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
          }

          $reponse = $bdd->query('SELECT distinct * FROM films where id_film=7');

          // On affiche chaque entrée une à une
          while ($donnees = $reponse->fetch()) {
            echo '<img src="data:Image/jpeg;base64,' . base64_encode($donnees['image']) . '" style="width:25%;" height="50%" >';
          }
          $reponse->closeCursor(); // Termine le traitement de la requête

          ?>
        </div>
        <div class="carousel-item">

          <?php
          try {
            // On se connecte à MySQL
            $bdd = new PDO('mysql:host=localhost;dbname=Bledfix;charset=utf8', 'root', '');
          } catch (Exception $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
          }

          $reponse = $bdd->query('SELECT distinct * FROM films where id_film=4');

          // On affiche chaque entrée une à une
          while ($donnees = $reponse->fetch()) {
            echo '<img src="data:Image/jpeg;base64,' . base64_encode($donnees['image']) . '" style="width:25%;" height="50%" >';;
          }

          $reponse->closeCursor(); // Termine le traitement de la requête

          ?>

        </div>
      </div>


      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </center>
  <!-- fin des diapo -->
  <br><br><br><br><br><br>


  <div class="marge">

    <font color="#4d0019">
      <strong>
        <h1>Nos Films...</h1>
      </strong>
    </font>
    <font size="4">

    <div class="row">
      <div class="col-sm-6">
        Decouvrire nos films, avec le maximum de detail tel que le titre, les acteurs principaux, la date de sortie, le genre...</div>
      <div class="col-sm-6">
        <center> <a href="films.php" class="btn btn-primary btn-lg btn-block" role="button" target="bts">Decouvrire nos films</a>
        </center>
      </div>
    </div>
    </font>
<br><bR>

    <font color="#4d0019">
      <strong>
        <h1>Nos Séries...</h1>
      </strong>
    </font>
    <font size="4">

    <div class="row">
      <div class="col-sm-6">
        <center> <a href="films.php" class="btn btn-primary btn-lg btn-block" role="button" target="bts">Decouvrire nos séries</a>
        </center>
      </div>
      <div class="col-sm-6">
        Decouvrire nos series, avec le maximum de detail tel que le titre, les acteurs principaux, la date de sortie, le genre...</div>

    </div>
    </font>
  </div>

</body>

</html>      
