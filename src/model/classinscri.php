<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/app/connexionPDO.php');
class Inscription
{
  public $_id, $_nom, $_prenom, $_email, $_mdp, $_newmdp, $_adresse, $_ville, $_codep, $_pays, $_numero;

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
  public function nom() { return $this->_nom; }
  public function prenom() { return $this->_prenom; }
  public function email() { return $this->_email; }
  public function mdp() { return $this->_mdp; }
  public function newmdp() { return $this->_newmdp; }
  public function adresse() { return $this->_adresse; }
  public function ville() { return $this->_ville; }
  public function codep() { return $this->_codep; }
  public function pays() { return $this->_pays; }
  public function numero() { return $this->_numero; }

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

  public function setPrenom($prenom) {
      if (is_string($prenom) && strlen($prenom) <= 30) {
          $this->_prenom = $prenom;
      } 
  }

  public function setEmail($email) {
      if (is_string($email) && strlen($email) <= 30) {
          $this->_email = $email;
      }
  }

  public function setMdp($mdp) {
      if (is_string($mdp) && strlen($mdp) <= 50) {
          $this->_mdp = md5($mdp);
      }
  }
  public function setNewmdp($newmdp) {
      if (is_string($newmdp) && strlen($newmdp) <= 30) {
          $this->_newmdp = $newmdp;
      }
  }

  public function setAdresse($adresse) {
          $this->_adresse = $adresse;
  }

  public function setVille($ville) {
      if (is_string($ville) && strlen($ville) <= 30) {
          $this->_ville = $ville;
      } //else { $this->setMessage('Champs incorrect','index.php'); }
  }

  public function setCodep($codep) {
        $this->_codep = $codep;
  }

  public function setPays($pays) {
      if (is_string($pays) && strlen($pays) <= 30) {
          $this->_pays = $pays;
      } //else { $this->setMessage('Champs incorrect','index.php'); }
  }
  public function setNumero($numero) {
        $this->_numero = $numero;
  }

  public function setMessage($message, $page) {
      $_SESSION['message'] = $message;
      header("location: /snowboarding/$page");
  }

  public function setPopUp($popup, $page) {
      $_SESSION['popup'] = $popup;
      header("location: /snowboarding/$page");
  }

}
?>
