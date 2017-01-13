<?php require '../connexion/connexion.php'; ?>

<html lang="fr">
    <head>
    <meta charset="utf-8">
    <title><?php echo $resultat['prenom'].' ' .$resultat['nom'];?> - Developpeur & Integrateur Web</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>

        <body>
        	<header>
      		</header>

      		<div id="mainContent">
      		<h1 id="espaceAdmin">Espace administratif du site CV</h1>
            <?php
            $sql = $pdoCV->query("SELECT * FROM t_utilisateur");
            $resultat = $sql->fetch();
            echo '<div class="identite">';
            echo '<p>N°id : '.$resultat['id_utilisateur'].'<p/>';
            echo $resultat['mdp'].'<br/>';
            echo $resultat['etat_civil'].' '.$resultat['prenom'].' '.$resultat['nom'].'<br>';
            echo $resultat['pseudo'].'<br/>';
            echo $resultat['avatar'].'<br/>';
            echo '<p>Née le '.$resultat['date_naissance'].'***'.$resultat['age'].' ans<p/><br/>';
            echo $resultat['sexe'].'<br/>';
            echo $resultat['statut_marital'].'<br/>';
            echo $resultat['email'].'<br/>';
            echo $resultat['telephone'].'<br/>';
            echo $resultat['adresse'].'<br/>';
            echo $resultat['code_postal'].'<br/>';
            echo $resultat['ville'].'<br/>';
            echo $resultat['pays'].'<br/>';
            echo $resultat['note'].'<br/>';
            '</div>';


            ?>

		
      		</div>

        </body>
    </html>