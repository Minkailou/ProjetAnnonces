<?php
    session_start();
    include('header.php');
    include("connexion.php");
    if(isset($_SESSION['id']))
    {
      
       $requser = $idcom->prepare('SELECT * FROM users WHERE id = ?');
       $requser->execute(array($_SESSION['id']));
       $userinfo = $requser->fetch();

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil utilisateur</title>
</head>
<body>

<div class=" bg-gray !important flex items-center justify-center">
  <div class=" w-80 bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl hover:scale-105 duration-500 transform transition cursor-pointer">
    <img src="https://images.unsplash.com/photo-1577982787983-e07c6730f2d3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=859&q=80" alt="">
    <div class="p-5">
      <h1 class="text-2xl font-bold">Profil de : <?php echo $userinfo['pseudo'];?></h1>
      <p class="mt-2 text-lg font-semibold text-gray-600">Pseudo : <?php echo $userinfo['pseudo'];?></p>
      <p class="mt-1 text-gray-500 font-">Mail : <?php echo $userinfo['mail'];?></p>
    </div>
  </div>
</div>
     
    <?php
       if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
       {
       ?>
       <a href="inserer.php"><button class="py-3 px-6 text-white rounded-lg bg-gray-500 shadow-lg block md:inline-block">Ajouter annonces</button></a>
       <a href="article.php"><button class="py-3 px-6 text-white rounded-lg bg-gray-500 shadow-lg block md:inline-block">Modifier l'annonces</button></a>
       <a href="deconnexion.php"><button class="py-3 px-6 text-white rounded-lg bg-gray-500 shadow-lg block md:inline-block">Se deconnecter</button></a>
      
       <?php
       }
    ?>
</body>
</html>
<?php
}
?>
<?php
  include('footer.php');
?>