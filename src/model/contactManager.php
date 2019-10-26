<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/app/connexionPDO.php');
class contactManager{

  public function __construct()
  {

  }

// Fonction permettant d'envoyer un message à l'administrateur du site
  public function addMsg(Contact $infos) {

    $pdo=new connexionpdo();
    $requete = $pdo->pdo_start()->prepare('INSERT INTO Contact (Nom, Email, Sujet, Message)  VALUES (:nom, :email, :sujet, :msg)');
  $requete->execute(array(
   'nom'=>$infos->getNom(),
   'email'=>$infos->getEmail(),
   'sujet'=>$infos->getSujet(),
   'msg'=>$infos->getMsg()));
   session_start();
   $_SESSION['message']='Votre message a été envoyé avec succès';
   header('location: /snowboarding/src/view/contact.php');

  }

  // Fonction permettant d'afficher les messages envoyés à l'administrateur
  public function afficherMsg() {
    $pdo=new connexionpdo();
    $prepare = $pdo->pdo_start()->prepare("SELECT * FROM contact");
    $prepare->execute();
    $result = $prepare->fetchAll();
    return $result;
  }

  public function setMessage($message, $page) {
    session_start();
  $_SESSION['message'] = $message;
  header("location: /snowboarding/$page");
  }
  public function getMessage() {
  if(isset($_SESSION['message'])) { ?>
          <br><div class="alert alert-primary alert-dismissible fade show text-center offset-4 col-md-4 " role="alert">
              <strong><?php echo $_SESSION['message']; ?></strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <?php unset($_SESSION['message']);
  }
  }
}
?>
