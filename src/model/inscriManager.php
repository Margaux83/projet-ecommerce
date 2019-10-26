<?php
require_once($_SERVER["DOCUMENT_ROOT"].'/snowboarding/src/app/connexionPDO.php');
class inscriManager{

  public function __construct()
  {

  }

  // Fonction permettant à un utilisateur de s'inscrire
public function Ajouter(Inscription $personne){
  $pdo=new connexionpdo();
  $requete = $pdo->pdo_start()->prepare('INSERT INTO inscription (Nom, Prenom, Email, MDP)  VALUES (:nom,:prenom,:email, :mdp)');
$requete->execute(array(
 'nom'=>$personne->nom(),
 'prenom'=>$personne->prenom(),
 'email'=>$personne->email(),
 'mdp'=>$personne->mdp()));
 $result = $requete->fetch(PDO::FETCH_ASSOC);

 $_SESSION['popup']='Inscription effectuée avec succès';
 header("location: /snowboarding/src/view/register.php");
}

// Fonction permettant à un utilisateur de se connecter
public function getList(Inscription $personne)
  {
    $pdo=new connexionpdo();
    $prepare = $pdo->pdo_start()->prepare("SELECT * FROM inscription WHERE Email = ? AND Mdp = ?");
    $prepare->execute([
        $personne->email(),
        $personne->mdp()
    ]);
    $result = $prepare->fetch(PDO::FETCH_ASSOC);
    $donnee = $prepare->fetch();
    if($result) {


        if($_POST['email'] == 'admin@admin.com' && $_POST['mdp'] == '21232f297a57a5a743894a0e4a801fc3')
            {
                    setcookie('admin', $result['Nom'], time()+3600, '/');
                  $this->setMessage('Connexion effectuée','index.php');
            }
        elseif($_POST['email'] != 'admin@admin.com' && $_POST['mdp'] != '21232f297a57a5a743894a0e4a801fc3')
        {
          //On vérifie que l'adresse email et le mot de passe existent dans la base de donnée
          setcookie('id', $result['ID'], time()+3600, '/');
          session_start(); //On ouvre la session de l'utilisateur
          $this->setMessage('Connexion effectuée','index.php');
    }
}
else {
  session_start();
  $_SESSION['message']='Vos identifiants sont incorrects';
  header("location: /snowboarding/scr/view/login.php");
}
}

// Fonction permettant d'afficher les information de l'utilisateur
public function afficheUser()
{
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare('SELECT * FROM inscription WHERE id=?');
  $prepare->execute([
    $_COOKIE['id']
  ]);
  $result = $prepare->fetch();
  return $result;
}

// Fonction permettant d'afficher les information de l'administrateur
public function afficheAdmin()
{
  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare('SELECT * FROM inscription WHERE Email="admin@admin.com" and MDP="admin" ');
  $prepare->execute();
  $result = $prepare->fetch();
  return $result;
}

// Fonction permettant à l'utilisateur de modifier son nom, son prenom et son adresse email
public function editprofile($personne)
{

  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare('UPDATE inscription SET Nom=?, Prenom=?, Email=? WHERE ID=? ');
  $prepare->execute([
    $personne->nom(),
    $personne->prenom(),
    $personne->email(),
    $_COOKIE['id']
  ]);
  $result = $prepare->fetch();
  return $result;
  session_start();
  $_SESSION['message']='Votre profil a été modifié';
  header("location: /snowboarding/src/view/user-profile.php");
}

// Fonction permettant à l'utilisateur de modifier son mot de passe
public function editpassword($personne)
{

  $pdo=new connexionpdo();
  $prepare = $pdo->pdo_start()->prepare('UPDATE inscription SET MDP=? WHERE ID=? ');
  $prepare->execute([
    $personne->newmdp(),
    $_COOKIE['id']
  ]);
  $result = $prepare->fetch();
  return $result;
  $this->setMessage('Votre mot de passe a été modifié','src/view/user-profile.php');
}

public function deconnexion()
{
    setcookie('id', $result['id'], time()-1, '/');
    $this->setMessage('Deconnexion effectuée','index.php');
}

public function deconnexionadmin()
{
    setcookie('admin', $result['Nom'], time()-1, '/');
    $this->setMessage('Deconnexion effectuée','index.php');
}


// Fonction permettant d'ajouter des informations sur l'utilisateur
public function AjouterUserCommande($personne){
  $pdo=new connexionpdo();
  $requete = $pdo->pdo_start()->prepare('UPDATE inscription SET Adresse=?, Ville=?, Pays=?, NumTel=?, CP=? WHERE ID = ?');
$requete->execute([
 $personne->adresse(),
 $personne->ville(),
 $personne->pays(),
 $personne->numero(),
 $personne->codep(),
 $_COOKIE['id']]);
}

public function setMessage($message, $page) {
$_SESSION['message'] = $message;
header("location: /snowboarding/$page");
}

public function setPopUp($popup, $page) {
    $_SESSION['popup'] = $popup;
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
