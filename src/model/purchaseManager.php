  <?php
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/app/connexionPDO.php');
class purchaseManager{

  public function __construct()
  {

  }

  // Fonction permettant d'ajouter un article dans le panier
  public function addInPanier($panier) {

    $pdo=new connexionpdo();
    $requete = $pdo->pdo_start()->prepare('INSERT INTO Panier (Id_items, Taille, Quantite)  VALUES (?, ?, ?)');
  $requete->execute(array(
    $_GET['id'],
   $panier->getTaille(),
   $panier->getQuantite()));
   session_start();
   $_SESSION['message']='Cet article a bien été ajouté à votre panier';
   header('location: /snowboarding/src/view/single.php?id='. $_GET['id'] .'');

  }

  // Fonction permettant d'afficher les informations des articles se trouvant dans le panier
  public function selectPanier(){

      $pdo=new connexionpdo();

      $requete = $pdo->pdo_start()->prepare('SELECT * FROM panier INNER JOIN items ON items.ID=panier.Id_items');
    $requete->execute();
    $result = $requete->fetchAll();
    return $result;
  }

  // Fonction permettant d'afficher le prix TTC
  public function selectTTC(){

      $pdo=new connexionpdo();
      $req = $pdo->pdo_start()->prepare('SELECT * FROM reduction');
      $req->execute();
      $result = $req->fetchAll();
      if (isset($_POST['code'])) {
      if($_POST['code'] == $result[0]['Nom_promo']){
        $requete = $pdo->pdo_start()->prepare('SELECT Quantite, Prix, ROUND((SUM(Prix * Quantite)*1.2)*0.75, 2) as TTC FROM panier INNER JOIN items ON items.ID=panier.Id_items');
      $requete->execute();
      $ttc = $requete->fetchAll();
      return $ttc;

      }
      if($_POST['code'] == $result[1]['Nom_promo']){
        $requete = $pdo->pdo_start()->prepare('SELECT Quantite, Prix, ROUND((SUM(Prix * Quantite)*1.2)*0.50, 2) as TTC FROM panier INNER JOIN items ON items.ID=panier.Id_items');
      $requete->execute();
      $ttc = $requete->fetchAll();
      return $ttc;
      }
      if($_POST['code'] == $result[2]['Nom_promo']){
        $requete = $pdo->pdo_start()->prepare('SELECT Quantite, Prix, ROUND((SUM(Prix * Quantite)*1.2)*0.90, 2) as TTC FROM panier INNER JOIN items ON items.ID=panier.Id_items');
      $requete->execute();
      $ttc = $requete->fetchAll();
      return $ttc;
      }
    }
    else{
      $requete = $pdo->pdo_start()->prepare('SELECT Quantite, Prix, ROUND(SUM(Prix * Quantite)*1.2, 2) as TTC FROM panier INNER JOIN items ON items.ID=panier.Id_items');
    $requete->execute();
    $ttc = $requete->fetchAll();
    return $ttc;
  }
  }

  // Fonction permettant de compter les articles du panier
  public function countItemPanier(){

      $pdo=new connexionpdo();
      $requete = $pdo->pdo_start()->prepare('SELECT COUNT(*) as NbreItem FROM panier');
    $requete->execute();
    $ttc = $requete->fetchAll();
    return $ttc;
  }

  // Fonction permettant de supprimer un article du panier
  public function deleteItemPanier($donnees){

      $pdo=new connexionpdo();
      $requete = $pdo->pdo_start()->prepare("DELETE FROM panier WHERE Id_items = ?");
    $requete->execute([$donnees]);
    $result = $requete->fetchAll();
    return $result;
  }

  // Fonction permettant d'ajouter un aricle dans la liste des articles sauvegardés
  public function addInWishlist($wishlist) {

    $pdo=new connexionpdo();
    $requete = $pdo->pdo_start()->prepare('INSERT INTO Wishlist (Id_items)  VALUES (?)');
  $requete->execute(array(
    $_GET['id']));
     session_start();
   $_SESSION['message']='Cet article a été ajouté à votre wishlist';
   header('location: /snowboarding/src/view/single.php?id='. $_GET['id'] .'');

  }

  // Fonction permettant d'afficher les informations sur les articles se trouvant dans la liste des articles sauvegardés
  public function selectWishlist(){

      $pdo=new connexionpdo();
      $requete = $pdo->pdo_start()->prepare('SELECT * FROM wishlist INNER JOIN items ON items.ID=wishlist.Id_items');
    $requete->execute();
    $result = $requete->fetchAll();
    return $result;
  }

  // Fonction permettant de commander le ou les articles se trouvant dans le panier
  public function addInAchat($commande) {
    $pdo=new connexionpdo();


      $requete= $pdo->pdo_start()->prepare("SELECT Id_items, Taille, Quantite FROM panier");
      $requete->execute();
      $result = $requete->fetchAll();

for ($i=0; $i < count($result) ; $i++) {
  $req= $pdo->pdo_start()->prepare("INSERT INTO achat (Id_user, Lieu, ExpiMois, ExpiAnnee, Code_secu, Num_carte, Id_items, Taille, Quantite)  VALUES (:Id_user, :Lieu, :ExpiMois, :ExpiAnnee, :Code_secu, :Num_carte, :Id_items, :Taille, :Quantite)");


  $req->execute(array(
    "Id_user" => $_COOKIE['id'],
    "Lieu" => $commande->getLieu(),
    "ExpiMois" => $commande->getExpiMois(),
    "ExpiAnnee" => $commande->getExpiAnnee(),
    "Code_secu" => $commande->getCode_secu(),
    "Num_carte" => $commande->getNum_carte(),
    "Id_items" => $result[$i]['Id_items'],
    "Taille" => $result[$i]['Taille'],
    "Quantite" => $result[$i]['Quantite']
  ));
}

}

// Fonction permettant de supprimer les articles se trouvant dans le panier
  public function deleteAllPanier(){

    $pdo=new connexionpdo();
    $requete = $pdo->pdo_start()->prepare("DELETE FROM panier");
    $requete->execute();
    $result = $requete->fetchAll();
    return $result;
  }

  // Fonction permettant d'afficher les articles commander par l'utilisateur
  public function selectCommande(){

      $pdo=new connexionpdo();
      $requete = $pdo->pdo_start()->prepare('SELECT * FROM achat INNER JOIN inscription ON achat.Id_user=inscription.Id INNER JOIN items ON achat.Id_items=items.Id');
    $requete->execute();
    $result = $requete->fetchAll();
    return $result;
  }

  // Fonction permettant de supprimer un article de la liste des articles commander
  public function deleteItemAchat($donnees){

      $pdo=new connexionpdo();
      $requete = $pdo->pdo_start()->prepare("DELETE FROM achat WHERE Id_items = ?");
    $requete->execute([$donnees]);
    $result = $requete->fetchAll();
    return $result;
  }

  public function setMessage($message, $page) {
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
