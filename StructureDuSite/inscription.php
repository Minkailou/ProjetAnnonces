<?php 
    include('connexion.php');
    include('header.php');
    if(isset($_POST['inscription'])){


       
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mail = htmlspecialchars($_POST['mail']);
        $mail2 = htmlspecialchars($_POST['mail2']);
        $mdp = md5($_POST['mdp']);
        $mdp2 = md5($_POST['mdp2']);
        $date_inscription = htmlspecialchars($_POST['date_inscription']);

        if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp'])
        AND !empty($_POST['mdp2']) AND !empty ($_POST['date_inscription'])){
           
            $pseudolength = strlen($pseudo);
            if($pseudolength <=255){
                if($mail == $mail2){
                    if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
                        $requete = $idcom->prepare("SELECT * FROM users WHERE mail = ?");
                        $requete->execute(array($mail));

                        $mailexist = $requete->rowCount();
                        if($mailexist == 0){
                            if($mdp == $mdp2){
                                $requete = $idcom->prepare("INSERT INTO users(pseudo, mail, motdepasse, date_inscription) VALUES(?, ?, ?, ?)");
                                $requete->execute(array($pseudo, $mail, $mdp, $date_inscription));
                                $erreur = "Votre compte a bien été créé !<br /> <a class=\"idcom\" href=\"pageConnexion.php\">Me connecter</a>";

                            }else {
                                $erreur = "Vos mots de passe ne correspondent pas !";
                            }
                        }else{
                            $erreur = "Adresse mail déjà utilisée !";
                        }
                    }
                    else{
                        $erreur = "Votre adresse mail n'est pas valide !";
                    }
                }
                else{
                    $erreur = "Vos adresses mail ne correspondent pas !";
                }
            }
            else{
                $erreur = "Votre pseudo ne doit pas dépasser 255 caractére !";
            }
        }
        else{
            $erreur = "Tous les champs doivent être complétés !";
        }
}
?>
<link href="style.css" rel="stylesheet">
<div class=" p-6 flex content-center justify-center  items-center">
    
    <form class="monform" action="#" method="post" enctype="application/x-www-form-urlencoded">
            
        <div class=" bg-white shadow-lg max-w-7xl md:flex justify-center items-center">
            <img class=" flex-1 w-full h-50 object-cover"src="img/tech1.jpg" alt="">
        <div class="P-4 flex-1 md:flex md:flex-col">
            <h1 class="text-center text-4xl font-mono m-3">Inscription</h1>
         <div class="m-4">
             <label for="mail" class="block text-gray-600 mb-2">Pseudo</label>
             <input type="text"  placeholder=" Votre pseudo " name="pseudo" class=" border shadow-inner py-2 px-3 text-gray-700 w-full
             focus:ring-1 focus:ring-gray-300 ">
            
        </div> 
        <div class="m-4">
             <label for="mail" class="block text-gray-600 mb-2">Mail</label>
             <input type="mail"  placeholder=" Votre mail " name="mail" class=" border shadow-inner py-2 px-3 text-gray-700 w-full
             focus:ring-1 focus:ring-gray-300 ">
            
        </div> 
        <div class="m-4">
             <label for="mail" class="block text-gray-600 mb-2">Confirmation du mail</label>
             <input type="mail"  placeholder=" Confirmer votre mail " name="mail2" class=" border shadow-inner py-2 px-3 text-gray-700 w-full
             focus:ring-1 focus:ring-gray-300 ">
            
        </div> 
        <div class="m-4">
             <label for="mdp" class="block text-gray-600 mb-2">Mot de passe</label>
             <input type="password"  placeholder=" Votre mot de passe " name="mdp" class=" border shadow-inner py-2 px-3 text-gray-700 w-full
             focus:ring-1 focus:ring-gray-300 ">
            
        </div> 
        <div class="m-4">
             <label for="mail" class="block text-gray-600 mb-2">Confirmation du mot de passe</label>
             <input type="password"  placeholder=" Confirmer votre mot de passe " name="mdp2" class=" border shadow-inner py-2 px-3 text-gray-700 w-full
             focus:ring-1 focus:ring-gray-300 ">
            
        </div> 
        <div class="m-4">
             <label for="date" class="block text-gray-600 mb-2">Date d'inscription</label>
             <input type="date"  placeholder=" Votre date d'nscription " name="date_inscription" class=" border shadow-inner py-2 px-3 text-gray-700 w-full
             focus:ring-1 focus:ring-gray-300 ">
            
        </div> 
        <button type="submit" name="inscription" class="bg-gray-700 text-white p-2 rounded m-4 md:bg-gray-500 md:hover:bg-gray-300 hover:text-black">Je m'inscris</button>
        </div> 
         
        
                  
        </form>
        <?php
             if(isset($erreur)){
                 echo '<font color="red">'.$erreur."</font>";
             }
         ?>
        </div> 
            </div>


