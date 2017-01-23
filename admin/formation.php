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
<?php //Insertion d'une formation
if(isset($_POST['titre_f'])){ // On vérife si on a creer une nouvelle experience
    if($_POST['titre_f']!= '' && $_POST['sous_titre_f']!=''  && $_POST['dates_f']!= '' &&  $_POST['description_f']!= ''){//si experience n'est pas vide
    $titre_f = addslashes($_POST['titre_f']);
    $sous_titre_f = addslashes($_POST['sous_titre_f']);
    $dates_f= addslashes($_POST['dates_f']);
    $description_f= addslashes($_POST['description_f']);
    
   $pdoCV->exec(" INSERT INTO t_formations VALUES (NULL,'$titre_f', '$sous_titre_f' , '$dates_f', '$description_f', '1') ");
        header("location:../admin/formation.php");
        exit();
    }// on ferle le if
}//on ferme le isset

/*pour supprimer une formation*/
if(isset($_GET['delete'])){
    $sql = 'DELETE FROM t_formations WHERE id_formation = "' . $_GET['delete'] . '"';
    $resultat = $pdoCV -> query($sql);
    header('location: formation.php');
}

?> 
<?php include'haut.php';?>
            <div class="contenuPrincipal">
                <h2 class="h2">Les formations</h2>         
                <?php
                $sql = $pdoCV->query("SELECT * FROM t_formations");
                $sql->execute();
                $nbr_formation = $sql->rowCount();//compte les lignes
                ?>
                <p class="nbr">Ci-dessous <?php echo $nbr_formation; ?> formation</p>
                <form action="formation.php" method="post">
                    <fieldset>
                    <legend>Insertion d'une nouvelle formation </legend>
                        <table class="table-bordered">
                            <tr>                    
                                <td>Titre formation</td> 
                                <td><input type="text" name="titre_f" size="50" value="" required></td>                           
                            </tr>
                            <tr>
                                <td>Sous-Titre formation</td> 
                                <td><input type="text" name="sous_titre_f" value="" size="50"  required></td>                           
                            </tr>
                            <tr>    
                                <td>Date</td> 
                                <td><input type="text" name="dates_f" value="" size="50"  required></td>                           
                            </tr>
                            <tr>
                                <td>Description</td> 
                                <td><textarea id="editor1" name="description_f" value="" size="100" cols="80" rows="10" required></textarea>
                                <script>CKEDITOR.replace('editor1');</script></td>                          
                            </tr>                
                            <tr>
                                <td colspan="2"><input type="submit" value"Insérer une formation"></td>
                            </tr>
                        </table>
                    </fieldset>               
                </form>

                <table class="table-bordered">
                    <caption>Liste des formations</caption>
                    <tr>
                        <th>Titre experience</th>
                        <th>Sous-titre experience</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th colspan="2">Opérations</th>
                    </tr>
                    <tr>
                        <?php while($resultat = $sql->fetch()){ ?>
                        
                    </tr>
                    <tr>
                        <td><?php echo $resultat['titre_f']; ?></td>                      
                        <td><?php echo $resultat['sous_titre_f']; ?></td>
                        <td><?php echo $resultat['dates_f']; ?></td>                 
                        <td><?php echo $resultat['description_f']; ?></td>                                   
                        <td><a href="formation.php?delete=<?php echo $resultat['id_formation'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td><br><!-- POUR SUPPRIMER LA LIGNE A FAIRE -->
                        <td><a href="modif_formation.php?id_formation=<?php echo $resultat['id_formation'];?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></td><!-- POUR SUPPRIMER LA LIGNE A FAIRE -->
                    </tr>
                    <?php };?>
                </table>
            </div>
           <?php include'bas.php';?>
  