<?php require '../connexion/connexion.php'; ?>

<?php

session_start();

if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'connecté'){//Si la personne est connecté et la valeur est bien celle de la page d'authentification
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $prenom = $_SESSION['prenom'];
    $nom = $_SESSION['nom'];
}else{// l'utilisateur n'est pas connecté
    header('location:authentification.php');
}

if(isset($_GET['deconnect'])){
    
    $_SESSION['connexion']= ''; // on vide les variables de session
    $_SESSION['id_utilisateur']= '';
    $_SESSION['prenom']= '';
    $_SESSION['nom']= '';

    unset($_SESSION['connexion']);// on supprime cette variable

    session_destroy();// on détruit la session
    header('location:../index.php');
}
?>
<?php include'haut.php';?>
<?php include'bas.php';?>