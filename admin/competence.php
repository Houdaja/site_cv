<?php require '../connexion/connexion.php'; 

if(isset($_POST['competence'])){ // On vérife si on a creer une nouvelle compétence
    if($_POST['competence']!= ''){//si comptence n'est pas vide
    $competence = addslashes($_POST['competence']);

    //Pour inserer une nouvelle compétence
    /* $insert = $pdoCv->query("INSERT INTO t_competences(id_competence,competences,id_utilisateur) VALUES('','$competence','1') ")*/
    $insert = $pdoCV->exec(" INSERT INTO t_competences VALUES (NULL,'$competence','1') ");
        header("location:../admin/competence.php");
         exit();      
    }// on ferle le if
}//on ferme le isset


//pour supprimer une compétence
if(isset($_GET['delete'])){
    $sql = 'DELETE FROM t_competences WHERE id_competence = "' . $_GET['delete'] . '"';
    $resultat = $pdoCV -> query($sql);
    header('location: competence.php');
}

?>

<html lang="fr">
    <head>
    <meta charset="utf-8">
    <?php $sql = $pdoCV->query("SELECT * FROM t_utilisateur");

     $resultat = $sql->fetch();

 ?>
    <title><?php echo $resultat['prenom'].' ' .$resultat['nom'];?> - Compétences </title>    
    <script src="https://use.fontawesome.com/30a190e011.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>

        <body>
        	<header>
            <!-- faire une entete -->
      		</header>
      		<h1 id="competence">Les compétences</h1>
            <div id="">
               <?php //include("admin_menu.php"); ?><!-- FAUT CREER LA PAGE MENU -->
            </div>

            <div id="contenuPrincipal">
                <div>
                    <form action="competence.php" method="post"> 
                        <fieldset>
                        <legend>Insertion d'une nouvelle compétence : </legend>
                        <input type="text" name="competence" id="competence" size="20" required>                          
                        <input type="submit" value"Insérer une compétences"><br><br>
                        </fieldset>       
                    </form>
                </div>
            </div>

            <?php
            $sql = $pdoCV->query("SELECT * FROM t_competences");
            $sql->execute();
            $nbr_comptences = $sql->rowCount();//affiche et compte les compétences
            ?>
            <p id="nbr">Ci-dessous <?php echo $nbr_comptences; ?> compétences </p><!-- affiche les compétences -->
            <table>
                <caption>Liste des compétences</caption>
                <tr>
                    <th>Compétences</th>
                    <th colspan="2">Opérations</th>
                </tr>
                <tr>
                    <?php while($resultat = $sql->fetch()){ ?>
                    <td><?php echo $resultat['competence']; ?></td>
                    <td><a href="?delete=<?php echo $resultat['id_competence'];?>"><i class="fa fa-trash" aria-hidden="true"></i>
                        </a></td><!--lien qui envoi la supprision de la ligne -->
                    <td><a href="modif_competence.php?id_competence=<?php echo $resultat['id_competence'];?>"><i class="fa fa-pencil" aria-hidden="true"></i>
                        </a></td><!--lien qui envoi la supprision de la ligne -->
                </tr>
                <?php };?>
            </table>
                
            

           <footer>
               <!-- faire le include du footer -->
           </footer>
        </body>
    </html>