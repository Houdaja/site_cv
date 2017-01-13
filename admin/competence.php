<?php require '../connexion/connexion.php';?> 


<!-- if(isset($_POST['competence'])){ // On vérife si on a creer une nouvelle compétence
    if($_POST['competence']!= ''){//si comptence n'est pas vide
    $competence = addslashes($_POST['competence']);*/

    //Pour inserer une nouvelle compétence
    /* $insert = $pdoCv->query("INSERT INTO t_competences(id_competence,competences,id_utilisateur) VALUES('','$competence','1') ")*/
/*    $insert = $pdoCV->exec(" INSERT INTO t_competences VALUES (NULL,'$competence','1') ");
        header("location:../admin/competence.php");
         exit();      
    }// on ferle le if
}//on ferme le isset
*/

//pour supprimer une compétence
/*if(isset($_GET['delete'])){
    $sql = 'DELETE FROM t_competences WHERE id_competence = "' . $_GET['delete'] . '"';
    $resultat = $pdoCV -> query($sql);
    header('location: competence.php');
}
?>
*/ -->

<html lang="fr">
    <head>
    <meta charset="utf-8">
    <?php $sql = $pdoCV->query("SELECT * FROM t_utilisateur");
     $resultat = $sql->fetch();
    ?>
    <title><?php echo $resultat['prenom'].' ' .$resultat['nom'];?> - Compétences </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
        <body>
            <header>
            <!-- faire une entete -->
            </header>

            <div id="">
            <h1 id="competence">Les compétences</h1>
               <!--  <h2>Connexion : déconnexion</h2> -->
               <?php //include("admin_menu.php"); ?><!-- FAUT CREER LA PAGE MENU -->
            </div>
            <div id="contenuPrincipal">
                <div>
                    <form action="competence.php" method="post">
                        <table>
                            <tr>
                                <td id="t_competence">Compétences</td>
                                <td><input type="text" name="competence" id="competence" size="50" required></td>                           
                            </tr>
                            <tr>
                                <td>Niveau</td>
                                <td><input type="text" name="niveau" id="niveau" size="50" required></td>                           
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value"Insérer une compétences"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>

            <?php
            $sql = $pdoCV->query("SELECT * FROM t_competences");
            $sql->execute();
            $nbr_comptences = $sql->rowCount();//affiche et compte les compétences
            ?>
            <p>Il y a <?php echo $nbr_comptences; ?> compétences</p><!-- affiche les compétences -->
            <table border="2" width="500">
                <caption>Liste des compétences</caption>
                <thead>
                    <th>compétences</th><br>
                    <th>suppresion</th>
                </thead>
                <tr>
                    <?php while($resultat = $sql->fetch()){ ?>
                    <td><?php echo $resultat['competence']; ?></td>
                    <td><a href="?delete=<?php echo $resultat['id_competence'];?>">suppr</a></td><!--lien qui envoi la supprision de la ligne -->
                </tr>
                <?php };?>
            </table>
                
            

           <footer>
               <!-- faire le include du footer -->
           </footer>
        </body>
    </html>