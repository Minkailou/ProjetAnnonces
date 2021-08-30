<?php

session_start();
  include('connexion.php');
   include('header.php');

  if(isset($_POST['formconnect'])){
       $mailconnect = htmlspecialchars($_POST['mailconnect']);
         $mdpconnect = md5($_POST['mdpconnect']);

     if(!empty($_POST['mailconnect']) AND !empty($_POST['mdpconnect'])){
        
         $requser = $idcom->prepare("SELECT * FROM users WHERE mail = ? AND  motdepasse = ?");
         $requser ->execute(array($mailconnect, $mdpconnect));

         $userexist = $requser->rowCount();// Permet de compter les rangés
         if($userexist == 1){
             $userinfo = $requser->fetch();
             $_SESSION['id'] = $userinfo['id'];
             $_SESSION['pseudo'] = $userinfo['pseudo'];
             $_SESSION['mail'] = $userinfo['mail'];

             header("location: inserer.php?id=".$_SESSION['id']);

         }else{
             $erreur = "Mauvais mail ou mot de passe";
         }


     }else{
         $erreur = "Veillez remplir tous les champs...";
     }
  }
?>


<div class=" p-6 flex content-center justify-center h-full items-center">
    
<form class="monform" action="" method="post" enctype="application/x-www-form-urlencoded">
        
    <div class=" bg-white shadow-lg max-w-7xl md:flex justify-center items-center">
        <img class=" flex-1 w-full h-50 object-cover"src="img/The2.png" alt="">
    <div class="P-4 flex-1 md:flex md:flex-col">
        <h1 class="text-center text-4xl font-mono m-3">Connexion</h1>
     <div class="m-4">
         <label for="mail" class="block text-gray-600 mb-2">Mail</label>
         <input type="mail"  placeholder=" Votre email " name="mailconnect" class=" border shadow-inner py-2 px-3 text-gray-700 w-full
         focus:ring-1 focus:ring-gray-300 ">
        
    </div> 
    <div class="m-4">
         <label for="mail" class="block text-gray-600 mb-2">Mot de passe</label>
         <input type="password"  placeholder=" Votre mot de passe " name="mdpconnect" class=" border shadow-inner py-2 px-3 text-gray-700 w-full
         focus:ring-1 focus:ring-gray-300 ">
        
    </div> 
    <button type="submit" name="formconnect" class="bg-gray-700 text-white p-2 rounded m-4 md:bg-gray-500 md:hover:bg-gray-300 hover:text-black">Se connecter</button>
    </div> 
     
    
              
    </form>
    <?php
         if(isset($erreur)){
             echo '<font color="red">'.$erreur."</font>";
         }
     ?>
    </div> 
        </div>
<?php
   include('footer.php');
?>
