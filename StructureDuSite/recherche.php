<?php
     include('connexion.php');

   if(!empty($_POST['motcle']))
   {
    
     $motcle=strtolower(($_POST['motcle']));
     $categorie=($_POST['categorie']);
     $ordre=($_POST['ordre']);
     $tri=($_POST['tri']);

     //Réquete SQL
     $reqcategorie=($_POST['categorie']=="tous")?"":"AND categorie='$categorie'";
     $requete="SELECT id AS 'Code article' ,descrip_tion AS 'Description', prix,categorie AS
     'categorie' FROM annonces WHERE lower (descrip_tion) LIKE lower('%$motcle%')"
     .$reqcategorie."ORDER BY $tri $ordre";
     $result=$idcom->query($requete);
     
     if(!$result)
     {
         echo "Lecture impossible";
     }
     else
     {
         $nbcol=$result->columnCount();
         $nbart=$result->rowCount();
         if($nbart==0)
         {

         echo " <h3> il y a $nbart article correspondant au mot-clé :$motcle</h3>";
         exit;
         }

         $ligne=$result->fetch(PDO::FETCH_ASSOC);
         $titres=array_keys($ligne);
         $ligne=array_values($ligne);

         echo "<h3> il y a $nbart articles correspondant au mot-clé : $motcle</h3>";
         
         echo"<table border=\"1\"><tr>";
         foreach($titres as $val)
         {
             echo"<th>", htmlentities($val),"</th>";

         }
         echo "</tr>";

        do
        {
            
            echo"<tr>";

            foreach($ligne as $donnees)
            {
                echo "<td>",$donnees,"</td>";
            }

            echo "</tr>";
        }
         while($ligne=$result->fetch(PDO::FETCH_NUM));
     } 
        echo "</table>";
        $result->closeCursor();
        $idcom=null;
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche annonces</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="application/x-www-form-urlencoded">
    <fieldset>
        <legend><b>Rechercher une annonce</b></legend>
        <table>
            <tbody>
                <tr>
                    <td>Mot-cl&#233;:</td>
                    <td><input type="text" name="motcle" size="40" maxlength="40" /></td>
                </tr>
                <tr>
                    <td>Catégorie:</td>
                    <td>
                        <select name="categorie">
                            <option value="tous">Tous</option>
                            <option value="vehicule">Véhicule</option>
                            <option value="Maison">Maison</option>
                            <option value="Mode">Mode</option>
                            <option value="Immoblier">Immoblier</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Trier par :</td>
                    <td>
                        <select name="tri">
                            <option value="prix">Prix</option>
                            <option value="categorie">Catégorie</option>
                            <option value="id">Code</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>En ordre :</td>
                    <td>Croissant<input type="radio" name="ordre" value="ASC" checked="checked" />
                    Décroissant<input type="radio" name="ordre" value="DESC" />
                    </td>
                </tr>
                <tr><td>Envoyer</td><td><input type="submit" name="" value="OK" /></td></tr>
            </tbody>
        </table>

    </fieldset>
    </form>
    
</body>
</html>