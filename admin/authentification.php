<?php require '../connexion/connexion.php'; ?>


<?php 	
session_start();//à mettre dans toutes les pages SESSION et identification
if(isset($_POST['connexion'])){//['connexion'] du name du submit du form ci dessous

	$pseudo=addslashes($_POST['pseudo']);
	$mdp=addslashes($_POST['mdp']);

	$sql = $pdoCV->prepare("SELECT * FROM t_utilisateur WHERE pseudo='$pseudo' AND mdp='$mdp'");//On vérifie le courriel et le mdp
    $sql-> execute();
    $nbr_utilisateur=$sql->rowCount();//on compte et s'il y est, le compte répond 1 sinon le compte répond 0 (est-ce le vra admin ou pas)

    	if($nbr_utilisateur==0){//on ne le trouve pas
    	$msg_connexion_err="Erreur d'authentification !";
    	}else{//on trouve l'email et le mdp c'est bien il est bien inscrit
    		$ligne = $sql->fetch();//pour retrouver son nom et prenom
    		
		$_SESSION['connexion'] = 'connecté';
		$_SESSION['id_utilisateur'] = $ligne['id_utilisateur'];
		$_SESSION['prenom'] = $ligne['prenom'];
		$_SESSION['nom'] = $ligne['nom'];

		header('location:index.php');//vers la page d'accueil de l'admin

	}

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

<body id="bodyAuthentif">
<div class="login">
	<h1>Veuillez vous identifier.</h1>
    <form  action="authentification.php" method="POST">		
			<input type="text" name="pseudo" placeholder="Rentrez votre pseudo" tabindex="1" size="35" aria-requierd="true">
			<input type="password" name="mdp" placeholder="Rentrez votre mot de passe"required tabindex="2" size="10" maxlength="50">     
        	<button type="submit" name="connexion" class="btn btn-primary btn-block btn-large" value="Me connecter">Connexion</button>
        	<p><a href="#">J'ai oublier mon mot de passe</a></p>
    </form>
</div>
</body>
</html>
