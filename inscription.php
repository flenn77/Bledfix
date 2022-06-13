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

                <a href="connexion.php" class="nav-item nav-link">Connexion</a>
                <a href="inscription.php" class="nav-item nav-link">Inscription</a>
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
           <br> <font size="6"><strong> BIENVENU DANS BLEDFIX !!!</strong> </font>
          </p>
        </div>
      </center>
<!-- fin annimation de bienvenu -->


		<?php


		// On se connecte à MySQL
		$bdd = new PDO('mysql:host=localhost;dbname=Bledfix;charset=utf8', 'root', '');

		if (isset($_POST['forminscription'])) {
			extract(($_POST));

			define('HOST', 'localhost');
			define('DB_NAME', 'Bledfix');
			define('USER', 'root');
			define('PASS', '');

			try {
				$db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				echo $e;
				echo "Connection > NOT OK!";
			}

			global $db;


			if (!empty($_POST['pseudo'])   and  !empty($_POST['mail']) and  !empty($_POST['mail2']) and !empty($_POST['mdp']) and  !empty($_POST['mdp2'])) {
				$pseudo = htmlspecialchars($_POST['pseudo']);
				$mail = htmlspecialchars($_POST['mail']);
				$mail2 = htmlspecialchars($_POST['mail2']);
				$mdp = sha1($_POST['mdp']);
				$mdp2 = sha1($_POST['mdp2']);

				$pseudolenght = strlen($pseudo);
				if ($pseudolenght <= 255) {
					if ($mail == $mail2) {
						if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
							$reqMail = $db->prepare("SELECT * FROM membre WHERE mail = ?");
							$reqMail->execute(array($mail));
							$mailexist = $reqMail->rowCount();
							if ($mailexist == 0) {
								$reqpseudo = $db->prepare("SELECT * FROM membre WHERE pseudo = ?");
								$reqpseudo->execute(array($pseudo));
								$pseudoexist = $reqMail->rowCount();
								if ($pseudoexist == 0) {


								if ($mdp = $mdp2) {


									$q = $db->prepare("INSERT INTO membre(pseudo, mail, mdp) VALUES (:pseudo, :mail, :mdp)");
									$q->execute([
										'pseudo' => $pseudo,
										'mail' => $mail,
										'mdp' => $mdp,
									]);
									$erreur = "parfait";
								} else {
									$erreur =  "Vos Mots de passe mail ne correspendent pas !";
								}
							} else {
								$erreur = "adresse mail deja utilisé !";
							}
						}else{
								$erreur = "Votre pseudo deja utilisé !";

							}
						} else {
							$erreur =  "Vos adresses mail ne correspendent pas !";
						}
					}
				} else {
					$erreur =  "votre Pseudo ne doit pas depassez les 255 caracrtères";
				}
			} else {
				$erreur = "Tous les champs doivent être complétés";
			}
		}

		?>

<center>

		<form method="POST" action="">
			<table>
				<tr>
					<td align="right">
						<label for='pseudo'>Votre Pseudo  &nbsp; &nbsp; :   &nbsp; &nbsp;  </label><input type="text" name="pseudo" placeholder="Votre pseudo" id="pseudo" value="<?php if (isset($pseudo)) {
																																						echo $pseudo;
																																					} ?>">
					</td>
				</tr>


				<tr>
					<td align="right">
						<label for='mail'>Votre Mail  &nbsp; &nbsp; :  &nbsp; &nbsp; </label><input type="email" name="mail" placeholder="Votre mail" id="mail" value="<?php if (isset($mail)) {
																																			echo $mail;
																																		} ?>">
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for='mail2'> Confirmer Votre Mai &nbsp; &nbsp;  : &nbsp; &nbsp;  </label><input type="email" name="mail2" placeholder="Confirmer Votre Mail" id="mail2" value="<?php if (isset($mail2)) {
																																									echo $mail2;
																																								} ?>">
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for='mdp'>Votre Mot De Passe  &nbsp; &nbsp; : &nbsp; &nbsp; </label><input type="password" name="mdp" placeholder="Votre Mot De Passe" id="mdp">
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for='mdp2'>Confirmer Votre Mot De Passe &nbsp; &nbsp;  :  &nbsp; &nbsp; </label><input type="password" name="mdp2" placeholder="Confirmer Votre Mot De Passe" id="mdp2">
					</td>
				</tr>
				<tr>
					<td align="center"> <br>
						<input type="submit" name="forminscription" value="Je m'inscris" />
					</td>
				</tr>
			</table>
		</form>
	</div>
	</center>

	<?php

	if (isset($erreur)) {
		echo $erreur;
	}


	?>

<br>
<center><button type="button" class="btn btn-secondary"><a href="connexion.php"> Se Connecter</a> </button></center>


	  
   </body>
</html>
