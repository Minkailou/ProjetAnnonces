<?php
   include('connexion.php');

   if(isset($_GET['id'])  AND !empty($_GET['id'])){

    $getid = $_GET['id'];
    $recupAricle = $idcom->prepare('SELECT * FROM annonces WHERE id=?');
    $recupAricle->execute(array($getid));

    if($recupAricle->rowCount() > 0){
        $deleteArticle = $idcom->prepare('DELETE FROM annonces WHERE id= ?');
        $deleteArticle->execute(array($getid));
        header('location: article.php');
        exit();
    }
    else{
        echo "Aucun article trouvé";
    }
}
    else{
        echo"Aucun identifiant trouvé";
    }

   
?>