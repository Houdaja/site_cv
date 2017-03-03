<?php require '../connexion/connexion.php';?>
<?php 
$msg = array('errors' => true);
if($_POST){

    extract($_POST);

    if(!empty($nom) && !empty($email) && !empty($telephone) && !empty($objet) && !empty($message)){

        $resultat = $pdoCV -> prepare("INSERT INTO t_contact (nom, email, telephone, objet, message) VALUES (:nom, :email, :telephone, :objet, :message)");
        $resultat -> bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
        $resultat -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $resultat -> bindParam(':telephone', $_POST['telephone'], PDO::PARAM_STR);
        $resultat -> bindParam(':objet', $_POST['objet'], PDO::PARAM_STR);
        $resultat -> bindParam(':message', $_POST['message'], PDO::PARAM_STR);
       
        if($resultat -> execute()){

          $msg['errors'] = false;

          $msg['message'] = 'Merci votre demande à bien été enregistrée, je vous repond le plus rapidement possible.';
          /* header('location:../index.php');*/

        }

      
    }else{

      $msg['message'] = 'Veuillez saisir tous les champs du formulaire';
    }


}


echo json_encode($msg);



$resultat = $pdoCV -> prepare("SELECT * FROM t_contact ORDER BY id_contact DESC");
          $resultat -> execute();
          // je récupère un array avec toutes les infos du produit à modifier :
          $contact = $resultat -> fetch(PDO::FETCH_ASSOC);
        
 
        $id_contact =   (isset($contact['id_contact']))  ? $contact['id_contact'] : '';
        $nom =  (isset($contact['nom']))   ? $contact['nom'] : '';
        $email =  (isset($contact['email']))   ? $contact['email'] : '';
        $telephone =  (isset($contact['telephone']))   ? $contact['telephone'] : '';
        $objet =  (isset($contact['objet']))   ? $contact['objet'] : '';
        $messages =  (isset($contact['message']))   ? $contact['message'] : '';
        

$TO = "houdajaadar@gmail.com";

$h = "From: " .$nom. ' <' . $email . '>';

$message = "";

while (list($key, $val) = each($HTTP_POST_VARS)) {
$message .= "$key : $val\n";
}

mail($TO, $objet, $messages, $h);



?>

