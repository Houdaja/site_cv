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

if(isset($_POST['titre_f'])){

	$titre_f = addslashes($_POST['titre_f']);
	$sous_titre_f = addslashes($_POST['sous_titre_f']);
	$dates_f = addslashes($_POST['dates_f']);
	$description_f = addslashes($_POST['description_f']);
	$id_formation = $_POST['id_formation'];

	$pdoCV-> exec("UPDATE t_formations SET titre_f='$titre_f', sous_titre_f='$sous_titre_f', 
		dates_f='$dates_f', description_f='$description_f' WHERE id_formation='$id_formation'");

		header('location:../admin/formation.php');//Le header pr revenir a la lste des experiences de l'utilisateur
		exit();

}
// Je récupère l'experience
$id_formation = $_GET['id_formation']; //par l'id_experience et $_GET
$sql = $pdoCV -> query("SELECT * FROM t_formations WHERE id_formation = '$id_formation'");
$ligne_formation = $sql->fetch();
?>
<?php include'haut.php';?>
		
	<div class="contenuPrincipal">
		<h2 class="h2"> Les formations | modification </h2>	
		<div>
			<form action="modif_formation.php" method="POST">
				<legend>Modifier le champ souhaité : </legend>
				<table width="200px" border="">
                    <tr>                    
                        <td>Titre formation</td> 
                        <td><input type="text" name="titre_f" value="<?= $ligne_formation['titre_f']; ?>" required></td>                           
                    </tr>
                    <tr>
                        <td>Sous-Titre formation</td> 
                        <td><input type="text" name="sous_titre_f" value="<?= $ligne_formation['sous_titre_f']; ?>" required></td>                           
                    </tr>        
					<tr>    
                        <td>Date</td> 
                        <td><input type="text" name="dates_f" value="<?= $ligne_formation['dates_f']; ?>" required></td>                           
                    </tr>		
					<tr>
                        <td>Description</td> 
                        <td><textarea id="editor1" size="100" cols="80" rows="10" name="description_f" required><?= $ligne_formation['description_f']; ?></textarea>
						<script>CKEDITOR.replace('editor1');</script>
                        </td>

                    </tr>			
					
                    
				</table>
                    	
					<input hidden name="id_formation" value="<?= $ligne_formation['id_formation']; ?>">
					<input type="submit" value="mettre à jour">
                    		
			</form>
		</div>						
	</div>


<?php include'bas.php';?>
