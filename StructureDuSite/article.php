<?php
session_start();
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

<div class="heading text-center font-bold text-2xl m-5 text-gray-100"></div>
    <div class=" mx-auto w-10/12 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4">

<?php


           $recupArticles = $idcom->query('SELECT * FROM annonces ORDER BY  id DESC');
           while($article = $recupArticles->fetch()){
           
               
               ?>
               
               <div class="each mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative">
    <img class="w-full" src='./img/<?="$article[img_place]"?>' width='230' height='260' alt='toff'>
    <div class="info-box text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">
      
    </div>
    <div class="desc p-4 text-gray-800">
      <a href="https://www.youtube.com/watch?v=dvqT-E74Qlo" target="_new" class="title font-bold block cursor-pointer hover:underline"><?="$article[titre]"?></a>
      <a href="https://www.youtube.com/user/sam14319" target="_new" class="badge bg-indigo-500 text-grey-500 rounded  p-1 px-3 text-xs font-bold cursor-pointer"><?="$article[categorie]"?></a>
      <span class="description text-sm block py-2 border-gray-400 mb-2"><?="$article[descrip_tion]"?></span>
      <span class="description text-sm block py-2 border-gray-400 mb-2"><?="$article[prix]"?></span>
      <span class="description text-sm block py-2 border-gray-400 mb-2"><?="$article[datepub]"?></span>
      <span class="description text-sm block py-2 border-gray-400 mb-2"><?="$article[lieu]"?></span>
      <a href="supprimer.php?id=<?= $article['id']; ?>">
      <?php
      ?>
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
       
    </div>
        <?php
            include('footer.php');
        ?>
</body>

</html>