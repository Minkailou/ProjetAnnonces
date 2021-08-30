<?php
   include('connexion.php');
   include('header.php');

   if(isset($_GET['id']) AND !empty($_GET['id'])){
      $getid = $_GET['id'];

      $recupArticle = $idcom->prepare('SELECT * FROM annonces WHERE id = ?');
      $recupArticle->execute(array($getid));
      if($recupArticle->rowCount() > 0){
          $articleInfos = $recupArticle->fetch();
          $titre = $articleInfos['titre'];
          $img_place = $articleInfos['img_place'];
          $descrip_tion = $articleInfos['descrip_tion'];
          $categorie = $articleInfos['categorie'];
          $prix = $articleInfos['prix'];
          $datepub = $articleInfos['datepub'];
          $lieu = $articleInfos['lieu'];
 
          if(isset($_POST['valider'])){
            $titre_saisi = htmlspecialchars($_POST['titre']);
            $img_place_saisi = htmlspecialchars($_POST['img_place']);
            $descrip_tion_saisi = htmlspecialchars($_POST['descrip_tion']);
            $categorie_saisi = htmlspecialchars($_POST['categorie']);
            $prix_saisi = htmlspecialchars($_POST['prix']);
            $datepub_saisi = htmlspecialchars($_POST['datepub']);
            $lieu_saisi = htmlspecialchars($_POST['lieu']);
            
            $updateArticle = $idcom->prepare('UPDATE annonces SET titre= ?, img_place= ?, descrip_tion= ?,
             categorie= ?, prix= ?, datepub= ?, lieu= ? WHERE id= ? ');
            $updateArticle->execute(array($titre_saisi, $img_place_saisi, $descrip_tion_saisi, 
            $categorie_saisi, $prix_saisi, $datepub_saisi, $lieu_saisi, $getid));

            header('location: index.php');

          }
          
      }else
      {
          echo "Auncun Article trouvé";
      }
   }
   else
   {
       echo"Aucun identifiant trouvé";
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
  <form method="post" action="">
    <ul class="flex-outer">
      <li>
        <label>Titre</label>
        <input type="text" name="titre" value="<?= $titre; ?>" placeholder="Entrez votre nom">
      </li>
      <li>
        <label>Images</label>
        <input type="file" name="img_place" value="<?= $img_place; ?>" accept="image/gif, image/jpeg>, image/pnf">
      </li>
      <li>
        <label>Description</label>
        <textarea name="descrip_tion"><?= $descrip_tion; ?></textarea>
      </li>
      <li>
        <label>Catégorie</label>
        <input type="text" name="categorie" value="<?= $categorie; ?>">
      </li>
      <li>
        <label>Prix</label>
        <input type="text" name="prix" value="<?= $prix; ?>">
      </li>
      <li>
        <label>Date</label>
        <input type="date" name="datepub" tabindex="1" value="<?= $datepub; ?>">
      </li>
      <li>
        <label>Lieu</label>
        <input type="text" name="lieu" value="<?= $lieu; ?>">
      </li>
      <li>
        <button type="submit" name="valider">envoyer</button>
      </li>
    </ul>
  </form>     
</div>

<?php
   include('footer.php')
?>
    
</body>
</html>