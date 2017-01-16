<?php require '../connexion/connexion.php'; ?>

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
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset "utf-8">

	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<form action="modif_competence.php" method="POST">
		<table width="200px" border="1">
			<tr>
				<th>Modification d'une compétence</th>				
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
	<!-- Fin du form modification -->
</body>
</html>
