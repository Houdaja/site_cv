<?php require("../connexion/connexion.php"); 
 
session_start(); 

// TRAITEMENT POUR SUPPRIMER UN utilisateur
if(isset($_GET['action']) && $_GET['action'] == 'suppression'){ // Si une action de supprimer un produit est demandée dans l'url : 
  $resultat = $pdoCV -> prepare('DELETE FROM t_utilisateur WHERE id_utilisateur = :id_utilisateur');
  $resultat -> bindParam(':id_utilisateur', $_GET['id'], PDO::PARAM_INT);
  $resultat -> execute();

  header('location:?action=affichageModification'); 
}

// TRAITEMENT POUR MODIFIER OU AJOUTER UN UTILISATEUR
if($_POST){

  if(isset($_GET['action']) && $_GET['action'] == 'affichageModification' && isset($_GET['id'])){

    $resultat = $pdoCV -> prepare("UPDATE t_utilisateur SET prenom = :prenom , nom = :nom, email = :email, telephone = :telephone, pseudo = :pseudo, mdp = :mdp, age = :age, statut_marital = :statut_marital, adresse = :adresse, code_postal = :code_postal, ville = :ville, pays = :pays, note = :note WHERE id_utilisateur = :id_utilisateur ");
    $resultat -> bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $resultat -> bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
    $resultat -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $resultat -> bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
    $resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $resultat -> bindParam(':mdp', $_POST['mdp'], PDO::PARAM_STR);
    $resultat -> bindParam(':age', $_POST['age'], PDO::PARAM_STR);
    $resultat -> bindParam(':statut_marital', $_POST['statut_marital'], PDO::PARAM_STR);
    $resultat -> bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);
    $resultat -> bindParam(':code_postal', $_POST['code_postal'], PDO::PARAM_STR);
    $resultat -> bindParam(':ville', $_POST['ville'], PDO::PARAM_STR);
    $resultat -> bindParam(':pays', $_POST['pays'], PDO::PARAM_STR);
    $resultat -> bindParam(':note', $_POST['note'], PDO::PARAM_STR);
    $resultat -> bindParam(':id_utilisateur', $_GET['id'], PDO::PARAM_INT);
    $resultat -> execute();

    header('location:?action=affichageModification');
  }else{
    $resultat = $pdoCV -> prepare("INSERT INTO t_utilisateur (nom, prenom, email, telephone, pseudo, mdp, age, statut_marital, adresse, code_postal, ville, pays, note) VALUES (:nom, :prenom, :email, :telephone, :pseudo, :mdp, :age, :statut_marital, :adresse, :code_postal, :ville, :note)");
    $resultat -> bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
    $resultat -> bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $resultat -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $resultat -> bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
    $resultat -> bindParam(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $resultat -> bindParam(':mdp', $_POST['mdp'], PDO::PARAM_STR);
    $resultat -> bindParam(':age', $_POST['age'], PDO::PARAM_STR);
    $resultat -> bindParam(':statut_marital', $_POST['statut_marital'], PDO::PARAM_STR);
    $resultat -> bindParam(':adresse', $_POST['adresse'], PDO::PARAM_STR);
    $resultat -> bindParam(':code_postale', $_POST['code_postale'], PDO::PARAM_STR);
    $resultat -> bindParam(':ville', $_POST['ville'], PDO::PARAM_STR);
    $resultat -> bindParam(':pays', $_POST['pays'], PDO::PARAM_STR);
    $resultat -> bindParam(':note', $_POST['note'], PDO::PARAM_STR);
   
    $resultat -> execute(); 

    header('location:?action=affichageModification');
  }  
}

