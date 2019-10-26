<!DOCTYPE HTML>
<html>
<head>
<title>Commande</title>
<meta charset="utf-8">
<link href="../../css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="../../css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="../../js/jquery.min.js"></script>
<?php include "../app/script.php"; ?>
<?php
session_start();
if(isset($_SESSION['message'])) { ?>
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong><center><?php echo $_SESSION['message']; ?></center></strong>
    </div>
    <?php
    unset($_SESSION['message']);
}
?>
<?php include "../app/header.php"; ?>
</head>
<body>

     <div class="main">
<div class="shop_top">
  <div class="container">
    <h1>COMMANDER</h1><br><br>
    <button type="button" class="btn_form"><a href="javascript:history.go(-1)">Retour</a></button>

        <h2>Articles</h2>
        <div class="row">

          <?php

              // Creation d'un nouvel objet "panier" de type "purchaseManager"
            $panier = new purchaseManager();
            // Execution de la fonction "selectPanier"
            $item=$panier->selectPanier();

              ?>

              <div class="col-md-9 single_left">
              <?php foreach ($item as $m) { ?>
             <div class="single_image">
                 <ul id="etalage">

                <li>
                    <img class="etalage_thumb_image" src="../../<?php echo $m['Image1'] ?>" width="200" height="200"/>
                </li>
              </ul>
                </div>
                  <div class="single_right">
                    <h3><?php echo $m['Titre'] ?></h3>
                    <ul class="options"><?php echo $m['Description'].'<br/>  Couleur : '. $m['Couleur'].'<br/> Taille : '. $m['Taille'] ?></ul>
                    <?php if($m['Solde'] == 1) { ?>
                    <p class="price2"><span class="reducedfrom"><?php echo $m['Prix_solde'] ?>€</span><?php echo $m['Prix'] ?>€</p>
                  <?php } else {?>
                  <p class="price2"><?php echo $m['Prix'] ?>€</p>
                <?php } ?>
                <ul class="prosuct-qty">
               <span>Quantité : <?php echo $m['Quantite'] ?></span>
             </ul>

                  </div>
                  <div class="clear"> </div>
              <b> <hr></b>
            <?php } ?>
         </div>
          </div>

          <?php
          if(isset($_COOKIE['id'])) {

          $membre = new inscriManager();
          $result = $membre->afficheUser();
          }
          $panier = new purchaseManager();
          // Execution de la fonction "selectPanier"
          $item=$panier->selectPanier();
          ?>

  <form action="/snowboarding/src/traitement/commande-ttt.php" method="post">
    <div class="register-top-grid">
        <h2>Informations de livraison</h2>
        <div>
          <span>Prénom</span>
          <input type="text" name="prenom" value="<?php echo $result['Prenom'] ?>" disabled="disabled" >
        </div>
        <div>
          <span>Nom</span>
          <input type="text" name="nom" value="<?php echo $result['Nom'] ?>" disabled="disabled" >
        </div>
        <div>
          <span>Adresse Email</span>
          <input type="text" name="email" value="<?php echo $result['Email'] ?>" disabled="disabled" >
        </div>

        <div>
          <span>Adresse<label>*</label></span>
          <input type="text" name="adresse">
        </div>

        <div>
          <span>Numéro de téléphone<label>*</label></span>
          <input type="number" name="numero" min="100000000" max="999999999">
        </div>

        <div>
          <span>Ville<label>*</label></span>
          <input type="text" name="ville">
        </div>
        <div>
          <span>Code Postal<label>*</label></span>
          <input type="number" name="codep" min="10000" max="99999">
        </div>
        <div>
          <span>Pays<label>*</label></span>
          <select class="m_12" name="pays">
            <option value="Afghanistan">Afghanistan</option>
            <option value="Afrique_du_Sud">Afrique du Sud</option>
            <option value="Albanie">Albanie</option>
            <option value="Algerie">Algérie</option>
            <option value="Allemagne">Allemagne</option>
            <option value="Andorre">Andorre</option>
            <option value="Angola">Angola</option>
            <option value="Antigua-et-Barbuda">Antigua-et-Barbuda</option>
            <option value="Arabie_saoudite">Arabie saoudite</option>
            <option value="Argentine">Argentine</option>
            <option value="Armenie">Arménie</option>
            <option value="Australie">Australie</option>
            <option value="Autriche">Autriche</option>
            <option value="Azerbaidjan">Azerbaïdjan</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahrein">Bahreïn</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbade">Barbade</option>
            <option value="Belau">Belau</option>
            <option value="Belgique">Belgique</option>
            <option value="Belize">Belize</option>
            <option value="Benin">Bénin</option>
            <option value="Bhoutan">Bhoutan</option>
            <option value="Bielorussie">Biélorussie</option>
            <option value="Birmanie">Birmanie</option>
            <option value="Bolivie">Bolivie</option>
            <option value="Bosnie-Herzégovine">Bosnie-Herzégovine</option>
            <option value="Botswana">Botswana</option>
            <option value="Bresil">Brésil</option>
            <option value="Brunei">Brunei</option>
            <option value="Bulgarie">Bulgarie</option>
            <option value="Burkina">Burkina</option>
            <option value="Burundi">Burundi</option>
            <option value="Cambodge">Cambodge</option>
            <option value="Cameroun">Cameroun</option>
            <option value="Canada">Canada</option>
            <option value="Cap-Vert">Cap-Vert</option>
            <option value="Chili">Chili</option>
            <option value="Chine">Chine</option>
            <option value="Chypre">Chypre</option>
            <option value="Colombie">Colombie</option>
            <option value="Comores">Comores</option>
            <option value="Congo">Congo</option>
            <option value="Cook">Cook</option>
            <option value="Coree_du_Nord">Corée du Nord</option>
            <option value="Coree_du_Sud">Corée du Sud</option>
            <option value="Costa_Rica">Costa Rica</option>
            <option value="Cote_Ivoire">Côte d'Ivoire</option>
            <option value="Croatie">Croatie</option>
            <option value="Cuba">Cuba</option>
            <option value="Danemark">Danemark</option>
            <option value="Djibouti">Djibouti</option>
            <option value="Dominique">Dominique</option>
            <option value="Egypte">Égypte</option>
            <option value="Emirats_arabes_unis">Émirats arabes unis</option>
            <option value="Equateur">Équateur</option>
            <option value="Erythree">Érythrée</option>
            <option value="Espagne">Espagne</option>
            <option value="Estonie">Estonie</option>
            <option value="Etats-Unis">États-Unis</option>
            <option value="Ethiopie">Éthiopie</option>
            <option value="Fidji">Fidji</option>
            <option value="Finlande">Finlande</option>
            <option value="France">France</option>
            <option value="Gabon">Gabon</option>
            <option value="Gambie">Gambie</option>
            <option value="Georgie">Géorgie</option>
            <option value="Ghana">Ghana</option>
            <option value="Grèce">Grèce</option>
            <option value="Grenade">Grenade</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guinee">Guinée</option>
            <option value="Guinee-Bissao">Guinée-Bissao</option>
            <option value="Guinee_equatoriale">Guinée équatoriale</option>
            <option value="Guyana">Guyana</option>
            <option value="Haiti">Haïti</option>
            <option value="Honduras">Honduras</option>
            <option value="Hongrie">Hongrie</option>
            <option value="Inde">Inde</option>
            <option value="Indonesie">Indonésie</option>
            <option value="Iran">Iran</option>
            <option value="Iraq">Iraq</option>
            <option value="Irlande">Irlande</option>
            <option value="Islande">Islande</option>
            <option value="Israël">Israël</option>
            <option value="Italie">Italie</option>
            <option value="Jamaique">Jamaïque</option>
            <option value="Japon">Japon</option>
            <option value="Jordanie">Jordanie</option>
            <option value="Kazakhstan">Kazakhstan</option>
            <option value="Kenya">Kenya</option>
            <option value="Kirghizistan">Kirghizistan</option>
            <option value="Kiribati">Kiribati</option>
            <option value="Koweit">Koweït</option>
            <option value="Laos">Laos</option>
            <option value="Lesotho">Lesotho</option>
            <option value="Lettonie">Lettonie</option>
            <option value="Liban">Liban</option>
            <option value="Liberia">Liberia</option>
            <option value="Libye">Libye</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lituanie">Lituanie</option>
            <option value="Luxembourg">Luxembourg</option>
            <option value="Macedoine">Macédoine</option>
            <option value="Madagascar">Madagascar</option>
            <option value="Malaisie">Malaisie</option>
            <option value="Malawi">Malawi</option>
            <option value="Maldives">Maldives</option>
            <option value="Mali">Mali</option>
            <option value="Malte">Malte</option>
            <option value="Maroc">Maroc</option>
            <option value="Marshall">Marshall</option>
            <option value="Maurice">Maurice</option>
            <option value="Mauritanie">Mauritanie</option>
            <option value="Mexique">Mexique</option>
            <option value="Micronesie">Micronésie</option>
            <option value="Moldavie">Moldavie</option>
            <option value="Monaco">Monaco</option>
            <option value="Mongolie">Mongolie</option>
            <option value="Mozambique">Mozambique</option>
            <option value="Namibie">Namibie</option>
            <option value="Nauru">Nauru</option>
            <option value="Nepal">Népal</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Niger">Niger</option>
            <option value="Nigeria">Nigeria</option>
            <option value="Niue">Niue</option>
            <option value="Norvège">Norvège</option>
            <option value="Nouvelle-Zelande">Nouvelle-Zélande</option>
            <option value="Oman">Oman</option>
            <option value="Ouganda">Ouganda</option>
            <option value="Ouzbekistan">Ouzbékistan</option>
            <option value="Pakistan">Pakistan</option>
            <option value="Panama">Panama</option>
            <option value="Papouasie-Nouvelle_Guinee">Papouasie - Nouvelle Guinée</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Pays-Bas">Pays-Bas</option>
            <option value="Perou">Pérou</option>
            <option value="Philippines">Philippines</option>
            <option value="Pologne">Pologne</option>
            <option value="Portugal">Portugal</option>
            <option value="Qatar">Qatar</option>
            <option value="Republique_centrafricaine">République centrafricaine</option>
            <option value="Republique_dominicaine">République dominicaine</option>
            <option value="Republique_tcheque">République tchèque</option>
            <option value="Roumanie">Roumanie</option>
            <option value="Royaume-Uni">Royaume-Uni</option>
            <option value="Russie">Russie</option>
            <option value="Rwanda">Rwanda</option>
            <option value="Saint-Christophe-et-Nieves">Saint-Christophe-et-Niévès</option>
            <option value="Sainte-Lucie">Sainte-Lucie</option>
            <option value="Saint-Marin">Saint-Marin </option>
            <option value="Saint-Siège">Saint-Siège, ou leVatican</option>
            <option value="Saint-Vincent-et-les_Grenadines">Saint-Vincent-et-les Grenadines</option>
            <option value="Salomon">Salomon</option>
            <option value="Salvador">Salvador</option>
            <option value="Samoa_occidentales">Samoa occidentales</option>
            <option value="Sao_Tome-et-Principe">Sao Tomé-et-Principe</option>
            <option value="Senegal">Sénégal</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra_Leone">Sierra Leone</option>
            <option value="Singapour">Singapour</option>
            <option value="Slovaquie">Slovaquie</option>
            <option value="Slovenie">Slovénie</option>
            <option value="Somalie">Somalie</option>
            <option value="Soudan">Soudan</option>
            <option value="Sri_Lanka">Sri Lanka</option>
            <option value="Sued">Suède</option>
            <option value="Suisse">Suisse</option>
            <option value="Suriname">Suriname</option>
            <option value="Swaziland">Swaziland</option>
            <option value="Syrie">Syrie</option>
            <option value="Tadjikistan">Tadjikistan</option>
            <option value="Tanzanie">Tanzanie</option>
            <option value="Tchad">Tchad</option>
            <option value="Thailande">Thaïlande</option>
            <option value="Togo">Togo</option>
            <option value="Tonga">Tonga</option>
            <option value="Trinite-et-Tobago">Trinité-et-Tobago</option>
            <option value="Tunisie">Tunisie</option>
            <option value="Turkmenistan">Turkménistan</option>
            <option value="Turquie">Turquie</option>
            <option value="Tuvalu">Tuvalu</option>
            <option value="Ukraine">Ukraine</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Venezuela">Venezuela</option>
            <option value="Viet_Nam">Viêt Nam</option>
            <option value="Yemen">Yémen</option>
            <option value="Yougoslavie">Yougoslavie</option>
            <option value="Zaire">Zaïre</option>
            <option value="Zambie">Zambie</option>
            <option value="Zimbabwe">Zimbabwe</option>
          </select>
          <br>

          <span>Lieu de livraison<label>*</label></span>
          <select class="m_12" name="lieu">
            <option value="Domicile">Domicile</option>
            <option value="Point_de_retrait">Point relais</option>
          </select>
        </div>

      </div>
      <br><br><br>


          <div class="register-bottom-grid">


        <h2>Informations de paiement</h2><br>
        <h3>Cartes acceptées</h3>
        <div class="icon-container">
          <img src="https://img.icons8.com/color/48/000000/visa.png">
          <img src="https://img.icons8.com/color/48/000000/amex.png">
          <img src="https://img.icons8.com/color/48/000000/mastercard.png">
        </div>
        <div>
          <span>Numéro de carte<label>*</label></span>
          <input type="number" name="num_carte" placeholder="0000-0000-0000-0000" min="1000000000000000" max="9999999999999999">
        </div>
        <div>
          <span>Mois d'expiration<label>*</label></span>
          <select  class="m_12" name="expimois">
            <option value="01">Janvier</option>
            <option value="02">Février</option>
            <option value="03">Mars</option>
            <option value="04">Avril</option>
            <option value="05">Mai</option>
            <option value="06">Juin</option>
            <option value="07">Juillet</option>
            <option value="08">Août</option>
            <option value="09">Septembre</option>
            <option value="10">Octobre</option>
            <option value="11">Novembre</option>
            <option value="12">Décembre</option>
          </select>
        </div>
        <div>
          <span>Année d'expiration<label>*</label></span>
          <input type="number" name="expiannee" placeholder="AA" min="19">
        </div>
        <div>
          <span>Numéro de sécurité<label>*</label></span>
          <input type="number" name="code_secu" min="100" max="999">
        </div>

    <input type="submit" value="Commander" class="btn_form">
  </form>
</div>

</div>
<br><br>

</div>
</div>




	<?php include "../app/footer.php" ?>
</body>
</html>
