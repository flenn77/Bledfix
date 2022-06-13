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
            </div>
          </div>
        </nav>
      </div>
    </font>
    <!-- FIN DE NAVBAR -->




    <center>
<strong>
<br><bR><br>
<h3>- CHERCHER UN FILM : </h3>
<p> vous pouvez egalement cherche le titre d'un ou plusieurs film grace à l'un des acteurs principaux </p>
</strong>
<?php
 
 $bdd = new PDO('mysql:host=localhost;dbname=Bledfix;charset=utf8', 'root', ''); 
$articles = $bdd->query('SELECT titre FROM films LIMIT 2');
if(isset($_GET['q']) AND !empty($_GET['q'])) {
   $q = htmlspecialchars($_GET['q']);
   $articles = $bdd->query('SELECT titre FROM films WHERE titre LIKE "%'.$q.'%" ORDER BY id_film DESC');

}
?>
<form method="GET">
   <input type="search" name="q" placeholder="Recherche..." />
   <input type="submit" value="Valider" />
</form>
<?php if($articles->rowCount() > 0) { ?>
   <ul>
   <?php while($a = $articles->fetch()) { ?>
     <font size="5"> <li><?= $a['titre'] ?></li></font>
   <?php } ?>
   </ul>
<?php } else { ?>
Aucun résultat pour: <?= $q ?>...
<?php } ?>




<br><br><bR>

<strong>
      <h2>- FILMS EN TENDANCES </h2>
    </strong>
    </center>
    <div class="row">


      <?php
      try {
        $bdd = new PDO('mysql:host=localhost;dbname=Bledfix;charset=utf8', 'root', '');
      } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
      }

      $reponseFilm = $bdd->query('SELECT * FROM films ');

      while ($donneesFilm = $reponseFilm->fetch()) {
      ?>
        <div class="col-md-4"><br>
          <hr style="height: 3px; color: #839D2D; background-color: #839D2D; ">

          <center><?php echo '<br><br><br><img src="data:image;base64,' . base64_encode($donneesFilm['image']) . '" style="width:250px;" height="350px" >'; ?>
            <br><br> <?php echo  $donneesFilm['titre']; ?>
            <br><br><br>




            <div class="w3-container">
              <button onclick="document.getElementById('<?php echo $donneesFilm['id_film'] ?>').style.display='block'" class="w3-button w3-black">DETAIL </button>
              <div id="<?php echo $donneesFilm['id_film'] ?>" class="w3-modal">
                <div class="w3-modal-content">
                  <div class="w3-container">
                    <span onclick="document.getElementById('<?php echo $donneesFilm['id_film'] ?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                    <p>
                      <?php $films = $bdd->query('SELECT * FROM films, ReaFilm, genre 
                where  films.idReaFilm = ReaFilm.id and films.idGenreF = genre.id and films.id_film =  "' . $donneesFilm['id_film'] . '"   ');
                      while ($detailFilm = $films->fetch()) {
                        echo $detailFilm['titre']; ?></p>
                    <p><strong>date de sortie : </strong><?php echo $detailFilm['dateSortie']; ?></p>
                    <p><strong>Acteurs : </strong><?php echo $detailFilm['acteurs']; ?></strong></p>
                    <p><strong>Realisateur : </strong><?php echo $detailFilm['libelle']; ?></strong></p>
                    <p><strong>Catègorie age : </strong><?php echo $detailFilm['CategorieAge']; ?></strong></p>
                    <p><strong>Genre : </strong><?php echo $detailFilm['libellegenre']; ?></strong></p>
                    <?php echo '<img src="data:image;base64,' . base64_encode($detailFilm['image']) . '" style="width:350px;" height="450px">'; ?></br> <br><br><br><br><br>
                  </div>
                </div>
              </div>
            </div>
          </center>
        </div>
        <hr>


    <?php
                      }
                    }

                    $reponseFilm->closeCursor();

    ?>




    </div>


<br><br><br><br>

<?php
    try {
        // On se connecte à MySQL
        $bdd = new PDO('mysql:host=localhost;dbname=Bledfix;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }


    if (isset($_POST['submit_commentaire'])) {
        if (isset($_POST['pseudo'], $_POST['commentaire'], $_POST['Titre']) and !empty($_POST['pseudo']) and !empty($_POST['commentaire']) and !empty($_POST['Titre'])) {




            $pseudo = htmlspecialchars($_POST['pseudo']);
            $commentaire = htmlspecialchars($_POST['commentaire']);
            $Titre = htmlspecialchars($_POST['Titre']);
            if (strlen($pseudo) < 25) {
                $ins = $bdd->prepare('INSERT INTO commentaire (pseudo, commentaire, Titre) VALUES (?,?,?)');
                $ins->execute(array($pseudo, $commentaire, $Titre));
                $c_msg = "<span style='color:green'>Votre commentaire a bien été posté</span>";
            } else {
                $c_msg = "Erreur: Le pseudo doit faire moins de 25 caractères";
            }
        } else {
            $c_msg = "Erreur: Tous les champs doivent être complétés";
        }
    }
    ?>



   <center> <h2>Commentaire :</h2></center>
    <form method="POST">
    <div align="center">
    <strong><label for='pseudo'>Votre Pseudo  &nbsp; &nbsp; :  &nbsp; &nbsp; </strong></label><input type="text" name="pseudo" placeholder="Votre pseudo" id="pseudo" /><br />
    <strong><label for='Titre'>Titre du Film  &nbsp; &nbsp; :  &nbsp; &nbsp; </strong></label>    <input type="text" name="Titre" placeholder="Titre Du Film" id="Titre"/><br />
    <strong><label for='commentaire'> Commentaire  &nbsp; &nbsp; :  &nbsp; &nbsp; </strong></label>    <textarea name="commentaire" placeholder="Votre commentaire..." id="commentaire"></textarea><br />
      <br><br> <input type="submit" value="Poster mon commentaire" name="submit_commentaire" />
    </div>
    </form>

    <?php
    if (isset($c_msg)) {
        echo $c_msg;
    }

    ?>
    <br><br><center>
    <h3> - Vos commentaires : </h3>
</center>

    <?php

    $reponse = $bdd->query('SELECT * FROM commentaire');

    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch()) { ?>

<center>
       <font size="3"> <p> Le commentaire de  : <strong>@<?php echo $donnees['pseudo']; ?> </strong> propos du film :<strong> <?php echo $donnees['Titre']; ?> :</strong></br>
            &nbsp&nbsp&nbsp&nbsp<?php echo $donnees['commentaire']; ?> <BR<BR></font>
</center>
            <?php } ?>

</body></html>