$sql = $pdoCV->query("SELECT * FROM t_utilisateur");
$utilisateur = $sql->fetch();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Site Cv Information du profil</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/30a190e011.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Top Menu Items -->
      <ul class="nav navbar-right top-nav"> 
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $utilisateur['prenom'] . ' ' . $utilisateur['nom'] ;  ?> <b class="caret"></b></a>
          <ul class="dropdown-menu"> 
            <li>
              <a href="../index.php"><i class="fa fa-diamond" aria-hidden="true"></i> Accès au site</a>
            </li>                     
            <li>
              <a href="#"><i class="fa fa-fw fa-envelope"></i> Boite de réception</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="../connexion/deconnexion.php"><i class="fa fa-fw fa-power-off"></i> Déconnexion</a>
            </li>
          </ul>
        </li>
      </ul>


  <!-- Sidebar Menu -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li>
            <a href="index.php?action=affichageModification"><i class="fa fa-home"></i> Acceuil</a>
          </li>
          <li class="active">
            <a href="utilisateur.php?action=affichageModification"><i class="fa fa-address-card-o" aria-hidden="true"></i> Profil</a> 
          </li>
           <li>
            <a href="autreCompetences.php?action=affichageModification"><i class="fa fa-plus" aria-hidden="true"></i> Compétences numérique</a>
          </li>
          <li>
            <a href="competence.php?action=affichageModification"><i class="fa fa-cubes" aria-hidden="true"></i> Compétences</a>
          </li>
    
          <li>
            <a href="experience.php?action=affichageModification"><i class="fa fa-briefcase" aria-hidden="true"></i> Expériences</a> 
          </li>
          <li>
            <a href="formation.php?action=affichageModification"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Formations</a>
          </li>
          <li >
            <a href="loisir.php?action=affichageModification"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Centre d'intérêts</a>
          <li>
            <a href="contact.php?action=affichageModification"><i class="fa fa-commenting-o" aria-hidden="true"></i> Messages</a>
          </li>
        </ul>
      </div

    <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
      <div class="container-fluid">
        <!-- Page Heading -->

        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header"> Table t_utilisateur</h1>
            <ol class="breadcrumb">
              <li>
                <i class="fa fa-home" aria-hidden="true"></i>  <a href="index.php"> Acceuil</a>
              </li>
              <li class="active">
                <i class="fa fa-address-card-o" aria-hidden="true"></i> Profil
              </li>
            </ol>
          </div>
        </div>
        <!-- /.row -->
              
        <div class="row">
          <div class="col-lg-12">
            <h2>Table</h2>
            <div class="table-responsive">
<?php // AFFICHAGE
if(isset($_GET['action']) && $_GET['action'] == 'affichageModification'){ //Si une action est demandée via l'URL et que cette action c'est l'affichage.
$donnee = $pdoCV->query("SELECT * FROM t_utilisateur"); ?>

              <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th>Etat_civiil</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Pseudo</th>
                    <th>Mot de passe</th>
                    <th>Avatar</th>
                    <th>Age</th>
                    <th>Statut</th>
                    <th>Adresse</th>
                    <th>Code postale</th>
                    <th>Ville</th>
                    <th>Pays</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                  </tr>
                </thead>
                <tbody>

<?php while ( $utilisateur = $donnee -> fetch(PDO::FETCH_ASSOC ) ) {

        echo '<tr><td>'.$utilisateur['etat_civil'].'</td><td>'. $utilisateur['prenom'] . '</td><td>' . $utilisateur['nom'] . '</td><td>'. $utilisateur['email'] . '</td><td>' . $utilisateur['telephone'] . '</td><td>' . $utilisateur['pseudo']. '</td><td>' . $utilisateur['mdp']. '</td><td>' . $utilisateur['avatar']. '</td><td>' . $utilisateur['age']. '</td><td>' . $utilisateur['statut_marital']. '</td><td>' . $utilisateur['adresse']. '</td><td>' . $utilisateur['code_postal'] . '</td><td>' . $utilisateur['ville']. '</td><td>' . $utilisateur['pays']. '</td><td>' . $utilisateur['note']. '</td><td>';
        echo '<td><a href="?action=affichageModification&id='. $utilisateur['id_utilisateur'] .'"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>';
        echo '<td><a href="?action=suppression&id='. $utilisateur['id_utilisateur'] .'"><i class="fa fa-times" aria-hidden="true"></i></a></td>';
        echo '</tr>';
      }
      echo '</table>';        
} ?>
                                    
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.row -->

