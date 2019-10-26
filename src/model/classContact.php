<?php
require_once ('../app/connexionPDO.php');
class Contact
{
  public $_id, $_nom, $_email, $_sujet, $_msg;

public function __construct(array $donnees)
{
  $this->hydrate($donnees);
}

  // Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value)
    {
      // On récupère le nom du setter correspondant à l'attribut.
      $method = 'set'.ucfirst($key);

      // Si le setter correspondant existe.
      if (method_exists($this, $method))
      {
        // On appelle le setter.
        $this->$method($value);
      }
    }
  }

  public function getId() { return $this->_id; }
  public function getNom() { return $this->_nom; }
  public function getEmail() { return $this->_email; }
  public function getSujet() { return $this->_sujet; }
  public function getMsg() { return $this->_msg; }



  public function setId($id) {
      if ($id >= 0 && $id <= 10) {
          $this->_id = $id;
      }
  }

  public function setNom($nom) {
      if (is_string($nom) && strlen($nom) <= 30) {
          $this->_nom = $nom;
      }
  }

  public function setEmail($email) {
      if (is_string($email) && strlen($email) <= 40) {
          $this->_email = $email;
      }
  }

  public function setSujet($sujet) {
      if (is_string($sujet) && strlen($sujet) <= 30) {
          $this->_sujet = $sujet;
      }
  }

  public function setMsg($msg) {
          $this->_msg = $msg;
  }

  public function setMessage($message, $page) {
    $_SESSION['message'] = $message;
    header("location: /snowboarding/$page");
  }

}
?>
