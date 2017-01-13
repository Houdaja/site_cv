<?php require '../connexion/connexion.php'; ?>

<!-- Récupere les information de la table t_utilisateur -->
<?php
        $sql = $pdoCV->query("SELECT * FROM t_utilisateur");
        $resultat = $sql->fetch();?>

<!DOCTYPE html>
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
            echo '<div class="identite">' .$resultat['prenom'].' '.$resultat['nom'].'<br/>'.$resultat['adresse'].'<br/>'
            .$resultat['ville'].' '.$resultat['code_postal'].'<br/>'.'<a href="mailto:'. $resultat['email'] .'">'. 
            $resultat['email'] .'</a><br/> '.$resultat['telephone'].' '.'<br/></div>';
            ?>
    </div>

</body>
</html>