<?php if(isset($_GET['action']) && ($_GET['action'] == 'affichageModification')){
// Si une action est demandée dans l'URL et que cette action est soit "modification" SOIT "ajout" alors on va afficher le formulaire. 

        //Modification : j'ai un id_produit dans l'URL
        if(isset($_GET['id'])){ // S'il y a un id_produit dans l'url on est dans le cadre d'une modification et on récupère les infos de ce produit pour les insérer dans le formulaire. 
        $resultat = $pdoCV -> prepare("SELECT * FROM t_utilisateur WHERE id_utilisateur = :id_utilisateur");
        $resultat -> bindParam(':id_utilisateur', $_GET['id'], PDO::PARAM_INT);
        $resultat -> execute();
          // je récupère un array avec toutes les infos du produit à modifier : 
        $utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);
      }

      $id_utilisateur =   (isset($utilisateur['id_utilisateur']))  ? $utilisateur['id_utilisateur'] : '';
      $nom =  (isset($utilisateur['nom']))   ? $utilisateur['nom'] : '';
      $prenom =  (isset($utilisateur['prenom']))   ? $utilisateur['prenom'] : ''; 
      $email =  (isset($utilisateur['email']))   ? $utilisateur['email'] : ''; 
      $telephone =  (isset($utilisateur['telephone']))   ? $utilisateur['telephone'] : ''; 
      $pseudo =  (isset($utilisateur['pseudo']))   ? $utilisateur['pseudo'] : ''; 
      $mdp =  (isset($utilisateur['mdp']))   ? $utilisateur['mdp'] : '';  
      $age =  (isset($utilisateur['age']))   ? $utilisateur['age'] : '';   
      $etat_civil =  (isset($utilisateur['etat_civil']))   ? $utilisateur['etat_civil'] : ''; 
      $statut_marital =  (isset($utilisateur['statut_marital']))   ? $utilisateur['statut_marital'] : ''; 
      $adresse =  (isset($utilisateur['adresse']))   ? $utilisateur['adresse'] : ''; 
      $code_postal =  (isset($utilisateur['code_postal']))   ? $utilisateur['code_postal'] : ''; 
      $ville =  (isset($utilisateur['ville']))   ? $utilisateur['ville'] : ''; 
      $pays =  (isset($utilisateur['pays']))   ? $utilisateur['pays'] : ''; 
      $note =  (isset($utilisateur['note']))   ? $utilisateur['note'] : ''; 
     
      $bouton =     (isset($utilisateur['id_utilisateur']))        ? 'Modifier' : 'Enregistrer';;

//Ajout : je n'ai pas d'id_produit dans l'URL ?>


        <div class="row">
          <div class="col-lg-offset-3 col-lg-6">
            <h2>Formulaire d'ajout et de modification d'un utilisateur</h2>
            <form action="" method="post" enctype="multipart/form-data">

              <input type="hidden" name="id_utilisateur" value="<?= $id_utilisateur ?>" />

                <label>Etat_civil</label>
                <select class="form-control" name="etat_civil">
                  <option <?php echo ($etat_civil == 'm') ? 'selected' : ''; ?> value="m">Monsieur</option>
                  <option <?php echo ($etat_civil == 'mme') ? 'selected' : '';?> value="mme">Madame</option>                
                </select>

              <div class="form-group">
                <label>Nom :</label>
                <input class="form-control" placeholder="" type="text" name="nom" value="<?= $nom ?>"/>

                <label>Prénom : </label>
                <input class="form-control" placeholder="" type="text" name="prenom" value="<?= $prenom ?>"/>

                <label>Etat_civil : </label>
                <input class="form-control" placeholder="" type="text" name="etat_civil" value="<?= $etat_civil ?>"/>

                <label>Email : </label>
                <input class="form-control" placeholder="" type="text" name="email" value="<?= $email ?>"/>

                <label>Téléphone : </label>
                <input class="form-control" placeholder="" type="text" name="telephone" value="<?= $telephone ?>"/>

                <label>Pseudo : </label>
                <input class="form-control" placeholder="" type="text" name="pseudo" value="<?= $pseudo ?>"/>

                <label>Mot de passe : </label>
                <input class="form-control" placeholder="" type="text" name="mdp" value="<?= $mdp ?>"/>

                <label>Age : </label>
                <input class="form-control" placeholder="ex: 25" type="text" name="age" value="<?= $age ?>"/>


                <label>Adresse : </label>
                <textarea class="form-control" rows="3" type="text" name="adresse"><?= $adresse ?></textarea>

                <label>Code postal : </label>
                <input class="form-control" placeholder="" type="text" name="code_postal" value="<?= $code_postal ?>"/>

                <label>Ville : </label>
                <input class="form-control" placeholder="" type="text" name="ville" value="<?= $ville ?>"/>

                <label>Pays : </label>
                <input class="form-control" placeholder="" type="text" name="pays" value="<?= $pays ?>"/>

                <label>note : </label>
                <input class="form-control" placeholder="" type="text" name="note" value="<?= $note ?>"/>

                                                                
              </div>

              <button class="btn btn-primary col-md-offset-5 col-xs-offset-4"><?= $bouton ?></button>
            </form>
          </div>
        </div>

<?php   }?>

      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
  </div>
  <!-- /#wrapper -->

  <!-- jQuery -->
  <script src="js/jquery.js"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

</body>
</html>