<?php
    include("connexion.php");
    include("header.php");
    
    

  
        if(!empty($_POST['titre']) && !empty($_POST['img_place']) && !empty($_POST['descrip_tion'])&&
        !empty($_POST['categorie']) && !empty($_POST['prix']) && !empty($_POST['datepub'])&& !empty($_POST['lieu'])){

          $titre = $idcom->quote($_POST['titre']);
          $img_place = $idcom->quote($_POST['img_place']);
          $descrip_tion = $idcom->quote($_POST['descrip_tion']);
          $categorie = $idcom->quote($_POST['categorie']);
          $prix = $idcom->quote($_POST['prix']);
          $datepub = $idcom->quote($_POST['datepub']);
          $lieu = $idcom->quote($_POST['lieu']);

          $requete = "INSERT INTO annonces
                     VALUES (DEFAULT, $titre, $img_place, $descrip_tion, $categorie, $prix, $datepub, $lieu)";
          $idcom->exec($requete);  
          
          header('location:index.php');

        }
  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?> ">
    <ul class="flex-outer">
      <li>
        <label>Titre</label>
        <input type="text" name="titre" placeholder="Entrez votre nom">
      </li>
      <li>
        <label>Images</label>
        <input type="file" name="img_place" accept="image/gif, image/jpeg>, image/png">
      </li>
      <li>
        <label>Description</label>
        <textarea name="descrip_tion"></textarea>
      </li>
      <li>
        <label>Catégorie</label>
        <input type="text" name="categorie">
      </li>
      <li>
        <label>Prix</label>
        <input type="text" name="prix">
      </li>
      <li>
        <label>Date</label>
        <input type="date" name="datepub">
      </li>
      <li>
        <label>Lieu</label>
        <input type="text" name="lieu">
      </li>
      <li>
        <button class="bouton" type="reset">Supprimer</button>
        <button class="bouton" type="submit" name="envoyer">envoyer</button>
      </li>
    </ul>
  </form>     
</div>
</body>
</html>

<?php
  include('footer.php')
?>
