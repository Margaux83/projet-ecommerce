<?php
  require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/app/connexionPDO.php');
class Purchase
{
  public $_id, $_id_items, $_taille, $_quantite;

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
  public function getId_items() { return $this->_id_items; }
  public function getTaille() { return $this->_taille; }
  public function getQuantite() { return $this->_quantite; }



  public function setId($id) {
      if ($id >= 0 && $id <= 10) {
          $this->_id = $id;
      } //else { $this->setMessage('Champs incorrect','index.php'); }
  }

  public function setId_items($id_items) {
      if ($id_items >= 0 && $id_items <= 10) {
          $this->_id_items = $id_items;
      } //else { $this->setMessage('Champs incorrect','index.php'); }
  }

  public function setTaille($taille) {
      if (is_string($taille) && strlen($taille) <= 30) {
          $this->_taille = $taille;
      } //else { $this->setMessage('Champs incorrect','index.php'); }
  }

  public function setQuantite($quantite) {
      if ($quantite >= 0 && $quantite <= 10) {
          $this->_quantite = $quantite;
      } //else { $this->setMessage('Champs incorrect','index.php'); }
  }


  public function setMessage($message, $page) {
    $_SESSION['message'] = $message;
    header("location: /snowboarding/$page");
  }

}

class Commande extends Purchase  //la classe Direction est une classe fille qui va hériter des valeurs contenues dans la classe mère User
{

  public $_id_user, $_lieu, $_num_carte, $_code_secu, $_expiMois, $_expiAnnee;

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

public function getId_user() { return $this->_id_user; }
public function getLieu() { return $this->_lieu; }
public function getNum_carte() { return $this->_num_carte; }
public function getCode_secu() { return $this->_code_secu; }
public function getExpiMois() { return $this->_expiMois; }
public function getExpiAnnee() { return $this->_expiAnnee; }

  public function setId_user($id_user){
    if ($id_user >= 0 && $id_user <= 10) {
        $this->_id_user = $id_user;
    }
  }

  public function setLieu($lieu) {
      if (is_string($lieu) && strlen($lieu) <= 30) {
          $this->_lieu = $lieu;
      }
  }

  public function setNum_carte($num_carte) {
        $this->_num_carte = $num_carte;
  }

  public function setCode_secu($code_secu) {
        $this->_code_secu = $code_secu;
  }

  public function setExpiMois($expiMois) {
      if (is_string($expiMois) && strlen($expiMois) <= 30) {
          $this->_expiMois = $expiMois;
      } 
  }

  public function setExpiAnnee($expiAnnee) {
          $this->_expiAnnee = $expiAnnee;
  }
}

?>
