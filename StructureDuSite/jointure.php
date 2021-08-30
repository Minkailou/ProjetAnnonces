<?php
    include('connexion.php');

    $jointure_int = "
    SELECT *
    FROM annonces
    INNER JOIN users ON annonces.id_users = users.id-users ";
    $requete = $idcom->prepare($jointure_int);
    $requete->execute();

    $resultat = $requete->fetchAll();

    echo $resultat;

   




?>
 
     
</body>
</html>