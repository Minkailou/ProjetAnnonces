<?php
    session_start();
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
     <h2>Profil de <?php echo $userinfo['pseudo'];?></h2>
     <br /><br />
     Pseudo = <?php echo $userinfo['pseudo'];?>
    <br />
    Mail = <?php echo $userinfo['mail'];?>
    <br /><br :>
    <?php
       if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
       {
       ?>
       <a href="#">Editer mon profil</a>
       <a href="deconnexion.php">Se deconnecter</a>
       <?php
       }
    ?>
</body>
</html>
<?php
}
?>