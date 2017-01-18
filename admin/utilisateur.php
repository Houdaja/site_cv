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



<?php include'haut.php';?>

      		<div class="">
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
            echo '<p>Née le '.$resultat['date_naissance'].'<br>'.$resultat['age'].' ans<p/><br/>';
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

<?php include'bas.php';?>