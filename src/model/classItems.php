<?php

class Items
{
  public $_id, $_categorie, $_couleur, $_sexe, $_prix, $_image1, $_image2, $_image3, $_image4, $_solde;

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
  public function getCategorie() { return $this->_categorie; }
  public function getCouleur() { return $this->_couleur; }
  public function getSexe() { return $this->_sexe; }
  public function getPrix() { return $this->_prix; }
  public function getImage1() { return $this->_image1; }
  public function getImage2() { return $this->_image2; }
  public function getImage3() { return $this->_image3; }
  public function getImage4() { return $this->_image4; }
  public function getSolde() { return $this->_solde; }

  public function setId($id) {
      if ($id >= 0 && $id <= 10) {
          $this->_id = $id;
      }
  }

  public function setCategorie($categorie) {
      if (is_string($categorie) && strlen($categorie) <= 70) {
          $this->_categorie = $categorie;
      }
  }

  public function setCouleur($couleur) {
      if (is_string($couleur) && strlen($couleur) <= 70) {
          $this->_couleur = $couleur;
      }
  }

  public function setSexe($sexe) {
      if (is_string($sexe) && strlen($sexe) <= 70) {
          $this->_sexe = $sexe;
      }
  }

  public function setPrix($prix) {
      if ($prix >= 0 && $prix <= 10) {
          $this->_prix = $prix;
      }
  }

  public function setImage1($image1) {
      if (is_string($image1) && strlen($image1) <= 70) {
          $this->_image1 = $image1;
      }
  }

  public function setImage2($image2) {
      if (is_string($image2) && strlen($image2) <= 70) {
          $this->_image2 = $image2;
      }
  }

  public function setImage3($image3) {
      if (is_string($image3) && strlen($image3) <= 70) {
          $this->_image3 = $image3;
      }
  }

  public function setImage4($image4) {
      if (is_string($image4) && strlen($image4) <= 70) {
          $this->_image4 = $image4;
      }
  }

  public function setSolde($solde) {
          $this->_solde = $solde;
  }

  public function setMessage($message, $page) {
      $_SESSION['message'] = $message;
      header("location: /snowboarding/$page");
  }

}
?>
