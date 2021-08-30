<?php
    include("connexion.php");
    

    $annoncesParPage = 12;
    $annoncesTotalesReq = $idcom->query('SELECT id FROM annonces');
    $annoncesTotales = $annoncesTotalesReq->rowCount();
    $pageTotales = ceil($annoncesTotales / $annoncesParPage);

    if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $pageTotales){
        $_GET['page'] = intval($_GET['page']);
        $pageCourante = $_GET['page'];
    }else {
        $pageCourante = 1;
    }

    $depart = ($pageCourante - 1) * $annoncesParPage;

?>
  
  
    <div class="heading text-center font-bold text-2xl m-5 text-gray-100"></div>
    <div class=" mx-auto w-10/12 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4">



<?php
    $requete = $idcom->query('SELECT * FROM annonces ORDER BY id DESC LIMIT '.$depart.', '.$annoncesParPage );
    while($user = $requete->fetch()){

?>

  

  <!-- component -->





  <div class="each mb-10 m-2 shadow-lg border-gray-800 bg-gray-100 relative">
    <img class="w-full" src='./img/<?="$user[img_place]"?>' width='230' height='260' alt='toff'>
    <div class="info-box text-xs flex p-1 font-semibold text-gray-500 bg-gray-300">
      
    </div>
    <div class="desc p-4 text-gray-800">
      <a href="https://www.youtube.com/watch?v=dvqT-E74Qlo" target="_new" class="title font-bold block cursor-pointer hover:underline"><?="$user[titre]"?></a>
      <a href="https://www.youtube.com/user/sam14319" target="_new" class="badge bg-indigo-500 text-grey-500 rounded  p-1 px-3 text-xs font-bold cursor-pointer"><?="$user[categorie]"?></a>
      <span class="description text-sm block py-2 border-gray-400 mb-2"><?="$user[descrip_tion]"?></span>
      <span class="description text-sm block py-2 border-gray-400 mb-2"><?="$user[prix]"?></span>
      <span class="description text-sm block py-2 border-gray-400 mb-2"><?="$user[datepub]"?></span>
      <span class="description text-sm block py-2 border-gray-400 mb-2"><?="$user[lieu]"?></span>
    </div>
    </div>
  
 
  



   
<?php
  
}

$requete->closeCursor();

?>
</div>
<?php
 echo"<link href='style.css' rel='stylesheet'>";
for($i=1;$i<= $pageTotales;$i++){
    if($i == $pageCourante){
        echo $i.' ';

    }else{
        echo '<a class="lien" href="index.php?page='.$i.'">'.$i.'</a>';
    }
         
        
        
    }
?>
