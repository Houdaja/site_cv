<?php require '../connexion/connexion.php'; ?>

<?php 
session_start();
if(isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté'){//si la personne est connecté 
    //et la valeur est bien celle de la page authentification
        $id_utilisateur=$_SESSION['id_utilisateur'];
        $prenom=$_SESSION['prenom'];
        $nom=$_SESSION['nom'];
        //echo $_SESSION['connexion']; vérification de la connexion
}else{//l'utilisateur n'est pas connecté
        header('location:authentification.php');
}

//pour se déconnecter
if(isset($_GET['deconnect'])){
    $_SESSION['connexion'] = ''; //on vide les variables de session
    $_SESSION['id_utilisateur'] = '';
    $_SESSION['prenom'] = '';
    $_SESSION['nom'] = '';

    unset($_SESSION['connexion']);//on supprime cette variable

    session_destroy();//on detruit la session

    header('location:../index.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">   
    <script src="https://use.fontawesome.com/30a190e011.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title><?php echo $_SESSION['prenom'].' ' .$_SESSION['nom'];?> - Developpeur & Integrateur Web</title>

</head>

<body>
<header>
        
        <h1 id="espaceAdmin">Espace administratif du site CV</h1>
        <div id="navb">
            <nav id="navbar">
                <ul>
                    <li><a href="utilisateur.php">Profil</a></li>
                    <li><a href="experience.php">Experiences</a></li>
                    <li><a href="formation.php">Formations</a></li>
                    <li><a href="competence.php">Compétences</a></li>
                    <li><a href="realisation.php">Réalisations</a></li>
                    <li><a href="authentification.php">Authentification</a></li>
                </ul>
            </nav>    
        </div>
    </header>
    


</body>
</html>