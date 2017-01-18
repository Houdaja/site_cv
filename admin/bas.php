<?php require '../connexion/connexion.php'; ?>

 <?php $sql = $pdoCV->query("SELECT * FROM t_utilisateur");
 $resultat = $sql->fetch(); ?>


 
<footer>	
	<div>
		<p>Copyright © <?php echo DATE('Y').' - '.$resultat['prenom'].' ' .$resultat['nom'];?> </p>
	</div>
</footer>

</body>
</html>