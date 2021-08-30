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
          $id_users = $idcom->quote($_POST['id_users']);
          
          

          $requete = "INSERT INTO annonces
                     VALUES (DEFAULT, $titre, $img_place, $descrip_tion, $categorie, $prix, $datepub, $lieu, $id_users)";
          $idcom->exec($requete);  
          
          header('location:index.php');

        }
  
  
?>


<div class=" p-6 flex content-center justify-center  items-center">
<form class="monform" action="#" method="post" enctype="application/x-www-form-urlencoded">
            
        <div class=" bg-white shadow-lg max-w-7xl md:flex justify-center items-center">
            <img class=" flex-1 w-full h-50 object-cover"src="img/tech1.jpg" alt="">
        <div class="P-4 flex-1 md:flex md:flex-col">
            <h1 class="text-center text-4xl font-mono m-3">Ajouter annonces</h1>
         <div class="m-4">
             <label for="titre" class="block text-gray-600 mb-2">Titre</label>
             <input type="text"  placeholder=" Votre titre " name="titre" class=" border shadow-inner py-1 px-1 text-gray-700 w-full
             focus:ring-1 focus:ring-gray-300 ">
            
        </div> 
        <div class="m-4">
             <label for="images" class="block text-gray-600 mb-2">Images</label>
             <input type="file"  placeholder=" Votre images " name="img_place"  accept="image/gif, image/jpeg>, image/png"class=" border shadow-inner py-2 px-3 text-gray-700 w-full
             focus:ring-1 focus:ring-gray-300 ">
            
        </div> 
        <div class="m-4">
             <label for="description" class="block text-gray-600 mb-2">Description</label>
             <textarea  placeholder=" Mettez la description " name="descrip_tion" class=" border shadow-inner py-1 px-1 text-gray-700 w-full
             focus:ring-1 focus:ring-gray-300 "></textarea>
            
        </div> 
        <div class="m-4">
             <label for="categorie" class="block text-gray-600 mb-2">Catégorie</label>
             <input type="text"  placeholder=" Catégorie " name="categorie" class=" border shadow-inner py-1 px-1 text-gray-700 w-full
             focus:ring-1 focus:ring-gray-300 ">
            
        </div> 
        <div class="m-4">
             <label for="prix" class="block text-gray-600 mb-2">Prix</label>
             <input type="text"  placeholder=" Prix " name="prix" class=" border shadow-inner py-1 px-3 text-gray-700 w-full
             focus:ring-1 focus:ring-gray-300 ">
            
        </div> 
        <div class="m-4">
             <label for="lieu" class="block text-gray-600 mb-2">Lieu </label>
             <input type="text"  placeholder=" lieu " name="lieu" class=" border shadow-inner py-1 px-3 text-gray-700 w-full
             focus:ring-1 focus:ring-gray-300 ">
            
        </div> 
        <div class="m-4">
             <label for="date" class="block text-gray-600 mb-2">Date </label>
             <input type="date"  placeholder=" Date " name="datepub" class=" border shadow-inner py-1 px-3 text-gray-700 w-full
             focus:ring-1 focus:ring-gray-300 ">
            
        </div> 
        <button type="reset" name="supprimer" class="bg-gray-700 text-white p-2 rounded m-4 md:bg-gray-500 md:hover:bg-gray-300 hover:text-black">Supprimer</button>
        <button type="submit" name="envoyer" class="bg-gray-700 text-white p-2 rounded m-4 md:bg-gray-500 md:hover:bg-gray-300 hover:text-black">Envoyer</button>
        </div> 
          </form>
      </body>
     
      </html>


        
    
