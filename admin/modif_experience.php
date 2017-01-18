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
//Mise a jour d'une experience 


if(isset($_POST['titre_e'])){

	$titre_e = addslashes($_POST['titre_e']);
	$sous_titre_e = addslashes($_POST['sous_titre_e']);
	$dates_e = addslashes($_POST['dates_e']);
	$description_e = addslashes($_POST['description_e']);
	$id_experience = $_POST['id_experience'];
	$utilisateur_id = $_POST['utilisateur_id'];

	$pdoCV-> exec("UPDATE t_experiences SET titre_e='$titre_e', sous_titre_e='$sous_titre_e', 
		dates_e='$dates_e', description_e='$description_e' WHERE id_experience='$id_experience'");

		header('location:../admin/experience.php');//Le header pr revenir a la lste des experiences de l'utilisateur
		exit();

}
// Je récupère l'experience
$id_experience = $_GET['id_experience']; //par l'id_experience et $_GET
$sql = $pdoCV -> query("SELECT * FROM t_experiences WHERE id_experience = '$id_experience'");
$ligne_experience = $sql->fetch();
?>	
<?php include'haut.php';?>	
	<div class="contenuPrincipal">
		<h2 class="h2"> Les expériences | modification </h2>	
		<div>
			<form action="modif_experience.php" method="POST">
				<legend>Modifier le champ souhaité : </legend>
				<table width="200px" border="">
                    <tr>                    
                        <td>Titre experience</td> 
                        <td><input type="text" name="titre_e" value="<?= $ligne_experience['titre_e']; ?>" required></td>                           
                    </tr>
                    <tr>
                        <td>Sous-Titre experience</td> 
                        <td><input type="text" name="sous_titre_e" value="<?= $ligne_experience['sous_titre_e']; ?>" required></td>                           
                    </tr>        
					<tr>    
                        <td>Date</td> 
                        <td><input type="text" name="dates_e" value="<?= $ligne_experience['dates_e']; ?>" required></td>                           
                    </tr>		
					<tr>
                        <td>Description</td> 
                        <td><textarea id="editor1" size="100" cols="80" rows="10" name="description_e" required><?= $ligne_experience['description_e']; ?></textarea>
						<script>CKEDITOR.replace('editor1');</script>
                        </td>

                    </tr>			
					<tr>
                        <td>utilisateur_id</td> 
                        <td><input hidden name="utilisateur_id" value="<?= $ligne_experience['utilisateur_id']; ?>" ></td>                           
                    </tr>
                    
				</table>
                    	
					<input hidden name="id_experience" value="<?= $ligne_experience['id_experience']; ?>">
					<input type="submit" value="mettre à jour">
                    		
			</form>
		</div>						
	</div>


<?php include'bas.php';?>
