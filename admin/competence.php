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
<?php //insersion d'une compétence
if(isset($_POST['competence'])){ // On vérife si on a creer une nouvelle compétence
    if($_POST['competence']!= ''){//si comptence n'est pas vide
    $competence = addslashes($_POST['competence']);
    $niveau = addslashes($_POST['niveau']);

    //Pour inserer une nouvelle compétence
    /* $insert = $pdoCv->query("INSERT INTO t_competences(id_competence,competences,id_utilisateur) VALUES('','$competence','1') ")*/
    $insert = $pdoCV->exec(" INSERT INTO t_competences VALUES (NULL,'$competence', '$niveau', '1') ");
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
<?php include'haut.php';?>
        <div class="contenuPrincipal">           
            <h2 class="h2">Les compétences</h2>            
            <?php
            $sql = $pdoCV->query("SELECT * FROM t_competences");
            $sql->execute();
            $nbr_comptences = $sql->rowCount();//affiche et compte les compétences
            ?>
            <p class="nbr">Vous avez <?php echo $nbr_comptences; ?> compétences dans votre base de donnée.</p><!-- affiche les compétences -->
            <div>
                <form class="form-inline" action="competence.php" method="post"> 
                    <fieldset>
                    <legend>Insertion d'une nouvelle compétence  </legend><br>
                    <label>Compétence</label>
                    <input type="text" name="competence" id="competence" size="20" required>                          
                    <Label>Niveau</label>
                    <input type="text" name="niveau" id="niveau" size="20" required>                          
                    <input type="submit" value"Insérer une compétences"><br><br>
                    </fieldset>       
                </form>
            </div>
         

            <table class="table-bordered">
                <caption>Liste des compétences</caption>
                <tr>
                    <th>Compétences</th>
                    <th>Niveau</th>
                    <th colspan="2">Opérations</th>
                </tr>
                <tr>
                    <?php while($resultat = $sql->fetch()){ ?>
                    <td><?php echo $resultat['competence']; ?></td>
                    <td><?php echo $resultat['niveau']; ?></td>
                    <td><a href="?delete=<?php echo $resultat['id_competence'];?>"><i class="fa fa-trash" aria-hidden="true"></i>
                        </a></td><!--lien qui envoi la supprision de la ligne -->
                    <td><a href="modif_competence.php?id_competence=<?php echo $resultat['id_competence'];?>"><i class="fa fa-pencil" aria-hidden="true"></i>
                        </a></td><!--lien qui envoi la supprision de la ligne -->
                </tr>
                <?php };?>
            </table>
        </div>
                
            

<?php include'bas.php';?>