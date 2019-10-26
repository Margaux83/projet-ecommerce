<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/app/connexionPDO.php');
class itemsManager{

  public function __construct()
  {

  }
  ////////////////////////////////////////////////   PARTIE SHOP   //////////////////////////////////////////////////

  //Requête qui permet d'afficher tous les articles de la table items
  public function afficheAllItems() {
    $pdo=new connexionpdo();

    $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items");
    $prepare->execute();
    $m = $prepare->fetchAll();
    return $m;
}

//Requête qui permet d'afficher un seul article en fonction de son ID
  public function afficheOneItems($donnees) {
    $pdo=new connexionpdo();
    $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items WHERE ID = ?");
    $prepare->execute([
      $donnees
    ]);
    $result = $prepare->fetchAll();
    return $result;
  }

//Requête qui permet d'afficher les articles qui possèdent la même catégorie
  public function afficheSameCategoryItems($donnees) {
    $pdo=new connexionpdo();
    $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items WHERE Categorie IN (Select Categorie From items WHERE ID = ?)");
    $prepare->execute([
      $donnees
    ]);
    $result = $prepare->fetchAll();
    return $result;
  }

  //Requête qui permet d'afficher les articles qui possèdent la même catégorie
    public function afficheSameCategoryItemsCount($donnees) {
      $pdo=new connexionpdo();
      $prepare = $pdo->pdo_start()->prepare("SELECT Count(*) as total FROM items WHERE Categorie IN (Select Categorie From items WHERE ID = ?)");
      $prepare->execute([
        $donnees
      ]);
      $result = $prepare->fetchAll();
      return $result;
    }

  //Requête qui permet d'afficher les articles de catégorie "t-shirt"
  public function afficheTshirtItems() {
    $pdo=new connexionpdo();
    $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Categorie = 'T-shirt' ");
    $prepare->execute();
    $result = $prepare->fetchAll();
    return $result;

  }

  //Requête qui permet d'afficher les articles de catégorie "pantalon"
  public function affichePantalonItems() {
    $pdo=new connexionpdo();
    $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Categorie = 'Pantalon' ");
    $prepare->execute();
    $result = $prepare->fetchAll();
    return $result;

  }

  //Requête qui permet d'afficher les articles de catégorie "chaussures"
  public function afficheChaussuresItems() {
    $pdo=new connexionpdo();
    $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Categorie = 'Chaussures' ");
    $prepare->execute();
    $result = $prepare->fetchAll();
    return $result;

  }

  //Requête qui permet d'afficher les articles de catégorie "accessoire"
  public function afficheAccessoiresItems() {
    $pdo=new connexionpdo();
    $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Categorie = 'Accessoire' ");
    $prepare->execute();
    $result = $prepare->fetchAll();
    return $result;

  }

//Fonction qui permet d'afficher les articles soldés
  public function afficheSoldeItems() {
    $pdo=new connexionpdo();
    $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Solde = 1 ");
    $prepare->execute();
    $result = $prepare->fetchAll();
    return $result;

  }

  //Fonction qui permet d'afficher tous les articles par prix dans l'ordre décroissant
  public function afficheAllItemsDesc() {
    $pdo=new connexionpdo();

    $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items ORDER BY Prix DESC ");
    $prepare->execute();
    $m = $prepare->fetchAll();
    return $m;
}

//Fonction qui permet d'afficher tous les articles par prix dans l'ordre croissant
public function afficheAllItemsAsc() {
  $pdo=new connexionpdo();

  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items ORDER BY Prix ASC");
  $prepare->execute();
  $m = $prepare->fetchAll();
  return $m;
}

//Fonction qui permet d'afficher les articles de catégorie "t-shirt" par prix dans l'odre décroissant
public function afficheTshirtItemsDesc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Categorie = 'T-shirt' ORDER BY Prix DESC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles de catégorie "t-shirt" par prix dans l'odre croissant
public function afficheTshirtItemsAsc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Categorie = 'T-shirt' ORDER BY Prix ASC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles de catégorie "pantalon" par prix dans l'odre décroissant
public function affichePantalonItemsDesc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Categorie = 'Pantalon' ORDER BY Prix DESC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles de catégorie "pantalon" par prix dans l'odre croissant
public function affichePantalonItemsAsc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Categorie = 'Pantalon' ORDER BY Prix ASC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles de catégorie "chaussures" par prix dans l'odre décroissant
public function afficheChaussuresItemsDesc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Categorie = 'Chaussures' ORDER BY Prix DESC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles de catégorie "chaussures" par prix dans l'odre croissant
public function afficheChaussuresItemsAsc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Categorie = 'Chaussures' ORDER BY Prix ASC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles de catégorie "accessoire" par prix dans l'odre décroissant
public function afficheAccessoiresItemsDesc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Categorie = 'Accessoire' ORDER BY Prix DESC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles de catégorie "accessoire" par prix dans l'odre croissant
public function afficheAccessoiresItemsAsc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Categorie = 'Accessoire' ORDER BY Prix ASC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles soldés par prix soldé dans l'odre décroissant
public function afficheSoldeItemsDesc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Solde = 1 ORDER BY Prix_solde DESC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles soldés par prix soldé dans l'odre croissant
public function afficheSoldeItemsAsc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Solde = 1 ORDER BY Prix_solde ASC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

////////////////////////////////////////////////  FIN PARTIE SHOP   //////////////////////////////////////////////////

////////////////////////////////////////////////   PARTIE HOMME   //////////////////////////////////////////////////

//Fonction qui permet d'afficher tous les articles pour homme de la table items
public function afficheAllItemsHomme() {
  $pdo=new connexionpdo();

  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items WHERE Sexe = 'Homme'");
  $prepare->execute();
  $m = $prepare->fetchAll();
  return $m;
}

//Fonction qui permet d'afficher les articles pour homme qui possèdent la même catégorie
public function afficheSameCategoryItemsHomme($donnees) {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items WHERE Sexe = 'Homme' AND Categorie IN (Select Categorie From items WHERE ID = ?)");
  $prepare->execute([
    $donnees
  ]);
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles pour homme de catégorie "t-shirt"
public function afficheTshirtHommeItems() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Homme' AND Categorie = 'T-shirt' ");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;

}

//Fonction qui permet d'afficher les articles pour homme de catégorie "pantalon"
public function affichePantalonHommeItems() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Homme' AND Categorie = 'Pantalon' ");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;

}

