<<?php   
require("../connexion/connexion.php");  

session_start();//à mettre dans toutes les pages SESSION et identification

if(isset($_POST['connexion'])){//['connexion'] du name du submit du form ci dessous
    $pseudo=addslashes($_POST['pseudo']);
    $mdp=addslashes($_POST['mdp']);

    $sql = $pdoCV->prepare("SELECT * FROM t_utilisateur WHERE pseudo='$pseudo' AND mdp='$mdp'");//On vérifie le courriel et le mdp
    $sql-> execute();
    $nbr_utilisateur=$sql->rowCount();//on compte et s'il y est, le compte répond 1 sinon le compte répond 0 (est-ce le vra admin ou pas)

    if($nbr_utilisateur==0){//on ne le trouve pas
        $msg_connexion_err="Erreur d'authentification !";

    }else{//on trouve l'email et le mdp c'estbien il est bien inscrit
        $ligne = $sql->fetch();//pour retrouver son nom et prenom
        $_SESSION['connexion'] = 'connecté';
        $_SESSION['id_utilisateur'] = $ligne['id_utilisateur'];
        $_SESSION['prenom'] = $ligne['prenom'];
        $_SESSION['nom'] = $ligne['nom'];

        header('location:index.php');//vers la page d'accueil de l'admin
    }
}
?>

<!DOCTYPE>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Site CV</title>
    <script src="https://use.fontawesome.com/30a190e011.js"></script>
    <link rel="stylesheet" type="text/css" href="css/styleAdmin.css">
</head>
<body>   
    <div class="login">
      <div class="login-triangle"></div>     
      <h2 class="login-header">ADMIN</h2>
      <form class="login-container" action="authentification.php" method="POST">
        <p><input type="text" placeholder="Pseudo" name="pseudo"></p>
        <p><input type="password" placeholder="Password" name="mdp"></p>
        <p><input id="valid" name="connexion" type="submit" tabindex="4" value="Me connecter" >
      </form>
    </div>
    <footer>
    </footer>
</body>
</html>
