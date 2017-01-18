<?php require '../connexion/connexion.php'; ?>


<?php
        $sql = $pdoCV->query("SELECT * FROM t_utilisateur");
        $resultat = $sql->fetch();?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">   
    <script src="https://use.fontawesome.com/30a190e011.js"></script>
	<script src="../ckeditor/ckeditor.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title><?php echo $resultat['prenom'].' ' .$resultat['nom'];?> - Developpeur & Integrateur Web</title>

</head>

<body>
    <header>
    	<div class="nom">
    		<p><?php echo $resultat['prenom'].' ' .$resultat['nom'].'<br>';?>
    		Developpeuse & Integratrice Web</p>	
    	</div>
    	<h1 id="espaceAdmin">Espace administratif du site CV</h1>
        <div id="navb">
            <nav id="navbar">
                <ul>
                    <li><a href="utilisateur.php">Profil</a></li>
                    <li><a href="experience.php">Experiences</a></li>
                    <li><a href="formation.php">Formations</a></li>
                    <li><a href="competence.php">Compétences</a></li>
                    <li><a href="realisation.php">Réalisations</a></li>
                    <li><a href="index.php?deconnect">Déconnexion</a></li>                                    
                </ul>
            </nav>    
        </div>
    </header>