//Fonction qui permet d'afficher les articles pour homme de catégorie "chaussures"
public function afficheChaussuresHommeItems() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Homme' AND Categorie = 'Chaussures' ");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;

}

//Fonction qui permet d'afficher les articles pour homme soldés
public function afficheSoldeHommeItems() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Homme' AND Solde = 1 ");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;

}

//Fonction qui permet d'afficher tous les articles pour homme par prix dans l'ordre décroissant
public function afficheAllItemsHommeDesc() {
  $pdo=new connexionpdo();

  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items WHERE Sexe = 'Homme' ORDER BY Prix DESC ");
  $prepare->execute();
  $m = $prepare->fetchAll();
  return $m;
}

//Fonction qui permet d'afficher tous les articles pour homme par prix dans l'ordre croissant
public function afficheAllItemsHommeAsc() {
$pdo=new connexionpdo();

$prepare = $pdo->pdo_start()->prepare("SELECT * FROM items WHERE Sexe = 'Homme' ORDER BY Prix ASC");
$prepare->execute();
$m = $prepare->fetchAll();
return $m;
}

//Fonction qui permet d'afficher les articles pour homme de catégorie "t-shirt" par prix dans l'odre décroissant
public function afficheTshirtHommeItemsDesc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Homme' AND Categorie = 'T-shirt' ORDER BY Prix DESC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles pour homme de catégorie "t-shirt" par prix dans l'odre croissant
public function afficheTshirtHommeItemsAsc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Homme' AND Categorie = 'T-shirt' ORDER BY Prix ASC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles pour homme de catégorie "pantalon" par prix dans l'odre décroissant
public function affichePantalonHommeItemsDesc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Homme' AND Categorie = 'Pantalon' ORDER BY Prix DESC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles pour homme de catégorie "pantalon" par prix dans l'odre croissant
public function affichePantalonHommeItemsAsc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Homme' AND Categorie = 'Pantalon' ORDER BY Prix ASC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles pour homme de catégorie "chaussures" par prix dans l'odre décroissant
public function afficheChaussuresHommeItemsDesc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Homme' AND Categorie = 'Chaussures' ORDER BY Prix DESC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles pour homme de catégorie "chaussures" par prix dans l'odre croissant
public function afficheChaussuresHommeItemsAsc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Homme' AND Categorie = 'Chaussures' ORDER BY Prix ASC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles pour homme soldés par prix soldé dans l'odre décroissant
public function afficheSoldeItemsHommeDesc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Homme' AND Solde = 1 ORDER BY Prix_solde DESC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles pour homme soldés par prix soldé dans l'odre croissant
public function afficheSoldeHommeItemsAsc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Homme' AND Solde = 1 ORDER BY Prix_solde ASC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

////////////////////////////////////////////////   FIN PARTIE HOMME   //////////////////////////////////////////////////

////////////////////////////////////////////////   PARTIE FEMME   //////////////////////////////////////////////////

//Fonction qui permet d'afficher tous les articles pour femme de la table items
public function afficheAllItemsFemme() {
  $pdo=new connexionpdo();

  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items WHERE Sexe = 'Femme'");
  $prepare->execute();
  $m = $prepare->fetchAll();
  return $m;
}

