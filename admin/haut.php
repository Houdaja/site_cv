<?php require '../connexion/connexion.php'; ?>


<?php
        $sql = $pdoCV->query("SELECT * FROM t_utilisateur");
        $resultat = $sql->fetch();?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">   
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://use.fontawesome.com/30a190e011.js"></script>
	<script src="../ckeditor/ckeditor.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Glegoo' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title><?php echo $resultat['prenom'].' ' .$resultat['nom'];?> - Developpeur & Integrateur Web</title>

</head>

<body>
<header>
            <div class="conteneur_header">
                <div class="logo">
                    <a href="#">
                        <img src="images/logo_blanc.png" alt="logo" />
                    </a>
                </div>
                <h1><?php echo $resultat['prenom'].' ' .$resultat['nom'].'<br>';?>
            Developpeuse & Integratrice Web</h1>
                <div class="clear"></div>
                <nav>
                     <ul>
                    <li><a href="utilisateur.php">Profil</a></li>
                    <li><a href="experience.php">Experiences</a></li>
                    <li><a href="formation.php">Formations</a></li>
                    <li><a href="competence.php">Compétences</a></li>
                    <li><a href="autreCompetences.php">Autre Compétences</a></li>
                    <li><a href="realisation.php">Réalisations</a></li>
                    <li><a href="index.php?deconnect">Déconnexion</a></li>                                    
                </ul>
                    <div class="clear"></div>
                </nav>
            </div>
        </header>







