<?php require '../connexion/connexion.php'; 

if(isset($_POST['titre_e'])){ // On vérife si on a creer une nouvelle experience
    if($_POST['titre_e']!= '' && $_POST['sous_titre_e']!= ''  && $_POST['dates_e']!= '' && $_POST['description_e']!= ''  
    && $_POST['competence_id']!= '' && $_POST['utilisateur_id']){//si experience n'est pas vide
    $titre_e = addslashes($_POST['titre_e']);
   	$sous_titre_e = addslashes($_POST['sous_titre_e']);
   	$dates_e = addslashes($_POST['dates_e']);
    $description_e = addslashes($_POST['description_e']);
   	$t_utilisateur_id = addslashes($_POST['utilisateur_id']);
    
   $insert = $pdoCV->exec(" INSERT INTO t_experiences VALUES (NULL,'$titre_e', '$sous_titre_e' , '$dates_e', '$description_e','$utilisateur_id') ");
        header("location:../admin/experience.php");
        exit();
    }// on ferle le if
}//on ferme le isset

if(isset($_GET['delete'])){
    $sql = 'DELETE FROM t_experiences WHERE id_experience = "' . $_GET['delete'] . '"';
    $resultat = $pdoCV -> query($sql);
    header('location: experience.php');
}

?>

<html lang="fr">
    <head>
    <meta charset="utf-8">
    <!-- requete pour affciher la tabe t_utilisateur -->
    <?php $sql = $pdoCV->query("SELECT * FROM t_utilisateur");
     $resultat = $sql->fetch();
    ?>
    


    <title><?php echo $resultat['prenom'].' ' .$resultat['nom'];?> - Experiences</title>
    <script src="https://use.fontawesome.com/30a190e011.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>

        <body>
        	<header>
            <!-- faire une entete -->
      		</header>
      		<h1 id="experience">Mes experiences</h1>
            <div id="">
             
               <?php //include("admin_menu.php"); ?><!-- FAUT CREER LA PAGE MENU -->
            </div>

            <div id="contenuPrincipal">
                <form action="experience.php" method="post" action="experience.php">
                    <table width="200px" border="">
                        <tr>                    
                            <td>Titre experience</td> 
                            <td><input type="text" name="titre_e" size="50" value="" required></td>                           
                        </tr>
                        <tr>
                            <td>Sous-Titre experience</td> 
                            <td><input type="text" name="sous_titre_e" value="" size="50"  required></td>                           
                        </tr>
                        <tr>    
                            <td>Date</td> 
                            <td><input type="text" name="dates_e" value="" size="50"  required></td>                           
                        </tr>
                        <tr>
                            <td>Description</td> 
                            <td><input type="text" name="description_e" value="" size="50" required></td>                           
                        </tr>
                        <tr>
                            <td>utilisateur_id</td> 
                            <td><input type="text" name="utilisateur_id" value="" required></td>                           
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value"Insérer une experience"></td>
                        </tr>
                    </table>
                </form>               
            </div>

            <?php
            $sql = $pdoCV->query("SELECT * FROM t_experiences");
            $sql->execute();
            $nbr_experience = $sql->rowCount();//compte les lignes
            ?>
            <p>Il y a <?php echo $nbr_experience; ?> experience</p>
            <table border="2" width="500">
                <caption>Liste des experiences</caption>
                <tr>
                    <th>Titre experience</th>
                    <th>Sous-titre experience</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Utilisateur_id</th>
                    <th colspan="2">Opérations</th>
                </tr>
                <tr>
                    <?php while($resultat = $sql->fetch()){ ?>
                    
                </tr>
                    <td><?php echo $resultat['titre_e']; ?></td>                      
                    <td><?php echo $resultat['sous_titre_e']; ?></td>
                    <td><?php echo $resultat['dates_e']; ?></td>                 
                    <td><?php echo $resultat['description_e']; ?></td>                   
                    <td><?php echo $resultat['utilisateur_id']; ?></td>                  
                    <td><a href="experience.php?delete=<?php echo $resultat['id_experience'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td><br><!-- POUR SUPPRIMER LA LIGNE A FAIRE -->
                    <td><a href="modif_experience.php?id_experience=<?php echo $resultat['id_experience'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td><!-- POUR SUPPRIMER LA LIGNE A FAIRE -->
                </tr>
                <?php };?>
            </table>
           <footer>
               <!-- faire le include du footer -->
           </footer>
        </body>
    </html>