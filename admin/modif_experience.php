<?php require '../connexion/connexion.php'; ?>

<?php
//Mise a jour d'une experience 


if(isset($_POST['titre_e'])){

	$titre_e = addslashes($_POST['titre_e']);
	$sous_titre_e = addslashes($_POST['sous_titre_e']);
	$dates_e = addslashes($_POST['dates_e']);
	$description_e = addslashes($_POST['description_e']);
	$id_experience = $_POST['id_experience'];

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
<!DOCTYPE html>
<html>
<head>
	<?php
	$sql = $pdoCV->query("SELECT * FROM t_utilisateur") ;
	$ligne = $sql->fetch();
?>
	<title ><?php echo 'Expériences | ' . $ligne['nom'].''.$ligne['prenom']; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
	<div id="contenu">
		<header>
			<?php /*require("../admin/admin_menu.php");*/ ?>
		</header>
		<h1> Les expériences | modification </h1>
		<div id="menu">
			<h2>Connexion : déconnexion</h2>
		</div>

		<div id="contenuPrincipal">
			<div>
					<form action="modif_experience.php" method="POST">
					<label>Modification d'une experience</label>
						<input type="text" name="titre_e" value="<?= $ligne_experience['titre_e']; ?>" required>
						<input type="text" name="sous_titre_e" value="<?= $ligne_experience['sous_titre_e']; ?>" required>
						<input type="text" name="dates_e" value="<?= $ligne_experience['dates_e']; ?>" required>
						<input type="text" name="description_e" value="<?= $ligne_experience['description_e']; ?>" required>
						<input hidden name="id_experience" value="<?= $ligne_experience['id_experience']; ?>">
						<input type="submit" value="mettre à jour">
					</form>
			</div>
				
				<p> <?php echo $ligne_experience['id_experience']; ?>    </p>
		
		</div>

	</div>
</body>
</html>