//Fonction qui permet d'afficher les articles pour femme qui possèdent la même catégorie
public function afficheSameCategoryItemsFemme($donnees) {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items WHERE Sexe = 'Femme' AND Categorie IN (Select Categorie From items WHERE ID = ?)");
  $prepare->execute([
    $donnees
  ]);
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles pour femme de catégorie "t-shirt"
public function afficheTshirtFemmeItems() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Femme' AND Categorie = 'T-shirt' ");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;

}

//Fonction qui permet d'afficher les articles pour femme de catégorie "pantalon"
public function affichePantalonFemmeItems() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Femme' AND Categorie = 'Pantalon' ");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;

}

//Fonction qui permet d'afficher les articles pour femme de catégorie "chaussures"
public function afficheChaussuresFemmeItems() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Femme' AND Categorie = 'Chaussures' ");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;

}

//Fonction qui permet d'afficher les articles pour femme soldés
public function afficheSoldeFemmeItems() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Femme' AND Solde = 1 ");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;

}

//Fonction qui permet d'afficher tous les articles pour femme par prix dans l'ordre décroissant
public function afficheAllItemsFemmeDesc() {
  $pdo=new connexionpdo();

  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items WHERE Sexe = 'Femme' ORDER BY Prix DESC ");
  $prepare->execute();
  $m = $prepare->fetchAll();
  return $m;
}

//Fonction qui permet d'afficher tous les articles pour femme par prix dans l'ordre croissant
public function afficheAllItemsFemmeAsc() {
$pdo=new connexionpdo();

$prepare = $pdo->pdo_start()->prepare("SELECT * FROM items WHERE Sexe = 'Femme' ORDER BY Prix ASC");
$prepare->execute();
$m = $prepare->fetchAll();
return $m;
}

//Fonction qui permet d'afficher les articles pour femme de catégorie "t-shirt" par prix dans l'odre décroissant
public function afficheTshirtFemmeItemsDesc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Femme' AND Categorie = 'T-shirt' ORDER BY Prix DESC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles pour femme de catégorie "t-shirt" par prix dans l'odre croissant
public function afficheTshirtFemmeItemsAsc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Femme' AND Categorie = 'T-shirt' ORDER BY Prix ASC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles pour femme de catégorie "pantalon" par prix dans l'odre décroissant
public function affichePantalonFemmeItemsDesc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Femme' AND Categorie = 'Pantalon' ORDER BY Prix DESC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles pour femme de catégorie "pantalon" par prix dans l'odre croissant
public function affichePantalonFemmeItemsAsc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Femme' AND Categorie = 'Pantalon' ORDER BY Prix ASC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles pour femme de catégorie "chaussures" par prix dans l'odre décroissant
public function afficheChaussuresFemmeItemsDesc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Femme' AND Categorie = 'Chaussures' ORDER BY Prix DESC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles pour femme de catégorie "chaussures" par prix dans l'odre croissant
public function afficheChaussuresFemmeItemsAsc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Femme' AND Categorie = 'Chaussures' ORDER BY Prix ASC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles pour femme soldés par prix soldé dans l'odre décroissant
public function afficheSoldeItemsFemmeDesc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Femme' AND Solde = 1 ORDER BY Prix_solde DESC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

//Fonction qui permet d'afficher les articles pour femme soldés par prix soldé dans l'odre croissant
public function afficheSoldeFemmeItemsAsc() {
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where Sexe = 'Femme' AND Solde = 1 ORDER BY Prix_solde ASC");
  $prepare->execute();
  $result = $prepare->fetchAll();
  return $result;
}

////////////////////////////////////////////////   FIN PARTIE FEMME   //////////////////////////////////////////////////

////////////////////////////////////////////////   PARTIE RECHERCHE   //////////////////////////////////////////////////

//Fonction qui permet de rechercher un article en fonction de sa ctégorie, de sa couleur, du genre de l'utilisateur, de sa description ou de son titre
public function RechercheItems() {
  $pdo=new connexionpdo();

  $search = strtolower($_GET['search']);
  $prepare = $pdo->pdo_start()->prepare("SELECT * FROM items Where lower(Categorie) LIKE '%".$search."%' OR lower(Couleur) LIKE'%".$search."%' OR lower(Sexe) LIKE '%".$search."%' OR lower(Description) LIKE '%".$search."%' OR lower(Titre) LIKE '%".$search."%'");
  $prepare->execute(array('search'=>$search,'search'=>$search,'search'=>$search,'search'=>$search,'search'=>$search));
  $result = $prepare->fetchAll();
  return $result;
}
////////////////////////////////////////////////   FIN PARTIE RECHERCHE   //////////////////////////////////////////////////
}
?>
