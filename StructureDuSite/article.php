<?php
  include('connexion.php');
  include('header.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" >
    <title>Afficher les articles</title>
</head>
<body>
<?php


           $recupArticles = $idcom->query('SELECT * FROM annonces ORDER BY  id DESC');
           while($article = $recupArticles->fetch()){
               ?>
               <div class="article">
                <div class="bloc_art">
                    <h1 id="titreart"><?= $article['titre'];?></h1>
                    <br>
                    <p id=art><?= $article['img_place'];?></p>
                    <br>
                    <p id=art><?= $article['descrip_tion'];?></p>
                    <br>
                    <p id=art><?= $article['categorie'];?></p>
                    <br>
                    <p id=art><?= $article['prix'];?></p> 
                    <br>
                    <p id=art><?= $article['datepub'];?></p> 
                    <br>
                    <p id=art><?= $article['lieu'];?></p> 
                    <a href="supprimer.php?id=<?= $article['id']; ?>">
                    <button class="supp">Supprimer</button>
                    </a>
                    <a href="modifier.php?id=<?= $article['id']; ?>">
                    <button class='modif'>Modifier</button>
                    </a>
                </div>
               </div>
               <?php
           }
       ?>
        <?php
            include('footer.php');
        ?>
</body>

</html>