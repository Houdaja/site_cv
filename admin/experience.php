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
if(isset($_POST['titre_e'])){ // On vérife si on a creer une nouvelle experience
    if($_POST['titre_e']!= '' && $_POST['sous_titre_e']!= ''  && $_POST['dates_e']!= '' && $_POST['description_e']!= '' && $_POST['img_e']!='' 
    ){//si experience n'est pas vide
    $titre_e = addslashes($_POST['titre_e']);
    $sous_titre_e = addslashes($_POST['sous_titre_e']);
    $dates_e = addslashes($_POST['dates_e']);
    $description_e = addslashes($_POST['description_e']);
    $img_e = addslashes($_POST['img_e']);
    
    
   $insert = $pdoCV->exec(" INSERT INTO t_experiences VALUES (NULL,'$titre_e', '$sous_titre_e' , '$dates_e', '$description_e', $img_e', '1') ");
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
<?php include'haut.php';?>

            <div class="contenuPrincipal">
                <h2 class="h2">Les expériences</h2>         
                <?php
                $sql = $pdoCV->query("SELECT * FROM t_experiences");
                $sql->execute();
                $nbr_experience = $sql->rowCount();//compte les lignes
                ?>
                <p class="nbr">Vous avez <?php echo $nbr_experience; ?> experiences dans votre base de donnée.</p>
                <form action="experience.php" method="post" action="experience.php">
                    <fieldset>
                    <legend>Insertion d'une nouvelle experience </legend>
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
                                <td><textarea id="editor1" name="description_e" value="" size="100" cols="80" rows="10" required></textarea>
                                <script>CKEDITOR.replace('editor1');</script></td>                          
                            </tr>
                            <tr>
                                <td>Logo</td> 
                                <td><input type="text" name="img_e" value="" size="50"  required>
                              </td>                          
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value"Insérer une experience"></td>
                            </tr>
                        </table>
                    </fieldset>               
                </form>

                <table border="2" width="500">
                    <caption>Liste des expériences</caption>
                    <tr>
                        <th>Titre experience</th>
                        <th>Sous-titre experience</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Logo</th>
                        <th>Utilisateur_id</th>
                        <th colspan="2">Opérations</th>
                    </tr>
                    <tr>
                        <?php while($resultat = $sql->fetch()){ ?>
                        
                    </tr>
                    <tr>
                        <td><?php echo $resultat['titre_e']; ?></td>                      
                        <td><?php echo $resultat['sous_titre_e']; ?></td>
                        <td><?php echo $resultat['dates_e']; ?></td>                 
                        <td><?php echo $resultat['description_e']; ?></td>                   
                        <td><?php echo $resultat['img_e']; ?></td>                   
                        <td><?php echo $resultat['utilisateur_id']; ?></td>                  
                        <td><a href="experience.php?delete=<?php echo $resultat['id_experience'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td><br><!-- POUR SUPPRIMER LA LIGNE A FAIRE -->
                        <td><a href="modif_experience.php?id_experience=<?php echo $resultat['id_experience'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td><!-- POUR SUPPRIMER LA LIGNE A FAIRE -->
                    </tr>
                    <?php };?>
                </table>
            </div>
           <?php include'bas.php';?>
  