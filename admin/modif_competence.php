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

<?php
//Gestion des contenus
//mise a jour d'une compétence
	if(isset($_POST['competence'])){// par le nom du premier input
		
		$competence = addslashes($_POST['competence']);
		$id_competence = $_POST['id_competence'];
		$pdoCV->exec("UPDATE t_competences SET competence='$competence' WHERE id_competence='$id_competence'");

			header('location: ../admin/competence.php'); //le header location pour revenir à la liste des compétences de l'utilisateur.
		exit();	
	}

//Je récupère la compétence.
$id_competence = $_GET['id_competence'];/// par l'id compétence et $_GET
$sql= $pdoCV->query("SELECT * FROM t_competences WHERE id_competence = '$id_competence' ");
$ligne_competence= $sql->fetch();

?>
<?php include'haut.php';?>
	<div class="contenuPrincipal">
	<h2 class="h2"> Les compétences | modification </h2>
		<form action="modif_competence.php" method="POST">
		<legend>Modifier le champ souhaité : </legend>
			<table class="tables" width="200px" border="1">
				<tr>
					<th>Compétence </th>				
					<td>	
					<input type="text" name="competence" size="50" value="<?php echo $ligne_competence['competence']; ?>" required>	
					<input hidden name="id_competence" value="<?php echo $ligne_competence['id_competence']; ?>">					
					</td>
				</tr>
				<tr>	
					<td colspan="2"><input type="submit" value="Mettre à jour"></td>
				</tr>	
			
			</table>
		</form>
	</div>
	<!-- Fin du form modification -->

<?php include'bas.php';?>