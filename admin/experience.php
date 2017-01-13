<?php require '../connexion/connexion.php'; 

if(isset($_POST['titre_e'])){ // On vérife si on a creer une nouvelle experience
    if($_POST['titre_e']!= '' && $_POST['sous_titre_e']!= ''  && $_POST['dates_e']!= '' && $_POST['description_e']!= ''  
    && $_POST['competence_id']!= '' && $_POST['utilisateur_id']){//si experience n'est pas vide
    $titre_e = addslashes($_POST['titre_e']);
   	$sous_titre_e = addslashes($_POST['sous_titre_e']);
   	$dates_e = addslashes($_POST['dates_e']);
    $description_e = addslashes($_POST['description_e']);
    $competence_id = addslashes($_POST['competence_id']);
   	$t_utilisateur_id = addslashes($_POST['utilisateur_id']);
    
    $pdoCV->exec(" INSERT INTO t_experiences VALUES (NULL,'$titre_e', '$sous_titre_e' , '$dates_e', '$description_e', '$competence_id','$utilisateur_id') ");
        header("location:../admin/experience.php");
        exit();
    }// on ferle le if
}//on ferme le isset

if(isset($_GET['delete'])){
    $sql = 'DELETE FROM t_experiences WHERE id_experience = "' . $_GET['delete'] . '"';
    $resultat = $pdoCV -> query($sql);
    header('location: experience.php');
}


/*if(isset($_GET['modifier'])){
    $sql = 'UPDATE t_experiences SET titre_e='$titre_e', sous_titre_e='$titre_e', dates_e='$dates_e', description_e='$description_e', competence_id='$competence_id', 
    utilisateur_id='$utilisateur_id' WHERE id_experience = "' . $_GET['modifier'] . '"';
    $resultat = $pdoCV->query($sql);
}
*/


/*
UPDATE t_experiences SET titre_e = titre WHERE t_experiences = id_experience= 12;*/

/*if(isset($_GET['modifier'])){
    $sql='UPDATE FROM t_experiences WHERE id_experience = "' . $_GET['modifier'] . '"';
    $resultat = $pdoCV -> query($sql);
    
}*/
?>


<html lang="fr">
    <head>
    <meta charset="utf-8">
    <!-- requete pour affciher la tabe t_utilisateur -->
    <?php $sql = $pdoCV->query("SELECT * FROM t_utilisateur");
     $resultat = $sql->fetch();
    ?>
    <!-- requete pour afficher la table t_experiences-->
    <?php 
     $sql = $pdoCV->query("SELECT * FROM t_experiences"); 
     $resultat2 = $sql->fetch();?>


    <title><?php echo $resultat['prenom'].' ' .$resultat['nom'];?> - Experiences</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>

        <body>
        	<header>
            <!-- faire une entete -->
      		</header>
      		<h1 id="experience">Les experiences</h1>
            <div id="">
                <h2>Connexion : déconnexion</h2>
               <?php //include("admin_menu.php"); ?><!-- FAUT CREER LA PAGE MENU -->
            </div>

            <div id="contenuPrincipal">
                <div>
                    <form action="experience.php" method="post" action="experience.php">
                        <table>
                            
                            <tr>
                                <td>Titre experience</td> 
                                <td><input type="text" name="titre_e" size="50" value="<?= $resultat2['titre_e']?>" required></td>                           
                            </tr>
                            <tr>
                                <td>Sous-Titre experience</td> 
                                <td><input type="text" name="sous_titre_e"  size="50" value="<?= $resultat2['sous_titre_e']?>" required></td>                           
                            </tr>
                            <tr>	
                            	<td>Date</td> 
                                <td><input type="text" name="dates_e"  size="50" value="<?= $resultat2['dates_e']?>" required></td>                           
                            </tr>
                            <tr>
                                <td>Description</td> 
                                <td><input type="text" name="description_e" size="50" value="<?= $resultat2['description_e']?:$resultat2['description_e']?>"required></td>                           
                            </tr>
                            <tr>
                                <td>compétence_id</td> 
                                <td><input type="text" name="competence_id" id="competence_id" value="<?= $resultat2['competence_id']?>"required></td>                           
                            </tr>
                            <tr>
                                <td>utilisateur_id</td> 
                                <td><input type="text" name="utilisateur_id" id="utilisateur_id" value="<?= $resultat2['utilisateur_id']?:$resultat2['utilisateur_id']?>"    required></td>                           
                            </tr>

                      

                            <tr>
                                <td colspan="2"><input type="submit" value"Insérer une experience"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>

            <?php
            $sql = $pdoCV->query("SELECT * FROM t_experiences");
            $sql->execute();
            $nbr_experience = $sql->rowCount();//compte les lignes
            ?>
            <p>Il y a <?php echo $nbr_experience; ?> experience</p>
            <table border="2" width="500">
                <caption>Liste des experience</caption>
                <thead>
                    <th>Experiences</th><br>
                    <th>Suppression</th>
                </thead>
                <tr>
                    <?php while($resultat = $sql->fetch()){ ?>
                    <td><?php echo $resultat['titre_e']; ?></td>
                    <td><?php echo $resultat['sous_titre_e']; ?></td>
                    <td><?php echo $resultat['dates_e']; ?></td>
                    <td><?php echo $resultat['description_e']; ?></td>
                    <td><?php echo $resultat['competence_id']; ?></td>
                    <td><?php echo $resultat['utilisateur_id']; ?></td>
                    
                    <td><a href="experience.php?delete=<?php echo $resultat['id_experience'];?>">suppr</a></td><!-- POUR SUPPRIMER LA LIGNE A FAIRE -->
                    <td><a href="experience.php?modifier=<?php echo $resultat['id_experience'];?>">modif</a></td><!-- POUR SUPPRIMER LA LIGNE A FAIRE -->
                </tr>
                <?php };?>
            </table>
                
            

           <footer>
               <!-- faire le include du footer -->
           </footer>
        </body>
    </html>